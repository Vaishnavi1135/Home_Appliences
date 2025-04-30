<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
        $this->load->model(array('admin/services_model','admin/plans_model','admin/review_model'));
        $this->load->library('pdf');

    }

    public function index()
    {
        $data['title'] = "Kolhapur Packers and Movers";
        $data['services'] =  $this->services_model->read();
        // echo '<pre>'; print_r($data); die();
        $data['plans'] =  $this->plans_model->read();
        $data['review'] =  $this->review_model->read();
        $data['content'] = $this->load->view("home",$data,true);
        $data['active'] = "Home";
        $this->load->view("main_template",$data);
        //$this->load->view("theme_view");
        //return view('theme_view');
    }

    public function free_quote()
    {
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("free_quote",$data,true);
        $data['active'] = "Home";
        $this->load->view("main_template",$data);
        $distance = $this->input->get('distance');
        $data['distance'] = $distance;



    }

    public function track()
    {
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("track",$data,true);
        $data['active'] = "Home";
        $this->load->view("main_template",$data);
    }

    public function free_quote2()
    {
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("free_quote2",$data,true);
        $data['active'] = "Home";
        $this->load->view("main_template",$data);

        
    }

    public function next_page()
{
    $this->load->view('free_quote2'); // or whatever your view is
}


    public function selectitem()
    {
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("selectitem",$data,true);
        $data['active'] = "Home";
        $this->load->view("main_template",$data);
    }

    public function receipt()
    {
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("receipt",$data,true);
        $data['active'] = "Home";
        $this->load->view("main_template",$data);
    }

    public function sendEmail($data)
    {
        
        $this->load->library('email');

        $from = 'vaishnavirabade0110@gmail.com';
        $to = $data['email'];
        $subject = 'Quote Request Confirmation';
        $message = "
            <h3>Quote Request Received</h3>
            <p>Dear {$data['name']},</p>
            <p>Thank you for submitting a quote request. We have received your details:</p>
            <ul>
                <li>Name: {$data['name']}</li>
                <li>Email: {$data['email']}</li>
            </ul>
            <p>We will contact you soon!</p>
            <p>Best regards,<br>Your Company</p>
        ";

        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => 'vaishnavirabade0110@gmail.com',
            'smtp_pass' => 'rxmy ivqm elqx bvmd', // App Password
            'smtp_crypto' => 'tls',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => true,
            'newline' => "\r\n",
            'smtp_timeout' => 30
        ];

        $this->email->initialize($config);
        $this->email->from($from, 'Your Company');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            log_message('info', 'Email sent to ' . $to);
        } else {
            log_message('error', 'Failed to send email: ' . $this->email->print_debugger());
        }
    }


public function distance()
{
    // Set JSON header for AJAX
    $this->output->set_content_type('application/json');

    // Load input values
    $service = $this->input->post('serviceSelect');
    $from = trim($this->input->post('locationFrom'));
    $to = trim($this->input->post('locationTo'));

    // Response array
    $response = ['status' => 'error', 'message' => '', 'distance' => '', 'duration' => ''];

    // Validate service selection
    if (empty($service)) {
        $response['message'] = 'Please select a service.';
        echo json_encode($response);
        return;
    }

    // Packers only - no distance needed
    if ($service == "1") {
        $response['status'] = 'success';
        $response['message'] = 'Quote for Packers requested. No distance calculation needed.';
        echo json_encode($response);
        return;
    }

    // Validate location fields
    if (empty($from)) {
        $response['message'] = "Please enter the 'Location From'.";
        echo json_encode($response);
        return;
    }
    if (($service == "2" || $service == "3") && empty($to)) {
        $response['message'] = "Please enter the 'Location To'.";
        echo json_encode($response);
        return;
    }

    // Geoapify API key
    $apiKey = '7b08f5277e7e46b4a641c4faa76db1d1'; // Replace with your Geoapify API key

    // Function to geocode using Geoapify
    function geocodeWithGeoapify($location, $apiKey, $maxRetries = 2) {
        $locationEncoded = urlencode($location);
        $url = "https://api.geoapify.com/v1/geocode/search?text={$locationEncoded}&format=json&limit=1&apiKey={$apiKey}";

        for ($attempt = 1; $attempt <= $maxRetries; $attempt++) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            if ($response === false) {
                $error = curl_error($ch);
                curl_close($ch);
                if ($attempt == $maxRetries) {
                    return ['error' => "Geocoding Error: cURL error - $error"];
                }
                sleep(1);
                continue;
            }
            curl_close($ch);

            $data = json_decode($response, true);
            if (empty($data['results'])) {
                if ($attempt == $maxRetries) {
                    return ['error' => "Geocoding Error: No results for '$location'"];
                }
                sleep(1);
                continue;
            }
            return [
                'lat' => $data['results'][0]['lat'],
                'lon' => $data['results'][0]['lon'],
                'display_name' => $data['results'][0]['formatted']
            ];
        }
        return ['error' => 'Geocoding failed after retries.'];
    }

    // Geocode $from
    $fromCoords = geocodeWithGeoapify($from, $apiKey);
    if (isset($fromCoords['error'])) {
        $response['message'] = "Geocoding Error: Could not find coordinates for '$from'. " . $fromCoords['error'];
        echo json_encode($response);
        return;
    }
    $fromLat = $fromCoords['lat'];
    $fromLon = $fromCoords['lon'];
    $fromDisplay = $fromCoords['display_name'];

    // Geocode $to
    $toCoords = geocodeWithGeoapify($to, $apiKey);
    if (isset($toCoords['error'])) {
        $response['message'] = "Geocoding Error: Could not find coordinates for '$to'. " . $toCoords['error'];
        echo json_encode($response);
        return;
    }
    $toLat = $toCoords['lat'];
    $toLon = $toCoords['lon'];
    $toDisplay = $toCoords['display_name'];

    // Calculate distance using Geoapify Routing API
    $routingUrl = "https://api.geoapify.com/v1/routing?waypoints={$fromLat},{$fromLon}|{$toLat},{$toLon}&mode=drive&apiKey={$apiKey}";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $routingUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $routingResponse = curl_exec($ch);
    if ($routingResponse === false) {
        $response['message'] = "Routing Error: " . curl_error($ch);
        curl_close($ch);
        echo json_encode($response);
        return;
    }
    curl_close($ch);

    $routingData = json_decode($routingResponse, true);
    if (empty($routingData['features']) || !isset($routingData['features'][0]['properties'])) {
        $response['message'] = "Routing Error: Failed to get route.";
        echo json_encode($response);
        return;
    }

    // Extract distance (in meters) and duration (in seconds)
    $distanceMeters = (float)$routingData['features'][0]['properties']['distance'];
    $durationSeconds = (int)$routingData['features'][0]['properties']['time'];

    // Convert to human-readable formats
    $distanceKm = round($distanceMeters / 1000, 1); // Meters to kilometers
    $durationHours = floor($durationSeconds / 3600); // Hours
    $durationMinutes = round(($durationSeconds % 3600) / 60); // Minutes
    $durationText = ($durationHours > 0 ? "$durationHours hours " : "") . ($durationMinutes > 0 ? "$durationMinutes mins" : "");

    // Prepare success response
    $response['status'] = 'success';
    $response['message'] = 'Distance calculated successfully.';
    $response['distance'] = "$distanceKm km";
    $response['duration'] = $durationText;
    $response['from'] = $fromDisplay;
    $response['to'] = $toDisplay;
    $response['service'] = ($service == 2 ? "Movers" : "Both Packers & Movers");

    echo json_encode($response);
}




    
}
 ?>
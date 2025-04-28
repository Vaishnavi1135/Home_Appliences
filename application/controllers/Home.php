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

    public function sendEmail()
    {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $from = 'vaishnavirabade0110@gmail.com'; // Corrected email address
    $to = $this->input->post('to');
    $subject = "Email sent";
    $message = "This is a test email sent using CodeIgniter Email Library.";

    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'smtp.gmail.com';
    $config['smtp_port'] = 587;
    $config['smtp_user'] = 'vaishnavirabade0110@gmail.com'; // Corrected email address
    $config['smtp_pass'] = 'rxmy ivqm elqx bvmd'; // Use your App Password here
    $config['smtp_crypto'] = 'tls';
    $config['mailtype'] = 'html'; // Ensure correct type
    $config['charset'] = 'utf-8';
    $config['wordwrap'] = true;
    $config['newline'] = "\r\n";
    $config['smtp_timeout'] = 60;

    $this->email->initialize($config);
    $this->email->from($from, 'Vaishnavi'); // Optional: Add a name
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($message);

    if ($this->email->send()) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
        echo $this->email->print_debugger(); // For debugging during development
    }
}
// public function distance()
// {
//     // Load input values
//     $service = $this->input->post('serviceSelect'); // Hardcoded for Movers (2); replace with $this->input->get('serviceSelect') for dynamic input
//     $from = $this->input->post('locationFrom');//$locationFrom; // Simplified for better Nominatim compatibility
//     $to = $this->input->post('locationTo');// $locationTo;
//     // Validate service selection

   
//     if (empty($service)) {
//         echo "Please select a service.";
//         // return;
//     }

//     // Packers only - no distance needed
//     if ($service == "1") {
//         echo "<h4>Quote for Packers requested. No distance calculation needed.</h4>";
//         // return;
//     }

//     // End input validation
//     if (empty($from)) {
//         echo "Please enter the 'Location From'.";
//         // return;
//     }
//     if (($service == "2" || $service == "3") && empty($to)) {
//         echo "Please enter the 'Location To'.";
//         // return;
//     }

//     // Function to geocode using Nominatim with retry logic
//     function geocodeWithNominatim($location, $maxRetries = 2) {
//         $location = urlencode($location);
//         $url = "https://nominatim.openstreetmap.org/search?q={$location}&format=json&limit=1";
    

//         $userAgent = 'YourAppName/1.0 (your.email@example.com)'; // REPLACE with your app name and email

//         for ($attempt = 1; $attempt <= $maxRetries; $attempt++) {
//             $ch = curl_init();
//             curl_setopt($ch, CURLOPT_URL, $url);
//             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//             curl_setopt($ch, CURLOPT_HTTPHEADER, ["User-Agent: $userAgent"]);
//             $response = curl_exec($ch);
//             if ($response === false) {
//                 echo "Geocoding Error (Attempt $attempt): cURL error - " . curl_error($ch);
//                 curl_close($ch);
//                 if ($attempt == $maxRetries) return false;
//                 sleep(1);
//                 continue;
//             }
//             curl_close($ch);

//             $data = json_decode($response, true);
//             if (empty($data)) {
//                 echo "Geocoding Error (Attempt $attempt): No results for '$location'. Raw response: $response";
//                 if ($attempt == $maxRetries) return false;
//                 sleep(1);
//                 continue;
//             }
//             return ['lat' => $data[0]['lat'], 'lon' => $data[0]['lon']];
//         }
//         return false;
//     }

//     // Geocode $from
//     $fromCoords = geocodeWithNominatim($from);
//     if ($fromCoords === false) {
//         echo "Geocoding Error: Could not find coordinates for '$from' after retries.";
//         // return;
//     }
//     $fromLat = $fromCoords['lat'];
//     $fromLon = $fromCoords['lon'];

//     // Geocode $to
//     $toCoords = geocodeWithNominatim($to);
//     if ($toCoords === false) {
//         echo "Geocoding Error: Could not find coordinates for '$to' after retries.";
//         // return;
//     }
//     $toLat = $toCoords['lat'];
//     $toLon = $toCoords['lon'];

//     // Calculate distance using OSRM
//     $osrmUrl = "http://router.project-osrm.org/route/v1/driving/{$fromLon},{$fromLat};{$toLon},{$toLat}?overview=false";
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $osrmUrl);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     $osrmResponse = curl_exec($ch);
//     if ($osrmResponse === false) {
//         echo "OSRM Error: " . curl_error($ch);
//         curl_close($ch);
//         // return;
//     }
//     curl_close($ch);

//     $osrmData = json_decode($osrmResponse, true);
//     if (empty($osrmData) || $osrmData['code'] !== 'Ok') {
//         echo "OSRM Error: " . ($osrmData['message'] ?? 'Failed to get route.');
//         // return;
//     }

//     // Extract distance (in meters) and duration (in seconds)
//     $distanceMeters = (float)$osrmData['routes'][0]['distance'];
//     $durationSeconds = (int)$osrmData['routes'][0]['duration'];

//     // Convert to human-readable formats
//     $distanceKm = round($distanceMeters / 1000, 1); // Meters to kilometers
//     $durationHours = floor($durationSeconds / 3600); // Hours
//     $durationMinutes = round(($durationSeconds % 3600) / 60); // Minutes
//     $durationText = ($durationHours > 0 ? "$durationHours hours " : "") . ($durationMinutes > 0 ? "$durationMinutes mins" : "");

//     // // Output results
//     // echo "<h4>Service: " . ($service == 2 ? "Movers" : "Both Packers & Movers") . "</h4>";
//     // echo "<p><strong>From:</strong> {$from}</p>";
//     // echo "<p><strong>To:</strong> {$to}</p>";
//     // echo "<p><strong>Distance:</strong> {$distanceKm} km</p>";
//     // echo "<p><strong>Estimated Duration:</strong> {$durationText}</p>";

//     $html ='';
//     // $html = "<h4>Service: {$serviceText}</h4>";
//     $html .= "<p><strong>From:</strong> {$from}</p>";
//     $html .= "<p><strong>To:</strong> {$to}</p>";
//     $html .= "<p><strong>Distance:</strong> {$distanceKm} km</p>";
//     $html .= "<p><strong>Estimated Duration:</strong> {$durationText}</p>";

//     echo $html;
// }

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
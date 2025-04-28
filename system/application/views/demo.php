<!-- start validation -->
<?php
// define variables and set to empty values
$email = $password = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["email"])) {
    $email = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email = "Invalid email format";
    }
  }
  
  if (empty($_POST["password"])) {
    $password = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if password only contains Numbers
    if (!preg_match("/^[0-9][0-9][0-9][0-9]*$/",$password)) {
      $password = "Only numbers allowed";
    }
  }
}

  
    
    


  if ($pass !== $cpass) {   
     die('Password and Confirm password should match!');   
     }
    
  
  

if($email==""){
  $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
}elseif($password==""){
  $this->form_validation->set_rules('password', 'Password', 'required'); 
}else{
  echo $data['error_msg'] = 'Please fill all the mandatory fields.';  
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!-- /end validation -->



        
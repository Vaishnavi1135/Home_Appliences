<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">

  <?php if($this->session->flashdata('status')) {?>
    <div class="alert alert-success alert-dismissible fade show">  
    <?= $this->session->flashdata('status');?>
  </div>
 
  <?php  }?>
  
  
    

    <?php echo form_open("admin/login/save",'');?>
    <?php echo form_hidden('id',0); ?>

    
      <p class="login-box-msg">Register a new membership</p>

      <form action="<?=base_url('admin/login/verify2')?>" method="post">
      <!-- <form action="/myaction.php" name="myForm" onsubmit="return validateForm()" method="post"> -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <!-- <div class="error" style="color:red;">The Name field is required.</div> -->

        <?php echo form_error('name','<div class="error" style="color:red;">','</div>');?>

        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <?php echo form_error('email', '<div class="error" style="color:red;">','</div>');?>

        <div class="input-group mb-3">
          <input type="phone" class="form-control" placeholder="Phone" name="phone">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
       
        <?php echo form_error('phone', '<div class="error" style="color:red;">','</div>');?>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <?php echo form_error('password', '<div class="error" style="color:red;">','</div>');?>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="confirm password" name="confirmpassword">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <?php echo form_error('confirmpassword', '<div class="error" style="color:red;">','</div>');?>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit"  class="btn btn-primary btn-block" name="registerSubmit">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      <a  href="<?php echo base_url('admin/login');?>" class="text-center">I already have a membership</a>
      
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?=base_url()?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>/assets/dist/js/adminlte.min.js"></script>
<script>
  function seterror(id,error){
    element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = error;
}

function validateForm(){
    var returnval = true;
    // clearErrors();

    var name = document.forms['myForm']["fname"].value;
    if(name.length==0){
        seterror("name","Name feild is empty!");
        returnval = false;
    }

    var email = document.forms['myForm']["email"].value;
    if(email.length==0){
        seterror("email","Email feild is empty!");
        returnval = false;
    }

    var phone = document.forms['myForm']["phone"].value;
    if(phone.length!=10){
        seterror("phone","Phone should be of 10 digits!");
        returnval = false;
    }

    var password = document.forms['myForm']["password"].value;
    if(password.length<6){
        seterror("password","Password should be of 6 digits!");
        returnval = false;
    }

    var cpassword = document.forms['myForm']["confirm password"].value;
    if(cpassword != password){
        seterror("password","Password and Confirm Password should match!");
        returnval = false;
    }


    return returnval;
    
}
</script>

</body>

</html>
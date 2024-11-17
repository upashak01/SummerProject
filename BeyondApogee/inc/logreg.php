<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
    <style>
    /* Login/Register button styling */
    .login-register-btn {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin-right: 20px;
      cursor: pointer;
    }
    /* Dialog box styling */
    .dialog-box {
    position: fixed;
    top: 100px;
    right: 50px;
    background-color: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    max-width: 400px; /* Adjust the maximum width */
    width: 80%; /* Adjust the width */
    height: auto; /* Let the height adjust based on content */
}
    .close-box {
      position: absolute;
      top: 0;
      right: 0;
      background-color: #eee;
      padding: 5px;
      border-radius: 50%;
      cursor: pointer;
    }
    .close-box:hover {
      background-color: #ddd;
    }
    .close-btn {
      margin: 0;
      font-size: 1rem; /* Increase the font size of the 'X' button */
    }
    /* .dialog-box h2 {
      margin-top: 0;
    } */
  </style>
</head>
<body>
<div class="top-menu-area">
<ul class="top-menu">
<div class="navbar navbar-expand-lg">
  <button class="login-register-btn btn btn-success" onclick="openDialog()">Login/Register</button>
</div>

<div class="dialog-box bg-light p-4 rounded shadow-lg" id="dialogBox" style="display: none;">
  <div class="close-box" onclick="closeDialog()">
    <span class="close-btn">&times;</span>
  </div>
  <h2 class="text-center mb-4">Login/Register</h2>
  <div id="loginForm">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Login</button>
    <div class="text-center mt-3">
      <a href="#" onclick="switchForm()">Don't have an account? Register</a>
    </div>
  </div>
  <div id="registerForm" style="display: none;">
  <form method="POST" action="server/register.php">
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name" required>
        </div>
        <div class="col-md-6 mb-3">
            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name" required>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <input type="email" id="email_reg" name="email_reg" class="form-control" placeholder="Email" required>
        </div>
        <div class="col-md-6 mb-3">
            <input type="tel" id="phone" name="phone" class="form-control" placeholder="Phone" required>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <input type="password" id="password_reg" name="password_reg" class="form-control" placeholder="Password" required>
        </div>
        <div class="col-md-6 mb-3">
            <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
        </div>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" id="human" class="form-check-input">
        <label for="human" class="form-check-label">I am human</label>
    </div>
    <!-- Modified: Add an ID to the register button -->
    <button type="button" id="registerBtn" class="btn btn-primary btn-block">Register</button>
    <div class="text-center mt-3">
        <a href="#" onclick="switchForm()">Already have an account? Login</a>
    </div>
  </form>
</div>

<script>

  function openDialog() {
    document.getElementById('dialogBox').style.display = 'block';
  }

  function closeDialog() {
    document.getElementById('dialogBox').style.display = 'none';
  }

  function switchForm() {
    var loginForm = document.getElementById('loginForm');
    var registerForm = document.getElementById('registerForm');

    if (loginForm.style.display === 'block') {
      loginForm.style.display = 'none';
      registerForm.style.display = 'block';
    } else {
      loginForm.style.display = 'block';
      registerForm.style.display = 'none';
    }
    // Add an event listener to the register button
    document.getElementById('registerBtn').addEventListener('click', function() {
        // Get form data
        var firstName = document.getElementById('first_name').value;
        var lastName = document.getElementById('last_name').value;
        var email = document.getElementById('email_reg').value;
        var phone = document.getElementById('phone').value;
        var password = document.getElementById('password_reg').value;
        var confirmPassword = document.getElementById('confirm_password').value;

        // Add your registration logic here
        // For example, you can use fetch API to send data to a server-side script (e.g., register.php)
        // You can perform validation checks before sending data
        
        // Example validation checks
        if (password !== confirmPassword) {
            alert('Passwords do not match');
            return;
        }

        // Example: Send data to register.php
        fetch('register.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                firstName: firstName,
                lastName: lastName,
                email: email,
                phone: phone,
                password: password
            })
        })
        .then(response => response.json())
        .then(data => {
            // Handle response from server (e.g., show success message, redirect user, etc.)
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
  }
</script>

</body>
</html>
    
<!-- <li><a href="#" data-toggle="modal" data-target="#accountModal">Login / Register</a>
</li>
</ul>
</div>
<div id="accountModal" class="modal fade" role="dialog">
<div class="modal-dialog">

<div class="modal-content">
<div class="modal-body">
<div class="tabs tabs-bottom tabs-center tabs-simple">
<ul class="nav nav-tabs">
<li class="active">
<a href="#loginTab" data-toggle="tab">
<p class="mb-none pb-none">Login</p>
</a>
</li>
<li>
<a href="#registerTab" data-toggle="tab">
<p class="mb-none pb-none">Register</p>
</a>
</li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="loginTab">
<form action="https://himalayansolution.com/login" method="post" id="form-login">
<input type="hidden" name="_token" value="GocZP1wRpa6KQxrgsg3Vu1oEb8COoCUTG3lZeE6e">
<div class="form-content">
<div class="alert alert-danger alert-account"></div>
<div class="form-group">
<label for="email" class="font-weight-normal">Email Address
<span class="required">*</span>
</label>
<input type="email" name="email" id="email" class="form-control" required autofocus>
</div>
<div class="form-group">
<label for="password" class="font-weight-normal">Password
<span class="required">*</span>
</label>
<input type="password" name="password" id="password" class="form-control" required>
</div>
<div class="form-group">
<div class="checkbox">
<label>
<input type="checkbox" style="zoom: 1.5;margin-left: -14px" onchange="document.getElementById('send111').disabled = !this.checked" />
<div style="margin-top: 3px">Check If You Are A Human</div>
</label>
<label class="lebel-remember">
<input style="zoom: 1.5;margin-left: -14px" type="checkbox" name="remember">
<div style="margin-top: 3px">Remember Me</div>
</label>
</div>
</div>
<button type="button" id="send111" class="btn btn-primary btn-account" data-loading-text="Loading..." disabled>Login
</button>
<a href="https://himalayansolution.com/password/reset" class="ml-sm">Forgot Your
Password?</a>
</div>
</form>
</div>
<div class="tab-pane" id="registerTab">
<form action="https://himalayansolution.com/register" method="post" id="form-register">
<input type="hidden" name="_token" value="GocZP1wRpa6KQxrgsg3Vu1oEb8COoCUTG3lZeE6e">
<div class="form-content">
<div class="alert alert-danger alert-account"></div>
<h4 class="heading-primary text-uppercase mb-lg">PERSONAL INFORMATION</h4>
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for="first_name" class="font-weight-normal">First Name
<span class="required">*</span>
</label>
<input type="text" name="first_name" id="first_name" class="form-control" value required>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="last_name" class="font-weight-normal">Last Name
<span class="required">*</span></label>
<input name="last_name" id="last_name" type="text" class="form-control" required>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-6">
<div class="form-group">
<label for="email" class="font-weight-normal">Email Address
<span class="required">*</span>
</label>
<input type="email" name="email" id="email" class="form-control" required>
</div>
<h4 class="heading-primary text-uppercase mb-lg">LOGIN
INFORMATION</h4>
</div>
<div class="col-xs-6">
<div class="form-group">
<label for="phone" class="font-weight-normal">Phone
<span class="required">*</span>
</label>
<input type="tel" name="phone" id="phone" class="form-control" required>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for="password" class="font-weight-normal">Password <span class="required">*</span></label>
<input type="password" name="password" id="password" class="form-control" required>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="password-confirm" class="font-weight-normal">Confirm
Password
<span class="required">*</span></label>
<input type="password" name="password_confirmation" id="password-confirm" class="form-control" required>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<div data-sitekey="6Le5NdEZAAAAAB3wazDDGqf3lDCWWZ2qzN5-zhl2" class="g-recaptcha"></div>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<div class="form-action clearfix mt-none">
<input type="submit" id="send222" class="btn btn-primary btn-account2" data-loading-text="Loading..." value="Register">
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html> -->

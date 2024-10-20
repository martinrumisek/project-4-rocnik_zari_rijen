<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Flag Icons CSS from https://flagicons.lipis.dev/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.7.0/css/flag-icons.min.css"/>
    <title>Register</title>
    <style>
        .ftco-section {
            padding: 7em 0; }

            .ftco-no-pt {
            padding-top: 0; }

            .ftco-no-pb {
            padding-bottom: 0; }
            .heading-section {
  font-size: 28px;
  color: #fff; }

.img {
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center; }

.login-wrap {
  position: relative;
  color: rgba(255, 255, 255, 0.9); }
  .login-wrap h3 {
    font-weight: 300;
    color: #fff; }
  .login-wrap .social {
    width: 100%; }
    .login-wrap .social a {
      width: 100%;
      display: block;
      border: 1px solid rgba(255, 255, 255, 0.4);
      color: #000;
      background: #fff; }
      .login-wrap .social a:hover {
        background: #000;
        color: #fff;
        border-color: #000; }

.form-group {
  position: relative; }

.field-icon {
  position: absolute;
  top: 50%;
  right: 15px;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  color: rgba(255, 255, 255, 0.9); }

.form-control {
  background: transparent;
  border: none;
  height: 50px;
  color: white !important;
  border: 1px solid transparent;
  background: rgba(255, 255, 255, 0.08);
  border-radius: 40px;
  padding-left: 20px;
  padding-right: 20px;
  -webkit-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s; }
  @media (prefers-reduced-motion: reduce) {
    .form-control {
      -webkit-transition: none;
      -o-transition: none;
      transition: none; } }
  .form-control::-webkit-input-placeholder {
    /* Chrome/Opera/Safari */
    color: rgba(255, 255, 255, 0.8) !important; }
  .form-control::-moz-placeholder {
    /* Firefox 19+ */
    color: rgba(255, 255, 255, 0.8) !important; }
  .form-control:-ms-input-placeholder {
    /* IE 10+ */
    color: rgba(255, 255, 255, 0.8) !important; }
  .form-control:-moz-placeholder {
    /* Firefox 18- */
    color: rgba(255, 255, 255, 0.8) !important; }
  .form-control:hover, .form-control:focus {
    background: transparent;
    outline: none;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-color: rgba(255, 255, 255, 0.4); }
  .form-control:focus {
    border-color: rgba(255, 255, 255, 0.4); }

textarea.form-control {
  height: inherit !important; }

.checkbox-wrap {
  display: block;
  position: relative;
  padding-left: 30px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 16px;
  font-weight: 500;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none; }

/* Hide the browser's default checkbox */
.checkbox-wrap input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0; }

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0; }

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "\f0c8";
  font-family: "FontAwesome";
  position: absolute;
  color: rgba(255, 255, 255, 0.1);
  font-size: 20px;
  margin-top: -4px;
  -webkit-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s; }
  @media (prefers-reduced-motion: reduce) {
    .checkmark:after {
      -webkit-transition: none;
      -o-transition: none;
      transition: none; } }

/* Show the checkmark when checked */
.checkbox-wrap input:checked ~ .checkmark:after {
  display: block;
  content: "\f14a";
  font-family: "FontAwesome";
  color: rgba(0, 0, 0, 0.2); }

/* Style the checkmark/indicator */
.checkbox-primary {
  color: #fbceb5; }
  .checkbox-primary input:checked ~ .checkmark:after {
    color: #fbceb5; }

.btn {
  cursor: pointer;
  border-radius: 40px;
  -webkit-box-shadow: none !important;
  box-shadow: none !important;
  color: black !important;
  font-size: 15px;
  text-transform: uppercase; 
 background-color: rgba(255, 255, 255, 0.65);}
 .btn:hover{
    background-color: rgba(255, 255, 255, .75);
 }
  .btn:hover, .btn:active, .btn:focus {
    outline: none; }
        body{
            height: 100vh;
            width: auto;
            background-image: url(<?= base_url('img/extra/login background image.jpg')?>);
            background-blend-mode: darken;
            background-size: cover;
            background-position: center;
        }
        .cover-image{
            height: 100%;
            background-color: rgba(0,0,0,.7);
        }
    </style>
</head>
<body><!--
    <div class="container">
        <form method="post" action="<?php echo base_url('login');?>">
            <div class="form-group">
                <label for="exampleInputUsername">Username</label>
                <input type="text" class="form-control" id="exampleInputUsername" placeholder="Enter username" name="username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            </div>
            <?php if (isset($message)) { ?>
            <div class="text-danger">
                <?php echo $message;?>
            </div>
            <?php } ?>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>-->
<div class="cover-image">
    <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
                <form method="post" action="<?php echo base_url('login');?>" class="signin-form">
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Username" required name="username">
		      		</div>
	            <div class="form-group py-1">
	              <input id="password-field" type="password" class="form-control" placeholder="Password" required name="password">
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group py-1">
                    <?php if (isset($message)) { ?>
                    <div class="text-danger text-center pb-2">
                        <?php echo $message;?>
                    </div>
                    <?php } ?>
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>
</div>
</body>
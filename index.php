<?php
if($_COOKIE['RememberMe']=='Remembered'){
	header("Location: tickets.php"); /* Redirect browser */
	exit();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
<link href="css/custom.css" rel="stylesheet" type="text/css">
<title>Club opener - login</title>
</head>
<body>
<div id="container">
	<div id="pages">
    <img id="logo" src="img/club-opener-logo-light_bel1.png" alt="Club Opener" />
    
	<?php 
	if($_GET['w']=='loginfailed'){echo '<div class="alert alert-danger" role="alert" id="loginfailed">Login failed!</div><script>$("#loginfailed").fadeTo(2000, 500).slideUp(500, function(){});</script>';} 
	if($_GET['w']=='loggedout'){echo '<div class="alert alert-success" role="alert" id="loggedout">Logged out!</div><script>$("#loggedout").fadeTo(2000, 500).slideUp(500, function(){$(location).attr("href","index.php");});</script>';} 
	?>
    
    <form method="post" action="tickets.php">
    <div class="form-group form-group-login">
        <input id="txt_username" type="text" value="" placeholder="Username" class="form-control" />
        <input id="txt_password" type="password" value="" placeholder="Password" class="form-control" />
        <div id="div_login">
            <input id="btn_login" type="submit" class="btn btn-default" value="Login" />
            <span id="spn_rememberme"><label><input name="chckbx_rememberme" id="chckbx_rememberme" type="checkbox" checked="checked" value="rememberme" />Remember me!</label></span>
        </div>
    </div>
    </form>
    
    <br />
    <a href="#" data-toggle="modal" data-target="#FBlogin" onClick="window.openn('https://www.facebook.com/', 'FB_Login', 'width=480,height=320,left=40,top=40,location=no,menubar=no,resizable=no,scrollbars=no,status=no,titlebar=no,toolbar=no');"><img id="fb-login" src="img/fb-login.png" alt="Login with Facebook" /></form></a>

    <br />
    <a href="#" data-toggle="modal" data-target="#LostPassword">Lost your username or password?</a><br /><br />
    <a href="#" data-toggle="modal" data-target="#NewAcount">Create new acount?</a>
    </div>
    <br />
   

<!-- Lost password or username -->
<div class="modal fade" id="LostPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Lost password or username</h4>
      </div>
      <div class="modal-body">
        <div class="form-group form-group-modal">
        <input type="email" placeholder="Enter your email" id="lost_email" style="" /><br />
        <button type="button" id="send_lost" class="btn btn-warning">Send request</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Create new account -->
<div class="modal fade" id="NewAcount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create new acount</h4>
      </div>
      <div class="modal-body">
        <div class="form-group form-group-modal">
        <input type="text" placeholder="Username" id="new_username" style="width:100%;" /><br />
        <input type="text" placeholder="Name" id="new_name" style="width:100%;" /><br />
        <input type="text" placeholder="Surname" id="new_surname" style="width:100%;" /><br />
        <input type="email" placeholder="Your email" id="new_email" style="width:100%;" /><br />
        <input type="password" placeholder="Enter password" id="new_password" style="width:100%;" /><br />
        <input type="password" placeholder="Re-type password" id="new_password" style="width:100%;" /><br />
        <label><input name="chckbx_policy" id="chckbx_policy" type="checkbox" checked="checked" value="policy" /> Terms & Conditions!</label><br />
        <button type="button" id="send_new_acount" class="btn btn-warning">Create new acount</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- FB login -->
<div class="modal fade" id="FBlogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body"  style="text-align:center">
       <img src="img/fb-login.jpg" data-dismiss="modal" alt="Login with Facebook" />
      </div>
    </div>
  </div>
</div>
    
    
        
</div>
<script>
window_dimensions();

$(document).ready(function() {
	$(window).on("orientationchange",function(){
		window_dimensions();
	});
});
</script>
</body>
</html>
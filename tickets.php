<?php
$login = $_POST['chckbx_rememberme'];
if($login=='rememberme'){
	setcookie("RememberMe", "Remembered", time() + (86400 * 30 * 7), "/"); // 86400 = 1 day
}
if($_COOKIE['RememberMe']=='Remembered'){
	
}else{
	header("Location: index.php?w=loginfailed"); /* Redirect browser */
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
<title>Club Opener</title>
<style>
*,
*:before,
*:after {
  box-sizing: inherit;
}
html, body
{
	width: 100%;
	height: 100%;
}
body {
  position: relative;
  min-height: 100%;	
}
#wrapper {
	background-color: #e1e1e1;
	height:100%;
}
#header {
	position: fixed;
	text-align: center;
	top: 0;
	right: 0;
	left: 0;
}
#header > div {
	background-color: #609;
	color: white;
	max-width:1024px;
	margin: 0 auto;
}
#section {
	padding:0;
	margin:74px 0 0 0;
}
.stylish-input-group .input-group-addon{
    /*background: white !important; */
	background-color:rgba(200,55,255,0.3) !important;
	color:white;
	border-color:#999;
}
.stylish-input-group {
    padding:5px;
    padding-top:0px;
}
.input-group-addon button{
	border:none;
}
.stylish-input-group .form-control{
	border-right:0; 
	box-shadow:0 0 0; 
	border-color:#999;
	background-color:rgba(200,55,255,0.3);
	color:white;
}
.stylish-input-group button{
    /*border:0;*/
	border-color:#999;
    background:transparent;
}
#footer {
	background-color: rgba(255,255,1,0);
	position: fixed;
	text-align: center;
	bottom: 0;
	right: 0;
	left: 0;
}
#nav {
	background-color: #fff;
	max-width:1024px;
	margin: 0 auto;
	cursor:pointer;
}
#nav ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
}
#nav ul li {
	display:inline;
}
.btn_nav {
	padding: 10px 25px;
	font-size: 20px;
}
.btn_nav span {
	font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;
	font-size: 12px;
}
.btn_nav:hover, .btn_nav:active {
	color:#90F;
}
.search-list {
	border-bottom: 1px solid #999999;
	background-color:#e1e1e1;
	width:100%;
	text-align:left;
	padding:10px 20px;
}
.event_data {
	padding:8px;
	text-align:left;
	border-bottom:solid 1px #999;
	background-color: #e1e1e1;
}
/*.event_data:nth-child(even) {
    background-color: #e9e9e9;
} */
.event_link, .event_link a:link, .buy_ticket, .buy_ticket a:link {
	color:#000;
	text-decoration:none;
}
.event_logo {
	width:65px;
	height:65px;
	float:left;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	border-radius: 50%;
}
.event_info {
	float:left;
	margin-left:10px;
}
.event_date {
}
.event_name {
	font-weight:bold;
	font-size:1.2em;
}
.event_organizer {
}
.event_distance {
	margin-left: 25px;
	font-style:italic;
}
.event_intro {
	float:left;
	margin-left:50px;
	max-width:500px;
	display:block;
	font-size:0.9em;
}
@media screen and (max-width: 900px) {
	.event_intro {
		display:none;
	}
}
.event_price {
	float:right;
}
.event_price_number {
	display:inline-block;
	font-size:1.5em;
	font-weight:bold;
}
.event_buy {
	display:inline-block;
	background-color:#F90;
	padding:10px 20px;
	margin: 15px 0 10px 10px;
	font-weight:bold;
	color:#FFF;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
}
#specific_event {
	display:none;
	float:left;
}
</style>
</head>
<body>
<div id="wrapper">
    <header id="header">
    	<div>
            <p style="padding-top:5px;">Club Opener</p>
            
                <div class="input-group stylish-input-group">
                    <input type="text" class="form-control" id="src_searching" placeholder="Search..."  onKeyUp="searching();" />
                    <span class="input-group-addon">
                        <button type="submit" onClick="searching();" />
                            <span class="glyphicon glyphicon-search"></span><script>searching();</script>
                        </button>  
                    </span>
                </div>
    	</div>
    </header>
    <div id="section">
		<div id="search_events">No results found!</div>
    	<div id="specific_event">Loading ...</div>
    </div>
    <footer id="footer">
        <nav id="nav">
        	<ul>
	        	<li><span class="glyphicon glyphicon-tags btn_nav"><br /><span>Tickets</span></span></li>
	        	<li><span class="glyphicon glyphicon-calendar btn_nav"><br /><span>Events</span></span></li>
	        	<li><span class="glyphicon glyphicon-shopping-cart btn_nav"><br /><span>Market</span></span></li>
	        	<li><span id="btn_logout" class="glyphicon glyphicon-user btn_nav"><br /><span>Logout</span></span></li>
            </ul>
        </nav>
    </footer>
</div>
<script>
$(document).ready(function() {
	$(window).on("orientationchange",function(){
		
	});
});
</script>
</body>
</html>
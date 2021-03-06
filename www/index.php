<?PHP
require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($fgmembersite->Login())
   {
        $fgmembersite->RedirectToURL("login-home.php");
   }
}

?>
<!DOCTYPE html>
<html>
<head>
<title>
Welcome to playlister
</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/vendor/modernizr-2.7.1.min.js"></script>
    <style type="text/css">

	<link rel="STYLESHEET" type="text/css" href="css/fg_membersite.css" />
    <script type='text/javascript' src='js/gen_validatorv31.js'></script>

body {
font-family: 'Open Sans', sans-serif;
}
</style>
</head>
<body class="loading">
<script src="http://connect.facebook.net/en_US/all.js"></script>
<div id="fb-root"></div>

<script type="text/javascript" src="js/profile.js"></script>
<script type="text/javascript" src="js/fb_auth.js"></script>


        <main>
		<section id="slide-1" class="homeSlide">
	        	<div class="bcg" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#slide-1">
		        	<div class="hsContainer">
			    		<div class="hsContent" data-center="opacity: 1" data-106-top="opacity: 0" data-anchor-target="#slide-1 h2">
				    		<h2>Playlister<br /></h2>
				    		<p>A simple way to manage your YouTube music.</p></br>
							<fb:login-button show-faces="false" width="1000" max-rows="1" data-auto-logout-link="true"></fb:login-button>
						</div>
		        	</div>
	        	</div>
		</section>


<section id="slide-2" class="homeSlide">
<div class="bcg" data-0="background-color:rgb(1,27,59);" data--25p-bottom="background-color:rgb(1,27,59);" data--90p-bottom="background-color:(0,0,0);" data-anchor-target="#slide-2">
<!-- <div class="bcg" data-0="background-color:rgb(1,27,59);" data-top="background-color:(0,0,0);" data-anchor-target="#slide-2"> -->
<div class="hsContainer">
<div class="hsContent">
<h2 data-center="opacity: 1" data--200-bottom="opacity: 0" data-206-top="opacity: 1" data-106-top="opacity: 0" data-anchor-target="#slide-2 h2"><!-- asdf --></h2>
<p data-center="opacity: 1" data--200-bottom="opacity: 0" data-206-top="opacity: 1" data-106-top="opacity: 0" data-anchor-target="#slide-2 h2"><!-- Text is fading in at 206 pixels from the bottom and fading out 106 pixels from the top. <br />Next slide fades in from black. --></p>
</div>
</div>
</div>
</section>

<section id="slide-3" data-content-offset="50p" class="homeSlide homeSlideTall2">
<div class="bcg"
data-center="background-position: 0px 50%;"
data-bottom-top="background-position: 0px 40%;"
data-top-bottom="background-position: -40px 50%;"
data-anchor-target="#slide-3"
>
<div class="hsContainer">
<div class="bcg bcg2" data-bottom-top="opacity: 1" data-top="opacity: 1;" data--150-top="opacity: 0" data-anchor-target="#slide-3">&nbsp;</div>
<div class="hsContent">
<div class="plaxEl" data-bottom-top="opacity: 0" data-top="opacity: 0" data--50p-top="opacity: 1; position: fixed; top: 206px; width: 100%; left: 0;" data--25p-bottom="opacity: 1;" data--50p-bottom="opacity: 0;" data-anchor-target="#slide-3">
<h2><!-- Fixed element fading in and out --></h2>
</div>
</div>
</div>

</div>
</section>

<section id="slide-4" data-content-offset="90p" class="homeSlide homeSlideTall">
<div class="bcg" data-bottom-top="background-position: 50% 100px" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#slide-4">
<div class="curtainContainer">

<div class="curtain" data-bottom-top="opacity: 0; height: 1%;" data-106-top="height: 1%; opacity: 0; top: -10%;" data-center="height: 100%; opacity: 0.5; top: 0%;" data-top-bottom="height: 100%; opacity: 0.5; top: 0%;" data-anchor-target="#slide-4"></div>
<div class="copy" data-bottom-top="opacity: 0" data--100-bottom="opacity: 0" data--280-bottom="opacity: 1;" data-280-top="opacity: 1;" data-106-top="opacity: 0;" data-anchor-target="#slide-4 .copy">
<h2><!-- Curtain effect while you scroll --></h2>
</div>

</div>
</div>
</section>


<section id="slide-5" data-content-offset="66p" class="homeSlide homeSlideTall2">
<div class="bcg">
&nbsp;
</div>
<div class="bcg bcg2" data-bottom-top="opacity: 0;" data--33p-top="opacity: 0;" data--66p-top="opacity: 1;" data-anchor-target="#slide-5">
<div class="hsContainer">
<div class="hsContent" data-bottom-top="opacity: 0;" data-center="opacity: 1" data-anchor-target="#slide-5">
<h2><!-- Fixed element fading in and out --></h2>
</div>
</div>
</div>
<div class="bcg bcg3" data-300-bottom="opacity: 0;" data-100-bottom="opacity: 1;" data-anchor-target="#slide-5">
<div class="hsContainer">
<div class="hsContent" data-100-bottom="opacity: 0;" data-bottom="opacity: 1;" data-anchor-target="#slide-5">
<h2><!-- The End --></h2>
</div>
</div>
</div>
</section>

</main>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/imagesloaded.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/skrollr.js"></script>
        <!--[if lt IE 9]>
<script type="text/javascript" src="js/skrollr.ie.min.js"></script>
<![endif]-->
        <script src="js/_main.js"></script>

<div id="playlist" class="left">

</div>

<div id="songs" class="right">

</div>

<div id="rightCol">

</div>

<script type="text/javascript" src="js/helpers.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/playlisting.js"></script>
</body>
</html>
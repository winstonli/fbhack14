<!DOCTYPE html>
<html>
<head>
	<title>
		Youtube video
	</title>
	<link rel="stylesheet" href="assets/demoStyles.css"/>

</head>
<body>



<div id="player"></div>


<div class="content">
	<div id="musicplayer">
		<div id="playBtn" class="button playBtn"></div>
		<div id="labels">
			<label id="song">Song: <strong>Pirates Love Daisies</strong></label><br />
			<label id="artist">Artist: <strong>Washingtron</strong></label><br /><br />
			<label id="loading">Waiting...</label>
		</div>
		<div id="track">
			<div id="progress"></div>
			<div id="thumb"></div>
		</div>
	</div>

</div>


<script src="http://www.youtube.com/player_api"></script>
<script src="js/youtube.js"> </script>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="js/youtube-scroll.js"></script>


</body>
</html>
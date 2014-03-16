<!DOCTYPE html>
<html>
<head>
	<title>
		Youtube video
	</title>
</head>
<body>


<br>
<br>
<br>
<br>
<br>
<br>

<div id="player"></div>

<script src="http://www.youtube.com/player_api"></script>

<script>

// create youtube player
var player;
function onYouTubePlayerAPIReady() {
    player = new YT.Player('player', {
      height: '130',
      width: '640',
      videoId: '0Bmhjf0rKe8',
      events: {
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange
      }
    });
}

// autoplay video
function onPlayerReady(event) {
    player.playVideo();
}

// when video ends
function onPlayerStateChange(event) {
    if(event.data === 0) {
        console.log('done');
		player.loadVideoById(modelPlaylist.getNextVideo());
        event.target.loadVideoById(modelPlaylist.getNextVideo());
    }
}


function onPlay() {
	player.playVideo();
}

function onPause() {
	player.pauseVideo();
}

// Percentage goes from 0 to 100, where 100 is the end of the video
function onSeek(percentage) {
	jumpTime = player.getDuration() / 100 * percentage;
	player.seekTo(Math.floor(jumpTime));
}

var modelPlaylist = {
	nextVideo : "JBJ1VPBrCl0",

	getNextVideo : function() {
		return this.nextVideo;
	}

}

</script>


<br>
<button onclick="onPlay()"> Play </button>
<button onclick="onPause()"> Pause </button>


 <br> <br> <br> <br> <br> <br>





</body>
</html>
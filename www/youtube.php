<!DOCTYPE html>
<html>
<head>
	<title>
		Youtube video
	</title>
</head>
<body>


<div id="player"></div>

<script src="http://www.youtube.com/player_api"></script>

<script>

// create youtube player
var player;
function onYouTubePlayerAPIReady() {
    player = new YT.Player('player', {
      height: '530',
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

function goNext() {
	player.loadVideoById('JBJ1VPBrCl0', 0, 'default');
}

var modelPlaylist = {
	nextVideo : "JBJ1VPBrCl0",

	getNextVideo : function() {
		return this.nextVideo;
	}

}

</script>


</body>
</html>
// create youtube player
var player;
function onYouTubePlayerAPIReady() {
    player = new YT.Player('player', {
      height: '0',
      width: '0',
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

function onChangeVideo(videoID) {
	player.loadVideoById(videoID);
}

function testingYoutubeJS() {
  console.log("DA");
}

var modelPlaylist = {
	nextVideo : "JBJ1VPBrCl0",

	getNextVideo : function() {
		return this.nextVideo;
	}
}



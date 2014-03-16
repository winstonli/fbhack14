        var instance;
        var positionInterval;
        var seeking = false;

        var isPlaying = false;


        $("#track").css("display", "block");
        $("#loading").css("display", "none");
        $("#progress").css("display", "none");
        $("#position").css("display", "block");

        // $("#playBtn").removeClass("playBtn").addClass("pauseBtn");

        $("#playBtn").click(function(event){
            if (isPlaying) {
                $("#playBtn").removeClass("pauseBtn").addClass("playBtn");
            	onPause();
            	isPlaying = false;
            } else {
                $("#playBtn").removeClass("playBtn").addClass("pauseBtn");
            	onPlay();
            	isPlaying = true;
            }
        });


        trackTime();

        // http://forums.mozillazine.org/viewtopic.php?f=25&t=2329667
        $("#thumb").mousedown(function(event) {
            //console.log("mousedown");
            var div = $();
            seeking = true;
            $("#musicplayer").mousemove(function(event){
                // event.offsetX is not supported by FF, hence the following from http://bugs.jquery.com/ticket/8523
                if(typeof event.offsetX === "undefined") { // || typeof event.offsetY === "undefined") {
                    var targetOffset = $(event.target).offset();
                    event.offsetX = event.pageX - targetOffset.left;
                    //event.offsetY = event.pageY - targetOffset.top;
                }
                $("#thumb").css("left", Math.max(0, Math.min($("#track").width()-$("#thumb").width(), event.offsetX-$("#track").position().left)));
            })
            $("#musicplayer").mouseup(function(event){
                //console.log("mouseup");
                seeking = false;
                $(this).unbind("mouseup mousemove");
                var pos = $("#thumb").position().left/$("#track").width();
                onSeek(pos*100);
            });
        });

        function trackTime() {
            positionInterval = setInterval(function(event) {
                if(seeking) { return; }
                $("#thumb").css("left", Math.floor(player.getCurrentTime()) / player.getDuration() * $("#track").width());
            }, 200);
        }
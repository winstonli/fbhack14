<html>
<head>
<script src="../js/jquery.js"></script>
<style>

#p1 {
	display: inline;
}
input.key, .value {
	font-family: "Lucida Console", Monaco, monospace;
}
input#url{
	width: 75em;
}
input.key, .value {
	text-align:center;
}
input.key {
	width: 20em;
}
input.value {
	width: 50em;
}
#header {
	
}
.header {
    position: fixed;
	text-align: center;
	width:100%;
	height:210px;
	top: 0px;
	left: 0px;
	line-height:0px;
}
#transparent {
	
    background-color: #78AB46;
}
#response {
	margin-top: 215px;
}
.shadow {
    box-shadow: 0px 0px 10px #000;
	 -khtml-opacity:.50; 
	 -moz-opacity:.50; 
	 -ms-filter:”alpha(opacity=50)”;
	  filter:alpha(opacity=50);
	  filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0.5);
	  opacity:.50;
}
</style>
</head>
<body>
<div id="transparent" class="header">
</div>
<div id="form" class="header">
<form id="f" action="http://162.13.180.132/api/">
<div id="u">
<input id="url" type="text" placeholder="http://162.13.180.132/api/"/>
</div>
<div id="p1" class="parameter">
<input id="k1" class="key" placeholder="Key" type="text"/> <input id="v1" class="value" placeholder="Value" type="text"/>
</div>
<div id="p2" class="parameter">
<input id="k2" class="key" placeholder="Key" type="text"/> <input id="v2" class="value" placeholder="Value" type="text"/>
</div>
<div id="p3" class="parameter">
<input id="k3" class="key" placeholder="Key" type="text"/> <input id="v3" class="value" placeholder="Value" type="text"/>
</div>
<div id="p4" class="parameter">
<input id="k4" class="key" placeholder="Key" type="text"/> <input id="v4" class="value" placeholder="Value" type="text"/>
</div>
<div id="p5" class="parameter">
<input id="k5" class="key" placeholder="Key" type="text"/> <input id="v5" class="value" placeholder="Value" type="text"/>
</div>
<div id="p6" class="parameter">
<input id="k6" class="key" placeholder="Key" type="text"/> <input id="v6" class="value" placeholder="Value" type="text"/>
</div>
<div id="p7" class="parameter">
<input id="k7" class="key" placeholder="Key" type="text"/> <input id="v7" class="value" placeholder="Value" type="text"/>
</div>
<div id="p8" class="parameter">
<input id="k8" class="key" placeholder="Key" type="text"/> <input id="v8" class="value" placeholder="Value" type="text"/>
</div>
</form>
</div>
<pre>
<div id="response"/>
</pre>
</body>
</html>
<script>
window.onload = init;

function init() {
	$(document).scroll(function() {
    $('#transparent').toggleClass('shadow', $(this).scrollTop() > 0);
});
	$('#form input').keydown(function(e) {
		if (e.keyCode == 13) {
				$.post("/api/" + $("#url").val(), 
						JSON.parse("{\"" + $("#k1").val() + "\": \"" + $("#v1").val() + "\", \"" +
						$("#k2").val() + "\": \"" + $("#v2").val() + "\", \"" +
						$("#k3").val() + "\": \"" + $("#v3").val() + "\", \"" +
						$("#k4").val() + "\": \"" + $("#v4").val() + "\", \"" +
						$("#k5").val() + "\": \"" + $("#v5").val() + "\", \"" +
						$("#k6").val() + "\": \"" + $("#v6").val() + "\", \"" +
						$("#k7").val() + "\": \"" + $("#v7").val() + "\", \"" +
						$("#k8").val() + "\": \"" + $("#v8").val() + "\"}"),
						function (data) {
							console.log("Data: " + data);
							$('#response').html(JSON.stringify(data, undefined, 2));
						}
				);
		}
	});

}

</script>

<?php 


if (count($_POST) == 0) {
	echo '
		{
			"error" : "no arguments passed"
		}

	';

	exit (0);

}


echo  '
	{
		"success" : 1,
		"error" : null,
		"songs" : [
			{
				"song_id" : "1234321",
				"song_name" : "Shakira - Tortura",
				"youtube_url" : "https://www.youtube.com/watch?v=Dsp_8Lm1eSk"
			}
		]	
	}

';


?>
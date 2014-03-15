<?php 


if (count($_POST) == 0) {
	echo '
		{
			"error" : "no arguments passed"
		}

	';

	exit (0);

}


echo '
	{
		"success" : 1
	}

';



?>
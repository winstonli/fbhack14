
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<head>
<title>Ui kits Website Template | Home :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="web/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="web/css/nav.css" rel="stylesheet" type="text/css" media="all"/>

<link href="css/profile.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic+SC' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="assets/demoStyles.css">
<script type="text/javascript" src="web/js/jquery.js"></script>
<script type="text/javascript" src="web/js/login.js"></script>
<script type="text/javascript" src="web/js/Chart.js"></script>
 <script type="text/javascript" src="web/js/jquery.easing.js"></script>
 <script type="text/javascript" src="web/js/jquery.ulslide.js"></script>
 <script type="text/javascript" src="js/youtube.js"></script>
 <script type="text/javascript" src="js/profile.js"></script>
 <script type="text/javascript" src="js/playlisting.js"></script>
 <script src="http://connect.facebook.net/en_US/all.js"></script>
<script type="text/javascript" src="js/fb_auth.js"></script>

</head>
<body>
	    <div class="wrap">
	      <div class="header">
	      	  <div class="header_top">
					  <div class="menu">

						  <a class="toggleMenu" href="#"><img src="web/images/nav.png" alt="" /></a>
							<ul class="nav">
								<li><a href="#"><i><img src="web/images/settings.png" alt="" /></i>Settings</a></li>
								<li class="active"><a href="#"><i><img src="web/images/user.png" alt="" /></i>Account</a></li>

								<li>
					                 	<div id="player"></div>

					                 	<div class="content">
															<div id="musicplayer">
																<div id="playBtn" class="button playBtn"></div>
																<div id="labels">
																	<label id="song">Song: <strong>Pirates Love Daisies</strong></label><br />
																	<label id="loading">Waiting...</label>
																</div>
																<div id="track">
																	<div id="progress"></div>
																	<div id="thumb"></div>
																</div>
															</div>

					                 	</div>

								</li>


								<li>
									<fb:login-button show-faces="false" width="1000" max-rows="1" data-auto-logout-link="true"></fb:login-button>

								</li>

							<div class="clear"></div>
						    </ul>
							<script type="text/javascript" src="web/js/responsive-nav.js"></script>
				        </div>
					  <div class="profile_details">
				    		   <div id="loginContainer">
				                  <a id="loginButton" class=""><span id="fullname">Me</span></a>
				                    <div id="loginBox">
				                      <form id="loginForm">
				                        <fieldset id="body">
				                            <div class="user-info">
							        			<h4>Hello,<a href="#"> Username</a></h4>
							        			<ul>
							        				<li class="profile active"><a href="#">Profile </a></li>
							        				<li class="logout"><a href="#"> Logout</a></li>
							        				<div class="clear"></div>
							        			</ul>
							        		</div>
				                        </fieldset>
				                    </form>
				                </div>
				            </div>
				             <div class="profile_img">
				             	<a href="#"><img id="dp" src="web/images/profile_img40x40.jpg" alt="" />	</a>
				             </div>
				             <div class="clear"></div>
					    </div>
		 		      <div class="clear"></div>
				   </div>
			</div>
	</div>
	  <div class="main">
	    <div class="wrap">
	       <div class="column_left">
	    		 <div class="menu_box">
	    		 	 <h3>My Playlists</h3>
	    		 	   <div class="menu_box_list">
				      		<ul id="playlists_self">
                                                                        <!-- My Playlists -->

						  		  <li><a href="#" class="account_settings"><span>Playlist 1ish</span></a></li>
                    <li><a href="#" class="account_settings"><span>Playlist 2</span></a></li>
                    <li><a href="#" class="account_settings"><span>Playlist 3</span></a></li>
                    <li><a href="#" class="account_settings"><span>Playlist 4</span></a></li>

				    		</ul>
				      </div>
	    		 </div>
		          </div> <!-- end column left -->





	  		</div>

            <div class="column_middle">
              <div class="column_middle_grid1">
				<div class="menu_box1">
	    		 	 <h3 id="active_playlist_self">Playlist 1 Songs</h3>
	    		 	   <div class="menu_box_list">
				      		<ul id="songs_self">
                                                                        <!-- My Playlist 1 Songs -->

						  						<li><a href="#" class="account_settings"><span>



						  						</span></a></li>
                          <li><a href="#" class="account_settings"><span>Song 2</span></a></li>
                          <li><a href="#" class="account_settings"><span>Song 3</span></a></li>
                          <li><a href="#" class="account_settings"><span>Song 4</span></a></li>
                          <li><a href="#" class="account_settings"><span>Song 5</span></a></li>
                          <li><a href="#" class="account_settings"><span>Song 6</span></a></li>
                          <li><a href="#" class="account_settings"><span>Song 7</span></a></li>
                          <li><a href="#" class="account_settings"><span>Song 8</span></a></li>

				    		</ul>
				      </div>
	    		 </div>
		       </div>
    	    </div>               <!-- end of column middle -->

 	     	<div class="clear"></div>

				<script src="http://www.youtube.com/player_api"></script>
 	     	<script type="text/javascript" src="js/youtube.js"></script>

				<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
				<script type="text/javascript" src="js/youtube-scroll.js"></script>

   </div>
</body>
</html>

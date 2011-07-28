<?php

/* CONFIG */

/**
 * apiURL Location where brightcove allows us to ping to request files from their server	
 *
 * @var string
 **/

	$apiURL = "http://api.brightcove.com/services/library?command=";

/**
 * tocken BrightCove provides a token to each user which can be extracted from your preferences at my.brightcove.com
 *
 * @var string
 **/

	$token = "xxXXXxxxxXXXxXXXxxXXXxxxxXXXXxxxxxx..";

/**
 * $playlist_id This is an id we using as testing reference, should not be used in production.
 *
 * @var string
 **/

	$playlist_id = "XXXXXXXXXXXXX";

/**
 * $commandList an array of options that can be used within the application. use this information to pass the right parameter to your function calls
 *
 * @var array
 **/

	$commandList = array (0 => "find_all_videos", 1 => "find_video_by_id", 2 => "find_playlist_by_id");



/**
 * Request the files we need to run the application
 */
require_once "strap.php";

?>
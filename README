About
=====

Display BrightCove's content easily with PHP


Requirements
============

Tested with PHP version 5.2 

Usage
=====================

You can view the sample folder and replicate the usage.

Here is a quick scenario.

	// request the config file
	require_once "../includes/config.php";

	// define the items that will be rendered
	$itemsToDisplay = array (	"name", 
								"thumbnailURL", 
								"shortDescription");
	
	request the items with a wrapper, you can leave them blank if desired
	find_all_videos($itemsToDisplay, "<div id='bc_display_items_in_list'>", "</div>", true);
	
	// optional you can view the JSON returned object
	//display_debug();

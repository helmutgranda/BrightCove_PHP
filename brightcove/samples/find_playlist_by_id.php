<?php

// add basic functionality

require_once "../includes/config.php";

?>

<html>

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>Testing adding all elements from brightcove</title>
	<link rel="stylesheet" href="../css/basic.css" type="text/css" media="screen" title="no title" charset="utf-8">

</head>
<body id="template_do_not_edit" >
	
	<h1>All Items from list 1028747319001</h1>

	<?php
	
	$itemsToDisplay = array (	"name", 
								"thumbnailURL", 
								"shortDescription");
								
	find_playlist_by_id( $itemsToDisplay , "1028747319001", "<div id='bc_display_items_in_list'>", "<div>", true);

	//display_debug();
	
	?>
	
</body>
<?php
	require_once "../includes/config.php";s
?>

<html>

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>Get Element by id</title>
	<link rel="stylesheet" href="../css/basic.css" type="text/css" media="screen" title="no title" charset="utf-8">

</head>
<body id="template_do_not_edit" >
	
	<h1>Display video with ID 1028726445001</h1>

	<?php
	
	$itemsToDisplay = array (	"name", 
								"thumbnailURL", 
								"shortDescription");
	
	find_video_by_id( $itemsToDisplay, "1028726445001", "<div id='bc_display_items_in_list'>", "</div>", true);
	
	
	//display_debug();
	
	?>
	
</body>
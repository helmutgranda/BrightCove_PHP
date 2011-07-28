<?php


/**
 * find_all_videos
 *
 * @param string $before 
 * @param string $after
 * @param bool @echo
 * @return object or echo
 * @author helmut.granda
 **/

if ( ! function_exists ("find_all_videos") ) {
	
	function find_all_videos($before, $after, $echo = true) {
		
		if (!isset($bc)) $bc = create_brightcove();
		
		if ($echo == true)
			echo $bc->find_all_videos($before, $after);
		else
		 	return $bc->find_all_videos($before, $after);
	}
	
}

/**
 * get_find_all_videos
 *
 * @return object
 * @author helmut.granda
 **/

if ( ! function_exists ("get_find_all_videos") ) {
	
	function get_find_all_videos() {
		
		global $bc;
		return $bc->get_find_all_videos();
	}
	
}

/**
 * find_playlist_by_id
 *
 * @param array $list 
 * @param string $before 
 * @param string $after
 * @param bool @echo
 * @return object or echo
 * @author helmut.granda
 **/

if ( ! function_exists ("find_playlist_by_id") ) {
	
	function find_playlist_by_id($list, $before, $after, $echo = true) {
		
		if (!isset($bc)) $bc = create_brightcove();
		
		$bc->optionID = 2;
		
		if ($echo == true)
			echo $bc->find_playlist_by_id($list, $before, $after);
		else
			return $bc->find_playlist_by_id($list, $before, $after);
	}
	
}

/**
 * find_video_by_id
 *
 * @param array $list 
 * @param string $before 
 * @param string $after
 * @param bool @echo
 * @return object or echo
 * @author helmut.granda
 **/

if ( ! function_exists ("find_video_by_id") ) {
	
	function find_video_by_id($options, $item_id, $before, $after, $echo = true) {
		
		
		if (!isset($bc)) $bc = create_brightcove();
		
		$bc->optionID = 1;
		
		if ($echo == true)
			echo $bc->find_video_by_id ( $options , $item_id ,  $before , $after);
		else
			return $bc->find_video_by_id ( $options , $item_id , $before , $after);
	}
	
}


/**
 * display_debug
 *
 * @param bool @echo
 * @return object or echo
 * @author helmut.granda
 **/

if (!function_exists("display_debug")) { 
	
    function display_debug( $echo=true) { 
		global $bc;
		if (!isset($bc)) $bc = create_brightcove();
		
		$return .= '<div style="height:300px;overflow-y:scroll;width:30%;right:0px;top:0px;position:absolute;border: 1px solid #ccc;display: block;>"';
        $return .= "<br />source: <i><small>$bc->fullURL;</small></i><div><pre>"; 
        $return .= print_r($bc->items, 1); 
        $return .= "</pre></div></div>"; 
        if ($echo) echo $return; 
        else return $return; 
    } 

}

/**
 * create_brightcove
 *
 * @return object
 * @author helmut.granda
 **/
function create_brightcove() {
	
	global $apiURL, $commandList, $token, $bc;
	
	$bc = new Brightcove();
	$bc->apiURL = $apiURL;
	$bc->commandList = $commandList;
	$bc->token = $token;
	
	
	return $bc;			
}

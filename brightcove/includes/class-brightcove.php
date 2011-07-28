<?php

  class Brightcove
  {
	private $apiURL;
	private $commandList;
	private $token;
	private $playlist_id;
	private $item_id;
	private $items;
	private $optionID;
	private $fullURL;
	
	public function __construct() {
    	$this->optionID = 0 ;
	}
	
	private function get_contents() {
		
		if ($this->optionID == 0 )
			$url = $this->apiURL . $this->commandList[ $this->optionID ]."&token=" . $this->token;
		else if ($this->optionID == 1)
        	$url = $this->apiURL . $this->commandList[ $this->optionID ] . "&video_id=" . $this->item_id . "&token=" . $this->token;
		else
        	$url = $this->apiURL . $this->commandList[ $this->optionID ] . "&playlist_id=" . $this->playlist_id . "&token=" . $this->token;
		
		$this->fullURL = $url;
		
		if ( @ ! $items = file_get_contents($url))
		{
			echo "URL malformed";
		}
		
		$items = json_decode($items, true);
		
		if ( $this->optionID == 2 )
			return $items["videos"];
		else if ( $this->optionID == 1 )
			return $items;	
		else
			return $items["items"];
		
	}

	public function find_playlist_by_id($itemsToDisplay, $list, $before='', $after='') {
		
		$this->playlist_id = $list;
		$this->items = $this->get_contents();
		
		$count = count($this->items);
		
		$return =  $before;
		for($i=0;$i<$count;$i++){
			$tempItem = $this->items[$i];
			$return .= $this->pretty_output($tempItem, $itemsToDisplay);	
		}
		$return .= $after;
		
		return $return;
		
	}
		
	
	public function find_all_videos( $itemsToDisplay, $before='', $after='') {
		
		$this->items = $this->get_contents();
	
		$count = count($this->items);
		
		$return =  $before;
		
		for($i=0;$i<$count;$i++){
			$tempItem = $this->items[$i];
			$return .= $this->pretty_output($tempItem, $itemsToDisplay);	
		}
		$return .= $after;
		
		return $return;
		
	}
	
	
	
	public function find_video_by_id($itemsToDisplay, $item_id, $before='', $after='') {

		$this->item_id = $item_id;
		$this->items = $this->get_contents();
		
		$return =  $before;
		$return .= $this->pretty_output($this->items, $itemsToDisplay);
		$return .= $after;
		
		return $return;
		
	}
	
	
	
	public function get_find_all_videos() {

		if ($this->items == 0 ) $this->items = $this->get_contents();

		return $this->items;
		
	}
	
	
	public function __set($property, $value) {
		if (property_exists($this, $property)) {
		      $this->$property = $value;
		    }
		return $this;
	}
	
	public function __get($property) {
    	if (property_exists($this, $property)) {
      		return $this->$property;
    	}
  	}

	private function pretty_output ( $input, $itemsToDisplay ) {
		
		
		$item = "<div class='display_item'>";
		foreach ($itemsToDisplay as &$wrapper )
		{	
			$item .= $this->checkWrapper($wrapper, $input);
		}
		$item .= "</div>";
		
		return $item;
		
	}
	
	private function checkWrapper ( $itemKind, $input ) 
	{
		if ($itemKind == "name")
			return "<h3>{$input['name']}</h3>";
		else if ($itemKind == "thumbnailURL")
			return "<img src='{$input['thumbnailURL']}'>";
		else if ($itemKind == "shortDescription")
			return "<i>{$input['shortDescription']}</i>";
		else
			return "<span>{$itemKind} : {$input[$itemKind]}</span>";
	}

}
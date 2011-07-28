<?php

/**
 * display_sample_files function
 *
 * In order to quickly create multiple tests, just create new files in the samples folder
 * they will automatically will be displayed in this file 
 * 
 * @return void
 * @author helmut.granda
 **/


display_sample_files function ()
{
}
function display_sample_files ( $directory )
{

  $results = array();
  $handler = opendir($directory);

  while ($file = readdir($handler)) {

    if ($file != "." && $file != "..") {
		$address = substr( $file, 0 , count($file) - 5);
		$address2 = str_replace( "_", " ", $address);
		echo "<a href='$directory/$file'>". ucfirst($address2) ."</a><br />";
    }

  }

  closedir($handler);

}

display_sample_files("samples");
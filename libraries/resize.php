<?php

/*
	Version 1.0 Created by: Ryan Stemkoski
	Questions or comments: ryan@ipowerplant.com
	Visit us on the web at: http://www.ipowerplant.com
	Purpose:  This script can be used to resize one or more images.  It will save the file to a directory and output the path to that directory which you 
			  can display or write to a databse. 
	
	TO USE, SET: 
		$filename = image to be resized
		$newfilename = added to filename to for each use to keep from overwriting images created example thumbnail_$filename is how it will be saved.
		$path = where the image should be stored and accessed. 
		$newwidth = resized width could be larger or smaller
		$newheight = resized height could be larger or smaller
		
	SAMPLE OF FUNCTION: makeimage('image.jpg','fullimage_','imgs/',250,250)
	
	Include the file containing the function in your document and simply call the function with the correct parameters and your image will be resized.
	
*/
 
//IMAGE RESIZE FUNCTION FOLLOW ABOVE DIRECTIONS
function makeimage($filename,$newfilename,$path,$newwidth,$newheight) {

	//SEARCHES IMAGE NAME STRING TO SELECT EXTENSION (EVERYTHING AFTER . )
	$image_type = strstr($filename, '.');

	//SWITCHES THE IMAGE CREATE FUNCTION BASED ON FILE EXTENSION
	switch($image_type) {
			case '.jpg':
				$source = imagecreatefromjpeg($filename);
				break;
			case '.png':
				$source = imagecreatefrompng($filename);
				break;
			case '.gif':
				$source = imagecreatefromgif($filename);
				break;
			default:
				echo("Error Invalid Image Type");
				die;
				break;
			}
	
	//CREATES THE NAME OF THE SAVED FILE
	$file = $newfilename . $filename;
	
	//CREATES THE PATH TO THE SAVED FILE
	$fullpath = $path . $file;

	//FINDS SIZE OF THE OLD FILE
	list($width, $height) = getimagesize($filename);

	//CREATES IMAGE WITH NEW SIZES
	$thumb = imagecreatetruecolor($newwidth, $newheight);

	//RESIZES OLD IMAGE TO NEW SIZES
	imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

	//SAVES IMAGE AND SETS QUALITY || NUMERICAL VALUE = QUALITY ON SCALE OF 1-100
	imagejpeg($thumb, $fullpath, 60);

	//CREATING FILENAME TO WRITE TO DATABSE
	$filepath = $fullpath;
	
	//RETURNS FULL FILEPATH OF IMAGE ENDS FUNCTION
	return $filepath;

}

?> 

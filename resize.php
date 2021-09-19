<?php    
function image_resize($source, $destination)
{
$img = file_get_contents($source);
$im = imagecreatefromstring($img);
$width = imagesx($im);
$height = imagesy($im);
$newwidth = '200';
$newheight = '200';
$thumb = imagecreatetruecolor($newwidth, $newheight);
imagecopyresized($thumb, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
imagejpeg($thumb,$destination); //save image as jpg
imagedestroy($thumb); 
imagedestroy($im);
}
?>
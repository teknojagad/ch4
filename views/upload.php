<?php
//$newImageSubmitted is TRUE if form was submitted, otherwise FALSE
$newImagesubmitted = isset( $_POST['new-image']);
if ( $newImagesubmitted ) {
    //this code runs if form was submitted
    $output = upload();
} else {
    //this runs if form was NOT submitted
    $output = include_once "views/upload-form.php";
}
return $output;
//declare new function
function upload() {
    include_once "classes/Uploader.class.php";
    
    //image-data is the name attribute used in <input type='file' />
    $uploader = new Uploader( "image-data" );
    $uploader->saveIn("img");
    $fileUploaded = $uploader->save();
    if ( $fileUploaded ) {
        $out = "new file uploaded";
    } else {
        $out = "Something went wrong";
    }
//    $out = "<pre>";
//    $out .= print_r($_FILES, true);
//    $out .= "</pre>";
    return $out;
}
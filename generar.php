<?php

session_start();

$urlMeetingBBB = isset($_POST['url-meeting']) ? $_POST['url-meeting'] : "0";
$nameVideo = isset($_POST['video-name']) ? $_POST['video-name'] : "0";
$minutes = isset($_POST['video-duration-min']) ? $_POST['video-duration-min'] : 0 ;
$seconds = isset($_POST['video-duration-seg']) ? $_POST['video-duration-seg'] : 0 ;

$timeVideo = ($minutes * 60) + $seconds;

$urlNode = '/usr/bin/node';
$base = __DIR__.'/bbb-recorder';

$mgs = null;
$textOut =  null;

$_SESSION['name'] = $nameVideo;

$options = $urlNode.' '.$base.'/export.js "'.$urlMeetingBBB.'" 2>&1 '.$nameVideo.'.webm '.$timeVideo.' false';
$result = exec($options, $output, $return);
$return = $output = 1;
if($return){
    $mgs = "Existio un problema en la ejecución";
} else {
    $mgs = "El proceso se realizao correctamente.";
}

$textOut = implode("\n", $output);

$result = [
        'message' => $mgs,
        'options' => $options,
];

echo json_encode($result);

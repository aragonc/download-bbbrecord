<?php 
session_start();
require_once 'main/bbb-record.php';

$record = new videoRecord();
var_dump($record->getListVideoNotProcess());
var_dump($record->getListVideoProcess());
?>
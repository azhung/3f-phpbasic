<?php 
session_start();
include_once('../config.php');

if (!isset($_SESSION['username'])) {
	header('Location: login.php');
}

include_once('func/posts.php');
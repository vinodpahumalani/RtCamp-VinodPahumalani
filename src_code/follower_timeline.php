<?php
require_once 'twitteroauth/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
session_start();
 
$config = require_once 'config.php';




	//get follower_timeline

	$twitter= $_SESSION['twitter'];
	$user = $twitter->get("account/verify_credentials");

	//get json object key by post
	$getusername=$_POST['username'];

	//send output by json_encode
	if($_POST)
	{

		$follower_timeline = $twitter->get("statuses/user_timeline",["count" => 10, "exclude_replies" => true, "screen_name" =>$getusername]);
		echo json_encode($follower_timeline);

	}
?>
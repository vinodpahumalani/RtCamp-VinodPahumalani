<?php 

require_once 'twitteroauth/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
session_start();
 
$config = require_once 'config.php';


$oauth_verifier = filter_input(INPUT_GET, 'oauth_verifier');
 
		if (empty($oauth_verifier) ||
			empty($_SESSION['oauth_token']) ||
			empty($_SESSION['oauth_token_secret'])
		) {
			// something's missing, go and login again
			header('Location: ' . $config['url_login']);
		}
		// connect with application token
		$connection = new TwitterOAuth(
			$config['consumer_key'],
			$config['consumer_secret'],
			$_SESSION['oauth_token'],
			$_SESSION['oauth_token_secret']
		);
		 
		// request user token
		$token = $connection->oauth(
				'oauth/access_token', [
				'oauth_verifier' => $oauth_verifier
			]
		);



		$_SESSION['twitter'] = new TwitterOAuth(
			$config['consumer_key'],
			$config['consumer_secret'],
			$token['oauth_token'],
			$token['oauth_token_secret']
		);

		if(isset($_SESSION['twitter']))
		{
			header('Location:'. $config['url_home']);
		}
		else
		{
			echo "session is not set";
		}
 ?>
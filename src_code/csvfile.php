<?php       

require_once 'twitteroauth/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
session_start();
 
$config = require_once 'config.php';




//get user_home_timeline

$twitter= $_SESSION['twitter'];
$user = $twitter->get("account/verify_credentials");
$own_timeline = $twitter->get("statuses/home_timeline",['count' => 10, 'exclude_replies' => true, 'screen_name' => $user->screen_name]);

      $filename = $user->screen_name.'twitter.csv';       
      header("Content-type: text/csv");       
      header("Content-Disposition: attachment; filename=$filename");       
      $output = fopen("php://output", "w");       
                  
			fputcsv($output, array("TWEET NO","NAME","PROFILE PICTURE","USERNAME","TWEET"));
           $n=count($own_timeline);
      for($i=0;$i<$n;$i++)
		{
			$user=$own_timeline[$i]->user;
			$propic=$user->profile_image_url;
				   $name=$user->name;
				   $username=$user->screen_name;
				   $post=$own_timeline[$i]->text;		
	 
			fputcsv($output, array($i,$name,$propic,$username,$post));

      }       
      fclose($output);     
    ?>
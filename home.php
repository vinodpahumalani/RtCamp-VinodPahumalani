<?php

require_once 'twitteroauth/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

				session_start();
				 
				$config = require_once 'config.php';




				//get userinfo,home_timeline,followers,follower_timeline

				$twitter= $_SESSION['twitter'];
				$user = $twitter->get("account/verify_credentials");
				$own_timeline = $twitter->get("statuses/home_timeline",['count' => 10, 'exclude_replies' => true, 'screen_name' => $user->screen_name]);


				$followers = $twitter->get("followers/list",array("screen_name" => $user->screen_name));


				$follower_timeline = $twitter->get("statuses/user_timeline",["count" => 10, "exclude_replies" => true, "screen_name" =>"vk1786221"]);


?>
<!DOCTYPE html>
<html>
	<head>

		<!--device scalability-->
		<meta http-equiv="X-UV-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">

		<!--- site title-->
		<title>Twitter Assignment</title>

		<!-- Latest bootstrap and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
                <link rel="stylesheet" href="css/custom.css">



		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



		<!-- Latest bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                <script src="js/jquery.bootstrap.newsbox.min.js" type="text/javascript"></script>
                <script src="js/custom.js" type="text/javascript"></script>
                
        

	</head>

	`<body>


<!----------------------------------site nav-bar-------------------------------------------------------------------------------------------------------------------------->
			<nav class="navbar navbar-default navbar-fixed-top" style="background-color:#337AB7" >
			  <div class="container">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				  <span class="sr-only">TwitterAssignment</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" style="color:#ffffff" href="#"><span><img class="img-responsive2" width="30px" src="img/twitter_logo.png"></span> &nbsp Twitter Assignment </a>                                              
					<div class="navbar-collapse collapse">
					  <ul class="nav navbar-nav navbar-right">
						<li ><a href="logout.php" style="color:#ffffff" >Log Out</a></li>								
					 </ul>
					</div>
				  </div>
			</nav>


<!-- search followers ------------------------------------------------------------------------------------------------------------------------------------->
			<div class="container" style="margin-top:60px">
				<div class="row">
					<div class="col-md-1"></div>
						<div class="col-md-7">  
							<input type="text" name="search" id="search" placeholder="Search Followers" class="form-control" />
								<ul class="list-group" id="result"></ul>
						</div>
					<div class="col-md-1"></div>
				</div>
			 </div>

<!-- download tweets -------------------------------------------------------------------------------------------------------------------------------------> 
            <div class="container" style="margin-top:30px">
                <div class="row">
                   <div class="col-md-1"></div>
                       <div class="col-md-7">            
                            <a class="btn btn-primary btn-block fixed-top" href="https://vinodpahumalani.000webhostapp.com/csvfile.php">Download Tweets</a>
                        </div>
                    <div class="col-md-1"></div>
                 </div>
			</div>



			<div class="container" style="margin-top:40px">
                <div class="row">
<!-- first slide show for timeline ------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="col-md-1"></div>
                       <div class="col-md-7">
							<div class="panel panel-primary" >
							<div class="panel-heading"> <span class="glyphicon glyphicon-list-alt"></span><b id="title">Home Timeline</b></div>
								<div class="panel-body">
									<div class="row">
										<div class="col-xs-12">
				<ul class="demo" id="timeline">
							<?php    
								 for($i=0;$i<10;$i++)
									{			 
										  $user=$own_timeline[$i]->user;			
							  ?>
								<li class="news-item">
								<table cellpadding="4" >
									<tr>
										<td><img src="<?php echo $user->profile_image_url; ?>" width="60" class="img-circle" /> &nbsp&nbsp
											<strong><?php echo $user->name; ?></strong> <br/><br/>
										</td>
									</tr>
									<tr>
										<td> <?php echo $own_timeline[$i]->text; ?> <br/>
												<?php 		
														
														$entities=$own_timeline[$i]->entities;
														
														$media=$entities->media;
														
														if($media[0]->media_url_https != null)
														{
												?>
														
											<img src="<?php echo $media[0]->media_url_https; ?>" class="img-responsive" alt="Responsive image" style="height:400px"/> 
														
												<?php } ?>
										</td>
									</tr>
								</table>
								</li>
							<?php } ?>
			</ul>
						</div>
					</div>
				</div>
					<div class="panel-footer"> </div>
				</div>
            </div>
            <div class="col-md-4"></div></div>
<!-- second slide show for followers ------------------------------------------------------------------------------------------------------------------------------------->
                <div class="row">
                   <div class="col-md-1"></div>
                    <div class="col-md-7">
	                 <div class="panel panel-primary" >
						<div class="panel-heading"> <span class="glyphicon glyphicon-user"></span><b>Followers</b></div>
						<div class="panel-body">
							<div class="row">
							<div class="col-xs-12">
				<ul class="demo" >
							<?php                                                                                            
                                $user_follower=$followers->users;
									 for($i=0;$i<10;$i++)
										{											 
											if(!empty($user_follower[$i]))
                                                                                                {
												 
							 ?>
							<li class="news-item">
								<table cellpadding="4" >
									<tr>                                                  
										<td><img src="<?php echo $user_follower[$i]->profile_image_url; ?>" width="60" class="img-circle" /> &nbsp&nbsp                                                             
											<strong><?php echo $user_follower[$i]->name; ?></strong> <br/>
                                                <?php echo $user_follower[$i]->screen_name; ?><br/>
										</td>
									</tr>
									<tr>
										<td>
                                                 Location: &nbsp <?php echo $user_follower[$i]->location; ?> <br>
                                                 Friends: &nbsp <?php echo $user_follower[$i]->friends_count; ?><br/>
                                                 Followers: &nbsp <?php echo $user_follower[$i]->followers_count; ?>                                                                         
                                        </td>                                                                                      
									</tr>  
								</table>
							</li>
					<?php } } ?>
				</ul>
							</div>
						</div>
					</div>
					<div class="panel-footer"> </div>
				</div>
                    </div>
                  <div class="col-md-4"></div>
			</div>
               </div>
	</body>`
</html>

<script>
		$(document).ready(function(){
			var followers=<?php echo json_encode($followers); ?>;

		//----------search follower----------

		$('#search').keyup(function(){
			 $('#result').html('');
			  $('#state').val('');
			  var searchField = $('#search').val();
			  var expression = new RegExp(searchField, "i");
			  var n=Object.keys(followers.users).length;
					for(var i=0;i<n;i++)
					{
					var name=followers.users[i].name;
					var username=followers.users[i].screen_name;
					if (name.search(expression) != -1 || username.search(expression) != -1)
						{
					 $('#result').append('<li class="list-group-item link-class" >'+name+' | '+username+'</li>');
						 }
					}
					 });
					$('#result').on('click', 'li', function() {
					  var click_text = $(this).text().split('|');
					  $('#search').val($.trim(click_text[1]));
					  $("#result").html('');

		//---------bind timeline---------

				   $.ajax({
							  type: "POST",
							  url: "https://vinodpahumalani.000webhostapp.com/follower_timeline.php",
							  data: {username:click_text[1]},
							  dataType: "json",
							  success: function(resultData){
						var timeline=resultData;
						 var t=Object.keys(timeline).length;
						   
					$('#timeline').html('');
					$('#title').html('Follower User Timeline');
						 for(var j=0;j<t;j++)
						  { 
						  var text=timeline[j].text;
						  var u=timeline[j].user;
						  $('#timeline').append('<li class="news-item"><table cellpadding="4" ><tr><td><img src="'+u.profile_image_url+'" width="60" class="img-circle" /> &nbsp&nbsp<strong>' +u.name+ '</strong> <br/><br/></td></tr><tr><td>'+text+'<br/></td></tr></table></li>');  

						 }
					  }
				});

			});
		});


</script>
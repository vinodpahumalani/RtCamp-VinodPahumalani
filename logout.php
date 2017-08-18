<?php

session_start();
$url=$_SESSION["oauth_login"];
session_destroy();

header('Location: '. $url);

?>
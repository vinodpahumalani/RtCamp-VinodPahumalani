<?php

$token= require_once '/../src_code/config.php';

class configTest extends PHPUnit_Framework_TestCase
{
   
	
    
   
    public function testTokens()
    {
       
        $this->assertEquals('', $token['consumer_key']);
		$this->assertEquals('', $token['consumer_secret']);
		$this->assertEquals('https://vinodpahumalani.000webhostapp.com/index.php', $token['url_login']);
		$this->assertEquals('https://vinodpahumalani.000webhostapp.com/home.php', $token['url_home']);
    }
}

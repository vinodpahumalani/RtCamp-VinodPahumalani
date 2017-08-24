<?php

	

class configTest extends PHPUnit_Framework_TestCase
{
   
	protected $config;
    	protected $token;
   
    public function testTokens()
    {
       $this->config=new config();
	 $this->token=$this->config->token();   
	    
        $this->assertEquals('', $this->token['consumer_key']);
		$this->assertEquals('', $this->token['consumer_secret']);
		$this->assertEquals('https://vinodpahumalani.000webhostapp.com/index.php', $this->token['url_login']);
		$this->assertEquals('https://vinodpahumalani.000webhostapp.com/home.php', $this->token['url_home']);
    }
}

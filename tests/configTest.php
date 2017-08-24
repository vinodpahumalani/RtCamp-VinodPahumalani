<?php


class configTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var token
     */
    private $token=require_once(__DIR__.'/../src_code/config.php');
    
   
    public function testTokens()
    {
       
        $this->assertEquals('', $token['consumer_key']);
		$this->assertEquals('', $token['consumer_secret']);
		$this->assertEquals('https://vinodpahumalani.000webhostapp.com/index.php', $token['url_login']);
		$this->assertEquals('https://vinodpahumalani.000webhostapp.com/home.php', $token['url_home']);
    }
}

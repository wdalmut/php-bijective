<?php 
class Base62Test extends PHPUnit_Framework_TestCase
{
    private $_object;
    
    public function setUp()
    {
        $this->_object = new Base62();
    }
    
    public function testEncode()
    {
        $encode = "http://walterdalmut.com/2012/07/29/pimple-dependency-injection-su-zendcache/";
        $this->assertEquals("EiWNjhDF6MIn4N46ZtrpdaBZ3kztuqNa5vGiZCTNr4LzFPyqIWqmmnEkI4f6DAuNIluPj738ywkWs7VBl6UtHhTwwYHmKOVjgc0Jiv", $this->_object->encode($encode));
    }
    
    public function testDecode()
    {
        $decode = "EiWNjhDF6MIn4N46ZtrpdaBZ3kztuqNa5vGiZCTNr4LzFPyqIWqmmnEkI4f6DAuNIluPj738ywkWs7VBl6UtHhTwwYHmKOVjgc0Jiv";
        $this->assertEquals("http://walterdalmut.com/2012/07/29/pimple-dependency-injection-su-zendcache/", $this->_object->decode($decode));
    }
}
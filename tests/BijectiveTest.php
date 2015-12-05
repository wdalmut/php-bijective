<?php
namespace Corley\Generator;

class BijectiveTest extends \PHPUnit_Framework_TestCase
{
    private $_object;

    public function setUp()
    {
        parent::setUp();

        $this->_object = new Bijective();
    }

    public function testEncode()
    {
        $encode = $this->_object->encode(123456);

        $this->assertEquals("Gho", $encode);
    }

    public function testDecode()
    {
        $decode = $this->_object->decode("Gho");

        $this->assertEquals(123456, $decode);
    }

    public function testOne()
    {
        $one = $this->_object->encode(0);
        $this->assertEquals("a", $one);
    }

    public function testConsecutive()
    {

        $string = $this->_object->encode(12531);
        $this->assertEquals("dqh", $string);
        $string = $this->_object->encode(12532);
        $this->assertEquals("dqi", $string);
        $string = $this->_object->encode(12533);
        $this->assertEquals("dqj", $string);
    }
}

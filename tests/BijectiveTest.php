<?php
/**
 * 
 * Bijective TestCase
 *
 * @author Walter Dal Mut
 * @package 
 * @license MIT
 *
 * Copyright (C) 2012 Corley S.R.L.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies
 * of the Software, and to permit persons to whom the Software is furnished to do
 * so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */ 
class BijectiveTest extends PHPUnit_Framework_TestCase
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
<?php 
/**
 * 
 * Bijective service
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
class Bijective
{
    public $_alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    public function __construct()
    {
        $this->_alphabet = str_split($this->_alphabet);
    }

    /**
     * Encode ID
     * @param int $i
     * @return string The encoded value
     */
    public function encode($i)
    {
        if ($i == 0)
        return $this->_alphabet[0];

        $result = '';
        $base = count($this->_alphabet);

        while ($i > 0)
        {
            $result[] = $this->_alphabet[($i % $base)];
            $i = floor($i / $base);
        }

        $result = array_reverse($result);

        return join("", $result);
    }

    /**
     * Decode ID
     * 
     * @param string $input
     * @return int
     */
    public function decode($input)
    {
        $i = 0;
        $base = count($this->_alphabet);

        $input = str_split($input);

        foreach($input as $char)
        {
            $pos = array_search($char, $this->_alphabet);

            $i = $i * $base + $pos;
        }

        return $i;
    }
}
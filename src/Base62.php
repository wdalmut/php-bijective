<?php
class Base62 extends BaseAbstract
{
    private $_alphabet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
    protected function _getAlphabet()
    {
        return $this->_alphabet;
    }
}
<?php 
abstract class BaseAbstract
{
    abstract protected function _getAlphabet();
    
    public function encode($string) {
        
        $characters = $this->_getAlphabet();
        
        if ($string === '' || empty($characters)) {
            return '';
        }
        $string   = str_split($string);
        $callback = function($str) {
                return ord($str);
            };
        $string    = array_map($callback, $string);
        $converted = static::baseConvert($string, 256, strlen($characters));
        $callback  = function ($num) use ($characters) {
                return $characters[$num];
            };
        $ret = implode('', array_map($callback, $converted));
        return $ret;
    }

    public function decode($string) {
        $characters = $this->_getAlphabet();
        
        if (empty($string) || empty($characters)) {
            return '';
        }
        $string   = str_split($string);
        $callback = function($str) use ($characters) {
                return strpos($characters, $str);
            };
        $string    = array_map($callback, $string);
        $converted = static::baseConvert($string, strlen($characters), 256);
        $callback  = function ($num) {
                return chr($num);
            };
        return implode('', array_map($callback, $converted));
    }

    protected static function baseConvert(array $source, $srcBase, $dstBase) {
        if ($dstBase < 2) {
            $message = sprintf('Invalid Destination Base: %d', $dstBase);
            throw new \InvalidArgumentException($message);
        }
        $result = array();
        $count  = count($source);
        while ($count) {
            $itMax     = $count;
            $remainder = $count = $i = 0;
            while($i < $itMax) {
                $dividend  = $source[$i++] + $remainder * $srcBase;
                $remainder = $dividend % $dstBase;
                $res       = ($dividend - $remainder) / $dstBase;
                if ($count || $res) {
                    $source[$count++] = $res;
                }
            }
            $result[] = $remainder;
        }
        return array_reverse($result);
    }
}
<?php 

class Math
{ 
    static public function avrg() {
        $count = func_num_args();
        $args = func_get_args();
        return (array_sum($args) / $count);
    }
    
    static function highestSetBit($value) {
        $b = array(0x2, 0xC, 0xF0, 0xFF00, 0xFFFF0000);
        $S = array(1, 2, 4, 8, 16);
        $ret = 0;
        
        for ($i = 4; $i >= 0; $i--) {
            if ($value & $b[$i]) {
                $value >>= $S[$i];
                $ret |= $S[$i];
            } 
        }
        return $ret;
    }
}
?>

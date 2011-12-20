<?php 

class Math
{ 
    static public function avrg() {
        $count = func_num_args();
        $args = func_get_args();
        return (array_sum($args) / $count);
    }
}
?>

<?php
    function randomString($n){
        $character = "012345789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $str = '';
        for ($i=0; $i<$n ; $i++){
            $index = rand(0, strlen($character)-1);
            $str .= $character[$index];
        }
        return $str;
    }
?>
<?php

namespace App\Testdome;


class Fibonachi {
    public function fib( int $num) : array {
        if ($num == 0) return [];
        if ($num > 2) {
            $seq = $this->fib($num -1);
            $next = $seq[$num -2] + $seq[$num -3];
            $seq[] = $next;
           
            return $seq;
        } else {
            return [0,1];
        }
    }
}
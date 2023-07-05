<!-- <?php

function make_pipeline(...$args)
{
    return function ($arg) use ($args) {
        foreach($args as $func) {
            if (!isset($value)) {
                $value = $func($arg);
            } else {
                $value = $func($value);
            }
        }
        return $value;
    };
}

$fun = make_pipeline(
    function ($x) {
        return $x * 3;
    },
    function ($x) {
        return $x + 1;
    },
    function ($x) {
        return $x / 2;
    }
);
echo $fun(3); # should print 5 -->
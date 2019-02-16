<?php

namespace RenatoMarinho\LaravelPageSpeed\Middleware;

class TrimUrls extends PageSpeed
{
    public function apply($buffer)
    {
        $replace = [
            '/(?<!placeholder=")https?:/' => ''
        ];

        return $this->replace($replace, $buffer);
    }
}

<?php


class Bucket
{
    public function __construct($value, $next)
    {
        $this->value = $value;
        $this->next = $next;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getNextAddress()
    {
        return $this->next;
    }
}

<?php

/**
 * Object for Chain
 */

class Bucket
{
    private $value;
    private $next;

    /**
     * Constructor
     * @param int    $value value
     * @param Bucket $next  next Bucket Object
     * 
     */

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

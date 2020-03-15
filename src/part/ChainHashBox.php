<?php

require_once 'Bucket.php';

/* 
 * Hash Box
 * key id hased value
 * value is Bucket Object
 */

class chainHashBox
{
    private $size;
    private $list;

    /**
     * Constructor
     * @param int    $size size of box
     * 
     */
    public function __construct($size)
    {
        $this->list = array_fill(0, $size, null);
        $this->size = $size;
    }

    public function createHashCode($value)
    {
        $hashCode = $value % $this->size;
        return (int) $hashCode;
    }

    public function getList()
    {
        return $this->list;
    }

    /**
     * Add value to HashBox
     * @param int $value value
     * 
     * @return Bool success to add true
     *              already added  false
     */

    public function add($value)
    {
        $key = self::createHashCode($value);
        $address = null;
        if ($this->list[$key]) {
            $address = $this->list[$key];
        }
        while ($address != null) {
            if ($address->getValue() == $value) {
                return false;
            }

            if ($address->getValue() == null) {
                break;
            }
            $address = $address->getNextAddress();
        }
        $this->list[$key] = new Bucket($value, $this->list[$key]);
        return true;
    }

    /**
     * Search a value
     * @param int $value value for searching
     * 
     * @return int  when found key of hashBox
     *              failed null
     */
    public function search($value)
    {
        $key = self::createHashCode($value);
        $address = null;
        if ($this->list[$key]) {
            $address = $this->list[$key];
        }
        while ($address != null) {
            //var_dump($this->list[$key]->getValue());
            //var_dump($value);
            //exit('');
            if ($address->getValue() == $value) {
                return $key;
            }
            $address = $address->getNextAddress();
            //var_dump($address);
            //exit('');
        }
        return null;
    }
}

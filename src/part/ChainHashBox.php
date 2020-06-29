<?php
/*
* HashSearch
* 1. Generate the hash value by Hash Function
* 2. Adding the hash value to the the hash box
* 3. Search the value from hash table
*
*/

class ChainHashBox
{
    public function __construct($size)
    {
        $this->list = array_fill(0, $size, null);
        //Array ( [0] => [1] => [2] => [3] => [4] => [5] => [6] => [7] => [8] => [9] => )

        $this->size = $size;
        //echo $this->size; 10
    }

    //Hash function
    public function createHash($value)
    {
        //echo $value;
        $hashed = $value % $this->size;
        //echo $hashed;
        return (int)$hashed;
    }

    public function getList()
    {
        return $this->list;
    }

    /**
     * Add value to the Hash box
     * @param int $value value
     *
     * @return Bool success to add true
     *               already existed false
     */
    public function add($value)
    {
        //echo $value;
        $key = self::createHash($value);
        //echo $key;
        $address = null;
        
        if ($this->list[$key]) {
            $address = $this->list[$key];
            //echo $address;
        }
        while ($address != null) {
            echo "a";
            if ($address->getValue() == $value) {
                echo "b";
                return false;
            }

            if ($address->getValue() == null) {
                echo "c";
                break;
            }
            $address = $address->getNextAddress();
        }
        //echo "d";
        $this->list[$key] = new Bucket($value, $this->list[$key]);
        //print_r($this->list[$key]);
        return true;
    }

    //Search the given data from the hash table
    public function search($value)
    {
        //echo $value;
        $key = self::createHash($value);
        //echo $key;
        $address = null;

        if ($this->list[$key]) {
            $address = $this->list[$key];
        }

        while ($address != null) {
            if ($address->getValue() == $value) {
                return $key;
            }
            $address = $address->getNextAddress();
        }
        return null;
    }
}

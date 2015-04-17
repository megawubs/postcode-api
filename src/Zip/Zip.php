<?php
/**
 * Created by PhpStorm.
 * User: bwubs
 * Date: 17/04/15
 * Time: 13:33
 */

namespace Wubs\Zip;


class Zip
{
    private $number;
    private $zip;

    /**
     * @param $zip
     * @param $number
     */
    public function __construct($zip, $number)
    {
        $this->number = $number;
        $this->zip = $zip;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }
}
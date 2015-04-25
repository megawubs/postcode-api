<?php
/**
 * Created by PhpStorm.
 * User: bwubs
 * Date: 17/04/15
 * Time: 11:37
 */

namespace Wubs\Zip\Contracts;


interface Address
{
    public static function fromJsonObject($object);
}
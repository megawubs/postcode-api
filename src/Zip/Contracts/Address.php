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
    public static function create($data);

    public function getStreet();

    public function getProvince();

    public function getHouseNumber();

    public function getPostcode();

    public function getTown();

    public function getMunicipality();

    public function getLatitude();

    public function getLongitude();

    public function getX();

    public function getY();
}
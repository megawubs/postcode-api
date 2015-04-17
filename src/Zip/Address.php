<?php
/**
 * Created by PhpStorm.
 * User: bwubs
 * Date: 17/04/15
 * Time: 11:50
 */

namespace Wubs\Zip;

use Wubs\Zip\Contracts\Address as AddressInterface;
use Wubs\Zip\Exception\UnsuccessfulRequestException;

class Address implements AddressInterface
{
    /**
     * @var
     */
    private $houseNumber;
    /**
     * @var
     */
    private $latitude;
    /**
     * @var
     */
    private $longitude;
    /**
     * @var
     */
    private $municipality;

    private $province;
    /**
     * @var
     */
    private $postcode;
    /**
     * @var
     */
    private $street;
    /**
     * @var
     */
    private $town;
    /**
     * @var
     */
    private $x;
    /**
     * @var
     */
    private $y;

    private function __construct($address)
    {
        $this->map($address);
    }

    /**
     * @param $data
     * @return Address
     * @throws UnsuccessfulRequestException
     */
    public static function create($data)
    {
        if ($data->success) {
            $address = $data->resource;
            return new static($address);
        }

        throw new UnsuccessfulRequestException;
    }

    /**
     * @return mixed
     */
    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @return mixed
     */
    public function getMunicipality()
    {
        return $this->municipality;
    }

    /**
     * @return mixed
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return mixed
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }


    /**
     * @param $address
     */
    private function map($address)
    {
        foreach ($address as $property => $value) {
            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }

    public function getProvince()
    {
        return $this->province;
    }
}
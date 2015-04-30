<?php
/**
 * Created by PhpStorm.
 * User: bwubs
 * Date: 17/04/15
 * Time: 11:50
 */

namespace Wubs\Zip;

use Illuminate\Support\Str;
use Wubs\Zip\Contracts\Address as AddressInterface;
use Wubs\Zip\Exception\UnsuccessfulRequestException;

class Address implements AddressInterface
{
    /**
     * @var
     */
    public $houseNumber;
    /**
     * @var
     */
    public $latitude;
    /**
     * @var
     */
    public $longitude;
    /**
     * @var
     */
    public $municipality;

    public $province;
    /**
     * @var
     */
    public $zip;
    /**
     * @var
     */
    public $street;
    /**
     * @var
     */
    public $town;
    /**
     * @var
     */
    public $x;
    /**
     * @var
     */
    public $y;

    function __construct(
        $houseNumber,
        $latitude,
        $longitude,
        $municipality,
        $zip,
        $province,
        $street,
        $town,
        $x,
        $y
    ) {
        $this->houseNumber = $houseNumber;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->municipality = $municipality;
        $this->zip = $zip;
        $this->province = $province;
        $this->street = $street;
        $this->town = $town;
        $this->x = $x;
        $this->y = $y;
    }

    public static function fromJsonObject($object)
    {
        if ($object->success) {
            $address = $object->resource;
            return new static(
                $address->house_number,
                $address->latitude,
                $address->longitude,
                $address->municipality,
                $address->postcode,
                $address->province,
                $address->street,
                $address->town,
                $address->x,
                $address->y
            );
        }

        throw new UnsuccessfulRequestException;
    }

    public function toJson()
    {
        return json_encode($this);
    }
}
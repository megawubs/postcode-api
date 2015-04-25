<?php
use Wubs\Postcode\Address;
use Wubs\Postcode\ZipApiApi;
use Wubs\Zip\Zip;
use Wubs\Zip\ZipApi;

/**
 * Created by PhpStorm.
 * User: bwubs
 * Date: 17/04/15
 * Time: 10:30
 */
class HowItShouldWorkTest extends PHPUnit_Framework_TestCase
{

    public function testWorkings()
    {

        $postcodeApi = new ZipApi(getenv("API_KEY"));
        $addressData = $postcodeApi->address("8017KM", "20");

        $this->assertInstanceOf("Wubs\\Zip\\Address", $addressData);
        $this->assertObjectHasAttribute("street", $addressData);
        $this->assertObjectHasAttribute("latitude", $addressData);
        $this->assertObjectHasAttribute("longitude", $addressData);
        $this->assertEquals("Overijssel", $addressData->province);
        $this->assertEquals("20", $addressData->houseNumber);
    }
}

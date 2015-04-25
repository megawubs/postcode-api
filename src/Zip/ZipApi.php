<?php namespace Wubs\Zip;

use GuzzleHttp\Client;
use Wubs\Zip\Contracts\ZipApi as ZipApiInterface;

/**
 * Created by PhpStorm.
 * User: bwubs
 * Date: 17/04/15
 * Time: 11:21
 */
class ZipApi implements ZipApiInterface
{
    private $baseUrl = "http://api.postcodeapi.nu";

    private $key;

    public function __construct($key)
    {
        $this->client = new Client();
        $this->key = $key;
    }

    /**
     * @param $postcode
     * @param $number
     * @return Address
     * @throws Exception\UnsuccessfulRequestException
     */
    public function address($postcode, $number)
    {
        $result = $this->client->get(
            $this->baseUrl . "/" . $postcode . "/" . $number,
            [
                "headers" => [
                    "Content-Type" => "application/x-www-form-urlencoded; charset=UTF-8",
                    "Accept-Language" => "en",
                    "Api-Key" => $this->key
                ]
            ]
        );
        $address = $result->json(['object' => true]);

        return Address::fromJsonObject($address);
    }


}
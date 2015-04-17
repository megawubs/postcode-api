Postcode API
==========

## Example

```PHP
<?php
    $address = new Zip("1234AA", 11);
    $postcodeApi = new ZipApi("API_KEY");
    $address = $postcodeApi->address($address);
```



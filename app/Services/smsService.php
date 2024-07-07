<?php

namespace App\Services;

use GuzzleHttp\Client;

class smsService{

    protected $apiUrl;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->client = new Client();
    }


}


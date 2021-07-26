<?php

namespace Hyhy\support;
use GuzzleHttp\Client;

class HttpClient extends Client
{
    public function __construct(array $config = [])
    {
        if (!isset($config['http_errors'])) {
            $config['http_errors'] = false;
        }
        if (!isset($config['verify'])) {
            $config['verify'] = false;
        }
        if (!isset($config['timeout'])) {
            $config['timeout'] = 29;
        }

        parent::__construct($config);
    }
}
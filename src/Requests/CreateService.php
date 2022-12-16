<?php

namespace Nacos\Requests;

class CreateService extends BaseRequest
{
    protected $uri = '/nacos/v1/ns/service';

    protected $method = 'POST';

    protected $params = [
        'serviceName' => 1,
        'groupName' => 0,
        'namespaceId' => 0,
        'protectThreshold' => 0,
        'metadata' => 0,
        'selector' => 0,
    ];
}

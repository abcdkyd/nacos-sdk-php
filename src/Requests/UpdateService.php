<?php

namespace Nacos\Requests;

class UpdateService extends BaseRequest
{
    protected $uri = '/nacos/v1/ns/service';

    protected $method = 'PUT';

    protected $params = [
        'serviceName' => 1,
        'groupName' => 0,
        'namespaceId' => 0,
        'protectThreshold' => 0,
        'metadata' => 0,
        'selector' => 0,
    ];
}

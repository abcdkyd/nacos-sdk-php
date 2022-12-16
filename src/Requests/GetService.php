<?php

namespace Nacos\Requests;

class GetService extends BaseRequest
{
    protected $uri = '/nacos/v1/ns/service';

    protected $method = 'GET';

    protected $params = [
        'serviceName' => 1,
        'groupName' => 0,
        'namespaceId' => 0,
    ];
}

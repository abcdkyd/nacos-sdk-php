<?php

namespace Nacos\Requests;

class GetInstanceList extends BaseRequest
{
    protected $uri = '/nacos/v1/ns/instance/list';

    protected $method = 'GET';

    protected $params = [
        'serviceName' => 1,
        'groupName' => 0,
        'namespaceId' => 0,
        'clusters' => 0,
        'healthyOnly' => 0,
    ];
}

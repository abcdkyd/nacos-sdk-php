<?php

namespace Nacos\Requests;

class DeleteService
{
    protected $uri = '/nacos/v1/ns/service';

    protected $method = 'DELETE';

    protected $params = [
        'serviceName' => 1,
        'groupName' => 0,
        'namespaceId' => 0,
    ];
}

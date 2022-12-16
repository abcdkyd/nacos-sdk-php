<?php

namespace Nacos\Requests;

class GetServiceList extends BaseRequest
{
    protected $uri = '/nacos/v1/ns/service/list';

    protected $method = 'GET';

    protected $params = [
        'pageNo' => 1,
        'pageSize' => 1,
        'groupName' => 0,
        'namespaceId' => 0,
    ];
}

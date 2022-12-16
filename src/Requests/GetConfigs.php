<?php

namespace Nacos\Requests;

class GetConfigs extends BaseRequest
{
    protected $uri = '/nacos/v1/cs/configs';

    protected $method = 'GET';

    protected $params = [
        'tenant' => 0,
        'dataId' => 1,
        'group' => 1,
    ];
}

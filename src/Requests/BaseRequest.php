<?php

namespace Nacos\Requests;

class BaseRequest
{
    protected $uri = '';

    protected $method = '';

    protected $headers = [];

    protected $params = [];

    public function getUri()
    {
        return $this->uri;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getParams()
    {
        return $this->params;
    }
}

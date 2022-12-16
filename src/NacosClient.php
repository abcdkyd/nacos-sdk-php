<?php

namespace Nacos;

use GuzzleHttp\Client;
use Nacos\Utils\LoadBalanceSelector;

class NacosClient
{
    protected $host;

    public function __construct(string $host)
    {
        $this->host = $host;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function __call($name, $arguments)
    {
        $request = new NacosRequest($this, $name, $arguments[0]);
        return $request->dispatch();
    }

    public function selectServiceInstance(
        $serviceName,
        $namespaceId = '',
        $selector = 'random',
        $healthyOnly = true,
        $groupName = 'DEFAULT_GROUP',
        $clusters = ''
    ) {
        $instanceList = json_decode($this->getInstanceList([
            'serviceName' => $serviceName,
            'groupName' => $groupName,
            'namespaceId' => $namespaceId,
            'clusters' => $clusters,
            'healthyOnly' => $healthyOnly,
        ]), true);

        if (!$instanceList) {
            return [];
        }

        $hosts = $instanceList['hosts'];

        if (count($hosts) == 0) {
            throw new \Exception("service {$serviceName} is not active");
        }

        if (count($hosts) == 1) {
            return $hosts[0];
        }

        $balance = new LoadBalanceSelector();
        return $balance->select($hosts, $selector);
    }
}

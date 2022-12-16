<?php

namespace Nacos;

use GuzzleHttp\Client;
use Nacos\Requests\BaseRequest;

class NacosRequest
{
    private static $nacos;

    private $request;

    private $arguments;

    public function __construct(NacosClient $nacos, $request, $arguments)
    {
        self::$nacos = $nacos;
        $this->request = $request;
        $this->arguments = $arguments;
    }

    public static function getHttpClient()
    {
        static $httpClient;
        if (!$httpClient || $httpClient instanceof Client) {
            $httpClient = new Client([
                'base_uri' => self::$nacos->getHost(),
            ]);
        }
        return $httpClient;
    }

    public function dispatch()
    {
        $httpClient = self::getHttpClient();

        $requestArgument = $this->getRequestArgument();

        $response = $httpClient->request(...$requestArgument);
        return $response->getBody()->getContents();

    }

    private function getRequestArgument()
    {
        $request = $this->getRequest();

        $method = strtoupper($request->getMethod());
        $uri = $request->getUri();
        $headers = $request->getHeaders();
        $params = $request->getParams();

        $options = [
            'headers' => $headers,
        ];

        $arguments = [];
        $params_keys = array_keys($params);
        foreach ($this->arguments as $aKey => $aValue) {
            if (in_array($aKey, $params_keys)) {
                $arguments[$aKey] = $aValue;
            }
        }

        foreach ($params as $pKey => $pValue) {
            if ($pValue == 1 && !isset($arguments[$pKey])) {
                throw new \Exception("argument {$pKey} is required");
            }
        }

        if ($method == "GET") {
            $options['query'] = $arguments;
        } else {
            $options['form_params'] = $arguments;
        }

        return [$method, $uri, $options];
    }

    private function getRequest()
    {
        $className = ucwords($this->request);
        $class = __NAMESPACE__ . '\\Requests\\' . $className;
        return $this->makeClass($class, $this->arguments);
    }

    private function makeClass($class, $classParams)
    {
        $ref = new \ReflectionClass($class);

        if (!$ref->isInstantiable()) {
            throw new \Exception("class {$class} not exist");
        }

        $constructor = $ref->getConstructor();
        if (is_null($constructor)) return new $class;

        $params = $constructor->getParameters();
        $resolveParams = [];
        foreach ($params as $key => $val) {
            $name = $val->getName();
            if (isset($classParams[$name])) {
                $resolveParams[] = $classParams[$name];
            } else {
                $default = $val->isDefaultValueAvailable() ? $val->getDefaultValue() : null;
                if (is_null($default)) {
                    if ($val->getClass()) {
                        $paramsClass = $val->getClass()->getName();
                        $resolveParams[] = $this->makeClass($paramsClass, $classParams);
                    } else {
                        throw new \Exception("params {$name} require default");
                    }
                } else {
                    $resolveParams[] = $default;
                }
            }
        }
        return $ref->newInstanceArgs($resolveParams);
    }
}

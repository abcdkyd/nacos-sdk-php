<?php

namespace Nacos\Utils;

class LoadBalanceSelector
{
    private $supportSelector = ['random', 'weighted', 'round'];

    public function select($instances, $selector)
    {
        $selector = strtolower($selector);

        if (!in_array($selector, $this->supportSelector)) {
            $selector = 'random';
        }

        $method = $selector . 'Select';
        return $this->$method($instances);
    }

    protected function randomSelect($instances)
    {
        return $instances[array_rand($instances)];
    }

    protected function weightedSelect($instances)
    {

    }

    protected function roundSelect($instances)
    {

    }
}

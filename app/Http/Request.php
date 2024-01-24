<?php

namespace App\Http;

class Request
{
    protected $segments = [];
    protected $controller;
    protected $method;

    public function __construct()
    {
        $this->segments = explode('/', $_SERVER['REQUEST_URI']);
        $this->setController();
        $this->setMethod();
    }

    public function setController()
    {
        $this->controller = ucfirst($this->segments[1] ?? 'home');
    }

    public function setMethod()
    {
        $this->method = $this->segments[2] ?? 'index';
        $this->method = explode('?', $this->method)[0];
    }

    public function getController()
    {
        return "App\Http\Controllers\\{$this->controller}Controller";
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function send()
    {
        $controller = $this->getController();
        $method = $this->getMethod();
        $response = call_user_func([new $controller, $method]);
        $response->send();
    }
}

<?php

namespace App\Http;

class Response
{
  protected $view;  // it only return a view;
  protected $data = []; //it could return a json, pdf, array
  public function __construct($data)
  {
    $this->data = empty($data[0]['data']) ? [] : $data[0]['data'];
    $this->view = $data[0]['view'] ?? null;
  }

  public function getView()
  {
    return $this->view;
  }

  public function getData()
  {
    return $this->data;
  }

  public function send()
  {
    $view = $this->getView();
    $data = $this->getData();
    ob_start();
    require viewPath($view, $data);
    $content = ob_get_clean(); // Get the buffered content and clean the buffer
    require viewPath('layout', ['content' => $content]);
  }
}

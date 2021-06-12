<?php
namespace Lesikom\Model;

use Lesikom\Core\View;

class BerandaPMB
{

private $view;

public function __construct()
{
    
}

protected function setupView($viewName)
{
  $this->view = new View('public', 'pmb-online', '', $viewName);
  return $this;
}
}
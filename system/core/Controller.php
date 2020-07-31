<?php

include 'View.php';

abstract class Controller
{
  private $view;

  public function __construct()
  {
    echo __CLASS__ . ' instanciado';
  }


  /**
   * Inicializa la vista
   */
  public function render($controller_name = '', $params = array())
  {
    $this->view = new View($controller_name, $params);
  }

  abstract public function exec($param);
}
<?php

abstract class Fighter
{
  public $classes;
  private $_class;

  abstract function fight($target);

  private function class_exists($class)
  {
    if (isset($this->classes)) {
      foreach ($this->classes as $elem) {
        if ($elem == $class)
          return True;
      }
    }
    return False;
  }

  function __construct($class)
  {
    if (!$this->class_exists($this->classes))
      $this->classes[] = $class;
    $this->_class = $class;
    return ;
  }

  function __toString() {
    return $this->_class;
  }
}

?>

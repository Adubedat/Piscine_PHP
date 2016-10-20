<?php
  class UnholyFactory
  {
    public $classes;

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
    private function is_fighter($class)
    {
      if (method_exists($class, "__construct"))
        return True;
      else
        return False;
    }

    private function create_recrue($recrue)
    {
      if (isset($this->classes))
      {
        foreach ($this->classes as $elem)
        {
          if ($elem == $recrue)
            return $elem;
        }
      }
    }
    function absorb($class)
    {
      if ($this->is_fighter($class))
      {
        if (!$this->class_exists($class)) {
          $this->classes[] = $class;
          echo "(Factory absorbed a fighter of type " . $class . ")" . PHP_EOL;
        }
        else
          echo "(Factory already absorbed a fighter of type " . $class . ")" . PHP_EOL;
      }
      else
        echo "(Factory can't absorb this, it's not a fighter)" . PHP_EOL;
    }

    function fabricate($recrue)
    {
      if ($this->class_exists($recrue)) {
        echo "(Factory fabricates a fighter of type " . $recrue . ")" . PHP_EOL;
      }
      else {
        echo "(Factory hasn't absorbed any fighter of type " . $recrue . ")" . PHP_EOL;
      }
      return ($this->create_recrue($recrue));
    }

    function fight($target)
    {
      return;
    }
  }
?>

<?php
  class Tyrion extends Lannister
  {
    public $name = "Tyrion";

    function sleepWith($person)
    {
      if (isset($person->name) || method_exists($person, "family"))
        echo "Not even if I'm drunk !\n";
      else
        echo "Let's do this.\n";
      return;
    }
  }
?>

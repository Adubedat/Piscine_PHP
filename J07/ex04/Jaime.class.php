<?php
  class Jaime extends Lannister
  {
    public $name = "Jaime";

    function sleepWith($person)
    {
      if (isset($person->name))
        echo "Not even if I'm drunk !\n";
      else if (method_exists($person, "family"))
        echo "With pleasure, but only in a tower in Winterfell, then.\n";
      else
        echo "Let's do this.\n";
      return;
    }
  }
?>

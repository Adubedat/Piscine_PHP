<?php
  class NightsWatch
  {
    private $tab;

    public function recruit($name)
    {
      if (method_exists($name, "fight"))
        $this->tab[] = $name;
      return;
    }

    public function fight()
    {
      foreach ($this->tab as $elem)
        $elem->fight();
      return;
    }
  }
?>

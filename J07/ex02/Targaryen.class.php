<?php

class Targaryen
{
  function getBurned()
  {
    if (method_exists($this, "resistsFire") && $this::resistsFire() == True)
      return "emerges naked but unharmed";
    else
      return "burns alive";
  }
}
?>

<?php
class Color
{
  public  $tab;
  private $red;
  private $green;
  private $blue;
  public static $verbose = False;

  static function doc()
  {
    echo "<- Color ----------------------------------------------------------------------\n";
    echo file_get_contents("Color.doc.txt");
    echo "---------------------------------------------------------------------- Color ->\n";
  }

  function __construct($tab)
  {
    if (array_key_exists('rgb', $tab))
    {
      $this->blue = $tab['rgb'] >> 16 & 0x0000FF;
      $this->green = $tab['rgb'] >> 8 & 0x0000FF;
      $this->red = $tab['rgb'] & 0x0000FF;
    }
    else if (array_key_exists('red', $tab) && array_key_exists('blue', $tab) && array_key_exists('green', $tab))
    {
      $this->red = $tab['red'];
      $this->blue = $tab['blue'];
      $this->green = $tab['green'];
    }
    else {
      echo "Wrong parameters.\n";
    }
    if (self::$verbose)
      echo "Color( red: $this->red, green: $this->green, blue: $this->blue ) constructed.\n";
    return;
  }

  function add($old)
  {
    return (new Color (array('red' => $this->red + $old->red, 'green' => $this->green + $old->green, 'blue' => $this->blue + $old->blue)));
  }

  function sub($old)
  {
    return (new Color (array('red' => $this->red - $old->red, 'green' => $this->green - $old->green, 'blue' => $this->blue - $old->blue)));
  }

  function mult($f)
  {
    return (new Color (array('red' => $this->red * $f, 'green' => $this->green * $f, 'blue' => $this->blue * $f)));
  }

  function __toString()
  {
    return("Color( red: $this->red, green: $this->green, blue: $this->blue )");
  }

  function __destruct()
  {
    if (self::$verbose)
      echo "Color( red: $this->red, green: $this->green, blue: $this->blue ) destructed.\n";
    return;
  }
}
?>

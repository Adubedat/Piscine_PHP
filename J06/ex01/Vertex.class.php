<?php
include_once("../ex00/Color.class.php");

class Vertex
{
  private $_x;
  private $_y;
  private $_z;
  private $_w;
  private $_color;
  public static $verbose = False;

  static function doc()
  {
    echo "<- Vertex ----------------------------------------------------------------------\nYour documentation here.\n---------------------------------------------------------------------- Vertex ->\n";
  }
  function setX($x)
  {
    $this->_x = $x;
    return;
  }

  function getX()
  {
    return($this->_x);
  }

  function setY($y)
  {
    $this->_y = $y;
    return;
  }

  function getY()
  {
    return($this->_y);
  }

  function setZ($z)
  {
    $this->_z = $z;
    return;
  }

  function getZ()
  {
    return($this->_z);
  }

  function setW($w)
  {
    $this->_w = $w;
    return;
  }

  function getw()
  {
    return($this->_w);
  }

  function setColor($color)
  {
    $this->_color = $color;
    return;
  }

  function getColor()
  {
    return($this->_color);
  }

  function __toString()
  {
    if (self::$verbose)
      return ("Vertex: ( x: $this->_x, y: $this->_y, z:$this->_z, w:$this->_w, $this->_color )");
    else
      return ("Vertex: ( x: $this->_x, y: $this->_y, z:$this->_z, w:$this->_w )");
  }

  function __construct( $tab )
  {
    $this->_w = number_format(1.00, 2);
    $this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
    if (!array_key_exists('x', $tab) || !array_key_exists('y', $tab) || !array_key_exists('z', $tab))
    {
      echo "Wrong parameters\n";
      return;
    }
    $this->_x = number_format($tab['x'], 2);
    $this->_y = number_format($tab['y'], 2);
    $this->_z = number_format($tab['z'], 2);
    if (array_key_exists('w', $tab))
      $this->_w = number_format($tab['w'], 2);
    if (array_key_exists('color', $tab))
      $this->_color = $tab['color'];
    if (self::$verbose)
    {
      echo "Vertex: ( x: $this->_x, y: $this->_y,z: $this->_z, w:$this->_w, $this->_color ) constructed.\n";
    }
  }
  function __destruct()
  {
    if (self::$verbose)
      echo "Vertex: ( x: $this->_x, y: $this->_y,z: $this->_z, w:$this->_w, $this->_color ) destructed.\n";
  }
}
?>

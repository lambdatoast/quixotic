<?php

class BasicsTest extends \PHPUnit_Framework_TestCase
{
    public function testIdentity()
    {
      $x = 42;
      $this->assertTrue(
        $x === Basics::id($x),
        'Identity is a no-op'
      );
    }

    public function testCurrying() {
      $f = function ($x, $y) {
        return $x + $y;
      };
      $g = Basics::curry2($f);
      $h = $g(21);

      $this->assertEquals(
        $h(21),
        $f(21, 21),
        'Basics::curry2'
      );

      $f2 = function ($x, $y, $z) {
        return $x + $y + $z;
      };
      $g2 = Basics::curry3($f2);
      $h2 = $g2(21);
      $i2 = $h2(21);

      $this->assertEquals(
        $i2(21),
        $f2(21, 21, 21),
        'Basics::curry3'
      );
    }
}



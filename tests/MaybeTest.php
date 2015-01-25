<?php

class MaybeTest extends \PHPUnit_Framework_TestCase
{
    public function testFunctorLaws()
    {
      $x = new Some(42);
      $f = function ($n) {
        return $n + 1;
      };
      $g = function ($n) {
        return $n + 2;
      };
      $composed_maps = Basics::compose(
        function ($x) use ($f) { return $x->map($f); },
        function ($x) use ($g) { return $x->map($g); }
      );
      $this->assertTrue(
        $x->map(array('Basics', 'id'))->equal(Basics::id($x)),
        'First functor law: Mapping id is a no-op.'
      );
      $this->assertTrue(
        $x->map(Basics::compose($f, $g))->equal($composed_maps($x)),
        'Second functor law: Mapping a composed function is the same as mapping each function.'
      );
    }
}


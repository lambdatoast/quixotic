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

    public function testEqual() {
      $this->assertTrue(
        (new None)->equal(new None),
        'Maybe Equality: Nones are equal.'
      );

      $this->assertFalse(
        (new None)->equal(new Some(42)),
        'Maybe Equality: Nones and Somes cannot be equal.'
      );

      $this->assertTrue(
        (new Some(42))->equal(new Some(42)),
        'Maybe Equality: Somes of same value are equal.'
      );

      $this->assertFalse(
        (new Some(41))->equal(new Some(42)),
        'Maybe Equality: Somes of different value cannot be equal.'
      );

    }

    public function testAlternative() {
      $this->assertEquals(
        new Some(42),
        (new None)->or_(new Some(42)),
        'Maybe Alternative: None OR Some(v) = Some(v)'
      );

      $this->assertEquals(
        new Some(42),
        (new Some(42))->or_(new None),
        'Maybe Alternative: Some(v) OR None = Some(v)'
      );

      $this->assertEquals(
        new None,
        (new None)->or_(new None),
        'Maybe Alternative: None OR None = None'
      );
    }

}

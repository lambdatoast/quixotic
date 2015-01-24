<?php

abstract class Applicative extends Functor {

  // Minimal complete definition of an Applicative Functor.
  // All other functions are built in terms of `of`, `map`, and `ap`.

  /**
   * Lift a value into an Applicative.
   */
  abstract static public function of($x);

  /**
   * Sequential application.
   * @param Applicative $f An Applicative of a function from `A` to `B`
   * @return Applicative An Applicative of `B`
   */
  abstract public function ap(Applicative $f);

  // Utilities (note these are implemented in terms of abstract functions)

  /**
   * Sequence two actions, discarding the first one.
   * @param  Applicative $a
   * @param  Applicative $b
   * @return Applicative
   */
  public function chooseR(Applicative $b) {
    return Applicative::liftA2(function ($a, $b) {
      return $b;
    }, $this, $b);
  }

  /**
   * Sequence two actions, discarding the second one.
   * @param  Applicative $a
   * @param  Applicative $b
   * @return Applicative
   */
  public function chooseL(Applicative $b) {
    return Applicative::liftA2(array('Basics', 'constant'), $this, $b);
  }

  static public function liftA2(callable $f, Applicative $a, Applicative $b) {
    // Haskell implementation: `f <$> a <*> b`
    return $a->map(Basics::curry2($f))->ap($b);
  }

  static public function liftA3(callable $f, Applicative $a, Applicative $b, Applicative $c) {
    // Haskell implementation: `f <$> a <*> b <*> c`
    return $a->map(Basics::curry3($f))
             ->ap($b)
             ->ap($c);
  }
}

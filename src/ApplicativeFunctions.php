<?php

class ApplicativeFunctions {

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

  /**
   * Sequence two actions, discarding the first one.
   * @param  Applicative $a
   * @param  Applicative $b
   * @return Applicative
   */
  public function chooseR(Applicative $a, Applicative $b) {
    return ApplicativeFunctions::liftA2(function ($a, $b) {
      return $b;
    }, $a, $b);
  }

  /**
   * Sequence two actions, discarding the second one.
   * @param  Applicative $a
   * @param  Applicative $b
   * @return Applicative
   */
  public function chooseL(Applicative $a, Applicative $b) {
    return ApplicativeFunctions::liftA2(array('Basics', 'constant'), $a, $b);
  }


}

<?php

abstract class Applicative extends Functor {

  // Minimal complete definition of an Applicative Functor.
  // All other functions are built in terms of `of`, `map`, and `ap`.

  abstract static public function of($x);
  abstract public function ap(Applicative $f);

  // Utilities (note these are implemented in terms of abstract functions)

  static public function liftA2(callable $f, Applicative $a, Applicative $b) {
    // Haskell implementation: `f <$> a <*> b`
    return $a->map(Curry::curry2($f))->ap($b);

  }
  static public function liftA3(callable $f, Applicative $a, Applicative $b, Applicative $c) {
    // Haskell implementation: `f <$> a <*> b <*> c`
    return $a->map(Curry::curry3($f))
             ->ap($b)
             ->ap($c);
  }
}



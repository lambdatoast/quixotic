<?php

abstract class Applicative extends Functor {

  // Minimal complete definition of an Applicative Functor.
  // All other functions are built in terms of `of`, `map`, and `ap`.

  abstract static public function of($x);
  abstract public function ap(Applicative $f);

  // Utilities (note these are implemented in terms of abstract functions)

  static public function liftA2(callable $f, Applicative $a, Applicative $b) {
    // Haskell implementation: `f <$> a <*> b`
    return $a->map(function ($x) use ($f) {
      return function ($y) use ($f, $x) {
        return $f($x, $y);
      };
    })->ap($b);
  }
  static public function liftA3(callable $f, Applicative $a, Applicative $b, Applicative $c) {
    // Haskell implementation: `f <$> a <*> b <*> c`
    return $a->map(function ($x) use ($f) {
      return function ($y) use ($f, $x) {
        return function ($z) use ($f, $x, $y) {
          return $f($x, $y, $z);
        };
      };
    })->ap($b)->ap($c);
  }
}



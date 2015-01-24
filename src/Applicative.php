<?php

interface Applicative extends Functor {

  // Minimal complete definition of an Applicative Functor.
  // All other functions are built in terms of `of`, `map`, and `ap`.

  /**
   * Lift a value into an Applicative.
   */
  static public function of($x);

  /**
   * Sequential application.
   * @param Applicative $f An Applicative of a function from `A` to `B`
   * @return Applicative An Applicative of `B`
   */
  public function ap(Applicative $f);

}

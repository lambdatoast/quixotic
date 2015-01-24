<?php

interface Monad extends Applicative {

  /**
   * Chain an action to this one, passing it this one's resulting value.
   * @param callable
   * @return Monad
   */
  public function chain(callable $f);

}

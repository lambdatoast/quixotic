<?php

abstract class Monad extends Applicative {

  /**
   * Chain an action to this one, passing it this one's resulting value.
   * @param callable
   * @return Monad
   */
  abstract public function chain(callable $f);

}

<?php

interface Chain {

  /**
   * Lifts a function that takes the result of whatever `this` action is
   * and produces a new value that is already in a functor context.
   * This is the operation that a Monad introduces to functorial design.
   * @param callable $f An `A -> F[B]` function.
   * @return value Whatever the result of $f is.
   */
  public function chain(callable $f);

}


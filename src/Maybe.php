<?php

abstract class Maybe implements Alternative, Monad, Equal {

  use ApplicativeSyntax;

  public static final function of($x) {
    return new Some($x);
  }

  public static final function fromNullable($x) {
    return is_null($x) ? new None : new Some($x);
  }

  abstract public function fold(callable $none, callable $some);

  public function or_(Alternative $b) {
    return $this->fold(
      Basics::constant($b),
      Basics::constant($this)
    );
  }

}

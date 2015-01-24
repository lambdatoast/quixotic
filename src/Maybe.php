<?php

abstract class Maybe extends Applicative implements Alternative {

  public static final function of($x) {
    return new Some($x);
  }

  public static final function fromNullable($x) {
    return is_null($x) ? new None : new Some($x);
  }

  abstract public function isSome();

  abstract public function isNone();

  public function or_(Alternative $b) {
    return $this->isSome() ? $this
                           : $b;
  }

}

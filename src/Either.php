<?php

abstract class Either implements Alternative, Monad {

  use ApplicativeSyntax;

  public static final function of($x) {
    return new Right($x);
  }

  public static final function fromNullable($x) {
    return is_null($x) ? new Left("Null found") : new Right($x);
  }

  abstract public function isLeft();

  abstract public function isRight();

  public function or_(Alternative $b) {
    return $this->isRight() ? $this
                            : $b;
  }

}


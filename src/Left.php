<?php

final class Left extends Either {

  private $value;

  function __construct($value) {
    $this->value = $value;
  }

  public function isLeft() {
    return true;
  }

  public function isRight() {
    return false;
  }

  // Functor instance implementation

  public function map(callable $f) {
    return $this;
  }

  // Applicative instance implementation

  public function ap(Applicative $x) {
    return $this;
  }

  // Monad instance implementation

  public function chain(callable $f) {
    return $this;
  }

}


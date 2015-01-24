<?php

final class Right extends Either {
  private $value;

  function __construct($value) {
    $this->value = $value;
  }

  public function isLeft() {
    return false;
  }

  public function isRight() {
    return true;
  }

  // Functor instance implementation

  public function map(callable $f) {
    return new Right($f($this->value));
  }

  // Applicative instance implementation

  public function ap(Applicative $x) {
    return $x->map($this->value);
  }

  // Monad instance implementation

  public function chain(callable $f) {
    return $f($this->value);
  }

}




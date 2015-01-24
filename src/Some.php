<?php

final class Some extends Maybe {
  private $value;

  function __construct($value) {
    $this->value = $value;
  }

  public function isSome() {
    return true;
  }

  public function isNone() {
    return false;
  }

  // Functor instance implementation

  public function map(callable $f) {
    return new Some($f($this->value));
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



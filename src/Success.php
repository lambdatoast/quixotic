<?php

final class Success extends Validation {
  private $value;

  function __construct($value) {
    $this->value = $value;
  }

  final function isSuccess() {
    return true;
  }

  final function isFailure() {
    return false;
  }

  public function map(callable $f) {
    return Validation::of($f($this->value));
  }

  public function ap(Applicative $x) {
    return $x->isFailure() ? $x : $x->map($this->value);
  }
}



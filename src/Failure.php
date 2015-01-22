<?php

final class Failure extends Validation {
  private $value;

  function __construct($value) {
    $this->value = $value;
  }

  final function isSuccess() {
    return false;
  }

  final function isFailure() {
    return true;
  }

  public function map(callable $f) {
    return $this;
  }

  public function ap(Applicative $x) {
    return $x->isFailure() ? new Failure(array_merge($this->value, $x->value))
                           : $this;
  }
}



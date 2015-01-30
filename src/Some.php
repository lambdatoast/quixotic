<?php

final class Some extends Maybe {
  private $value;

  function __construct($value) {
    $this->value = $value;
  }

  public function fold(callable $_, callable $some) {
    return $some($this->value);
  }

  // Equal instance implementation

  public function equal($y) {
    return $y->fold(
      Basics::constant(false),
      function ($v) { return $v === $this->value; }
    );
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

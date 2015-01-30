<?php

final class None extends Maybe {

  public function fold(callable $none, callable $_) {
    return $none();
  }

  // Equal instance implementation

  public function equal($y) {
    return $y->fold(
      Basics::constant(true),
      Basics::constant(false)
    );
  }

  // Functor instance implementation

  public function map(callable $f) {
    return $this;
  }

  // Applicative instance implementation

  public function ap(Applicative $x) {
    return new None;
  }

  // Monad instance implementation

  public function chain(callable $f) {
    return new None;
  }

}

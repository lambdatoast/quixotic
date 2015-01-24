<?php

final class None extends Maybe {

  public function isSome() {
    return false;
  }

  public function isNone() {
    return true;
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

<?php

final class None extends Maybe {
  public function map(callable $f) {
    return $this;
  }

  public function ap(Applicative $x) {
    return new None;
  }
}

<?php

trait ApplicativeSyntax {

  public function chooseR(Applicative $b) {
    return ApplicativeFunctions::liftA2(function ($a, $b) {
      return $b;
    }, $this, $b);
  }

  public function chooseL(Applicative $b) {
    return ApplicativeFunctions::liftA2(array('Basics', 'constant'), $this, $b);
  }

}

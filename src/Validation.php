<?php

abstract class Validation implements Applicative, Alternative {

  use ApplicativeSyntax;

  public static final function of($x) {
    return new Success($x);
  }

  public static final function fromNullable($x) {
    return is_null($x) ? new Failure($x) : new Success($x);
  }

  abstract protected function isSuccess();

  abstract protected function isFailure();

  public function or_(Alternative $b) {
    return $this->isSuccess() ? $this
                              : $b;
  }

}


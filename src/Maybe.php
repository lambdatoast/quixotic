<?php

//include 'Applicative.php';

abstract class Maybe extends Applicative {
  public static final function of($x) {
    return new Some($x);
  }
  public static final function fromNullable($x) {
    return is_null($x) ? new None : new Some($x);
  }
}

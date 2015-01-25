<?php

interface Functor {

  /**
   * Structure preserving transformation.
   * @param callable
   * @return Functor
   */
  public function map(callable $f);

}


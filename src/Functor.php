<?php

interface Functor {

  /**
   * @param callable
   * @return Functor
   */
  public function map(callable $f);

}


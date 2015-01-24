<?php

interface Alternative {

  /**
   * An associative binary operation.
   * @param Alternative $b
   * @return Alternative
   */
  public function or_(Alternative $b);

}

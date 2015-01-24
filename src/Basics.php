<?php

class Basics {

  static function id($a) {
    return $a;
  }

  static function constant($a, $b) {
    return $a;
  }

  static function curry2(callable $f) {
    return function ($a) use ($f) { 
      return function ($b) use ($f, $a) { 
        return $f($a, $b); 
      }; 
    };
  }

  static function curry3(callable $f) {
    return function ($a) use ($f) { 
      return function ($b) use ($f, $a) { 
        return function ($c) use ($f, $a, $b) { 
          return $f($a, $b, $c); 
        };
      }; 
    };
  }

}


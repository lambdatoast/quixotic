<?php

function __autoload($class_name) {
  include "../src/{$class_name}.php";
}

// Tests

class User {
  var $name;
  var $age;
  function __construct($name, $age) {
    $this->name = $name;
    $this->age = $age;
  }
}

function program($uid) {

  function load_user($x) { 
    return $x == 42 ? new Some(new User('Ford Prefect', 87)) : new None;
  }

  function user_name(User $u) { 
    return $u->name;
  }

  function add($a, $b) { 
    return $a + $b;
  }

  function add3($a, $b, $c) { 
    return $a + $b + $c;
  }

  function twice($x) { 
    return $x + $x;
  }

  function name_long_enough($name) {
    return strlen($name) > 5 ? new Success($name)
                             : new Failure(array('User name must be longer than 5 characters. '));
  }

  function age_old_enough($age) {
    return $age >= 18 ? new Success($age)
                      : new Failure(array('User must be 18 or older. '));
  }

  function validate_user_data($raw_name, $raw_age) {
    return (new Success(function ($name) { return function ($age) use ($name) { return new User($name, $age); }; }))
             ->ap(name_long_enough($raw_name))
             ->ap(age_old_enough($raw_age));
  }

  $bad_user = new User('Darth Vader', 8);

  $test_results = array(
    // Process user, if loaded at all
    load_user($uid)->map(user_name)
                   ->map(strtoupper),

    // Same as above, but using `ap` (this equivalence is a mathematical law)
    Maybe::of(strtoupper)->ap(
      Maybe::of(user_name)->ap(load_user($uid))
    ),

    // "Lift" a plain old binary function (i.e. doesn't know anything about Maybe. simply expects two numbers), to work on two Maybe numbers.
    Applicative::liftA2(add, Maybe::of(5), Maybe::of(9)),
    Applicative::liftA2(add, new None, Maybe::of(9)),
    Applicative::liftA2(add, Maybe::of(5), new None),

    // Same as above, but a ternary function
    Applicative::liftA3(add3, Maybe::of(5), Maybe::of(5), Maybe::of(5)),
    Applicative::liftA3(add3, Maybe::of(5)->map(twice), Maybe::of(5), Maybe::of(5)),

    // Applicative Validation in action
    validate_user_data("teresa", 18),
    validate_user_data("bob", 17),
  );

  return $test_results;

}

print_r(program(42));

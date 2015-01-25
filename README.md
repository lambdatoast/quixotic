# Quixotic

Functional and algebraic abstractions for PHP.

These abstractions are meant to help you design programs in a functional style, in which: 

1. Functions are proper, pure functions (as opposed to happy-go-lucky subroutines that cause side-effects and are a pain to test and/or reason about)
2. Effects are eventually achieved, and precisely controlled, by interpreting values that describe them.

## Getting Quixotic

If you're using Composer (which you should), you can get it by having something like this in 
your composer.json:

    {
        "repositories": [
            {
                "type": "vcs",
                "url": "https://github.com/lambdatoast/quixotic"
            }
        ],
        "require": {
            "lambdatoast/quixotic": "dev-master"
        }
    }

## Requirements

* PHP 5.4.x

For complete requirements see the composer.json.

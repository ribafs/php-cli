<?php

require 'Dump.php';

class FooBar
{
    private $inherited_int   = 123;
    private $inherited_array = ['string'];
}

class Bar extends FooBar
{
    private $inherited_float = 0.22;
    private $inherited_bool  = 1 == '1';
}

class Foo extends Bar
{
    private $string = 'string';
    protected $int  = 10;
    public $array   = [
        'foo' => 'bar'
    ];
    protected static $bool = false;
}

$string   = 'Foobar';
$array    = ['foo', 'bar'];
$resource = fopen('LICENSE', 'r');
$m        = microtime(true);

new Dump(new Foo, $string, $array, [
    'foo' => 'bar',
    'bar' => 'foo',
    [
        'foo' => 'foobar',
        'bar_foo',
        2 => 'foo',
        'foo' => [
            'barbar' => 55,
            'foofoo' => false,
            'foobar' => null,
        ]
    ]
], $resource);
/*
new Dump(1 == '1', 1 === '1');
Dump::safe(...$args); # running on terminal without color capabilities.
*/

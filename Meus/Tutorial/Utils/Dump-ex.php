<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'Dump.php';

class FooBar
{
    private $inherited_int = 123;
    private $inherited_bool = ['string'];
}

class Bar extends FooBar
{
    private $inherited_float = 0.22;
    private $inherited_bool = 1 == '1';
}

class Foo extends Bar
{
    private $string = 'string';
    protected $int = 10;
    public $array = [
        'foo'   => 'bar'
    ];
    protected static $bool = false;
}

$string   = 'Foobar';
$array    = ['foo', 'bar'];
$int      = 327626;
$double   = 22.223;
$null     = null;
$bool     = true;
$resource = fopen('LICENSE', 'r');
$m        = microtime(true);

new Dump(new Foo, $string, $array, $int, $double, $null, $bool, [
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

new Dump(1 == '1', 1 === '1');

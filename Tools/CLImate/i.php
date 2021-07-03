<?php

require_once('vendor/autoload.php');

$climate = new League\CLImate\CLImate;

$climate->to('error')->red('Something went terribly wrong.');

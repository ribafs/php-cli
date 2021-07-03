# $argc e $argv

array $argv - Array com os valores dos argumentos passados.
int $argc - Número de parâmetros passados: $argv[0] - nome do arquivo, $argv[1], $argv[2]... argumentos passados através do arquivo

$argc + $argv - Combinação poderoza que permite parsear os argumentos passados

$argv
Arguments passed to script as array

opt.php

#! /usr/local/bin/php
<?php
$options = getopt("f:");
print_r($options);
?>
$ opt.php -f a b c
Array
(
    [f] => a
)
$ opt.php -f 'a b c'
Array
(
    [f] => a b c
)
$ opt.php -f "a b c"
Array
(
    [f] => a b c
)
$ opt.php -f a\ b\ c
Array
(
    [f] => a b c
)

Includes script name!

$ php -r "var_export(\$argv);" foo bar

array(
    0 => 'Standard input code',
    1 => 'foo',
    2 => 'bar',
)


args.php
<?php
printf('Existem %d argumento(s) passados para o PHP:' . PHP_EOL, $argc);

args.php arg1 arg2 arg3

#!/usr/bin/php

printf("You called the program %s with %d arguments\n", $argv[0], $argc - 1);
unset($argv[0]);
foreach ($argv as $i => $arg) {
    printf("Argument %d is %s\n", $i, $arg);
}

Usando $_SERVER[]

#!/usr/bin/php -q
<?php
echo "Test Arguments:\n";
echo $_SERVER["argc"]."\n";
echo $_SERVER["argv"][0]."\n";
echo $_SERVER["argv"][1]."\n";

<?php
    // args.php
    printf('Existem %d argumento(s) passados para o PHP:' . PHP_EOL, $argc);
    print PHP_EOL.'Nome do arquivo - '.$argv[0].PHP_EOL;

    for($x=1;$x<=$argc;$x++){
        if(isset($argv[$x])) print 'Argumento '.$x.' - ' .$argv[$x].PHP_EOL;
    }

args.php arg1 arg2 arg3 arg4



#!/usr/bin/php
<?php
if($argc == 1){
    printf('Não foram passados argumentos:' . PHP_EOL, $argc);
    print 'Nome do Arquivo => '.$argv[0]."\n";
}elseif($argc=='2') {
    printf('Foram passados %d argumentos:' . PHP_EOL, $argc-1);
    print 'Nome do Arquivo => '.$argv[0]."\n";
    print 'Argumento 1 => '.$argv[1]."\n";
}elseif($argc=='3') {
    printf('Foram passados %d argumentos:' . PHP_EOL, $argc-1);
    print 'Nome do Arquivo => '.$argv[0]."\n";
    print 'Argumento 1 => '.$argv[1]."\n";
    print 'Argumento 2 => '.$argv[2]."\n";
}


 <?php 
   print('ARGC = ' . $argc .PHP_EOL);
   foreach ($argv as $k=>$v) {
     print("ARGV[$k] = $v\n");
   }

Variação

 <?php 
   print('ARGC = ' . $_SERVER['argc'] .PHP_EOL);
   foreach ($_SERVER['argv'] as $k => $v) {
     print("ARGV[$k] = $v\n");
   }




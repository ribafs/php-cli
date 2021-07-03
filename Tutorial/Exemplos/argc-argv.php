<?php
    // args.php
    printf('Existem %d argumento(s) passados para o PHP:' . PHP_EOL, $argc);
    print PHP_EOL.'Nome do arquivo - '.$argv[0].PHP_EOL;

    for($x=1;$x<=$argc;$x++){
        if(isset($argv[$x])) print 'Argumento '.$x.' - ' .$argv[$x].PHP_EOL;
    }

args.php arg1 arg2 arg3 arg4



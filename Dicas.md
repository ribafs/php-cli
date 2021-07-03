ini_set('display_errors', 1);
ini_set('log_errors', 0);
ini_set('html_errors', 0);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$ascii = "
            |  _ \(_) |__   __ _ _ __ ___   __ _ _ __  |  ___/ ___| 
            | |_) | | '_ \ / _` | '_ ` _ \ / _` | '__| | |_  \___ \ 
            |  _ <| | |_) | (_| | | | | | | (_| | |    |  _|  ___) |
            |_| \_\_|_.__/ \__,_|_| |_| |_|\__,_|_|    |_|   |____/ 

                    \_|_)                             | | 
                      |     __,   ,_    __,        _  | | 
                     _|    /  |  /  |  /  |  |  |_|/  |/  
                    (/\___/\_/|_/   |_/\_/|_/ \/  |__/|__/
                              Criado com figlet";

Checar sintaxe de script

PHP command-line interface (CLI) inclue uma opção (-l) para checar a sintaxe de um script

php -l example.php


Alinhamento de texto

Podemos usar o printf para isso

First case:

// fixed width
$mask = "|%5.5s |%-30.30s | x |\n";
printf($mask, 'Num', 'Title');
printf($mask, '1', 'A value that fits the cell');
printf($mask, '2', 'A too long value the end of which will be cut off');

The output is

|  Num |Title                          | x |
|    1 |A value that fits the cell     | x |
|    2 |A too long value the end of wh | x |

Second case:

// only min-width of cells is set
$mask = "|%5s |%-30s | x |\n";
printf($mask, 'Num', 'Title');
printf($mask, '1', 'A value that fits the cell');
printf($mask, '2', 'A too long value that will brake the table');

And here we get

|  Num |Title                          | x |
|    1 |A value that fits the cell     | x |
|    2 |A too long value that will brake the table | x |

If neither of that satisfies your needs and you really need a table with flowing width columns, than you have to calculate maximum width of values in each column. But that is how PEAR::Console_Table exactly works.


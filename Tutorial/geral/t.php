#!/usr/bin/php -q
<?php
fwrite(STDOUT, "Qual o seu nome?"); 
// Read the input
$nome = fgets(STDIN);
fwrite(STDOUT, "Olá $nome");
// Exit correctly
exit(0);



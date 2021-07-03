# PHP-CLI

## CLI - Command Line Interface

Server Application Programming Interface (SAPI) veio experimentalmente na versão V4.2.0 (2002) do PHP.

Permite o desenvolvimento da aplicações shell/desktop com PHP, competindo com linguagens como Perl, AWK, Ruby, ou shell script.

Permite executar comandos do sistema operacional com os comandos shell_exec(), exec(), passthru() e system(). Estes comandos são similares mas oferecem diferentes interfaces para o comando executado. Cada um desses comandos gera um processo filho para executar o comando ou script que você designar, e cada um captura a saída do seu comando conforme é escrito na saída padrão (stdout).

#would print out:
#123 file1.txt 332 file2.txt 444 file3.txt
#and so on

php -v - versão do PHP

php -i - similar a pgpinfo()

php -i | grep ssl

php -a - abre a console para execução de comandos no PHP-CLI. exit sai

A partir do PHP 5.1.0 (2005), o CLI SAPI fornece um shell interativo usando a opção -a se o PHP for compilado com a opção --with-readline. A partir do PHP 7.1.0 (2017) o shell interativo também está disponível no Windows, se a extensão readline extension estiver habilitada. 
Usando o shell interativo você será capaz de escrever código PHP e executá-lo diretamente. 

php -a
Interactive shell

php > echo 5+8;
13
php > function addTwo($n)
php > {
php { return $n + 2;
php { }
php > var_dump(addtwo(2));
int(4)
php >

php > strp[TAB][TAB]
strpbrk   strpos    strptime

Sequências de escape do cli.prompt

Sequência   Descrição

\e - Usada para adicionar cores ao terminal. Um exemplo pode ser \e[032m\v \e[031m\b \e[34m\> \e[0m 
\v - A versão do PHP.
\b - Indica em qual bloco o PHP está. Por exemplo /* irá indicar que o PHP está dentro de um comentário de multiplas linhas. O escopo externo será denominado por php. 
\> - Indica o caractere do terminal. Por padrão é >, mas pode alterar qaundo o shell estiver dentro de um bloco indeterminado ou de uma string. Possíveis caracteres são: ' " { ( > 


php > strp

Quando usamos PHP em um site, recebemos parâmetros usando os arrays $ _GET e $ _POST

Como obtemos parâmetros/argumentos quando o PHP é chamado a partir da linha de comando ou um CL?

$ argv: array de argumentos
$argv[0] é sempre o próprio nome do script PHP, por exemplo helloworld.php
$argv[1], $argv[2] e assim por diante são os argumentos reais
$argc: contagem, quantos argumentos - Use-o para verificar se você recebeu o que esperava

Args.php recebe parâmetros com $argc e $argv

<?php
// args.php
// remember, [0] is the script itself.
echo "\n"; // blank line
// check argument count
if ($argc > 0) {
echo $argc . " argument(s) received, including the script name itself.
\n\n";
foreach ($argv as $num=>$val) {
echo "arg $num: $val\n";
}
} else {
echo "We should have had at least one argument: the script name
itself.";
}
// usage: /usr/local/zendsvr6/bin/php-cli /batchphp/args.php firstarg
secondarg

#!/usr/local/bin/php
<?php
    print "$argc arguments were passed. In order: \n";

    for ($i = 0; $i <= $argc -1; ++$i) {
        print "$i: $argv[$i]\n";
    }
?>



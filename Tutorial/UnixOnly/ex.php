<?php
// Output screenshot:
// http://cl.ly/NsqF
// -------------------------------------------------------

include_once 'console-riba.php';

Console::log(str_repeat('-', 60));

// Direct usage
// -------------------------------------------------------
echo Console::blue('Texto azul') . "\n";
echo Console::black('Texto preto com fundo magenta', 'magenta') . "\n";
echo Console::red('Texto underline', 'underline') . "\n";
echo Console::blue('Azul on light gray em modo reverso.', 'light_gray', 'reverse') . "\n";


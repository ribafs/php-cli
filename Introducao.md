# Introdução

Há alguns anos praticamente não se usava o terminal/prompt para programar com PHP. Trabalhavamos somente nos editores/IDEs. Então ganham força ferramentas para o terminal como Git, Composer, Artisan e atualmente usamos muito o terminal para programar com PHP. Ainda assim, com toda essa popularidade do uso do terminal na programação PHP, o uso do PHP na linha de comando (PHP-CLI) é algo quase insignificativo comparado com o uso na web. Mesmo assim o php-cli pode ser útil para gerenciar algumas tarefas com PHP. Para algumas tarefas o uso do PHP-CLI é mais adequado que o do PHP web.

Vocações do PHP-CLI:

- Executar muitos comandos do sistema operacional ou scripts shell
- Executar manutenção no aplicativo (temas, módulos), no cron e no banco de dados
- Instalar aplicativos e pacotes (laravel e outros)
- Efetuar backup de bancos de dados
- Limpar o cache com artisan
- Executar migrations
- Executar artisan
- Executar comandos que somente podem ser executados via console
- Criar scaffoldings
- Atualização de aplicativos
- ability to define options and arguments, validate them, generate command usage etc
- Torná-lo executável e copiar para uma pasta no path do sistema (/usr/local/bin ou c:\windows) para que fique disponível em qualquer pasta


PHP na linha de comando

PHP também pode executar comandos no terminal sem um servidor web.

Podemos criar vários pequenos aplicativos, em apenas um arquivo, para diversas funções, como dar manuenção para aplicativos e sites, como para criar scaffoldings, fazer algo como o artisan, o wp-cli e similares.

Lembrar que com o PHP CLI não existe um frontend e que nossas aplicações não são acessíveis para outros usuários.

Requisitos
- php-cli
- composer

Em aplicativos cli não há necessidade de se usar o arquivo com nome index.php para ser chamado e podemos adicionar alguns cuidados com a segurança, como não permitir a execução de um servidor web.

https://www.php.net/manual/pt_BR/features.commandline.php

https://www.php.net/manual/pt_BR/features.commandline.interactive.php




# Boas Práticas

- Criar programas que se comuniquem facilmente com outros programas
- Criar pequenos e simples peças de código
- O script deve rodar em diversos SO, faça checagens
- Verifique se os comandos do sistema funcionam antes de chamar eles

Checar a API do servidor - SAPI
// Make sure this script is being run over the PHP CLI!
if ('cli' !== php_sapi_name()) {
return;
}

- Regra do silêncio - prioritariamente o programador deve criar programasa que não imprimam na saida desnecessariamente.
- Limpar os bjetos quando terminar
- Seja criterioso com o cache
- Fique atento para objetos e arrays
- Ser cauteloso ao executar comandos do sistema operacional

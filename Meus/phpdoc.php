<?php

/**
 * select()
 * Consultar o banco de dados e retorna o registro de acordo com o id recebido
 * usage: return select( 'users', 3 );
 * @param  mixed $table
 * @param  mixed $id
 * @return void
 */
function select( $table = 'users', $id ): string
{
    try {
        $idDb = DB::table( $table )->select( 'id' )->where( 'id' , $id )->first();
        $exists = DB::table( $table )->select( '*' )->where( 'id' , $id )->get();

        if (!is_null( $idDb )) {
            $register = "<b>O registro com id: {$id} segue abaixo</b>";
            $register .= '<table border="2">';            
            foreach($exists as $row) {
                foreach($row as $key => $val) {
                    $register .= '<tr><td>';
                    $register .= '<b>' . $key . '</b> : ' . $val;
                    $register .= '</td></tr>';
                }

            }
            $register .= '</table>';
            return $register;
        }
        throw new Exception ("Não existe um registro com o id: {$id}");
    }
    catch ( \Throwable $e) {
        return $e->getMessage();
    }
}

/**
 * insert()
 * Inserir novo registro na tabela
 * usage: return insert( 'users', [ 'name' => 'Ribamar FS', 'email' => 'joao@gmail.com', 'password' => bcrypt('123456')]);
 * @param  mixed $table
 * @param  array $fields
 * @return void
 */
function insert( $table = 'users', $fields = [] ): string
{
    try {
        DB::table( $table )->insert(
            $fields
        );
        return 'Registro adicionado com sucesso ';
    }
    catch ( \Throwable $e) {
        return $e->getMessage();
    }
}

/**
 * update()
 * Atualizar registro na tabela
 * usage: return update( 'users', 5, [ 'name' => 'João Brito' ]);
 * @param  mixed $table
 * @param  mixed $whereValue
 * @param  array $fields
 * @return void
 */
function update( $table = 'users', $whereValue, $fields = [] ): string
{
    try {
        $exists = DB::table( $table )->select( 'id' )->where( 'id' , $whereValue )->first();

        if ( $exists ) {
            DB::table( $table )
                ->where( 'id', $whereValue )
                ->update( $fields );
            return "Registro com id: {$whereValue} atualizado com sucesso";
        }
        throw new Exception( "Não existe registro com este id: {$whereValue}");
    }
    catch ( \Throwable $e) {
        return $e->getMessage();
    }
}

/**
 * delete()
 * Excluir registro da tabela
 * usage: return delete('users', 5);
 * @param  mixed $table
 * @param  mixed $id
 * @return void
 */
function delete( $table, $id ): string
{
    try {
        $exists = DB::table( $table )->select( 'id' )->where( 'id', $id )->first();

        if ( $exists ) {
            DB::table( $table )
                ->where( 'id', $id )
                ->delete();
            return "Registro com id: {$id} excluído com sucesso";
        }
        throw new Exception( "Não existe registro com este id: {$id}");
    }
    catch ( \Throwable $e) {
        return $e->getMessage();
    }
}


    /**
     * Execute command line with status returning
     *
     * @param string $cmd
     * @param string $resultText
     * @param array $output
     * @param integer $errorCode
     * @return boolean Last command success or not
     */
    private function _exec($cmd, &$resultText='', &$output='', &$errorCode='')


/**
 * @method CLImate black(string $str = null)
 * @method CLImate red(string $str = null)
 * @method CLImate green(string $str = null)
 * @method CLImate yellow(string $str = null)
 * @method CLImate blue(string $str = null)
 * @method CLImate magenta(string $str = null)
 * @method CLImate cyan(string $str = null)
 * @method CLImate lightGray(string $str = null)
 * @method CLImate darkGray(string $str = null)
 * @method CLImate lightRed(string $str = null)
 * @method CLImate lightGreen(string $str = null)
 * @method CLImate lightYellow(string $str = null)
 * @method CLImate lightBlue(string $str = null)
 * @method CLImate lightMagenta(string $str = null)
 * @method CLImate lightCyan(string $str = null)
 * @method CLImate white(string $str = null)
 *
 * @method CLImate backgroundBlack(string $str = null)
 * @method CLImate backgroundRed(string $str = null)
 * @method CLImate backgroundGreen(string $str = null)
 * @method CLImate backgroundYellow(string $str = null)
 * @method CLImate backgroundBlue(string $str = null)
 * @method CLImate backgroundMagenta(string $str = null)
 * @method CLImate backgroundCyan(string $str = null)
 * @method CLImate backgroundLightGray(string $str = null)
 * @method CLImate backgroundDarkGray(string $str = null)
 * @method CLImate backgroundLightRed(string $str = null)
 * @method CLImate backgroundLightGreen(string $str = null)
 * @method CLImate backgroundLightYellow(string $str = null)
 * @method CLImate backgroundLightBlue(string $str = null)
 * @method CLImate backgroundLightMagenta(string $str = null)
 * @method CLImate backgroundLightCyan(string $str = null)
 * @method CLImate backgroundWhite(string $str = null)
 *
 * @method CLImate bold(string $str = null)
 * @method CLImate dim(string $str = null)
 * @method CLImate underline(string $str = null)
 * @method CLImate blink(string $str = null)
 * @method CLImate invert(string $str = null)
 * @method CLImate hidden(string $str = null)
 *
 * @method CLImate info(string $str = null)
 * @method CLImate comment(string $str = null)
 * @method CLImate whisper(string $str = null)
 * @method CLImate shout(string $str = null)
 * @method CLImate error(string $str = null)
 *
 * @method mixed out(string $str)
 * @method mixed inline(string $str)
 * @method mixed table(array $data)
 * @method mixed json(mixed $var)
 * @method mixed br($count = 1)
 * @method mixed tab($count = 1)
 * @method mixed draw(string $art)
 * @method mixed border(string $char = null, integer $length = null)
 * @method mixed dump(mixed $var)
 * @method mixed flank(string $output, string $char = null, integer $length = null)
 * @method mixed progress(integer $total = null)
 * @method Spinner spinner(string $label = null, string ...$characters = null)
 * @method mixed padding(integer $length = 0, string $char = '.')
 * @method mixed input(string $prompt, Util\Reader\ReaderInterface $reader = null)
 * @method mixed confirm(string $prompt, Util\Reader\ReaderInterface $reader = null)
 * @method mixed password(string $prompt, Util\Reader\ReaderInterface $reader = null)
 * @method mixed checkboxes(string $prompt, array $options, Util\Reader\ReaderInterface $reader = null)
 * @method mixed radio(string $prompt, array $options, Util\Reader\ReaderInterface $reader = null)
 * @method mixed animation(string $art, TerminalObject\Helper\Sleeper $sleeper = null)
 * @method mixed columns(array $data, $column_count = null)
 * @method mixed clear()
 * @method CLImate clearLine()
 *
 * @method CLImate addArt(string $dir)
 */
class CLImate

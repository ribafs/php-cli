<?php
/**
 * text4shell.class.php
 * Arquivo da classe Text4Shell
 */

/**
 * Classe para exibição de texto em ambiente Shell (modo texto)
 * @author Everton da Rosa everton3x@gmail.com
 * @version 1.0
 * @license GPL
 * @package Text4Shell
 */

class Text4Shell {
    
    protected $cols;//{@var} int $cols Número de colunas do Shell
    
    /**
     * Construtor da classe
     * @method __construct(int $cols) Cosntrutor da classe
     * @param int $cols Número de colunas do Shell. O valor informado aqui ficará armazenado em Text4Shell::cols.
     * @return object Text4Shell Retorna um objeto que representa a classe
     */
    public function __construct($cols) {
        $this->set_cols($cols);
        return $this;
    }
    
    /**
     * Setter do número de colunas
     * @method set_cols(int $cols) Define o número de colunas que a classe utilizará para criação das telas
     * @param int $cols Número de colunas
     * @return boolean Retorna TRUE em caso de sucesso ou FALSE em caso de falha.
     */

    public function set_cols($cols){
        if(!is_int($cols) || $cols <= 0){
            trigger_error("Número de colunas inválido!\n", E_USER_ERROR);
            return false;
        }else{
            $this->cols = $cols;
            return true;
        }
    }
    
    /**
     * Getter do número de colunas
     * @method get_cols() Retorna o número de colunas armazenado em Text4shell::cols
     * @return int Retorna o número de colunas.
     */
    public function get_cols(){
        return $this->cols;
    }
    
    /**
     * Prepara o texto para a exibição
     * @method paragraph(string $text, int $cols) Quebra o texto em linhas com o tamanho máximo do número de colunas especificado em $cols.
     * @param string $text O texto a ser exibido
     * @param int $cols Número de colunas de quada linha
     * @return boolean|array Retorna FALSE em caso de falha ou um array contendo as linhas do texto.
     */
    protected function paragraph($text, $cols = 0, $align = 'left'){
        if($cols == 0){
            $cols = $this->get_cols();
        }
        if(!is_string($text)){
            trigger_error("Texto inválido!\n", E_USER_ERROR);
            return false;
        }else{
            return str_split($text, $cols);
        }
    }
    
    /**
     * Quebra um texto em linhas.
     * @method write(string $text) Quebra um texto em linhas de acordo com o número de colunas em Text4Shell::cols.
     * @param string $text O texto a ser escrito.
     * @return string Texto quebrado em linhas.
     */
    public function write($text){
        $str = '';
        foreach($this->paragraph($text) as $lines){
            $str .= "$lines".PHP_EOL;
        }
        return $str;
    }
    
    /**
     * Quebra um texto em linhas e coloca dentro de um Box.
     * @method box(string $box, string $title) Quebra um texto em linhas de acordo com o número de colunas em Text4Shell::cols e coloca dentro de um Box.
     * @param string $text O texto a ser exibido
     * @param string $title [Opcional] Se definido, exibe um título para a caixa.
     * @return string O Box com o texto quebrado em linhas;
     */
    public function box($text, $title = ''){
        $box = '';
        $cols = $this->cols - 4;
        if(strlen($title) > 0){
            $box .= $this->hline();
            $title = str_pad($title, $cols, ' ', STR_PAD_BOTH );
            $box .= "| $title |".PHP_EOL;
        }
        $box .= $this->hline();
        $lines = $this->paragraph($text, $cols);
        foreach($lines as $ln){
            if(strlen($ln) < $cols){
                $ln = str_pad($ln, $cols, ' ');
            }
            $box .= "| $ln |".PHP_EOL;
        }
        $box .= $this->hline();
        return $box;
    }
    
    /**
     * Cria uma linha divisória horizontal.
     * @method hline() Método auxiliar que cria uma linha divisória horizontal.
     * @return string Retorna a linha criada.
     */
    protected function hline(){
        $line = '';
        $pad_length = $this->get_cols() - 2;
        $line .= '+';
        $line .= str_pad('-', $pad_length, '-');
        $line .= '+'.PHP_EOL;
        return $line;
    }
    
    /**
     * Cria uma linha divisória horizontal para tabelas.
     * @method tblline() Método auxiliar que cria uma linha divisória horizontal para tabela.
     * @param array $colmodel O modelo de coluna da tabela.
     * @return string Retorna a linha criada.
     */
    protected function tblline($colmodel){
        $line = '';
        foreach($colmodel as $col){
            $len = $col['len'];
            if($len <= 0){
                trigger_error('Falha no modelo de coluna', E_USER_ERROR);
                return false;
            }else{
                $pad_length = $len;
                $line .= str_pad('+', $pad_length, '-');
            }
        }
        $minus = $this->get_cols() - 1;
        $line = substr($line, 0, $minus);
        $line .= '+'.PHP_EOL;
        return $line;
    }

    /**
     * Cria uma tabela com os dados recebidos.
     * @method table(array $data, array $colmodel, string $title) Cria uma tabela os dados contidos em $data. $data precisa estar no formato:
     * $data = array(
     *      0 => array('coluna1' => 'valor1', 'coluna2' => 'valor2')
     *      ,1 => array('coluna1' => 'valor1', 'coluna2' => 'valor2')
     *      ,2 => array('coluna1' => 'valor1', 'coluna2' => 'valor2')
     * );
     * @param array $data Um array multidimensional com os dados de linhas e colunas par exibir.
     * @param array $colmodel Um array especificando os rótulos das colunas, a largura de cada coluna e o alinhamento de cada coluna. Observe que a soma das larguras das colunas deve ser igual ao valor de Text4Shell::cols. Se um rótulo não for especificado, o id da coluna será utilizado. Os alinhamentos válidos são LEFT, RIGHT e CENTER (em maiúsculas ou minúsculas). Se nenhum for especificado, LEFT é adotado. O array segue a estrutura: array( 'campo1' => array('label' => 'Rótulo', 'len' => 10, 'align' => 'LEFT'), 'campo2' => array([...]), [...])
     * @param string $title [Opcional] Se definido, mostra o texto com título da tabela.
     * @return string Retorna a tabela criada.
     */
    public function table($data, $colmodel, $title = ''){
        if(count($data) == 0){
            trigger_error('Dados para tabela inválidos!\n', E_USER_ERROR);
            return false;
        }
        if(count($colmodel) == 0){
            trigger_error('Modelo de coluna da tabela inválido!\n', E_USER_ERROR);
            return false;
        }
        
        //configurando colmodel
        foreach($data[0] as $k => $v){
            if(!isset($colmodel[$k]['label'])){
                $colmodel[$k]['label'] = $k;
            }
            if(!isset($colmodel[$k]['align'])){
                $colmodel[$k]['align'] = 'left';
            }
        }
        unset($k, $v);
        
        $table = '';
        //título
        if(strlen($title) >0){
            $cols = $this->cols - 4;
            if(strlen($title) > 0){
                $table .= $this->hline();
                $title = str_pad($title, $cols, ' ', STR_PAD_BOTH );
                $table .= "| $title |".PHP_EOL;
            }
        }
        //cabeçalho
        $table .= $this->tblline($colmodel);
        
        foreach($colmodel as $cmk => $cm){
            $len = $cm['len'] - 2;
            $id = $cmk;
            $labels[$id] = $this->paragraph($cm['label'], $len);
        }
        unset($cm, $len, $id);
        
        $maxsize = 0;
        foreach($labels as $label){
            $size = count($label);
            if($maxsize < $size){
                $maxsize = $size;
            }
        }
        unset($label);
        
        $last = count($labels) - 1;
        $j = 0;
		$rows = array();
		for($i = 0; $i < $maxsize; $i++){
			@$rows[$i] .= "|";
		}
		foreach($labels as $id => $arr){
			if(count($arr) <= $maxsize){
				$arr = array_pad($arr, $maxsize, ' ');
			}
			if($j == $last){
				$len = $colmodel[$id]['len'] -2;
			}else{
				$len = $colmodel[$id]['len'] -1;
			}
			$j++;
			
			for($i = 0; $i < $maxsize; $i++){
				if(!isset($colmodel[$id]['align'])){
					$align = 'center';
				}else{
					$align = $colmodel[$id]['align'];
				}
				$align = $this->get_align($align);
				$label = str_pad($arr[$i], $len, ' ', $align);
				$rows[$i] .= "$label|";
			}
		}
		foreach($rows as $line){
			$table .= "$line\n";
		}
		
        $table .= $this->tblline($colmodel);
		
		//corpo com os dados
		$lens = array();
		foreach($colmodel as $k => $v){
			$lens[$k] = $v['len'] - 2;
		}
		
		$tmp = array();
		foreach($data as $id => $line){
			foreach($line as $fldname => $fldvalue){
				$tmp[$id][$fldname] = $this->paragraph($fldvalue, $lens[$fldname]);
			}
		}
		$data = $tmp;
		unset($tmp);
		
		foreach($data as $line){
			$maxsize = 0;
			foreach($line as $row){
				if($maxsize < count($row)){
					$maxsize = count($row);
				}
			}
			unset($row);
			$last = count($line) - 1;
			$j = 0;
			$rows = array();
			for($i = 0; $i < $maxsize; $i++){
				@$rows[$i] .= "|";
			}
			
			foreach($line as $id => $arr){
				if(count($arr) <= $maxsize){
					$arr = array_pad($arr, $maxsize, ' ');
				}

				if($j == $last){
					$len = $colmodel[$id]['len'] -2;
				}else{
					$len = $colmodel[$id]['len'] -1;
				}
				$j++;
				
				for($i = 0; $i < $maxsize; $i++){
					if(!isset($colmodel[$id]['align'])){
						$align = 'center';
					}else{
						$align = $colmodel[$id]['align'];
					}
					$align = $this->get_align($align);
					$label = str_pad($arr[$i], $len, ' ', $align);
					$rows[$i] .= "$label|";
				}
			}
			foreach($rows as $line){
				$table .= "$line\n";
			}
			$table .= $this->tblline($colmodel);
		}
		
        return $table;
    }
	
	/**
	* Retorna a constante para alinhamento.
	* @method get_align(string $align) Retorna o valor da constante de alinhamento para ser utilizada com str_pad().
	* @param string $align Alinhamento desejado. Admite RIGHT LEFT e CENTER (mínusculas ou maiúsculas).
	* @return int Retorna o valor da constante STR_PAD_RIGHT, STR_PAD_LEFT OU STR_PAD_BOTH, para $align RIGHT, LEFT ou CENTER, respectivamente.
	*/
	protected function get_align($align){
		$align = strtolower($align);
		switch($align){
			case 'center':
				return STR_PAD_BOTH;
				break;
			case 'right':
				return STR_PAD_LEFT;
				break;
			case 'left':
				return STR_PAD_RIGHT;
				break;
			default:
				trigger_error("Alinhamento desconhecido\n", E_USER_ERROR);
				return false;
		}
	}
	
}

?>

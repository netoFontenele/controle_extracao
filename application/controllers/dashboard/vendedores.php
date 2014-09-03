<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendedores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('vendedores_model','vendedores');
	}

	public function index()
	{
		$data_header['titulo'] = 'Vendedores ';		
		$data_header['cidades'] = $this->vendedores->get_cidades()->result();	
		$this->layout->region( 'header',include_file( 'header' ),$data_header );
		$this->layout->region( 'page_header',include_file( 'page_header' ) );
		$this->layout->region( 'footer',include_file( 'footer' ) );
		$this->layout->show( 'dashboard/vendedores' );
	}

	public function validar()
	{
		echo 'oi';
	}
	public function validar_CPF()
	{
		// Verifica se um número foi informado
		if(empty($cpf)) {
			return false;
		}

    // Elimina possivel mascara
		$cpf = ereg_replace('[^0-9]', '', $cpf);
		$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

    // Verifica se o numero de digitos informados é igual a 11
		if (strlen($cpf) != 11) {
			return false;
		}
    // Verifica se nenhuma das sequências invalidas abaixo
    // foi digitada. Caso afirmativo, retorna falso
		else if ($cpf == '00000000000' ||
			$cpf == '11111111111' ||
			$cpf == '22222222222' ||
			$cpf == '33333333333' ||
			$cpf == '44444444444' ||
			$cpf == '55555555555' ||
			$cpf == '66666666666' ||
			$cpf == '77777777777' ||
			$cpf == '88888888888' ||
			$cpf == '99999999999') {
			return false;
	} else {  

		for ($t = 9; $t < 11; $t++) {

			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf{$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf{$c} != $d) {
				return false;
			}
		}

		return true;
		}
	}

}

/* End of file vendedores.php */
/* Location: ./application/controllers/vendedores.php */
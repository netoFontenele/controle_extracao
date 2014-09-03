<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendedores_model extends CI_Model {

	public function get_cidades()
	{
		return $this->db->get('cidade');
	}
}

/* End of file vendedores_model.php */
/* Location: ./application/models/vendedores_model.php */
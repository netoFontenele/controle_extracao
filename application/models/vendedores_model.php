<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendedores_model extends CI_Model {

	public function get_cidades()
	{
		return $this->db->get('cidade');
	}
        public function insert($sql_endereco,$sql_pessoa_fisica,$sql_vendedor_ambulante,$sql_referencias) {
            
            $this->db->insert('endereco',$sql_endereco);
            
            $sql_pessoa_fisica['EnderecoID'] = $this->db->insert_id();
            
            $this->db->insert('pessoa_fisica',$sql_pessoa_fisica);
            
            $sql_vendedor_ambulante['PessoaFisicaID'] = $this->db->insert_id();
            
            $this->db->insert('vendedor_ambulante',$sql_vendedor_ambulante);
/*SELECT *
FROM `vendedor_ambulante` AS va
INNER JOIN pessoa_fisica AS pf ON va.PessoaFisicaID = pf.PessoaFisicaID
where pf.CPF= '886.537.111'*/

            $sql_referencias['VendedorAmbulanteID'] = $this->db->insert_id();
            $a =  $this->db->insert_id();
            $this->db->insert('referencias_pessoais',$sql_referencias);*/
            
        }
}

/* End of file vendedores_model.php */
/* Location: ./application/models/vendedores_model.php */
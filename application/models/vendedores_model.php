<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendedores_model extends CI_Model {

    public function get_cidades()
    {
        return $this->db->get('cidade');
    }
    public function pessoa_fisica_CPF($CPF)
    {
        $where = array('CPF' => $CPF);
        $this->db->select('PessoaFisicaID');
        return $this->db->get_where( 'pessoa_fisica',$where )->row();
    }
    public function insert($sql_endereco,$sql_pessoa_fisica,$sql_vendedor_ambulante,$sql_referencias) {

        $this->db->insert('pessoa_fisica',$sql_pessoa_fisica);

        $pessoa_fisica_id = $this->pessoa_fisica_CPF($sql_pessoa_fisica['CPF'])->PessoaFisicaID;

         echo $pessoa_fisica_id;
        //------------------------------------------------------------------------------
        //Endereço
        $sql_endereco['PessoaFisicaID'] = $pessoa_fisica_id;
        $this->db->insert('endereco',$sql_endereco);
        //------------------------------------------------------------------------------
        //vendedor 
        $sql_vendedor_ambulante['PessoaFisicaID'] =$pessoa_fisica_id;
        $this->db->insert('vendedor_ambulante',$sql_vendedor_ambulante);
        //------------------------------------------------------------------------------
        //Referencias 
        $this->db->select('pf.PessoaFisicaID as id_pf');
        $this->db->from('vendedor_ambulante va');
        $this->db->join('pessoa_fisica AS pf', 'va.PessoaFisicaID = pf.PessoaFisicaID', 'inner');
        $this->db->where('pf.cpf', $sql_pessoa_fisica['CPF']);
        $query = $this->db->get();
        $row = $query->row(); 

        $this->db->select('VendedorAmbulanteID');
        $this->db->from('vendedor_ambulante');
        $this->db->where('PessoaFisicaID', $row->id_pf);
        $query2 = $this->db->get();
        $row2 = $query2->row(); 
        $id_vendedor_ambulante = (int) $row2->VendedorAmbulanteID;    

        $sql_referencias[0]['VendedorAmbulanteID'] = $id_vendedor_ambulante;
        $sql_referencias[1]['VendedorAmbulanteID']= $id_vendedor_ambulante;
        $this->db->insert('referencias_pessoais',$sql_referencias[0]);
        $this->db->insert('referencias_pessoais',$sql_referencias[1]); 

        return ($this->db->affected_rows() >= 1)? true : false;
    }
    public function get_vendedores($limite = NULL,$offset = NULL)
    {
        /*
        
        SELECT pf.nome,pf.sexo,pf.cpf,pf.rg,pf.datanascimento as nascimento,
        pf.apelido,pf.telefone,en.endereco,en.numero,en.cep,en.bairro,en.endereco_google as localizacao_aproximada,en.latitude,en.longitude,
        cd.descricao as cidade,r.regional
        FROM `pessoa_fisica` AS pf
        INNER JOIN vendedor_ambulante va ON pf.PessoaFisicaID = va.PessoaFisicaID
        INNER JOIN endereco en ON pf.EnderecoID = en.EnderecoID
        INNER JOIN cidade cd ON cd.cidadeID = en.cidadeID
        INNER JOIN regional r ON r.regionalID = va.regionalID
         */
        $this->db->order_by('pf.nome', 'ASC');
        $this->db->limit($limite,$offset);
        $this->db->select('pf.nome,pf.sexo,pf.cpf,pf.rg,pf.datanascimento as nascimento,en.endereco_google as localizacao_aproximada,
            pf.apelido,pf.telefone,en.endereco,en.numero,en.cep,en.bairro,en.latitude,en.longitude,
            cd.descricao as cidade,r.regional,va.VendedorAmbulanteID as cod_vendedor');
        $this->db->from('pessoa_fisica as pf');
        $this->db->join('vendedor_ambulante va', 'pf.PessoaFisicaID = va.PessoaFisicaID', 'inner');
        $this->db->join('endereco en', 'pf.PessoaFisicaID = en.PessoaFisicaID', 'inner');
        $this->db->join('cidade cd ', 'cd.cidadeID = en.cidadeID', 'inner');
        $this->db->join('regional r', 'r.regionalID = va.regionalID', 'inner');
        return $this->db->get();
    }
    function conta_registros()
    {
        return $this->db->count_all_results('pessoa_fisica');
    }

}

/* End of file vendedores_model.php */
/* Location: ./application/models/vendedores_model.php */
/* End of file vendedores_model.php */
/* Location: ./application/models/vendedores_model.php */
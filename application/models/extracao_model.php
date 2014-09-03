<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Extracao_model extends CI_Model {

	public function salvar($sql)
	{
		$query = $this->db->insert('extracao', $sql);
		return ($query) ? true : false ;
	}
	public function update($sql)
	{
		$this->db->where('extracaoID', $sql['extracaoID']);
		$query = $this->db->update('extracao',$sql);
		return ($query) ? true : false ;
	}
	public function get($where = NULL,$limite = NULL,$offset = NULL)
	{
		$this->db->order_by('extracao', 'DESC');
		//$this->db->limit($limite,$offset);
		if (is_null($where) and is_null($limite) and is_null($offset)) {
			$query = $this->db->get('extracao');
			return $query->result();
		}elseif(!is_null($where)){
			$this->db->where($where);
			$query = $this->db->get('extracao');
			return $query->result();
		}elseif (is_null($where) and !is_null($limite) and !is_null($offset)) {
			$this->db->limit($limite,$offset);
			$query = $this->db->get('extracao');
			return $query->result();
		}
	}
	public function ativa_extracao($id = NULL,$data_sql = NULL)
	{
		// Existe extração ativa? se sim, desativar todas
		if (is_null($id) AND is_null($data_sql)) {
			$query = $this->db->query("UPDATE `extracao` SET `ativo` = '0' WHERE 1=1");
			//return $query->result();
		}else{
			$this->db->where('extracao', $id);
			$query = $this->db->update('extracao', $data_sql);
		}
	}
	public function delete($id)
	{
		$this->db->where('ExtracaoID', $id);
		$query = $this->db->delete('extracao');
		return ($query) ? true : false ;
	}

	function conta_registros()
	{
		return $this->db->count_all_results('extracao');
	}
}

/* End of file extracao.php */
/* Location: ./application/models/extracao.php */
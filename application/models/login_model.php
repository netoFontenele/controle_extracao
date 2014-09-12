<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @package	Model
 * @author	Neto Fontenele
 * @filesource  Main_model
 */
// ------------------------------------------------------------------------
class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();	
	}
	// --------------------------------------------------------------------------------------
    /**
     * Retorna um usúario definido pelo parametro $where
     * @access	public
     * @param array $where
     * @return	object
     */
    public function get_user($where)
    {
    	$this->db->select('u.usuarioID,p.PerfilID,u.usuario,u.avatar,u.email,u.last_login as ultimoAcesso,r.Regional,p.descricao as nivelPrivilegio,r.regionalID');
    	$this->db->from('usuario u');
    	$this->db->join('perfil p', 'p.PerfilID = u.PerfilID', 'inner');
    	$this->db->join('usuario_regional us', 'us.usuarioID = u.usuarioID', 'left');
    	$this->db->join('regional r', 'r.regionalID = us.regionallID', 'left');
    	$this->db->where($where);
    	$this->db->limit(1);
    	return $this->db->get()->row();
    }

    public function update_user($data,$where)
    {
        $this->db->where($where);
        $query = $this->db->update('usuario',$data);
        return ($query) ? true : false ;

    }
    public function insert_time_access($usuarioID)
    {
        $this->db->where('usuarioID', $usuarioID);
        $data = data_extenso(true).', as '.hora();
        $sql_data = array('last_login' => $data);
        $query = $this->db->update('usuario', $sql_data);
        return  ($query) ? true : false ;
    }
    public function last_access()
    {
        
    }
}

/* End of file model_users */
/* Location: ./application/models/model_users */
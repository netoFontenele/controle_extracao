<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Extracao extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('extracao_model','extracao');
	}
	/*public function index()
	{
		$this->extracao();
	}*/

	public function index()
	{

		$this->load->library('pagination');
		$maximo = 10;
		$inicio = (!$this->uri->segment(3)) ? 0 : $this->uri->segment(3);
		$config['base_url'] = base_url('dashboard/extracao/');
		$config['total_rows'] = $this->extracao->conta_registros();
		$config['per_page'] = $maximo;
		$this->pagination->initialize($config);
		
		$data_header['paginacao'] = $this->pagination->create_links();
		$data_header['titulo'] = 'Extração ';
		$data_header['extracoes'] = $this->extracao->get(null,$maximo, $inicio);
		$this->layout->region( 'header',include_file( 'header' ),$data_header );
		$this->layout->region( 'page_header',include_file( 'page_header' ) );
		$this->layout->region( 'footer',include_file( 'footer' ) );
		$this->layout->show( 'dashboard/extracao' );
	}

	public function cadastro()
	{
		$rules = array(
			array(
				'field' => 'extracao' ,
				'label' => 'número da extração' ,
				'rules' => 'required|trim|numeric|is_unique[extracao.extracao]'
				) ,
			array(
				'field' => 'quantidade' ,
				'label' => 'Quantidade recebida' ,
				'rules' => 'required|is_natural_no_zero'
				) ,
			array(
				'field' => 'data' ,
				'label' => 'Data Extração' ,
				'rules' => 'required|callback_validar_dia_sorteio'
				) ,
			array(
				'field' => 'descricao' ,
				'label' => 'Descrição' ,
				'rules' => 'required|trim|min_lenght[5]'
				)
			);
		$this->form_validation->set_message('is_unique', 'Encontramos %s já cadastrado no sistema');
		$this->form_validation->set_message('is_natural_no_zero', 'É necessário que %s seja um número válido');
		$this->form_validation->set_rules($rules);
		if ( $this->form_validation->run() ) {
			$sql = elements(array('extracao' , 'descricao' , 'quantidade' , 'data') , $this->input->post());
			$sql[ 'ativo' ] = 0;
			if($this->extracao->salvar($sql)){
				create_flashdata('extracao_cadastrada','Extração cadastrada com sucesso','sucesso');
				redirect(base_url('dashboard/extracao'));
			}
			else{
				create_flashdata('extracao_cadastrada','Falha ao cadastrada a extração, por favor tente novamente','error');
				redirect(base_url('dashboard/extracao'));
			}

		}
		else{
			$this->extracao();
		}
	}
	/**
    * Verifica se a data do sorteio é válida
    * baseada no dia configurado no parametro
    *
    * @return booleano
    */
	public function validar_dia_sorteio()
	{
		$data = $this->input->post('data');
		$data_sorteio = $this->config->item('dia_sorteio');
		if (dia_semana($data) == $data_sorteio) {
			return true;
		} else {
			$this->form_validation->set_message('validar_dia_sorteio' , 'Verifique a data do sorteio, acreditamos que o sorteio esteja configurado para acontecer em um dia de '.dia_semana_extenso($data_sorteio));
			return false;
		}
	}
	public function delete()
	{
		$id = $this->uri->segment(4);
		$data_sql = array('ExtracaoID' => $id,'ativo' => 1);
		if ($this->extracao->get($data_sql) == TRUE) {
			create_flashdata('extracao_delete','Você não pode deletar a extração ativa','alert-info');
			redirect(base_url('dashboard/extracao'));
		}
		else{
			if ($this->extracao->delete($id) == TRUE) {
				create_flashdata('extracao_delete','Extração deletada com sucesso','sucesso');
				redirect(base_url('dashboard/extracao'));
			}
			else{
				create_flashdata('extracao_delete','Falha ao deletar extração','error');
				redirect(base_url('dashboard/extracao'));
			}
		}
	}
	    //-----------------------------------------------------------------------------------------
	public function status()
	{
		$this->extracao->ativa_extracao();
		$where = array('ativo' => 1);
		$extracao =  $this->uri->segment(4);
		if(!$this->extracao->ativa_extracao($extracao,$where)){
			$this->session->unset_userdata('extracao');

			$extracao_ativa = $this->set_dados_extracao_ativa();
			$dados_extracao_ativa = array(
				'extracao' => $extracao_ativa[0]->extracao,
				'data' => $extracao_ativa[0]->data);
			$this->session->set_userdata('extracao', $dados_extracao_ativa);


			create_flashdata('status',"A extração {$extracao} foi ativada com sucesso",'sucesso');
			redirect(base_url('dashboard/extracao'));
		}else{
			create_flashdata('status','Falha ao ativar a extração, por favor tente novamente','error');
			redirect(base_url('dashboard/extracao'));
		}
	}
	public function editar()
	{
		$sql = elements(array('extracao' , 'descricao' , 'quantidade' , 'data') , $this->input->post());
		echo $sql['extracaoID'] = $this->input->post('extracaoID');
		if($this->extracao->update($sql)){
			create_flashdata('extracao_atualizada','Extração atualizada com sucesso','sucesso');
			redirect(base_url('dashboard/extracao'));
		}else{
			create_flashdata('extracao_atualizada','Falha ao atualizar a  extração','error');
			redirect(base_url('dashboard/extracao'));
		}
	}
	public function set_dados_extracao_ativa()
	{
		return $this->extracao->get(array('ativo' => 1));
	}
}

/* End of file extracao.php */
/* Location: ./application/controllers/extracao.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utilitarios extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('extracao_model','extracao');
    }
    public function index()
    {
    	
    }

    public function extracao()
    {
        $data_header['titulo'] = 'Extração ';
        $this->layout->region( 'header',include_file( 'header' ),$data_header );
        $this->layout->region( 'page_header',include_file( 'page_header' ) );
        $this->layout->region( 'footer',include_file( 'footer' ) );
        $this->layout->show( 'dashboard/extracao' );
    }
}

/* End of file utilitarios.php */
/* Location: ./application/controllers/utilitarios.php */
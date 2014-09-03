<?php

if( !defined( 'BASEPATH' ) )
    exit( 'No direct script access allowed' );
/**
 * dashboard
 * Carrega as configrações iniciais do painel
 *
 * @package Application
 * @filesource dashboard
 */
// ------------------------------------------------------------------------

/**
 *
 * @category controller
 * @author  Gerencia CPD
 */
class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data_header['titulo'] = 'Home ';
        $this->layout->region( 'header',include_file( 'header' ),$data_header );
        $this->layout->region( 'page_header',include_file( 'page_header' ) );
        $this->layout->region( 'footer',include_file( 'footer' ) );
        $this->layout->show( 'dashboard/dashboard' );
    }

}

/* End of file controllername.php */
/* Location: ./application/controllers/dashboard.php */
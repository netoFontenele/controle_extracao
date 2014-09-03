<?php

if ( !defined('BASEPATH') )
    exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * @package		CodeIgniter
 * @subpackage	Aplications/helpers
 * @author		Neto Fontenele
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * Verifica se o usuário logado é administrador
 *
 * @access	public
 * @param	int $perfil_id
 * @return	booleano
 */
if ( !function_exists('is_admin') ) {

    function is_admin( $perfil_id )
    {
        return ($perfil_id == 1) ? true : false;
    }

}


// --------------------------------------------------------------------------------------
/**
 * Cria uma fashdata com o nome, valor recebido e tipo recebido
 * @access	public
 * @param $name
 * @param $value
 * @param $type
 * @return String set_flashdata com os valores
 */
if ( !function_exists('create_flashdata') ) {

    function create_flashdata( $name , $value , $type )
    {
        $CI = & get_instance();
        switch ( $type ) {
            case 'error':
            return $CI->session->set_flashdata($name , '
             <div data-alert class="alert-box">
             <strong><i class="icon-remove"></i> Ai caramba! algo deu errado.</strong> <br />
             <a href="#" class="close">&times;</a>' .
             $value . '
             </div>'
             );
            break;
            case 'sucesso':
            return $CI->session->set_flashdata($name , '
               <div data-alert class="alert-box success">
               <button type="button" class="close">×</button>
               <strong><i class="icon-ok"></i> Legal! Tudo ocorreu como o esperado.</strong> <br />
               <a href="#" class="close">&times;</a>' .
               $value . '
               </div>'
               );
            break;
            case 'alert-info':
            return $CI->session->set_flashdata($name , '
                <div data-alert class="alert-box">
                <strong><i class="icon-warning-sign"></i>Opa! Mensagem do Sistema.</strong> <br />
                <a href="#" class="close">&times;</a>' .
                $value . '
                </div>'
                );
            break;
            default:
            return $CI->session->set_flashdata($name , '
                <div data-alert class="alert-box">
                <strong><i class="icon-warning-sign"></i>Opa! Mensagem do Sistema.</strong> <br />
                <a href="#" class="close">&times;</a>' .
                $value . '
                </div>'
                );
            break;
        }
    }

}
// --------------------------------------------------------------------------------------
/**
 * Verifica se há uma fashdata, se existir retorne-a
 * @access	public
 * @param $name
 * @return String flashdata
 */
if ( !function_exists('exist_flashdata') ) {

    function exist_flashdata( $nomes )
    {
        $CI = & get_instance();
        if (is_array($nomes)) {
            foreach ($nomes as $nome) {
                return $CI->session->flashdata($nome);
            }
        }else{
            return ($CI->session->flashdata($nomes)) ? $CI->session->flashdata($nomes) : false;
        }
        
    }

}
// --------------------------------------------------------------------------------------
/**
 * Verifica se o usuário está logado
 * @access	public
 * @param $redirect = TRUE
 * @return	void
 */
if ( !function_exists('is_logged_in') ) {

    function is_logged_in()
    {
        $CI = & get_instance();
        $CI->load->library('session');
        $is_logged_in = ($CI->session->userdata('is_logged_in') == 1) ? TRUE : FALSE;
        if ( !$CI->session->userdata('is_logged_in') ) {
            redirect('login');
        }
    }

}
/* End of file util_helper.php */
/* Location: ./application/helpers/util_helper.php */
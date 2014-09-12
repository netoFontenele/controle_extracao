<?php

if ( !defined('BASEPATH') )
    exit('No direct script access allowed');

/**
 * @package    Controllers
 * @author     Neto Fontenele
 * @filesource  login
 */
// ------------------------------------------------------------------------
class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model' , 'login');
    }

    public function index()
    {
        $this->login();
    }

    // --------------------------------------------------------------------------------------
    /**
     * Função que carrega a view com os dados necessários para renderização
     * @access public
     * @return void
     */
    public function login()
    {
        $data_header['title'] = 'Login';
        $this->layout->region('header' , include_file('header') , $data_header);
        $this->layout->region('footer' , include_file('footer'));
        $this->layout->show('login');
    }

    // --------------------------------------------------------------------------------------

    /**
     * Validação dos campos do formulário
     * chamada da função que cria as credenciais do usuário 
     * se ele for válido, se o usuário não for válido
     * é chamado o metodo $this->index();
     * @access public
     * @return void
     */
    public function login_validation()
    {
        $rules = array (
                array (
                        'field' => 'username' ,
                        'label' => 'usuário' ,
                        'rules' => 'required|trim|min_lenght[3]|callback_validate_data_user'
                ) ,
                array (
                        'field' => 'password' ,
                        'label' => 'senha' ,
                        'rules' => 'required|trim|min_lenght[3]'
                )
        );

        $this->form_validation->set_rules($rules);

        if ( $this->form_validation->run() ) {
            $where = array (
                    'u.usuario' => $this->input->post('username') ,
                    'u.senha' => md5($this->input->post('password')) ,
                    'u.ativo' => 1
            );
            $get_profile_user = $this->login->get_user($where);
            $this->set_profile_user($get_profile_user);
        } else {
            $this->index();
        }
    }

    // --------------------------------------------------------------------------------------
    /**
     * Função de callback para verificar se existe um 
     * usuário na base de dados retornando true se o usuário existir
     * e false se não exister, caso o usuário não exista é criado uma
     * mensagem para ser exibida pela login_validation() na view
     * @access public
     * @return booleano
     */
    public function validate_data_user()
    {
        $where = array (
                'u.usuario' => $this->input->post('username') ,
                'u.senha' => md5($this->input->post('password')) ,
        );
        if ( $this->login->get_user($where) ) {
            return true;
        } else {
            $this->form_validation->set_message('validate_data_user' , 'O usuário e ou senha que você digitou esta(ão) incorreto. Tente novamente (tenha certeza de que a função Caps Lock está desligada).');
            return false;
        }
    }

    // --------------------------------------------------------------------------------------
    /**
     * Recebe os dados do usuário vindo da base de dados
     * e cria as sessions correspondente aos dados
     * apos isso redireciona o usuário para a página restrita
     * @access public
     * @param object User
     * @return void
     */
    public function set_profile_user( $get_profile_user )
    {
        $create_profile_user = array (
                'usuario' => ucwords($get_profile_user->usuario) ,
                'usuarioID' => $get_profile_user->usuarioID ,
                'avatar' => $get_profile_user->avatar ,
                'last_login' => $get_profile_user->ultimoAcesso ,
                'PerfilID' => $get_profile_user->PerfilID ,
                'regional' => $get_profile_user->Regional ,
                'regionalID' => $get_profile_user->regionalID ,
                'is_logged_in' => 1
        );
        $this->session->set_userdata($create_profile_user);
        redirect( site_url( 'dashboard' ));
    }

    // --------------------------------------------------------------------------------------
    /**
     * Carrega a view reset.php usada para reset de senha
     * @access public
     * @return void
     */
    public function reset()
    {
        $data_header['title'] = 'Reset senha';
        $this->layout->region('header' , include_file('html_header') , $data_header);
        $this->layout->region('footer' , include_file('html_footer'));
        $this->layout->show('reset');
    }

    // --------------------------------------------------------------------------------------
    /**
     * Recebe o email inserido no furmulário
     * de reset senha e atribui a uma variável
     * @access public
     * @return String
     */
    public function get_email_from_form()
    {
        return $this->input->post('email');
    }

    // --------------------------------------------------------------------------------------
    /**
     * Valida os dados de entrada no formulário usado
     * para resetar a senha caso os dados inseridos
     * passem na validação, chama o metodo run()
     * caso contrario chama-se o método reset() novamente
     * @access public
     * @return void
     */
    public function reset_validate()
    {
        $rules = array (
                array (
                        'field' => 'email' ,
                        'label' => 'e-mail' ,
                        'rules' => 'required|trim|min_lenght[3]|callback_verification_email'
                )
        );

        $this->form_validation->set_rules($rules);

        if ( $this->form_validation->run() ) {
            $this->reset_password();
        } else {
            $this->reset();
        }
    }

    // --------------------------------------------------------------------------------------
    /**
     * Verifica se o email inserido no formulário existe no banco de dados
     * @access public
     * @return booleano
     */
    public function verification_email()
    {
        $where = array ('u.email' => $this->get_email_from_form());
        if ( $get_email_from_model = $this->login->get_user($where) ) {
            return true;
        } else {
            $this->form_validation->set_message('verification_email' , 'O e-mail digitado não está na nossa lista, verifique e tente novamente');
            return false;
        }
    }

    // --------------------------------------------------------------------------------------
    /**
     * Reseta a senha do usuário
     * @access public
     * @return void
     */
    public function reset_password()
    {
        //cria a senha temporario
        $temporary_password = random_string('alnum' , 8);
        $where = array ('u.email' => $this->get_email_from_form());
        $get_user_from_model = $this->login->get_user($where);
        $this->load->library('email');
        $this->email->from('cpd@mastruzdasorte.com.br' , 'Sistema Mastruz da Sorte');
        $this->email->to($this->get_email_from_form());
        $this->email->subject('Reset de Senha // Sistema Mastruz da Sorte Litoral Leste e Vale');
        $this->email->message("  <body>
            <table width=\"800px\" style=\"margin:0 auto\">
              <tr style=\"height:161px;width:800px;background:#ffc128\">
                <th height=\"150\" colspan=\"2\" scope=\"col\">
                    <img src=\"http://mastruzdasorte.com.br/novoLeste/img/logo.png\" width=\"130\" height=\"128\" />
                <h2 style=\"color:#FFF\">
               Mastruz da Sorte // Reset de Senha</h2></th>
              </tr>
              <tr>
                <td>
                <h4 style=\"margin:10px 5px 5px 20px\">Olá, " . ucwords($get_user_from_model->usuario) . ", Sua senha temporária é:</h4>
                <p style=\"margin:10px 5px 5px 20px\"><strong>$temporary_password</strong></p></td>
              </tr>
              <tr>
                <td height=\"112\" colspan=\"2\"  style=\"height:50px;width:800px;background:#ffc128\"><p>&nbsp;</p>
                <p style=\"margin:10px 5px 5px 20px; color:#fff\">Equipe CDP Mastruz da Sorte</p></td>
              </tr>
            </table>
            </body>
            ");
        if ( $this->email->send() ) {
            $data = array (
                    'senha_editada' => 1 ,
                    'senha' => md5($temporary_password)
            );
            $where = array ('email' => $this->get_email_from_form());
            if ( $this->login->update_user($data , $where) ) {
                create_flashdata('password_reset' , 'Um email foi enviado com uma senha temporário.' , 'alert-success');
                redirect('login');
            } else {
                create_flashdata('password_reset' , 'Não foi possível resetar sua senha, tente novamente ou entre em contato com o administrador do sistema.' , 'alert-error');
                redirect('login');
            }
        }
        //cria uma mensagem de informação
        //redireciona o usuario para a tela de login
        else {
            create_flashdata('password_reset' , 'Não foi enviar o email, tente novamente ou entre em contato com o administrador do sistema.' , 'alert-error');
            redirect('login');
        }
    }

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
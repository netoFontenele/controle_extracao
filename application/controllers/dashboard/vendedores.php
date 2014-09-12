<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vendedores extends CI_Controller {

    public function __construct() {
        parent::__construct();
        is_logged_in();
        $this->load->model('vendedores_model', 'vendedores');
    }

    public function index() {
        $data_header['titulo'] = 'Vendedores ';
        $data_header['cidades'] = $this->vendedores->get_cidades()->result();
        $this->layout->region('header', include_file('header'), $data_header);
        $this->layout->region('page_header', include_file('page_header'));
        $this->layout->region('footer', include_file('footer'));
        $this->layout->show('dashboard/vendedores');
    }

    public function validar() {
        $regras = array(
            //nome
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'required'
            ),
            //sexo
            array(
                'field' => 'sexo',
                'label' => 'Sexo',
                'rules' => 'required'
            ),
            //CPF
            array(
                'field' => 'cpf',
                'label' => 'CPF',
                'rules' => 'required|callback_validar_CPF'
            ),
            //RG
            array(
                'field' => 'rg',
                'label' => 'RG',
                'rules' => 'required'
            ),
            //nascimento
            array(
                'field' => 'nascimento',
                'label' => 'Data de nascimento',
                'rules' => 'required'
            ),
            //telefone
            array(
                'field' => 'telefone',
                'label' => 'telefone',
                'rules' => 'required'
            ),
            //endereco
            array(
                'field' => 'endereco',
                'label' => 'Endereco',
                'rules' => 'required'
            ),
            //numero
            array(
                'field' => 'numero',
                'label' => 'Número',
                'rules' => 'required|is_natural_no_zero'
            ),
            //cidade
            array(
                'field' => 'cidade',
                'label' => 'Cidade',
                'rules' => 'required'
            ),
            //bairro
            array(
                'field' => 'bairro',
                'label' => 'Bairro',
                'rules' => 'required'
            ),
            //cep
            array(
                'field' => 'cep',
                'label' => 'CEP',
                'rules' => 'required'
            ),
            //endereco mapa
            array(
                'field' => 'endereco_mapa',
                'label' => 'Endereço do mapa',
                'rules' => 'required'
            ),
            //referencia1
            array(
                'field' => 'referencia1',
                'label' => '1ª referencia',
                'rules' => 'required'
            ),
            //referencia2
            array(
                'field' => 'referencia2',
                'label' => '2ª referencia',
                'rules' => 'required'
            ),
            //parentesco1
            array(
                'field' => 'parentesco1',
                'label' => '1ª parentesco',
                'rules' => 'required'
            ),
            //parentesco2
            array(
                'field' => 'parentesco2',
                'label' => '2ª parentesco',
                'rules' => 'required'
            ),
            //contato1
            array(
                'field' => 'contato1',
                'label' => '1º Contato',
                'rules' => 'required'
            ),
            //contato2
            array(
                'field' => 'contato2',
                'label' => '2º  Contato',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($regras);
        if ($this->form_validation->run()) {
            extract($this->input->post());
            echo '<pre>';
            var_dump($this->input->post());
            echo '</pre>';
            //dados de endereço
            $sql_endereco = array(
                'endereco' => $endereco,
                'numero' => $numero,
                'cidadeid' => $cidade,
                'cep' => $cep,
                'bairro' => $bairro,
                'endereco_google' => $endereco_mapa,
                'latitude' => $latitude,
                'longitude' => $longitude
            );
            //dados pessoais
            $sql_pessoa_fisica = array(
                'nome' => $nome,
                'sexo' => $sexo,
                'CPF' => $cpf,
                'rg' => $rg,
                'dataNascimento' => converterUS($nascimento),
                'apelido' => $apelido,
                'telefone' => $telefone
            );
            //Dados do ambulante
            $sql_vendedor_ambulante = array(
                'RegionalID' => $this->session->userdata('regionalID'),
                'timestamp' => time(),
            );
            $sql_referencias = array(
               array(
                    'nome' => $referencia1,
                    'parentesco' => $parentesco1,
                    'contato' => $contato1,
                    'VendedorAmbulanteID' => ''
                    ),
                array(
                    'nome' => $referencia2,
                    'parentesco' => $parentesco2,
                    'contato' => $contato2,
                    'VendedorAmbulanteID' => ''
                    )
                );
            echo '<pre>';
            echo var_dump($sql_referencias);
            echo '</pre>';
            $this->vendedores->insert($sql_endereco,$sql_pessoa_fisica,$sql_vendedor_ambulante,$sql_referencias);
        } else {
            $this->index();
        }
    }

    public function validar_CPF($cpf) {
        // Verifica se um número foi informado
        if (empty($cpf)) {
            $this->form_validation->set_message('validar_CPF', 'Este %s não é válido');
            return false;
        }

        // Elimina possivel mascara
        $cpf = ereg_replace('[^0-9]', '', $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11
        if (strlen($cpf) != 11) {
            $this->form_validation->set_message('validar_CPF', 'Este %s não é válido');
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' ||
                $cpf == '11111111111' ||
                $cpf == '22222222222' ||
                $cpf == '33333333333' ||
                $cpf == '44444444444' ||
                $cpf == '55555555555' ||
                $cpf == '66666666666' ||
                $cpf == '77777777777' ||
                $cpf == '88888888888' ||
                $cpf == '99999999999') {
            $this->form_validation->set_message('validar_CPF', 'Este %s não é válido');
            return false;
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    $this->form_validation->set_message('validar_CPF', 'Este %s não é válido');
                    return false;
                }
            }

            return true;
        }
    }

}

/* End of file vendedores.php */
/* Location: ./application/controllers/vendedores.php */
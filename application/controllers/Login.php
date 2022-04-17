<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->load->library(array('form_validation'));
        $this->load->helper(array('loginRules'));
    }

    public function index()
    {
        $this->load->view('index');
    }

    public function validarDatosLogin()
    {
        $this->form_validation->set_error_delimiters('', '');
        $rules_login = getLoginRules();
        $this->form_validation->set_rules($rules_login);

        if (empty($_POST) || $this->form_validation->run() == FALSE) {
            $errors = array(
                'user' => form_error('user'),
                'pass' => form_error('pass')
            );
            echo json_encode($errors);
            $this->output->set_status_header(400);
        } else {
            $user = $this->input->post('user');
            $pass = md5($this->input->post('pass'));

            if (!$this->LoginModel->login($user, $pass)) {
                echo json_encode(array('error' => 'Verificar sus credenciales'));
                $this->output->set_status_header(401);
                exit;
            } else {
                $data_session = $this->LoginModel->getDataUser($user);
                $data = array(
                    'id' => $data_session->id,
                    'n_identificacion' => $data_session->n_identificacion,
                    'nombre_1' => $data_session->nombre_1,
                    'nombre_2' => $data_session->nombre_2,
                    'apellido_1' => $data_session->apellido_1,
                    'apellido_2' => $data_session->apellido_2,
                    'celular_1' => $data_session->celular_1,
                    'correo' => $data_session->correo,
                    'nick' => $data_session->nick,
                    'rol' => $data_session->nom_rol,
                    'status' => $data_session->status,
                );

                $this->session->set_userdata($data);

                switch ($data['rol']) {
                    case 'Estudiante':
                        /* redirect('Student/index', 'refresh'); */
                        echo json_encode(array("url" => base_url('estudiante')));
                        break;

                    case 'Docente':
                        /* redirect('Teacher/index', 'refresh'); */
                        echo json_encode(array("url" => base_url('docente')));
                        break;

                    case 'Secretaria':
                        /* redirect('Secretary/Secretary/index', 'refresh'); */
                        echo json_encode(array("url" => base_url('secretaria')));
                        break;

                    case 'Coordinador':
                        /* redirect('Coordinador/Coordinador/index', 'refresh'); */
                        echo json_encode(array("url" => base_url('coordinador')));
                        break;

                    default:
                        echo "USUARIO NO CORRESPONDIENTE";
                        break;
                };
            }
        }
    }

    public function logOut()
    {
        $var = array('n_identificacion', 'nombre_1', 'nombre_2', 'apellido_1', 'apellido_2', 'celular_1', 'correo', 'nick', 'rol', 'status');
        $this->session->unset_userdata($var);
        $this->session->sess_destroy();
        redirect(base_url() . 'Login');
    }
}

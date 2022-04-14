<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {
    function __construct() {
        $this->load->database();
    }

    public function login($user, $pass)
    {
        $data = $this->db->get_where('usuarios', array('nick' => $user, 'password' => $pass, 'status' => 'Active'), 1);
        if (!$data->result()) {
            return false;
        }
        return $data->row();
        $this->db->close();
    }

    public function getDataUser($user)
    {
        $consulta = "SELECT usuarios.id, usuarios.nick, usuarios.status, rol.nom_rol, info_usuarios.*
                    FROM usuarios
                    INNER JOIN info_usuarios ON usuarios.id = info_usuarios.id_usuarios
                    INNER JOIN rol ON usuarios.id_rol = rol.id_rol
                    WHERE usuarios.nick = '$user'";
        $result = $this->db->query($consulta);

        if (!$result->result()) {
            return false;
        }
        return $result->row();
        $this->db->close();
    }
}
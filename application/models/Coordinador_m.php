<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Coordinador_m extends CI_Model {
    function __construct() {
        $this->load->database();
    }

    public function getAllProfesores(){
        $this->db->select('info_usuarios.nombre_1, info_usuarios.nombre_2, info_usuarios.apellido_1, info_usuarios.apellido_2');
        $this->db->from('usuarios');
        $this->db->join('info_usuarios', 'info_usuarios.id_usuarios = usuarios.id');
        $this->db->where('usuarios.id_rol', '2');
        $this->db->order_by('apellido_1 ASC','apellido_2 ASC');
        
        $sql = $this->db->get();
        return $sql->result();
    }
}
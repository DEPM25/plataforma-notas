<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Secretary_m extends CI_Model{

    function __construct() {
        $this->load->database();
    }

    public function AllDepartamentos(){
        $this->db->order_by('departamento ASC');
        $sql = $this->db->get('departamentos');
        return $sql->result();
    }

    public function AllMunicipios($id_departamento){
        $this->db->select('*');
        $this->db->from('municipios');
        $this->db->where('cod_departamentos', $id_departamento);
        $this->db->order_by('municipio ASC');
        $sql = $this->db->get();
        $output = '<option value="">Seleccione...</option>';
        foreach($sql->result() as $row){
            $output .= '<option value="'.$row->cod_municipio.'">'.$row->municipio.'</option>';
        }
        return $output;
    }

    public function AllTypeUser(){
        $this->db->select('*')
                ->from('rol');
        $sql = $this->db->get();
        return $sql->result();
    }

    public function AllTipoIdentificacion(){
        $this->db->select('*')
                ->from('tipo_documento');
        $sql = $this->db->get();
        return $sql->result();
    }

    public function Grupos(){
        $this->db->select('nom_grupo');
        $this->db->from('grupos');
        $this->db->order_by('nom_grupo DESC');
        $sql = $this->db->get();
        return $sql->result();
    }

    public function NotasByGrupo($grupo){
        $this->db->select('td_Id_Alu, td_Cod_Grupo, td_Cod_Asig, td_Nota_P1_1, td_Nota_P1_2, td_Nota_P1_3, td_Nota_P1_4, td_Nota_P1_P')
                ->from('tb_notas_periodo')
                ->where('td_Cod_Grupo', $grupo);
        $sql = $this->db->get();
        return $sql->result();
    }

    public function numberUser(){
        $query = $this->db->get("usuarios");
        $result = $query->num_rows();
        return $result;
    }
}
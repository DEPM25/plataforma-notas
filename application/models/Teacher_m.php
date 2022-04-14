<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_m extends CI_Model{

    public function getGruposDocente($id_user){
        $this->db->select('grupos.nom_grupo, grupos.id, asignaturas.nom_asignatura');
        $this->db->from('asignacion');
        $this->db->join('grupos', 'grupos.id = asignacion.id_grupos');
        $this->db->join('asignaturas', 'asignaturas.id = asignacion.id_asignatura');
        $this->db->where('asignacion.id_usuarios_docente', $id_user);
        $sql = $this->db->get();
        if (!$sql->result()) {
            return false;
        }
        return $sql->result();
        $this->db->close();
    }

    public function getAlumnosByGrupo($id_grupo){
        $this->db->select('info_usuarios.nombre_1, info_usuarios.nombre_2, info_usuarios.apellido_1, info_usuarios.apellido_2');
        $this->db->from('alumnos');
        $this->db->join('info_usuarios', 'info_usuarios.id = alumnos.id_info_usuarios');
        $this->db->where('alumnos.id_grupos', $id_grupo);

        $sql = $this->db->get();
        if (!$sql->result()) {
            return false;
        }
        
        return $sql->result();
        $this->db->close();
    }

    public function insertLogros($id_logro, $nom_logro){
        $this->db->insert('logros', array('nom_logro'=>$nom_logro, 'id_asignacion'=>$id_logro));
    }

    public function getAsignaturasId($id_user){
        $this->db->select('asignacion.id, grupos.nom_grupo, asignaturas.nom_asignatura');
        $this->db->from('asignacion');
        $this->db->join('grupos', 'grupos.id = asignacion.id_grupos');
        $this->db->join('asignaturas', 'asignaturas.id = asignacion.id_asignatura');
        $this->db->where('id_usuarios_docente', $id_user);
        $sql = $this->db->get();
        return $sql->result();

        $this->db->close();
    }

    public function insertarNotas($nota1, $nota2, $nota3, $nota4, $promedio, $i, $periodo){
        $P = $periodo;
        if ($P==1) {
            $this->db->insert('tb_notas_periodo', array('td_Anio_Asig'=>'2022', 'td_Id_Alu'=>'1'.$i, 'td_Cod_Grupo'=>'11C', 'td_Cod_Asig'=>'10', 'td_Nota_P1_1'=>$nota1, 'td_Nota_P1_2'=>$nota2,'td_Nota_P1_3'=>$nota3,'td_Nota_P1_4'=>$nota4, 'td_Nota_P1_P'=>$promedio));
        } else {
            $this->db->update('tb_notas_periodo', array('td_Anio_Asig' => '2022', 'td_Id_Alu' => '1'.$i, 'td_Cod_Grupo' => '11C', 'td_Cod_Asig' => '10', 'td_Nota_P'.$P.'_1' => $nota1, 'td_Nota_P'.$P.'_2' => $nota2,'td_Nota_P'.$P.'_3' => $nota3,'td_Nota_P'.$P.'_4'=>$nota4, 'td_Nota_P'.$P.'_P' => $promedio), array('td_Anio_Asig'=>'2022', 'td_Id_Alu'=>'1'.$i, 'td_Cod_Grupo'=>'11C', 'td_Cod_Asig'=>'10'));
        }
    }

    public function mostrarNotas($periodo){
        $this->db->select('td_Nota_P'.$periodo.'_1, td_Nota_P'.$periodo.'_2, td_Nota_P'.$periodo.'_3, td_Nota_P'.$periodo.'_4, td_Nota_P'.$periodo.'_P');
        $this->db->from('tb_notas_periodo');
        $this->db->where('td_Anio_Asig', '2022');
        $this->db->where('td_Cod_Grupo', '11C');
        $this->db->where('td_Cod_Asig', '10');
        $sql = $this->db->get();
        if (!$sql->result()) {
            return false;
        }
        return $sql->result_array();

        $this->db->close();
    }

}
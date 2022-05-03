<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_m extends CI_Model{

    public function getGruposDocente($id_user){
        $this->db->select('grupos.nom_grupo, grupos.codigo_grupos, asignaturas.nom_asignatura, asignacion.codigo_asignacion');
        $this->db->from('asignacion');
        $this->db->join('grupos', 'grupos.codigo_grupos = asignacion.codigo_grupos');
        $this->db->join('asignaturas', 'asignaturas.codigo_asignatura = asignacion.codigo_asignaturas');
        $this->db->where('asignacion.codigo_usuarios_docente', $id_user);
        $sql = $this->db->get();
        if (!$sql->result()) {
            return false;
        }
        return $sql->result();
        $this->db->close();
    }

    public function getAlumnosByGrupo($id_grupo, $id_user){
        $this->db->select('info_usuarios.nombre_1, info_usuarios.nombre_2, info_usuarios.apellido_1, info_usuarios.apellido_2')
        ->from('asignacion')
        ->join('notas_periodo', 'notas_periodo.codigo_asignacion = asignacion.codigo_asignacion')
        ->join('usuarios', 'usuarios.codigo_user = notas_periodo.codigo_user_estudiante')
        ->join('info_usuarios', 'info_usuarios.codigo_users = usuarios.codigo_user')
        ->where('asignacion.codigo_usuarios_docente', $id_user)
        ->where('asignacion.codigo_grupos', $id_grupo);

        $sql = $this->db->get();
        if (!$sql->result()) {
            return false;
        }
        
        return $sql->result();
        $this->db->close();
    }

    public function mostrarNotas($periodo, $cod_asignacion, $id_user, $id_grupo){
        $this->db->select('info_usuarios.nombre_1, info_usuarios.nombre_2, info_usuarios.apellido_1, info_usuarios.apellido_2, notas_periodo.nota_P'.$periodo.'_1, notas_periodo.nota_P'.$periodo.'_2, notas_periodo.nota_P'.$periodo.'_3, notas_periodo.nota_P'.$periodo.'_4, notas_periodo.nota_P'.$periodo.'_P')
        ->from('asignacion')
        ->join('notas_periodo', 'notas_periodo.codigo_asignacion = asignacion.codigo_asignacion')
        ->join('usuarios', 'usuarios.codigo_user = notas_periodo.codigo_user_estudiante')
        ->join('info_usuarios', 'info_usuarios.codigo_users = usuarios.codigo_user')
        ->where('asignacion.codigo_usuarios_docente', $id_user)
        ->where('asignacion.codigo_grupos', $id_grupo)
        ->where('asignacion.codigo_asignacion', $cod_asignacion);

        $sql = $this->db->get();
        if (!$sql->result()) {
            return false;
        }
        
        return $sql->result_array();
        $this->db->close();
        return false;
    }

    public function insertLogros($id_logro, $nom_logro, $i){
        $sql = $this->db->insert('logros', array('codigo_logro'=>'LOG00'.$i, 'nom_logro'=>$nom_logro, 'id_asignatura'=>$id_logro));
        if($sql){
            return true;
        }else{
            false;
        }
        $this->db->close();
    }

    /* public function getTextLogros($id_user){
        $this->db->select('logros.nom_logro')
                ->from('logros')
                ->join('asignacion', 'asignacion.id = logros.id_asignatura')
                ->where('asignacion.id_usuarios_docente', $id_user);
        $sql = $this->db->get();
        if (!$sql->result()) {
            return false;
        }
        return $sql->result();
    } */

    public function getAsignaturasId($id_user){
        $this->db->select('asignacion.codigo_asignacion, grupos.nom_grupo, asignaturas.nom_asignatura');
        $this->db->from('asignacion');
        $this->db->join('grupos', 'grupos.codigo_grupos = asignacion.codigo_grupos');
        $this->db->join('asignaturas', 'asignaturas.codigo_asignatura = asignacion.codigo_asignaturas');
        $this->db->where('codigo_usuarios_docente', $id_user);
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

    public function getNumPeriodos(){
        $this->db->select('num_periodos')
        ->from('anio_escolar');
        /* $sql = $this->db->get(); */
        /* if(!$sql->row()){
            return false;
        } */
        return $this->db->get()->row()->num_periodos;
        $this->db->close();
    }

}
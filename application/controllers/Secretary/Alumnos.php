<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Secretary_m');
    }

    public function index()
    {
        if ($this->session->userdata('rol')=="Secretaria" && $this->session->userdata('status')=="Active") {
            $data['departamentos'] = $this->Secretary_m->AllDepartamentos();
            $this->load->view('Secretary/nuevo_alumno', $data);
        }else{
            redirect('Login', 'refresh');
        }
    }
    
    public function importCSV(){
        if (isset($_POST["submit"])) {
            $file = $_FILES['file_students']['tmp_name'];
            $handle = fopen($file, "r");
            while (($filesOp = fgetcsv($handle, 1000, ";"))) {
                $id = $filesOp[0];
                $documento = $filesOp[1];
                var_dump($filesOp);
            }
        }
    }

    public function getMunicipios()
    {
        if($this->input->post('cod_departamento')){
            echo $this->Secretary_m->AllMunicipios($this->input->post('cod_departamento'));
        }
    }

    public function getTipoIdentificacion()
    {
        $result = $this->Secretary_m->AllTipoIdentificacion();
        echo json_encode($result);
    }

    public function getTipoRol(){
        $result = $this->Secretary_m->AllTypeUser();
        echo json_encode($result);
    }

    public function codigoUsuer(){
        $data = $this->Secretary_m->numberUser();
        $type_user = $this->input->post('tipo_user');
        if($type_user==6){
            $data++;
            $type="0000000".$data;
            $type="EST".substr($type,strlen($type)-4,7);
        }

        if($type_user==5){
            $data++;
            $type="0000000".$data;
            $type="DOC".substr($type,strlen($type)-4,7);
        }

        if($type_user==4){
            $data++;
            $type="0000000".$data;
            $type="COR".substr($type,strlen($type)-4,7);
        }

        if($type_user==3){
            $data++;
            $type="0000000".$data;
            $type="SEC".substr($type,strlen($type)-4,7);
        }

        if($type_user==2){
            $data++;
            $type="0000000".$data;
            $type="REC".substr($type,strlen($type)-4,7);
        }

        if($type_user==1){
            $data++;
            $type="0000000".$data;
            $type="ADM".substr($type,strlen($type)-4,7);
        }

        if($type_user==NULL){
            $type='';
        }
        
        echo $type;
    }

    public function insertDataUser(){
        $data_user = array(
            'type_user' => $this->input->post('tipo_user'),
            'code_user' => $this->input->post('code_user'),
            'nation' => $this->input->post('nacionalidad'),
            'gender' => $this->input->post('genero'),
            'type_id' => $this->input->post('tipo_identificacion'),
            'id_num' => $this->input->post('num_identificacion'),
            'name1' => $this->input->post('nombre_1'),
            'name2' => $this->input->post('nombre_2'),
            'last_name1' => $this->input->post('apellido_1'),
            'last_name2' => $this->input->post('apellido_2'),
            'phone_num' => $this->input->post('celular_1'),
            'phone_num2' => $this->input->post('celular_2'),
            'mail' => $this->input->post('correo'),
            'area' => $this->input->post('zona'),
            'departament' => $this->input->post('departamento'),
            'city' => $this->input->post('municipio'),
            'address' => $this->input->post('dir')
        );
        echo json_encode($data_user);
    }

    /* function SaveDocente($apellido,$nombre,$email,$telefono,$direccion,$especialidad,$dni,$sexo,$estado){
        $con=$this->ActiveConnection();
        mysql_select_db("colegio",$con);
          $rs=mysql_query("SELECT COUNT(*) FROM docente");
            $campo=mysql_fetch_array($rs);
              $n=$campo[0];
              $cod="";
              if ($n==0){
                $cod="D0001";
              }
              else{
                $rs=mysql_query("SELECT max(coddocente) FROM docente");
                $campo=mysql_fetch_array($rs);
                  $cod=(int)(substr($campo[0],1,4))+1;
                  $cod="0000".$cod;
                  $cod="D".substr($cod,strlen($cod)-4,4);
              }
        mysql_query("INSERT INTO docente (Coddocente,nombre,apellido,email,telefono,direccion,especialidad,dni,sexo,estado)
        VALUES ('$cod','$nombre','$apellido','$email','$telefono','$direccion','$especialidad','$dni','$sexo','$estado')",$con);
        } */
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Boletin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Secretary_m');
    }

    public function index()
    {
        if ($this->session->userdata('rol') == "Secretaria" && $this->session->userdata('status') == "Active") {
            $this->load->view('Secretary/boletin');
        } else {
            redirect('Login', 'refresh');
        }
    }

    public function allGrupos()
    {
        if ($res = $this->Secretary_m->Grupos()) {
            echo "<label class='select_text'>Seleccione el grupo</label>";
            echo "<select id='grupo' name='grupo'>";
            echo "<option value='0'>Seleccione el grupo</option>";
            foreach ($res as $data) {
                echo "<option onclick='showNotasByGrupo(this.value);' value='$data->nom_grupo'>$data->nom_grupo</option>";
            }
            echo "</select>";
        }
    }

    public function GetAllNotasByGrupo()
    {
        $grupo = $_POST['grupo'];
        if ($res = $this->Secretary_m->NotasByGrupo($grupo)) {
            echo "<table class='table-info-notas'>";
            echo "<tr>
                            <th>Asignatura</th>
                            <th>Alumno</th>
                            <th>P1</th>
                            <th>P2</th>
                            <th>P3</th>
                            <th>P4</th>
                            <th>Promedio</th>
                        </tr>";
            foreach ($res as $data) {
                echo "<tr>
                        <td>$data->td_Cod_Asig</td>
                        <td>$data->td_Id_Alu</td>
                        <td>$data->td_Nota_P1_1</td>
                        <td>$data->td_Nota_P1_2</td>
                        <td>$data->td_Nota_P1_3</td>
                        <td>$data->td_Nota_P1_4</td>
                        <td>$data->td_Nota_P1_P</td>
                    </tr>";
            }
            echo "</table>";
        }
    }
}

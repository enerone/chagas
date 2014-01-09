<?php
class Vivienda extends CI_Model {


    public function get_user($id){
        $data = array('id'=>$id);
        $Q = $this->db->get_where('administradores',$data);
        if ($Q->num_rows() > 0) {
                foreach ($Q->result() as $row) {
                    $users = $row; 
                }
            }
        return $users;   
    }
    /*
    creacion de la vivienda
     */
    public function registro($u) {
        $u = $this->input->post('item');
        $admin = $this->get_user($this->session->userdata('id'));
        $f = date('Y-m-d');

        $data = array(
            'id_vivienda' => $u['id_vivienda'],
            'latitud' => $u['latitud'],
            'longitud' => $u['longitud'],
            'id_sede' => $u['id_sede'],
            'id_barrio' => $u['id_barrio'],
            'habitantes' => $u['habitantes'],
            'clasificacion' => $u['clasificacion'],
            'tipo' => $u['tipo'],
            'fecha' => $f
            
        );
        $this->db->insert('viviendas', $data);
    }
    
    /* 
    inspeccion de la vivienda
    */
    public function inspeccion(){
        $u = $this->input->post('item');
        $admin = $this->get_user($this->session->userdata('id'));
        $f = date('Y-m-d');
        $data = array(
                'id_vivienda' => $u['id_vivienda'],
                'ciclo'=>$u['ciclo'],
                'id_operador' => $u['operador'],
                'receptividad_vivienda' => $u['receptividad_vivienda'],   
                'vigilancia_entomologica' => $u['vigilancia_entomologica'],
                'jefe_flia' => $u['jefe_flia'],
                'fecha'=>$f

            );
        $this->db->insert('viviendas_inspeccion', $data);
    }
    /*agrega a cada integrante de una vivienda*/
    public function vivienda_grupo($id, $puesto, $nombre, $ciclo){
        $f = date('Y-m-d');
        $data = array(
            'id_vivienda'=>$id,
            'puesto'=>$puesto,
            'nombre'=>$nombre,
            'ciclo'=>$ciclo,
            'fecha'=>$f
            );
        $this->db->insert('viviendas_grupo', $data);
    }

    /*agrega cada sector positivo de una vivienda */
    public function inspeccion_positiva($id,$afueraAdentro,$donde,$que){
        $f = date('Y-m-d');
        $data = array(
                'id_vivienda' => $id,
                'adentro_afuera' => $afueraAdentro,
                'donde' => $donde,                
                'que_en_campo' => $que,
                'ciclo'=>$u['ciclo'],
                'fecha'=>$f

            );
        $this->db->insert('viviendas_positivas', $data);
    }

    /*funcion para que editen despues del lab*/
    public function edita_positiva($id,$que){
        $data = array(
                'que_en_lab' => $que

            );
        $this->db->where('id',$id);
        $this->db->update('viviendas_positivas', $data);
    }


    /*edita vivienda*/
    public function edicion() {
        $u = $this->input->post('item');
        $admin = $this->get_user($this->session->userdata('id'));
        $f = date('Y-m-d');

        $data = array(
            'id_vivienda' => $u['id_vivienda'],
            'latitud' => $u['latitud'],
            'longitud' => $u['longitud'],
            'id_sede' => $u['id_sede'],
            'id_barrio' => $u['id_barrio'],
            'habitantes' => $u['habitantes'],
            'clasificacion' => $u['clasificacion'],
            'tipo' => $u['tipo'],
            'fecha' => $f
            
        );
        $this->db->where('id', $u['id']);
        $this->db->update('viviendas', $data);

    }


    public function getViviendas(){

        $this->db->select('viviendas.id_vivienda as idv,viviendas.id as id, viviendas_inspeccion.ciclo, viviendas.tipo as tipo, viviendas.id_sede as id_sede, latitud, longitud ');
        $this->db->from('viviendas');
        $this->db->join('viviendas_inspeccion','viviendas_inspeccion.id_vivienda = viviendas.id_vivienda','left');
        $res = $this->db->get()->result();

        return $res;

    }

    public function getbarrioId($id_barrio){
        $id = (int)$id_barrio;
        $this->db->where('id',$id);
        $res = $this->db->get('barrios')->result();
        return $res;
    }

    public function getBarrioById($id_barrio,$id_sede){
        $id = (int)$id_barrio;
        $id_sede = (int)$id_sede;
        if($id!=0){
            $this->db->where('id_sede',$id_sede);
            $this->db->where('codigo',$id);
            $res = $this->db->get('barrios')->result();
            return $res;
        }else{
            return 'no existe';
        }
        
    }
    
}

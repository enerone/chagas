<?php
class Barrio extends CI_Model {


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
    public function registro($u) {
        $u = $this->input->post('item');
        $admin = $this->get_user($this->session->userdata('id'));
        $data = array(
            'codigo' => $u['codigo'],
            'nombre' => $u['nombre'],
            'id_sede' => $u['id_sede']
            
        );
        $this->db->insert('barrios', $data);
    }
    
    public function edicion() {
        $u = $this->input->post('item');
        $admin = $this->get_user($this->session->userdata('id'));
        $data = array(
          'codigo' => $u['codigo'],
            'nombre' => $u['nombre'],
            'id_sede' => $u['id_sede']
            
        );
        $this->db->where('id', $u['id']);
        $this->db->update('barrios', $data);

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

<?php

class User extends CI_Model {

    public function authenticate($email, $password) {
            $hash = $this->_prep_password($password);
            //var_dump($hash);die;
            $this->db->select('id,type,nombre,apellido');
            $Q = $this->db->get_where('administradores', array('email' => $email, 'hash' =>$hash));
          //var_get_all_for_period($this->db->last_query());die;
            if ($Q->num_rows() > 0) {
                foreach ($Q->result() as $row) {
                    $user = $row;
                    
                }
                return $user;
            } else {
	 			$this->session->set_flashdata('message', 'Su usuario o password son incorrectos, intente nuevamente');
                return false;
            }
    }

    public function authenticate_cliente($email, $password) {
            $hash = $this->_prep_password($password);
            //var_dump($hash);die;
            $this->db->select('id,type ');
            $Q = $this->db->get_where('usuarios', array('email' => $email, 'hash' =>$hash));
            if ($Q->num_rows() > 0) {
                foreach ($Q->result() as $row) {
                    $user = $row;
                    return $user;
                }
            } else {
				$this->session->set_flashdata('message', 'Su usuario o password son incorrectos, intente nuevamente');
                return false;
            }
    }

    public function _prep_password($password) {
        //return sha1($password . $this->config->item('encryption_key'));
        return sha1($password);
    }
    public function is_admin($id){
            
            $Q = $this->db->get_where('administradores', array('id' => $id));
            if ($Q->num_rows() > 0) {
                foreach ($Q->result() as $row) {
                    
                    if($row->type==1 || $row->type == 10){
                        return true;
                    }else{
                        return false;
                    }
                }
            }
    }
    
    public function get_all_admin(){
            $this->db->select('*');
            $Q = $this->db->get_where('users', array('type' => 1));
            if ($Q->num_rows() > 0) {
                foreach ($Q->result() as $row) {
                    $admin[] = $row;
                }
            }
            //var_dump($admin);die;
            if(isset($admin)){
                return $admin;
            }
    }
    
    
    public function get_users($indice=0, $busca = ''){
        $ind= $indice *10;
        $this->db->select('usuarios.*');
        $this->db->order_by('usuarios.id','desc');
        $this->db->from('usuarios');
       
        if($busca!=''){
            
           
            $this->db->or_like('email',urldecode($busca));
            $this->db->or_like('apellido',urldecode($busca));
           
        }
        
        
        $this->db->limit(10,$ind);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0) {
                foreach ($Q->result() as $row) {
                    $items[] = $row; 
                }
            }
        if(isset($items)){    
            return $items;   
        }
    }
    
    public function get_all_users_by($sede=''){

        $u = $this->input->post('item');
        

        if($sede==''){
                   $sede = (isset($u['sede']))?$u['sede']:'';
        }

        
        

        if($sede !=''){
            $this->db->where('sede',$sede);
        }
        $Q = $this->db->get('usuarios');



        
        
        
        if ($Q->num_rows() > 0) {
                foreach ($Q->result() as $row) {
                    $items[] = $row; 
                }
            }
        if(isset($items)){    
            return $items;   
        }
    }


    public function get_all_users($criterio=''){
        $this->db->select('usuarios.*');
        $this->db->from('usuarios');
        if($criterio!=''){
            $this->db->or_like('email',urldecode($criterio));       
        }
        $Q = $this->db->get();
        if ($Q->num_rows() > 0) {
                foreach ($Q->result() as $row) {
                    $items[] = $row; 
                }
            }
        if(isset($items)){    
            return $items;   
        }
    }
    
    public function get_user($id){
        $data = array('id'=>$id);
        $Q = $this->db->get_where('usuarios',$data);
        if ($Q->num_rows() > 0) {
                foreach ($Q->result() as $row) {
                    $users = $row; 
                }
            }
        return $users;   
    }
    
    public function get_user_by_email($email){
        $data = array('email'=>$email);
        $Q = $this->db->get_where('usuarios',$data);
        if ($Q->num_rows() > 0) {
                foreach ($Q->result() as $row) {
                    $users = $row; 
                }
            }
        if(isset($users)){    
            return $users;   
        }else{
            return false;
        }
    }
    
    public function email_exists($email){
        $data = array('email'=>$email);
        $Q = $this->db->get_where('usuarios',$data);
        if ($Q->num_rows() > 0) {
                return true;
            }
        return false;   
    }
    
    
    public function registro_usuario(){
         $u = $this->input->post('user');   
         //$hash = $this->_prep_password($u['password']);
            $data = array(
                
                'email' => $u['email'],
                'nombre' => $u['nombre'],
                'apellido' => $u['apellido'],
                'pass' => $u['pass'],
                'hash' => sha1($u['pass']),
                'sede' => $u['id_sede'],
                'type' => $u['type']
                
            );

            $this->db->insert('usuarios', $data);
           
    }
    
    public function editar_usuario(){
        $u = $this->input->post('user');
        $data = array(
                
                'email' => $u['email'],
                'nombre' => $u['nombre'],
                'apellido' => $u['apellido'],
                'pass' => $u['pass'],
                'hash' => sha1($u['pass']),
                'sede' => $u['id_sede'],
                'type' => $u['type']
                
            );       
        $this->db->where('id', $u['id']);
        $this->db->update('usuarios', $data);
        
    }
    
    public function borrar_usuario($id){
        $data = array('id'=>$id);
        $this->db->delete('usuarios',$data);
    }

    public function get_estadistica_by_User($id=0){
        $u = $this->input->post('item');
        
        $desde = (isset($u['desde']))?$u['desde']:'';
        $hasta = (isset($u['hasta']))?$u['hasta']:'';
        $ciclo = (isset($u['ciclo']))?$u['ciclo']:'';

        $id_user =(isset($u['id_user']))?$u['id_user']:'';
        if($id_user == '' && $id != 0){
            $id_user = $id;
        }
        $user = $this->get_user($id_user);
        $nombre = $user->apellido.', '.$user->nombre;
        $this->db->where('creado_por',$nombre);
        if($desde != $hasta){
                if($desde !=''){
                    $this->db->where('fecha_ingreso >=',$desde);
                }
                if($hasta !=''){
                    $this->db->where('fecha_ingreso <=',$hasta);
                }
            }else if($desde == $hasta && $desde!=''){
                $this->db->where('fecha_ingreso',$desde);
            }
        $q = $this->db->get('datos');
        $cant=0;
        $cargados = array();
        foreach ($q->result_array() as $row) {
            $datos = json_decode($row['datos']);
            if($ciclo!=''){
                if($datos->ciclo==$ciclo){
                    $cargados[] = $datos;
                    $cant++;  
                }
            }else{
                $cargados[] = $datos;
                $cant++;  
            }
        }
        
        $resultados = array('cant'=>$cant, 'cargados'=>$cargados, 'desde'=>$desde, 'hasta'=>$hasta,'ciclo'=>$ciclo );
        return $resultados;
    }
    public function get_all_for_period($id_sede=0){
        $u = $this->input->post('item');
        
        $desde = (isset($u['desde']))?$u['desde']:'';
        $hasta = (isset($u['hasta']))?$u['hasta']:'';
        $ciclo = (isset($u['ciclo']))?$u['ciclo']:'';

        
            if($desde != $hasta){
                if($desde !=''){
                    $this->db->where('fecha_ingreso >=',$desde);
                }
                if($hasta !=''){
                    $this->db->where('fecha_ingreso <=',$hasta);
                }
            }else if($desde == $hasta && $desde!=''){
                $this->db->where('fecha_ingreso',$desde);
            }
        $q = $this->db->get('datos');

        $cant=0;
        $cargados = array();
        $sede = (int)$id_sede;
        foreach ($q->result_array() as $row) {
            $datos = json_decode($row['datos']);
            
            
            if($ciclo!=''){
                if(isset($datos->ciclo)){
                    if($datos->ciclo==$ciclo){
                        if($sede>0){
                            if($datos->id_sede==$sede){
                                $cargados[] = $datos;
                                $cant++;  
                            }
                        }else{
                            $cargados[] = $datos;
                            $cant++;  
                        }
                    }
                }
            }else {
               if($sede>0){
                    if($datos->id_sede==$sede){
                            $cargados[] = $datos;
                            $cant++;  
                    }
                }else{
                    $cargados[] = $datos;
                    $cant++;  
                }
            }
        }
        
        $resultados = array('cant'=>$cant, 'cargados'=>$cargados, 'desde'=>$desde, 'hasta'=>$hasta,'ciclo'=>$ciclo );
        return $resultados;
    }

    public function get_estadistica_by_sede($id=0){
        $u = $this->input->post('item');
        
        $desde = (isset($u['desde']))?$u['desde']:'';
        $hasta = (isset($u['hasta']))?$u['hasta']:'';
        $ciclo = (isset($u['ciclo']))?$u['ciclo']:'';

        $id_user =(isset($u['id_user']))?$u['id_user']:'';
        if($id_user == '' && $id != 0){
            $id_user = $id;
        }
        $user = $this->get_user($id_user);
        $nombre = $user->apellido.', '.$user->nombre;
        $this->db->where('creado_por',$nombre);
        if($desde != $hasta){
                if($desde !=''){
                    $this->db->where('fecha_ingreso >=',$desde);
                }
                if($hasta !=''){
                    $this->db->where('fecha_ingreso <=',$hasta);
                }
            }else if($desde == $hasta && $desde!=''){
                $this->db->where('fecha_ingreso',$desde);
            }
        $q = $this->db->get('datos');
        $cant=0;
        $cargados = array();
        foreach ($q->result_array() as $row) {
            $datos = json_decode($row['datos']);
            if($ciclo!=''){
                if($datos->ciclo==$ciclo){
                    $cargados[] = $datos;
                    $cant++;  
                }
            }else{
                $cargados[] = $datos;
                $cant++;  
            }
        }
        
        $resultados = array('cant'=>$cant, 'cargados'=>$cargados, 'desde'=>$desde, 'hasta'=>$hasta,'ciclo'=>$ciclo );
        return $resultados;
    }

}

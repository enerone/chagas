<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ventas extends MY_Controller {
    
    public function index($indice=0, $criterio= '') {
        
        
        
        $data = array();
        $data['menusel']="ventas";
        $data['menu_top'] = 'admin/menu_top';
        $data['menu_iz'] = 'admin/menu_iz';
        $data['col_derecha'] = 'admin/stock_bar/col_derecha_criterios_bar';
        $data['listado'] = 'admin/ventas/listado';
        $data['categorias_d'] = $this->categoria->get_categorias_tipo('driving');
        $data['categorias_b'] = $this->categoria->get_categorias_tipo('bar');
        
        $data['pag_sel'] = $indice;
        $data['criterio'] = urldecode($criterio);
        $data['items'] = $this->venta->get_ventas();
        $all = $this->stock_b->get_all(urldecode($criterio));
        $data['cant'] = count($all);
        
        $data['admin'] = $this->user->is_admin($this->session->userdata('id'));
        //var_dump($data['admin']);die;
        $this->load->view('admin/admin', $data);
    }
    
    public function sale($id, $precio, $tipo){
        $fecha = date('Y-m-d h:i:s'); 
        $data = array('id_crit'=>$id,'monto'=>$precio,'tipo'=>$tipo, 'fecha'=>$fecha);
        $this->db->insert('ventas',$data);
        
    }
    
    
    function registro_stock() {
        
        $u = $this->input->post('item');
       
        $existe = $this->criterio->criterio_driving_exists($u['criterio']);
        if (!$existe) {
            $this->criterio->registro_criterios_driving($u);
            $this->session->set_flashdata('message', 'El criterio se ha creado satesfactoriamente');
            redirect(base_url() . 'admin/criterios/driving', 'location');
        } else {
            $this->session->set_flashdata('message', 'El criterio ya existe');
            redirect(base_url() . 'admin/criterios/driving', 'location');
        }
    }

    function edicion_criterio_driving() {
        
        $this->criterio->editar_criterios_driving();
        $this->session->set_flashdata('message', 'El criterio ha sido actualizado');
        redirect(base_url() . 'admin/criterios/driving', 'location');
    }
    
    function registro_criterio_bar() {
        
        $u = $this->input->post('item');
        $existe = $this->criterio->criterio_bar_exists($u['criterio']);
        if (!$existe) {
            $this->criterio->registro_criterio_bar($u);
            $this->session->set_flashdata('message', 'El criterio se ha creado satisfactoriamente');
            redirect(base_url() . 'admin/criterios/bar', 'location');
        } else {
            $this->session->set_flashdata('message', 'El criterio ya existe');
            redirect(base_url() . 'admin/criterios/bar', 'location');
        }
    }

    function edicion_criterio_bar() {
        
        $this->criterio->editar_criterios_bar();
        $this->session->set_flashdata('message', 'El criterio ha sido actualizado');
        redirect(base_url() . 'admin/criterios/bar', 'location');
    }
    
    public function actualiza_cant($id=0,$cant=0){
        if($id!=0 && $cant!=0){
            $this->stock_b->actualiza_cant($id,(int)$cant);
            $this->session->set_flashdata('message', 'la cantidad ha sido actualizada');
            redirect(base_url() . 'admin/stock_bar/stock', 'location');
        }
    }
    public function actualiza_precio($id=0,$cant=0){
        if($id!=0 && $cant!=0){
            $this->stock_bar->actualiza_precio($id,(int)$cant);
            $this->session->set_flashdata('message', 'el precio ha sido actualizado');
            redirect(base_url() . 'admin/stock_bar/stock', 'location');
        }
    }
    
    
   public function crea_criterio_driving() {

        $data = array();
        $data['menusel']="crit_driving";
        $data['menu_top'] = 'admin/menu_top';
        $data['menu_iz'] = 'admin/menu_iz';
        $data['col_derecha'] = 'admin/criterios_driving/col_derecha_criterios_driving';
        $data['listado'] = 'admin/criterios_driving/form_criterio_driving';
        
        $data['admin'] = $this->user->is_admin($this->session->userdata('id'));
        
        $this->load->view('admin/admin', $data);
    }
    
    public function edita_criterio_driving($id) {
        $data['menusel']="crit_driving";
        $data['item'] = $this->criterio->get_criterio($id);
        $data['menu_top'] = 'admin/menu_top';
        $data['menu_iz'] = 'admin/menu_iz';
        $data['col_derecha'] = 'admin/criterios_driving/col_derecha_criterios_driving';
        $data['listado'] = 'admin/criterios_driving/form_criterio_driving_edit';
        $data['admin'] = $this->user->is_admin($this->session->userdata('id'));
        
        $this->load->view('admin/admin', $data);
    }
    
    public function borra_criterio_driving($id) {
        $this->criterio->borrar_criterios_driving($id);
        $this->session->set_flashdata('message', 'El criterio ha sido eliminado');
        redirect(base_url() . 'admin/criterios/driving', 'location');
    }
    
    
    public function bar($indice=0, $criterio= '') {
        
        $admin = $this->user->is_admin($this->session->userdata('id'));
        
        $data = array();
        $data['menusel']="crit_bar";
        $data['menu_top'] = 'admin/menu_top';
        $data['menu_iz'] = 'admin/menu_iz';
        $data['col_derecha'] = 'admin/criterios_bar/col_derecha_criterios_bar';
        $data['listado'] = 'admin/criterios_bar/listado_criterios_bar';
        $data['items'] = $this->criterio->get_criterios_bar($indice,urldecode($criterio));
        $data['pag_sel'] = $indice;
        $data['criterio'] = urldecode($criterio);
        $all = $this->criterio->get_all_criterios_bar(urldecode($criterio));
        $data['cant'] = count($all);
        
        $data['admin'] = $this->user->is_admin($this->session->userdata('id'));
        //var_dump($data['admin']);die;
        $this->load->view('admin/admin', $data);
    }
    
   public function crea_criterio_bar() {

        $data = array();
        $data['menusel']="crit_bar";
        $data['menu_top'] = 'admin/menu_top';
        $data['menu_iz'] = 'admin/menu_iz';
        $data['col_derecha'] = 'admin/criterios_bar/col_derecha_criterios_bar';
        $data['listado'] = 'admin/criterios_bar/form_criterio_bar';
        
        $data['admin'] = $this->user->is_admin($this->session->userdata('id'));
        
        $this->load->view('admin/admin', $data);
    }
    
    public function edita_criterio_bar($id) {

        $data['item'] = $this->criterio->get_criterio_bar($id);
        $data['menusel']="crit_bar";
        $data['menu_top'] = 'admin/menu_top';
        $data['menu_iz'] = 'admin/menu_iz';
        $data['col_derecha'] = 'admin/criterios_bar/col_derecha_criterios_bar';
        $data['listado'] = 'admin/criterios_bar/form_criterio_bar_edit';
        $data['admin'] = $this->user->is_admin($this->session->userdata('id'));
        
        $this->load->view('admin/admin', $data);
    }
    
    public function borra_criterio_bar($id) {
        $this->criterio->borrar_criterios_bar($id);
        $this->session->set_flashdata('message', 'El criterio ha sido eliminado');
        redirect(base_url() . 'admin/criterios/bar', 'location');
    }
}

<?php



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Viviendas extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->config_editor = array();
        //indicamos la ruta para ckFinder
        $this->config_editor['filebrowserBrowseUrl'] = base_url()."assets/ckeditor/kcfinder/browse.php";
        // indicamos la ruta para el boton de la toolbar para subir imagenes
        $this->config_editor['filebrowserImageBrowseUrl'] = base_url()."assets/ckeditor/kcfinder/browse.php?type=images";
        // indicamos la ruta para subir archivos desde la pestaña de la toolbar (Quick Upload)
        $this->config_editor['filebrowserUploadUrl'] = base_url()."assets/ckeditor/kcfinder/upload.php?type=files";
        // indicamos la ruta para subir imagenesdesde la pestaña de la toolbar (Quick Upload)
        $this->config_editor['filebrowserImageUploadUrl'] = base_url()."assets/ckeditor/kcfinder/upload.php?type=images";
        $this->config_editor['toolbar'] = array(
            array('Source', '-', 'Bold', 'Italic', 'Underline', 'Strike'),
            array('Image', 'Link', 'Unlink', 'Anchor')
        );
        $this->load->model('vivienda');


    }

    public function index() {
        $admin = $this->user->is_admin($this->session->userdata('id'));

        $data = array();
        $data['menusel'] = "viviendas";
        $data['menu_top'] = 'admin/menu_top';
        $data['listado'] = 'admin/viviendas/listado';
        //$args = array('tabla'=>'viviendas','campo_orden'=>'id_sede','dir_orden'=>'asc');
        //$data['items'] = $this->varios->getItems($args);
        $data['items'] = $this->vivienda->getViviendas();
        $data['admin'] = $this->administrador->is_admin($this->session->userdata('id'));


        $this->load->view('admin/admin_n', $data);
    }

    public function crea() {
        $submit = $this->input->post('submit');
        if ($submit == "Guardar") {
            $u = $this->input->post('item');
            $this->vivienda->registro($u);
            $this->session->set_flashdata('message', 'La vivienda se agreg&oacute; correctamente');
            redirect(base_url() . 'admin/viviendas/index', 'location');
        } else {
            $data = array();
            $data['config'] = $this->config_editor;
            $admin = $this->user->is_admin($this->session->userdata('id'));
            $data['menusel'] = "viviendas";
            $data['menu_top'] = 'admin/menu_top';
            $data['listado'] = 'admin/viviendas/form';
            $args = array('tabla'=>'sedes','campo_orden'=>'id','dir_orden'=>'asc');
            $data['sedes'] = $this->varios->getItems($args);
            $data['sede'] = 1;
            $data['admin'] = $this->administrador->is_admin($this->session->userdata('id'));
            $this->load->view('admin/admin_n', $data);
        }
    }

    public function edita($id=0) {
     $submit = $this->input->post('submit');
        if ($submit == "Guardar") {
            $u = $this->input->post('item');
            $this->vivienda->edicion($u);
            $this->session->set_flashdata('message', 'La vivienda se ha editado satisfactoriamente');
            redirect(base_url() . 'admin/viviendas/index', 'location');
        } else {
            $data = array();
            $data['config'] = $this->config_editor;
            $admin = $this->user->is_admin($this->session->userdata('id'));
            $data['menusel'] = "viviendas";
            $data['menu_top'] = 'admin/menu_top';
            $data['listado'] = 'admin/viviendas/form_edit';
            $args=array('tabla'=>'viviendas','campo'=>'id','valor'=>$id);
            $data['item'] = $this->varios->getItem($args);
             $args = array('tabla'=>'sedes','campo_orden'=>'id','dir_orden'=>'asc');
            $data['sedes'] = $this->varios->getItems($args);
            $data['admin'] = $this->administrador->is_admin($this->session->userdata('id'));
            $this->load->view('admin/admin_n', $data);
        }
    }

    public function cambiaEstado($id){
        $id_noticia = (int)$id;
        $estado = $this->noticia->cambiaEstado($id);
        echo $estado;
    }

    public function borra($id) {
        $args=array('tabla'=>'viviendas','campo'=>'id','valor'=>$id);
        $this->varios->borraItem($args);
        $this->session->set_flashdata('message', 'La vivienda ha sido eliminada');
        redirect(base_url() . 'admin/viviendas/index', 'location');
    }

    public function getBarrioById($id=0,$sede = 0){
        $barrio = $this->barrio->getBarrioById($id,$sede);
        if($barrio != 'no existe'){
            echo json_encode($barrio);
        }else{
            echo json_encode('no existe');
        }
    }

    public function imp(){
        $res = $this->db->get('vivi')->result();
        $a = 0;
        foreach($res as $r){
            $data = array(
                    'id_vivienda'=>$r->id_vivienda,
                    'latitud'=>$r->latitud,
                    'longitud'=>$r->longitud
                    );
            $this->db->insert('viviendas',$data);
            $a++;
            echo $a;
        }

    }

} //class end bracket


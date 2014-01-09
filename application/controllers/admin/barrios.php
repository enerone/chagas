<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barrios extends MY_Controller {

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
        $this->load->model('barrio');


    }

    public function index() {
        $admin = $this->user->is_admin($this->session->userdata('id'));

        $data = array();
        $data['menusel'] = "barrios";
        $data['menu_top'] = 'admin/menu_top';
        $data['listado'] = 'admin/barrios/listado';
        $args = array('tabla'=>'barrios','campo_orden'=>'id_sede','dir_orden'=>'asc');
        $data['items'] = $this->varios->getItems($args);
        $data['admin'] = $this->administrador->is_admin($this->session->userdata('id'));


        $this->load->view('admin/admin_n', $data);
    }

    public function crea() {
        $submit = $this->input->post('submit');
        if ($submit == "Guardar") {
            $u = $this->input->post('item');
            $this->barrio->registro($u);
            $this->session->set_flashdata('message', 'El barrio se agreg&oacute; correctamente');
            redirect(base_url() . 'admin/barrios/index', 'location');
        } else {
            $data = array();
            $data['config'] = $this->config_editor;
            $admin = $this->user->is_admin($this->session->userdata('id'));
            $data['menusel'] = "barrios";
            $data['menu_top'] = 'admin/menu_top';
            $data['listado'] = 'admin/barrios/form';
            $args = array('tabla'=>'sedes','campo_orden'=>'id','dir_orden'=>'asc');
            $data['sedes'] = $this->varios->getItems($args);
            $data['admin'] = $this->administrador->is_admin($this->session->userdata('id'));
            $this->load->view('admin/admin_n', $data);
        }
    }

    public function edita($id=0) {
     $submit = $this->input->post('submit');
        if ($submit == "Guardar") {
            $u = $this->input->post('item');
            $this->barrio->edicion($u);
            $this->session->set_flashdata('message', 'El barrio se ha editado satisfactoriamente');
            redirect(base_url() . 'admin/barrios/index', 'location');
        } else {
            $data = array();
            $data['config'] = $this->config_editor;
            $admin = $this->user->is_admin($this->session->userdata('id'));
            $data['menusel'] = "barrios";
            $data['menu_top'] = 'admin/menu_top';
            $data['listado'] = 'admin/barrios/form_edit';
            $args=array('tabla'=>'barrios','campo'=>'id','valor'=>$id);
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
        $args=array('tabla'=>'barrios','campo'=>'id','valor'=>$id);
        $this->varios->borraItem($args);
        $this->session->set_flashdata('message', 'el barrio ha sido eliminado');
        redirect(base_url() . 'admin/barrios/index', 'location');
    }

    public function getBarrioById($id=0,$sede = 0){
        $barrio = $this->barrio->getBarrioById($id,$sede);
        if($barrio != 'no existe'){
            echo json_encode($barrio);
        }else{
            echo json_encode('no existe');
        }
    }

} //class end bracket


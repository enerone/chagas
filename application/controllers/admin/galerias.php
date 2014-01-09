<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Galerias extends MY_Controller {
    
    public function __construct() {
        parent::__construct();        
        $this->config_editor = array();
        //indicamos la ruta para ckFinder
        $this->config_editor['filebrowserBrowseUrl'] = "../../assets/ckeditor/kcfinder/browse.php";
        // indicamos la ruta para el boton de la toolbar para subir imagenes
        $this->config_editor['filebrowserImageBrowseUrl'] = "../../assets/ckeditor/kcfinder/browse.php?type=images";
        // indicamos la ruta para subir archivos desde la pestaña de la toolbar (Quick Upload)
        $this->config_editor['filebrowserUploadUrl'] = "../../assets/ckeditor/kcfinder/upload.php?type=files";
        // indicamos la ruta para subir imagenesdesde la pestaña de la toolbar (Quick Upload)
        $this->config_editor['filebrowserImageUploadUrl'] = "../../assets/ckeditor/kcfinder/upload.php?type=images";
        $this->config_editor['toolbar'] = array(
            array('Source', '-', 'Bold', 'Italic', 'Underline', 'Strike'),
            array('Image', 'Link', 'Unlink', 'Anchor')
        );

        
    }

    public function index() {
        $admin = $this->user->is_admin($this->session->userdata('id'));

        $data = array();
        $data['menusel'] = "galerias";
        $data['menu_top'] = 'admin/menu_top';
        $data['menu_iz'] = 'admin/menu_iz';
        $data['listado'] = 'admin/galerias/listado';
        $data['col_derecha'] = 'admin/galerias/col_derecha';
        $args = array('tabla'=>'galerias','campo_orden'=>'id','dir_orden'=>'asc');
        $data['items'] = $this->varios->getItems($args);
        $data['admin'] = $this->administrador->is_admin($this->session->userdata('id'));
        $this->load->view('admin/admin', $data);
    }

    public function crea() {
        $submit = $this->input->post('submit');
        if ($submit == "Guardar") {
            $u = $this->input->post('item');
            $this->galeria->registro($u);
            $this->session->set_flashdata('message', 'La galeria se ha creado satisfactoriamente');
            redirect(base_url() . 'admin/galerias/index', 'location');
        } else {
            
            $_SESSION['KCFINDER'] = array();
            $_SESSION['KCFINDER']['disabled'] = false;
            $this->load->library('ckeditor', array('instanceName' => 'CKEDITOR1', 'basePath' => "../../assets/ckeditor/", 'outPut' => true));
            $data = array();
            $data['config'] = $this->config_editor;
            $admin = $this->user->is_admin($this->session->userdata('id'));
            $data['menusel'] = "galerias";
            $data['menu_top'] = 'admin/menu_top';
            $data['menu_iz'] = 'admin/menu_iz';
            $data['listado'] = 'admin/galerias/form';
            $data['col_derecha'] = 'admin/galerias/col_derecha';
            $args = array('tabla'=>'galerias','campo_orden'=>'id','dir_orden'=>'asc');
            
            $data['admin'] = $this->administrador->is_admin($this->session->userdata('id'));
            $this->load->view('admin/admin', $data);
        }
    }

    public function edita($id=0) {
     $submit = $this->input->post('submit');
        if ($submit == "Guardar") {
            $u = $this->input->post('item');
            
            $this->galeria->edicion($u);
            $this->session->set_flashdata('message', 'La galeria se ha editado satisfactoriamente');
            redirect(base_url() . 'admin/galerias/index', 'location');
        } else {
            
            $_SESSION['KCFINDER'] = array();
            $_SESSION['KCFINDER']['disabled'] = false;
            $this->load->library('ckeditor', array('instanceName' => 'CKEDITOR1', 'basePath' => "../../assets/ckeditor/", 'outPut' => true));
            $data = array();
            $data['config'] = $this->config_editor;
            $admin = $this->user->is_admin($this->session->userdata('id'));
            $data['menusel'] = "galerias";
            $data['menu_top'] = 'admin/menu_top';
            $data['menu_iz'] = 'admin/menu_iz';
            $data['listado'] = 'admin/galerias/form_edit';
            $data['col_derecha'] = 'admin/galerias/col_derecha';
            $args=array('tabla'=>'galerias','campo'=>'id','valor'=>$id);
            $data['item'] = $this->varios->getItem($args);
            $data['admin'] = $this->administrador->is_admin($this->session->userdata('id'));
            $this->load->view('admin/admin', $data);
        }
    }

    public function borra($id) {
        $args=array('tabla'=>'galerias','campo'=>'id','valor'=>$id);
        $this->varios->borraItem($args);
        $this->session->set_flashdata('message', 'la galeria ha sido eliminada');
        redirect(base_url() . 'admin/galerias/index', 'location');
    }
    
    public function sorting(){
        $submit = $this->input->post('submit');
         if ($submit != '') {
          $order=explode(',',$this->input->post('sarasa'));
          foreach ($order as $key => $value) {
               $data = array('orden'=>$key);
               $this->db->where('id',$value);
               $this->db->update('secciones',$data);
          }
           redirect(base_url() . 'admin/secciones/sorting/', 'refresh');
         }else{
        $data = array();
        $args = array(
            'tabla'=>'secciones', 
            'campo_orden'=>'orden', 
            'dir_orden'=>'asc',
            'campo_where'=>'id_seccion',
            'valor_where'=>0
            );
        $data['items'] = $this->varios->getItems($args);
       
        $admin = $this->user->is_admin($this->session->userdata('id'));
        $data['menusel'] = "secciones";
        $data['menu_top'] = 'admin/menu_top';
        $data['menu_iz'] = 'admin/menu_iz';
        $data['listado'] = 'admin/secciones/sorting';
        $data['col_derecha'] = 'admin/secciones/col_derecha';

        
        $this->load->view('admin/admin', $data);
        }
    }
    
    
    
    
    public function imagenes($id=0){
        $_SESSION['KCFINDER'] = array();
            $_SESSION['KCFINDER']['disabled'] = false;
            $this->load->library('ckeditor', array('instanceName' => 'CKEDITOR1', 'basePath' => "../../assets/ckeditor/", 'outPut' => true));
            $data = array();
            $data['config'] = $this->config_editor;
        $args = array(
            'tabla'=>'assets_galerias', 
            'campo_orden'=>'id', 
            'dir_orden'=>'asc',
            'campo_where'=>'id_gal',
            'valor_where'=>$id
            );
        $data['items'] = $this->varios->getItems($args);
        $args=array('tabla'=>'galerias','campo'=>'id','valor'=>$id);
        $data['item'] = $this->varios->getItem($args);
        $admin = $this->user->is_admin($this->session->userdata('id'));
        $data['menusel'] = "galerias";
        $data['menu_top'] = 'admin/menu_top';
        $data['menu_iz'] = 'admin/menu_iz';
        $data['listado'] = 'admin/galerias/galeria';
        $data['col_derecha'] = 'admin/galerias/col_derecha';

        
        $this->load->view('admin/admin', $data);
    }

    public function add_imagen(){
        $args = array(
            'path'  =>  './assets/imagenes/',
            'ancho' =>  1024,
            'alto'  =>  1024,
            'tabla' =>  'assets_galerias',
            'campo' =>  'id',
            'valor' =>  0,
            'tipo'  =>  $this->input->post('tipo'),
            'campo_imagen'  =>  'fileField',
            'campos'=>  array('copete'      =>  'copete',
                            'titulo'        =>  'titulo', 
                            'link'          =>  'link',
                            'id_gal'        =>  'id_gal'
                            
                )
            
            
            
        );
        
        
        
        $this->varios->addImage($args);
        redirect(base_url() . 'admin/galerias/imagenes/'.$this->input->post('id_gal'), 'refresh');
    }
    
    public function borra_imagen($id=0,$id_sec=0){
        $args=array('tabla'=>'assets_galerias','campo'=>'id','valor'=>$id);
        $item = $this->varios->getItem($args);
        
        if(is_file('./assets/imagenes/'.$item->path)){
            unlink('./assets/imagenes/'.$item->path);
        }
        $args=array('tabla'=>'assets_galerias','campo'=>'id','valor'=>$id);
        $this->varios->borraItem($args);
        $this->session->set_flashdata('message', 'la imagen ha sido eliminada');
        redirect(base_url() . 'admin/galerias/imagenes/'.$id_sec, 'location');
    }
    
    
    

}


<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends MY_Controller {
    /* usuarios */

    public function index($indice=0, $criterio= '') {

        $admin = $this->user->is_admin($this->session->userdata('id'));
        if (!$admin) {
            redirect(base_url() . 'admin/admin', 'location');
        }
        $data = array();
        $data['menu_top'] = 'admin/menu_top';
        $data['menu_iz'] = 'admin/menu_iz';
        $data['col_derecha'] = 'admin/usuarios/col_derecha_usuarios';
        $data['listado'] = 'admin/usuarios/listado';
        $data['menusel'] = "usuarios";
        $data['items'] = $this->user->get_users($indice, urldecode($criterio));

        //$data['cias'] = $this->cia->get_all_cias();
         $args_sedes= array('tabla'=>'sedes', 'campo_orden'=>'localidad', 'dir_orden'=>'asc', 'campo_titulo'=>'localidad' );
        $data['sedes'] = $this->varios->getItemsForDropdown($args_sedes);
        $args = array('tabla'=>'barrios','campo_orden'=>'id','dir_orden'=>'asc');
        $data['barrios'] = $this->varios->getItems($args);
        $all = $this->user->get_all_users(urldecode($criterio));
        $data['cant'] = count($all);
        $data['admin'] = $this->user->is_admin($this->session->userdata('id'));
        $this->load->view('admin/admin_n', $data);
    }

    public function crear() {
        $submit = $this->input->post('submit');
        if ($submit != '') {
            $u = $this->input->post('user');
            $this->load->model('user');

            $existe = $this->user->email_exists($u['email']);
            if (!$existe) {
                $this->user->registro_usuario($u);
                $this->session->set_flashdata('message', 'El usuario ha sido creado');
                redirect(base_url() . 'admin/usuarios/index', 'location');
            } else {
                $this->session->set_flashdata('message', 'El usuario ya existe');
                redirect(base_url() . 'admin/usuarios/index', 'location');
            }
        }
        $data = array();
        $data['menu_top'] = 'admin/menu_top';
        $data['menu_iz'] = 'admin/menu_iz';

        $data['col_derecha'] = 'admin/usuarios/col_derecha_usuarios_form';
        $data['listado'] = 'admin/usuarios/form_usuario';
        $data['usuarios'] = $this->user->get_users();
        $args = array('tabla'=>'sedes', 'campo_orden'=>'localidad', 'dir_orden'=>'asc', 'campo_titulo'=>'localidad');
        $data['sedes'] = $this->varios->getItemsForDropdown($args);
        $data['admin'] = $this->user->is_admin($this->session->userdata('id'));
        $data['menusel'] = "usuarios";
        $this->load->view('admin/admin_n', $data);
    }

    public function editar($id=0) {
        $submit = $this->input->post('submit');

        if ($submit != '') {
            $this->user->editar_usuario();
            $this->session->set_flashdata('message', 'El usuario ha sido actualizado');
            redirect(base_url() . 'admin/usuarios/index', 'location');
        }
        $data['item'] = $this->user->get_user($id);
        $data['menu_top'] = 'admin/menu_top';
        $data['menu_iz'] = 'admin/menu_iz';
        $data['col_derecha'] = 'admin/usuarios/col_derecha_usuarios_form';
        $args = array('tabla'=>'sedes', 'campo_orden'=>'localidad', 'dir_orden'=>'asc', 'campo_titulo'=>'localidad');
        $data['sedes'] = $this->varios->getItemsForDropdown($args);
        $data['listado'] = 'admin/usuarios/form_usuario_edit';
        $data['admin'] = $this->user->is_admin($this->session->userdata('id'));
        $data['menusel'] = "usuarios";
        $this->load->view('admin/admin_n', $data);
    }

    public function borrar($id) {
        $this->user->borrar_usuario($id);
        $this->session->set_flashdata('message', 'El usuario eliminado');
        redirect(base_url() . 'admin/usuarios', 'location');
    }

    public function informe($id_user){
        $data['item'] = $this->user->get_user($id_user);
        $datos = $this->user->get_estadistica_by_User($id_user);

        $data['datos'] = $datos['cargados'];
        $data['todos'] =  $this->user->get_all_for_period($data['item']->sede);
        $data['otros_datos']=$datos;
        $data['menu_top'] = 'admin/menu_top';
        $data['listado'] = 'admin/usuarios/informes';
        $data['menusel'] = "usuarios";
        $this->load->view('admin/admin_formu', $data);
    }

    public function informes(){

        $u = $this->input->post('item');
        $this->load->model('sede');

        $desde = (isset($u['desde']))?$u['desde']:'';
        $hasta = (isset($u['hasta']))?$u['hasta']:'';
        $ciclo = (isset($u['ciclo']))?$u['ciclo']:'';

        $sede = (isset($u['sede']))?$u['sede']:'';
        if($sede!=''){
            $nombre_sede = $this->sede->getSedeId($sede);
            $data['nombre_sede'] = $nombre_sede[0]->localidad;
        }
        $data['desde'] = $desde;
        $data['hasta'] = $hasta;

        $data['ciclo'] =$ciclo;
        $data['sede'] =$sede;

        $data['usuarios'] = $this->user->get_all_users_by();

        //$data['datos'] = $datos['cargados'];
        //$data['cant'] = count($datos['cargados']);

        $data['todos'] =  $this->user->get_all_for_period($sede);
        //dump($data['todos']);
        $data['cant_total'] = count( $data['todos']['cargados'] );
        //$data['otros_datos']=$datos;
        $data['menu_top'] = 'admin/menu_top_informe_usuarios';
        $data['listado'] = 'admin/usuarios/informes_view';
        $data['menusel'] = "usuarios";
        $this->load->view('admin/admin_informes_usuarios', $data);
    }


    public function getDatosCantidad($u=0){


        $usuarios = $this->user->get_all_users_by($u);

        foreach($usuarios as $val1){
                   $datos1 = $this->user->get_estadistica_by_user($val1->id);
                   $cant1 = count($datos1['cargados']);
                   $string[] = array("'".$val1->apellido.', '.$val1->nombre."'",$cant1);
        }

        echo json_encode($string);
    }

    /* Fin usuarios */


}

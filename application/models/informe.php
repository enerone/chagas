<?php
class Informe extends CI_Model {

    public function getViviendasPositivas($id = 0,$barrio = 0 ,$desde = '',$hasta= '', $ciclo = ''){
        if($id!=0){
            if($barrio > 0){
                $bb = $this->getBarrioId($barrio);
                $barri = $bb[0]->codigo;
            }
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

            $this->db->where('id_form',$id);
            $q = $this->db->get('datos');
            $res = array();
            if ($q->num_rows() > 0) {
                
                foreach ($q->result_array() as $row) {
                    $datos =  json_decode($row['datos']);
                    if($barrio > 0){
                        if($datos->barrio==$barri){
                            if($ciclo!='' && $datos->ciclo == $ciclo){
                                    
                                    $res[] = $datos;
                                
                            }else{

                                $res[] = $datos;
                            }
                        }
                    }else{
                        if($ciclo!='' && $datos->ciclo == $ciclo){
                            $res[] = $datos;
                        }else{
                            $res[] = $datos;
                        }
                    }
                                   
                }     

            }
            if(isset($res)){
                return $res;  
            }else{
                return false;
            }
        }
    }

    public function getInformesViviendas($id = 0,$barrio = 0 ,$desde = '',$hasta= '', $ciclo = ''){
        if($id!=0){
            if($barrio > 0){
                $bb = $this->getBarrioId($barrio);
                $barri = $bb[0]->codigo;
            }
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

            $this->db->where('id_form',$id);
            $q = $this->db->get('datos');
            $res = array();
            $cant_inspeccionadas = 0;
            $cant_cerradas = 0;
            $cant_renuentes = 0;
            $rec_totales =0;
            $rec_conagua =0;
            $rec_conlarvas =0;
            $rec_positivos =0;
            $tratadas =0;
            $larvicida = 0;
           $viviendas_positivas = 0;

            if ($q->num_rows() > 0) {
                
                foreach ($q->result_array() as $row) {
                    $rec_pos = 0;

                    $datos =  json_decode($row['datos']);
                    if($barrio > 0){
                        if($datos->barrio==$barri){
                            if($ciclo!='' && $datos->ciclo == $ciclo){
                                    
                                    if($datos->vivienda_inspeccionada==1){ $cant_inspeccionadas++; }
                                    if($datos->vivienda_cerrada==1){ $cant_cerradas++; }
                                    if($datos->vivienda_renuente==1){ $cant_renuentes++; }
                                    $rec_conagua = $rec_conagua + $datos->conagua_A + $datos->conagua_B + $datos->conagua_C +  $datos->conagua_D + $datos->conagua_E + $datos->conagua_F + $datos->conagua_G + $datos->conagua_H;
                                    $rec_conlarvas = $rec_conlarvas + $datos->conlarvas_A + $datos->conlarvas_B + $datos->conlarvas_C +  $datos->conlarvas_D + $datos->conlarvas_E + $datos->conlarvas_F + $datos->conlarvas_G + $datos->conlarvas_H;
                                    $rec_positivos = $rec_positivos + $datos->positivos_A + $datos->positivos_B + $datos->positivos_C +  $datos->positivos_D + $datos->positivos_E + $datos->positivos_F + $datos->positivos_G + $datos->positivos_H;
                                    $rec_pos = $rec_pos + $datos->positivos_A + $datos->positivos_B + $datos->positivos_C +  $datos->positivos_D + $datos->positivos_E + $datos->positivos_F + $datos->positivos_G + $datos->positivos_H;
                                    if($rec_pos!=0){
                                        $viviendas_positivas++;
                                    }
                                     $rec_totales= $rec_totales + $datos->totales_A + $datos->totales_B + $datos->totales_C +  $datos->totales_D + $datos->totales_E + $datos->totales_F + $datos->totales_G + $datos->totales_H;
                                    if($datos->control_quimico ==1){
                                        $tratadas++;
                                        $larvicida +=  $datos->gramos_aplicados;
                                    }
                                
                            }else{

                                if($datos->vivienda_inspeccionada==1){ $cant_inspeccionadas++; }
                                if($datos->vivienda_cerrada==1){ $cant_cerradas++; }
                                if($datos->vivienda_renuente==1){ $cant_renuentes++; }
                                $rec_conagua = $rec_conagua + $datos->conagua_A + $datos->conagua_B + $datos->conagua_C +  $datos->conagua_D + $datos->conagua_E + $datos->conagua_F + $datos->conagua_G + $datos->conagua_H;
                                $rec_conlarvas = $rec_conlarvas + $datos->conlarvas_A + $datos->conlarvas_B + $datos->conlarvas_C +  $datos->conlarvas_D + $datos->conlarvas_E + $datos->conlarvas_F + $datos->conlarvas_G + $datos->conlarvas_H;
                                $rec_positivos = $rec_positivos + $datos->positivos_A + $datos->positivos_B + $datos->positivos_C +  $datos->positivos_D + $datos->positivos_E + $datos->positivos_F + $datos->positivos_G + $datos->positivos_H;

                                $rec_pos = $rec_pos + $datos->positivos_A + $datos->positivos_B + $datos->positivos_C +  $datos->positivos_D + $datos->positivos_E + $datos->positivos_F + $datos->positivos_G + $datos->positivos_H;
                            if($rec_pos!=0){
                                        $viviendas_positivas++;
                                    }
                                 $rec_totales= $rec_totales + $datos->totales_A + $datos->totales_B + $datos->totales_C +  $datos->totales_D + $datos->totales_E + $datos->totales_F + $datos->totales_G + $datos->totales_H;
                                if($datos->control_quimico ==1){
                                    $tratadas++;
                                    $larvicida +=  $datos->gramos_aplicados;
                                }
                            }
                        }
                    }else{
                        if($ciclo!='' && $datos->ciclo == $ciclo){
                            if($datos->vivienda_inspeccionada==1){ $cant_inspeccionadas++; }
                            if($datos->vivienda_cerrada==1){ $cant_cerradas++; }
                            if($datos->vivienda_renuente==1){ $cant_renuentes++; }
                            $rec_conagua = $rec_conagua + $datos->conagua_A + $datos->conagua_B + $datos->conagua_C +  $datos->conagua_D + $datos->conagua_E + $datos->conagua_F + $datos->conagua_G + $datos->conagua_H;
                            $rec_conlarvas = $rec_conlarvas + $datos->conlarvas_A + $datos->conlarvas_B + $datos->conlarvas_C +  $datos->conlarvas_D + $datos->conlarvas_E + $datos->conlarvas_F + $datos->conlarvas_G + $datos->conlarvas_H;
                            $rec_positivos = $rec_positivos + $datos->positivos_A + $datos->positivos_B + $datos->positivos_C +  $datos->positivos_D + $datos->positivos_E + $datos->positivos_F + $datos->positivos_G + $datos->positivos_H;
                             $rec_pos = $rec_pos + $datos->positivos_A + $datos->positivos_B + $datos->positivos_C +  $datos->positivos_D + $datos->positivos_E + $datos->positivos_F + $datos->positivos_G + $datos->positivos_H;
                            if($rec_pos!=0){
                                        $viviendas_positivas++;
                                    }
                             $rec_totales= $rec_totales + $datos->totales_A + $datos->totales_B + $datos->totales_C +  $datos->totales_D + $datos->totales_E + $datos->totales_F + $datos->totales_G + $datos->totales_H;
                            if($datos->control_quimico ==1){
                                $tratadas++;
                                $larvicida +=  $datos->gramos_aplicados;
                            }
                        }else{
                            if($datos->vivienda_inspeccionada==1){ $cant_inspeccionadas++; }
                            if($datos->vivienda_cerrada==1){ $cant_cerradas++; }
                            if($datos->vivienda_renuente==1){ $cant_renuentes++; }
                            $rec_conagua = $rec_conagua + $datos->conagua_A + $datos->conagua_B + $datos->conagua_C +  $datos->conagua_D + $datos->conagua_E + $datos->conagua_F + $datos->conagua_G + $datos->conagua_H;
                            $rec_conlarvas = $rec_conlarvas + $datos->conlarvas_A + $datos->conlarvas_B + $datos->conlarvas_C +  $datos->conlarvas_D + $datos->conlarvas_E + $datos->conlarvas_F + $datos->conlarvas_G + $datos->conlarvas_H;
                            $rec_positivos = $rec_positivos + $datos->positivos_A + $datos->positivos_B + $datos->positivos_C +  $datos->positivos_D + $datos->positivos_E + $datos->positivos_F + $datos->positivos_G + $datos->positivos_H;
                            $rec_pos = $rec_pos + $datos->positivos_A + $datos->positivos_B + $datos->positivos_C +  $datos->positivos_D + $datos->positivos_E + $datos->positivos_F + $datos->positivos_G + $datos->positivos_H;
                            
                            if($rec_pos!=0){
                                $viviendas_positivas++;
                            }
                            $rec_totales= $rec_totales + $datos->totales_A + $datos->totales_B + $datos->totales_C +  $datos->totales_D + $datos->totales_E + $datos->totales_F + $datos->totales_G + $datos->totales_H;
                            if($datos->control_quimico ==1){
                                $tratadas++;
                                $larvicida +=  $datos->gramos_aplicados;
                            }
                        }
                    }
                }

                $res = array(
                    'inspeccionadas'        => $cant_inspeccionadas,
                    'cerradas'              => $cant_cerradas,
                    'renuentes'             => $cant_renuentes,
                    'totales'               => $cant_inspeccionadas + $cant_cerradas + $cant_renuentes,
                    'rec_totales'           => $rec_totales,
                    'rec_conagua'           => $rec_conagua,
                    'rec_conlarvas'         => $rec_conlarvas,
                    'rec_positivos'         => $rec_positivos,
                    'larvicida'             => $larvicida,
                    'tratadas'              => $tratadas,
                    'viviendas_positivas'   => $viviendas_positivas

                    );
                return json_encode($res);
            }
        }
    }

    public function getViviendasPositivasExcel($id = 0,$barrio = 0 ,$desde = '',$hasta= '', $ciclo = ''){
        
        if($id!=0){
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

            $this->db->where('id_form',$id);
            $q = $this->db->get('datos');
            $res = array();

            if ($q->num_rows() > 0) {
                
                foreach ($q->result_array() as $row) {
                     $datos = json_decode($row['datos']);
                    if($barrio > 0){
                        if($datos->barrio==$barrio){
                             if($ciclo!=''){
                                if($datos->ciclo == $ciclo){
                                    $res1 = json_decode($row['datos']);
                                    $res[] = array('ID'=>$res1->idvivienda,'Criaderos'=>$res1->positivos_total);
                                }
                            }else{
                                $res1 = json_decode($row['datos']);
                                $res[] = array('ID'=>$res1->idvivienda,'Criaderos'=>$res1->positivos_total);
                            }
                        }
                    }else{
                        if($ciclo!=''){
                                if($datos->ciclo == $ciclo){
                                    $res1 = json_decode($row['datos']);
                                    $res[] = array('ID'=>$res1->idvivienda,'Criaderos'=>$res1->positivos_total);
                                }
                        }else{
                            $res1 = json_decode($row['datos']);
                            $res[] = array('ID'=>$res1->idvivienda,'Criaderos'=>$res1->positivos_total);
                        }
                    }
                                   
                }     

            }
            if(isset($res)){
                return $res;  
            }else{
                return false;
            }
        }
    }
    public function getRecipientesPositivosExcel($id = 0,$barrio = 0 ,$desde = '',$hasta= '', $ciclo = ''){
        if($id!=0){
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

            $this->db->where('id_form',$id);
            $q = $this->db->get('datos');
            $res = array();
            
            if ($q->num_rows() > 0) {
                
                foreach ($q->result_array() as $row) {
                     $datos = json_decode($row['datos']);
                    if($barrio > 0){
                        if($datos->barrio==$barrio){
                            if($ciclo!=''){
                                if($datos->ciclo == $ciclo){
                                    $res1 = json_decode($row['datos']);
                                    $res[] = array(
                                        'ID'=>$res1->idvivienda,
                                        'A'=>$res1->positivos_A,
                                        'B'=>$res1->positivos_B,
                                        'C'=>$res1->positivos_C,
                                        'D'=>$res1->positivos_D,
                                        'E'=>$res1->positivos_E,
                                        'F'=>$res1->positivos_F,
                                        'G'=>$res1->positivos_G,
                                        'H'=>$res1->positivos_H

                                        );
                                }
                            }else{
                                 $res1 = json_decode($row['datos']);
                                    $res[] = array(
                                        'ID'=>$res1->idvivienda,
                                        'A'=>$res1->positivos_A,
                                        'B'=>$res1->positivos_B,
                                        'C'=>$res1->positivos_C,
                                        'D'=>$res1->positivos_D,
                                        'E'=>$res1->positivos_E,
                                        'F'=>$res1->positivos_F,
                                        'G'=>$res1->positivos_G,
                                        'H'=>$res1->positivos_H

                                        );
                            }
                        }
                    }else{
                        if($ciclo!=''){
                                if($datos->ciclo == $ciclo){
                                    $res1 = json_decode($row['datos']);
                                     $res[] = array(
                                            'ID'=>$res1->idvivienda,
                                            'A'=>$res1->positivos_A,
                                            'B'=>$res1->positivos_B,
                                            'C'=>$res1->positivos_C,
                                            'D'=>$res1->positivos_D,
                                            'E'=>$res1->positivos_E,
                                            'F'=>$res1->positivos_F,
                                            'G'=>$res1->positivos_G,
                                            'H'=>$res1->positivos_H

                                            );
                                }
                        }else{
                             $res1 = json_decode($row['datos']);
                             $res[] = array(
                                    'ID'=>$res1->idvivienda,
                                    'A'=>$res1->positivos_A,
                                    'B'=>$res1->positivos_B,
                                    'C'=>$res1->positivos_C,
                                    'D'=>$res1->positivos_D,
                                    'E'=>$res1->positivos_E,
                                    'F'=>$res1->positivos_F,
                                    'G'=>$res1->positivos_G,
                                    'H'=>$res1->positivos_H

                                    );
                        }
                    }
                                   
                }     

            }
            if(isset($res)){
                return $res;  
            }else{
                return false;
            }
        }


    }

    public function getBarrioId($id){
        $this->db->where('id',$id);
        $rr = $this->db->get('barrios')->result();
        return $rr;

    }
    public function getInformes($id = 0,$barrio = 0 ,$desde = '',$hasta= '', $ciclo = ''){
        if($barrio > 0){
            $bb = $this->getBarrioId($barrio);
            $barri = $bb[0]->codigo;
        }

        if($id!=0){
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

            $this->db->where('id_form',$id);
            $q = $this->db->get('datos');

             if ($q->num_rows() > 0) {
                $cant = 0;
                $positivos = 0;
                $pos_a=0;
                $pos_b=0;
                $pos_c=0;
                $pos_d=0;
                $pos_e=0;
                $pos_f=0;
                $pos_g=0;
                $pos_h=0;
                $pos_t=0;

                $criaderos_totales = 0;
                $conagua_totales = 0;
                foreach ($q->result_array() as $row) {
                    $datos = json_decode($row['datos']);
                    
                    if($barrio > 0){

                       // die;

                        if($datos->barrio==$barri){

                            if($ciclo!=''){
                                
                                if($datos->ciclo == $ciclo){
                                    $cant++;
                                }
                            }else{
                                $cant++;  
                            }
                        }
                    }else{
                       if($ciclo!=''){
                                
                                if($datos->ciclo == $ciclo){
                                    $cant++;
                                }
                            }else{
                                $cant++;  
                            }
                    }
                    if($barrio > 0){
                        if($datos->barrio==$barri){
                            if($ciclo!=''){
                                if($datos->ciclo == $ciclo){
                                    if($datos->positivos_total>0){ $positivos++; }    
                                    if($datos->totales_total>0){ $criaderos_totales += $datos->totales_total; }    
                                    if($datos->conagua_total>0){ $conagua_totales += $datos->conagua_total; }    

                                    /**/
                                        if($datos->positivos_A>0){ $pos_a += $datos->positivos_A; }
                                        if($datos->positivos_B>0){ $pos_b += $datos->positivos_B; }
                                        if($datos->positivos_C>0){ $pos_c += $datos->positivos_C; }
                                        if($datos->positivos_D>0){ $pos_d += $datos->positivos_D; }
                                        if($datos->positivos_E>0){ $pos_e += $datos->positivos_E; }
                                        if($datos->positivos_F>0){ $pos_f += $datos->positivos_F; }
                                        if($datos->positivos_G>0){ $pos_g += $datos->positivos_G; }
                                        if($datos->positivos_H>0){ $pos_h += $datos->positivos_H; }
                                         if($datos->positivos_total>0){ $pos_t += $datos->positivos_total; }
                                    /**/
                                }else{
                                     if($datos->positivos_total>0){ $positivos++; }    
                                    if($datos->totales_total>0){ $criaderos_totales += $datos->totales_total; }    
                                    if($datos->conagua_total>0){ $conagua_totales += $datos->conagua_total; }    

                                    /**/
                                        if($datos->positivos_A>0){ $pos_a += $datos->positivos_A; }
                                        if($datos->positivos_B>0){ $pos_b += $datos->positivos_B; }
                                        if($datos->positivos_C>0){ $pos_c += $datos->positivos_C; }
                                        if($datos->positivos_D>0){ $pos_d += $datos->positivos_D; }
                                        if($datos->positivos_E>0){ $pos_e += $datos->positivos_E; }
                                        if($datos->positivos_F>0){ $pos_f += $datos->positivos_F; }
                                        if($datos->positivos_G>0){ $pos_g += $datos->positivos_G; }
                                        if($datos->positivos_H>0){ $pos_h += $datos->positivos_H; }
                                         if($datos->positivos_total>0){ $pos_t += $datos->positivos_total; }
                                    /**/
                                }
                            }else{
                                if($datos->positivos_total>0){ $positivos++; }    
                                    if($datos->totales_total>0){ $criaderos_totales += $datos->totales_total; }    
                                    if($datos->conagua_total>0){ $conagua_totales += $datos->conagua_total; }    

                                    /**/
                                        if($datos->positivos_A>0){ $pos_a += $datos->positivos_A; }
                                        if($datos->positivos_B>0){ $pos_b += $datos->positivos_B; }
                                        if($datos->positivos_C>0){ $pos_c += $datos->positivos_C; }
                                        if($datos->positivos_D>0){ $pos_d += $datos->positivos_D; }
                                        if($datos->positivos_E>0){ $pos_e += $datos->positivos_E; }
                                        if($datos->positivos_F>0){ $pos_f += $datos->positivos_F; }
                                        if($datos->positivos_G>0){ $pos_g += $datos->positivos_G; }
                                        if($datos->positivos_H>0){ $pos_h += $datos->positivos_H; }
                                        if($datos->positivos_total>0){ $pos_t += $datos->positivos_total; }
                                    /**/
                            }

                        }
                    }else{
                        if($ciclo!=''){
                                if($datos->ciclo == $ciclo){
                                    if($datos->positivos_total>0){ $positivos++; }
                                    if($datos->totales_total>0){ $criaderos_totales += $datos->totales_total; }   
                                    if($datos->conagua_total>0){ $conagua_totales += $datos->conagua_total; } 

                                    /**/
                                        if($datos->positivos_A>0){ $pos_a += $datos->positivos_A; }
                                        if($datos->positivos_B>0){ $pos_b += $datos->positivos_B; }
                                        if($datos->positivos_C>0){ $pos_c += $datos->positivos_C; }
                                        if($datos->positivos_D>0){ $pos_d += $datos->positivos_D; }
                                        if($datos->positivos_E>0){ $pos_e += $datos->positivos_E; }
                                        if($datos->positivos_F>0){ $pos_f += $datos->positivos_F; }
                                        if($datos->positivos_G>0){ $pos_g += $datos->positivos_G; }
                                        if($datos->positivos_H>0){ $pos_h += $datos->positivos_H; }
                                        if($datos->positivos_total>0){ $pos_t += $datos->positivos_total; }

                                    /**/
                                }
                        }else{
                            if($datos->positivos_total>0){ $positivos++; }
                            if($datos->totales_total>0){ $criaderos_totales += $datos->totales_total; }   
                            if($datos->conagua_total>0){ $conagua_totales += $datos->conagua_total; } 

                            /**/
                                if($datos->positivos_A>0){ $pos_a += $datos->positivos_A; }
                                if($datos->positivos_B>0){ $pos_b += $datos->positivos_B; }
                                if($datos->positivos_C>0){ $pos_c += $datos->positivos_C; }
                                if($datos->positivos_D>0){ $pos_d += $datos->positivos_D; }
                                if($datos->positivos_E>0){ $pos_e += $datos->positivos_E; }
                                if($datos->positivos_F>0){ $pos_f += $datos->positivos_F; }
                                if($datos->positivos_G>0){ $pos_g += $datos->positivos_G; }
                                if($datos->positivos_H>0){ $pos_h += $datos->positivos_H; }
                                if($datos->positivos_total>0){ $pos_t += $datos->positivos_total; }

                            /**/
                        }
                    }
                     if($pos_t==0){
                            $pos_t = 1;
                        }
                     if($barrio > 0){
                        if($datos->barrio==$barri){
                            if($ciclo!=''){
                                if($datos->ciclo == $ciclo){
                                    $porc_a = ($pos_a > 0 )?($pos_a * 100)/$pos_t:0;
                                    $porc_b = ($pos_b > 0 )?($pos_b * 100)/$pos_t:0;
                                    $porc_c = ($pos_c > 0 )?($pos_c * 100)/$pos_t:0;
                                    $porc_d = ($pos_d > 0 )?($pos_d * 100)/$pos_t:0;
                                    $porc_e = ($pos_e > 0 )?($pos_e * 100)/$pos_t:0;
                                    $porc_f = ($pos_f > 0 )?($pos_f * 100)/$pos_t:0;
                                    $porc_g = ($pos_g > 0 )?($pos_g * 100)/$pos_t:0;
                                    $porc_h = ($pos_h > 0 )?($pos_h * 100)/$pos_t:0;
                                }
                            }else{
                                $porc_a = ($pos_a > 0 )?($pos_a * 100)/$pos_t:0;
                                $porc_b = ($pos_b > 0 )?($pos_b * 100)/$pos_t:0;
                                $porc_c = ($pos_c > 0 )?($pos_c * 100)/$pos_t:0;
                                $porc_d = ($pos_d > 0 )?($pos_d * 100)/$pos_t:0;
                                $porc_e = ($pos_e > 0 )?($pos_e * 100)/$pos_t:0;
                                $porc_f = ($pos_f > 0 )?($pos_f * 100)/$pos_t:0;
                                $porc_g = ($pos_g > 0 )?($pos_g * 100)/$pos_t:0;
                                $porc_h = ($pos_h > 0 )?($pos_h * 100)/$pos_t:0;
                            }
                        }else{
                            $porc_a = ($pos_a > 0 )?($pos_a * 100)/$pos_t:0;
                                $porc_b = ($pos_b > 0 )?($pos_b * 100)/$pos_t:0;
                                $porc_c = ($pos_c > 0 )?($pos_c * 100)/$pos_t:0;
                                $porc_d = ($pos_d > 0 )?($pos_d * 100)/$pos_t:0;
                                $porc_e = ($pos_e > 0 )?($pos_e * 100)/$pos_t:0;
                                $porc_f = ($pos_f > 0 )?($pos_f * 100)/$pos_t:0;
                                $porc_g = ($pos_g > 0 )?($pos_g * 100)/$pos_t:0;
                                $porc_h = ($pos_h > 0 )?($pos_h * 100)/$pos_t:0;
                        }
                    }else{

                        $porc_a = ($pos_a > 0 )?($pos_a * 100)/$pos_t:0;
                        $porc_b = ($pos_b > 0 )?($pos_b * 100)/$pos_t:0;
                        $porc_c = ($pos_c > 0 )?($pos_c * 100)/$pos_t:0;
                        $porc_d = ($pos_d > 0 )?($pos_d * 100)/$pos_t:0;
                        $porc_e = ($pos_e > 0 )?($pos_e * 100)/$pos_t:0;
                        $porc_f = ($pos_f > 0 )?($pos_f * 100)/$pos_t:0;
                        $porc_g = ($pos_g > 0 )?($pos_g * 100)/$pos_t:0;
                        $porc_h = ($pos_h > 0 )?($pos_h * 100)/$pos_t:0;
                    }                 
                }

                $res = array(
                    'iv'=>array('cant_iv'=>$cant, 'positivos'=>$positivos),
                    'ib'=>array('cant_ib'=>$cant, 'criaderos_totales'=>$criaderos_totales),
                    'ir'=>array('criaderos_totales'=>$criaderos_totales, 'rec_con_agua'=>$conagua_totales),
                    'recipientes' => array(
                        'pos_a'=>$pos_a,
                        'pos_b'=>$pos_b,
                        'pos_c'=>$pos_c,
                        'pos_d'=>$pos_d,
                        'pos_e'=>$pos_e,
                        'pos_f'=>$pos_f,
                        'pos_g'=>$pos_g,
                        'pos_h'=>$pos_h,
                        'pos_t'=>$pos_t
                        ),
                    'porcentajes'=>array(
                        'porc_a'=>round($porc_a,2),
                        'porc_b'=>round($porc_b,2),
                        'porc_c'=>round($porc_c,2),
                        'porc_d'=>round($porc_d,2),
                        'porc_e'=>round($porc_e,2),
                        'porc_f'=>round($porc_f,2),
                        'porc_g'=>round($porc_g,2),
                        'porc_h'=>round($porc_h,2)

                        )

                    );

            }
            if(isset($res)){
                return $res;  
            }else{
                return false;
            }
        }
    }

    public function getSedeByFormId($id = 0){
        
        $id_form = (int)$id;
        if($id_form>0){
            $this->db->where('id',$id_form);
            $q = $this->db->get('formularios')->result();
        }
        
        $this->db->where('id',$q[0]->id_sede);
        $Q = $this->db->get('sedes')->result();
        return $Q[0];
    }

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

    public function getUsuarioActual(){
        $id     = $this->session->userdata('id');
        $data   = array('id'=>$id);
        $Q      = $this->db->get_where('usuarios',$data);
        if ($Q->num_rows() > 0) {
                foreach ($Q->result() as $row) {
                    $users = $row; 
                }
            }
        return $users;   
    }

    public function registro($u) {
        $u = $this->input->post('item');
        $hoy = @date('Y-m-d');
        $admin = $this->get_user($this->session->userdata('id'));
        $data = array(
            'id_sede' => $u['id_sede'],
            'id_proyecto' => $u['id_proyecto'],
            'nombre' => $u['nombre'],
            'fecha_creacion' => $hoy,
            'fecha_modificacion'=> $hoy,
            'creado_por' => $this->session->userdata('id'),
            'formulario' => $u['formulario'],
            'status' => $u['status']
        );
        $this->db->insert('formularios', $data);
    }
    

    public function carga_de_datos(){
        $u = $this->input->post();
        
        $hoy = @date('Y-m-d');
        $usuario = $this->getUsuarioActual();
        
        $datos = json_encode($u);
        $data =array('id_form'=>$u['id'], 'fecha_ingreso'=>$hoy, 'datos'=>$datos, 'creado_por'=>$usuario->apellido.', '.$usuario->nombre);
        $this->db->insert('datos',$data);

    }

    public function edicion() {
        $u = $this->input->post('item');
        $admin = $this->get_user($this->session->userdata('id'));
        $hoy = @date('Y-m-d');
        $data = array(
            
           'nombre' => $u['nombre'],
            'status' => $u['status'],
            'id_sede' => $u['id_sede'],
            'id_proyecto' => $u['id_proyecto'],
            'fecha_modificacion' => $hoy,
            'modificado_por' => $this->session->userdata('id'),
            'formulario' => $u['formulario']
        );
        $this->db->where('id', $u['id']);
        $this->db->update('formularios', $data);

       
    }

    public function getSedeId($id_sede){
        $id = (int)$id_sede;
        $this->db->where('id',$id);
        $res = $this->db->get('sedes')->result();
        return $res;
    }


    function Obj2ArrRecursivo($Objeto) {
        if (is_object($Objeto))
            $Objeto = get_object_vars($Objeto);
        if (is_array($Objeto))
            foreach ($Objeto as $key => $value)
                $Objeto [$key] = $this->Obj2ArrRecursivo($Objeto [$key]);
        return $Objeto;
    }

    public function getDatosByIdForm($id = 0, $desde='',$hasta='', $ciclo = ''){
        $id = (int)$id;

        $data = array('id_form'=>$id);
        $this->db->where('id_form',$id);
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

        $Q = $this->db->get('datos');

        if ($Q->num_rows() > 0) {
                foreach ($Q->result_array() as $row) {
                     $r = $this->Obj2ArrRecursivo(json_decode($row['datos']));
                    $res[] = $r; 
                }
            }
        return $res;   
    }
    
}

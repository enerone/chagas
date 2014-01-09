<div class="table">
    <?php
    $attributes = array('id' => 'id-form');
    echo form_open_multipart(base_url().'admin/usuarios/editar',$attributes); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
        <tr>
            <th class="full" colspan="2">Edici&oacute;n de Usuarios</th>
            <input type="hidden" name="user[admin]" value="<?php echo $this->session->userdata('nombre').' '.$this->session->userdata('apellido');?>"/>
        </tr>



        <tr>
            <td width="172"><strong>Nombre</strong></td>
            <td>
                <input type="text" name="user[nombre]" value="<?php echo $item->nombre; ?>" class="inp-form" />
                <input type="hidden" name="user[id]"  value="<?php echo $item->id; ?>"  />
            </td>
        </tr>
        <tr>
            <td width="172"><strong>Apellido</strong></td>
            <td><input type="text" name="user[apellido]" class="inp-form" value="<?php echo $item->apellido; ?>"  /></td>
        </tr>
        <tr>
            <td width="172"><strong>Email</strong></td>
            <td><input type="text" name="user[email]" class="inp-form"  value="<?php echo $item->email; ?>" /></td>
        </tr>

        <tr>
            <td width="172"><strong>Passsword</strong></td>
            <td><input type="text" name="user[pass]" class="inp-form"  value="<?php echo $item->pass; ?>"  /></td>
        </tr>
         <tr>
            <td width="172"><strong>Sede</strong></td>
            <td>

                <select id="sede" name="user[id_sede]" >
                    <option value=""></option>
                    <?php
                    foreach ($sedes as $key => $value) {
                        if((int)$item->sede == $key){
                            echo '<option value="' . $key . '" selected>'. $value .'</option>';
                        }else{
                            echo '<option value="' . $key . '">'. $value .'</option>';
                        }
                    }
                    ?>

                </select>
            </td>
        </tr>
        <tr>
            <td><strong>Tipo de Usuario</strong>


            </td>
            <td>
                <select name='user[type]'>
                    <option value=""></option>
                    <?php

                    if($item->type == 1){ ?>
                        <option value="1" selected>Usuario con capacidad de edicion</option>
                        <option value="0">Usuario sin capacidad de edicion</option>
                    <?php }else{ ?>
                        <option value="1">Usuario con capacidad de edicion</option>
                        <option value="0" selected>Usuario sin capacidad de edicion</option>
                    <?php } ?>
                </select>
            </td>
        </tr>



        <tr>
            <td>&nbsp;</td>
            <td><?php echo form_submit('submit', 'Guardar'); ?></td>
        </tr>
        <tr style="height:200px;"><td>&nbsp;</td><td>&nbsp;</td></tr>
    </table>
    <?php echo form_close(); ?>
</div>

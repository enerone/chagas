<div class="table">
    <?php
    $attributes = array('id' => 'id-form');
    echo form_open_multipart(base_url().'admin/barrios/edita',$attributes); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">

        <tr>
            <th class="full" colspan="2">Edici&oacute;n de Barrio </th>
        </tr>





          <tr>
            <td width="172"><strong>C&oacute;digo</strong></td>
            <td><input type="text" name="item[codigo]" class="inp-form"  value="<?php echo $item->codigo; ?>" />
                <input type="hidden" name="item[id]" class="inp-form"  value="<?php echo $item->id; ?>" /></td>
        </tr>

        <tr>
            <td width="172"><strong>Nombre del Barrio</strong></td>
            <td><input type="text" name="item[nombre]" class="inp-form"  value="<?php echo $item->nombre; ?>" /></td>
        </tr>

        <tr>
            <td> <strong>Sede: </strong> </td>
            <td>

                <select id="sede" name="item[id_sede]">
                    <option value=""></option>
                    <?php

                    foreach ($sedes as $value) {
                        if($item->id_sede == $value->id ){
                            echo '<option value="' . $value->id . '" selected>'. $value->localidad .'</option>';
                        }else{
                            echo '<option value="' . $value->id . '">'. $value->localidad .'</option>';
                        }
                    }
                    ?>

                </select>
            </td>
        </tr>










        <tr>
            <td>&nbsp;</td>
            <td><?php echo form_submit('submit', 'Guardar'); ?><!--<a href="#" class="orange">LOGIN</a>--></td>
        </tr>
        <tr style="height:200px;"><td>&nbsp;</td><td>&nbsp;</td></tr>

    </table>
    <?php echo form_close(); ?>
</div>

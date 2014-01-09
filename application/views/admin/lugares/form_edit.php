<div class="table">
    <?php
    $attributes = array('id' => 'id-form');
    echo form_open_multipart(base_url().'admin/lugares/edita',$attributes); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">

        <tr>
            <th class="full" colspan="2">Edici&oacute;n de Lugar </th>
        </tr>






        <tr>
            <td width="172"><strong>Lugar</strong></td>
            <td>
                <input type="text" name="item[nombre]" class="inp-form"  value="<?php echo $item->nombre; ?>" />
                <input type="hidden" name="item[id]" class="text"  value="<?php echo $item->id; ?>" />
            </td>
        </tr>

        <tr>
            <td> <strong>Tipo: </strong> </td>
            <td>

                <select id="tipo" name="item[tipo]">

                    <?php
                    if ($item->tipo =='intradomicilio'){ ?>
                        <option value="intradomicilio" selected>Intradomicilio</option>
                        <option value="peridomicilio">Peridomicilio</option>
                    <?php }else{ ?>
                            <option value="intradomicilio" >Intradomicilio</option>
                            <option value="peridomicilio" selected>Peridomicilio</option>
                   <?php } ?>

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

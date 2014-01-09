<div class="table">
    <?php 

    $attributes = array('id' => 'id-form');
    echo form_open_multipart(base_url().'admin/sedes/crea',$attributes); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
        
        <tr>
            <th class="full" colspan="2" style="font-size: 20px;">Incorporacion de Sedes</th>
        </tr>
       
        
          <tr>
            <th valign="top"><strong>Localidad</strong></td>
            <td><input type="text" name="item[localidad]" class="inp-form" /></td>
            <td></td>
        </tr>
        
        <tr>
            <td width="172"><strong>Provincia</strong></td>
            <td><input type="text" name="item[provincia]" class="inp-form" /></td>
        </tr>

        <tr>
            <td width="172"><strong>Direcci&oacute;n</strong></td>
            <td><input type="text" name="item[direccion]" class="inp-form" /></td>
        </tr>

        <tr>
            <td width="172"><strong>C&oacute;digo Postal</strong></td>
            <td><input type="text" name="item[codpos]" class="inp-form" /></td>
        </tr>
        <tr>
            <td width="172"><strong>Tel&eacute;fono</strong></td>
            <td><input type="text" name="item[telefono]" class="inp-form" /></td>
        </tr>
        
        <tr>
            <td width="172"><strong>Responsable de la sede</strong></td>
            <td><input type="text" name="item[responsable]" class="inp-form" /></td>
        </tr>
         
        <tr>
            <td width="172"><strong>Email</strong></td>
            <td><input type="text" name="item[email]" class="inp-form" /></td>
        </tr>
        
        
       <tr>
            <td>&nbsp;</td>
            <td><?php echo form_submit('submit', 'Guardar'); ?><!--<a href="#" class="orange">LOGIN</a>--></td>
        </tr>
    </table>
    <?php echo form_close(); ?>
</div>
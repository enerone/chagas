<div class="table">
    <?php echo form_open_multipart(base_url().'admin/noticias/edita'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
        
        <tr>
            <th class="full" colspan="2">Edici&oacute;n de Noticias</th>
        </tr>
         <tr>
            <td width="172"><strong>Empresa</strong></td>
            <td>
                <?php
                $empresas['Insud']='Insud';
                $empresas['Solantu']='Solantu';
                $empresas['Cisa']='Cisa';
                $empresas['Yacaré Pora']='Yacaré Pora';
                $empresas['KS Films']='KS Films';
                $empresas['Condor Express']='Condor Express';
                $empresas['Romikin']='Romikin';
                $empresas['LMD']='LMD';
                $empresas['Pharmadn']='Pharmadn';
                $empresas['Simposium']='Simposium';
                $empresas['FMS']='FMS';
                $empresas['Garruchos']='Garruchos';
                $empresas['ACAF']='ACAF';
                $empresas['Casares']='Casares';

                $conf_drop = 'class="estado" id="estado"';
                    foreach($empresas as $k=>$v){
                        $empresa[$k] = $v;
                    }


        echo form_dropdown('item[empresa]', $empresa,$item->empresa, $conf_drop);
        ?>
        </td>
        <tr>
            <td width="172"><strong>Fecha</strong></td>
            <?php 
                if($item->fecha1!=''){
                $fec =  explode('-',$item->fecha1);
                $f1 = $fec[2].'/'.$fec[1].'/'.$fec[0];
                }
            ?>
            <td><input type="text" name="item[fecha1]" id="fecha_nota" class="text" value="<?php echo $f1; ?>"  /></td>
        </tr>


          <tr>
            <td width="172"><strong>Volanta</strong></td>
            <td><input type="text" name="item[volanta]" class="text"  value="<?php echo $item->volanta; ?>" /></td>
        </tr>
        <tr>
        <tr>
            <td width="172"><strong>T&iacute;tulo</strong></td>
            <td>
                <input type="text" name="item[titulo]" class="text" value="<?php echo $item->titulo; ?>" />
                <input type="hidden" name="item[id]" class="text" value="<?php echo $item->id; ?>" />
            </td>
        </tr>
        
         <tr>
            <td width="172"><strong>Autor</strong></td>
            <td><input type="text" name="item[autor]" class="text" value="<?php echo $item->autor; ?>"  /></td>
        </tr>
        <tr>
            <td width="172"><strong>Copete</strong></td>
            <td>
               <?php $this->ckeditor->editor("item[copete]", $item->copete,$config); ?>
                <!--<textarea name="item[texto]" class="text" ></textarea>--></td>
        </tr>
        <tr>
            <td width="172"><strong>Texto</strong></td>
            <td>
               <?php $this->ckeditor->editor("item[texto]", $item->texto,$config); ?>
                <!--<textarea name="item[texto]" class="text" ></textarea>--></td>
        </tr>
         <tr>
            <td width="172"><strong>Fuente</strong></td>
            <td><input type="text" name="item[fuente]" class="text" value="<?php echo $item->fuente; ?>" /></td>
        </tr>
        <tr>
            <td width="172"><strong>Permalink</strong></td>
            <td><input type="text" name="item[permalink]" class="text" value="<?php echo $item->permalink; ?>" /></td>
        </tr>
       
        
        
        
        <tr>
            <td>&nbsp;</td>
            <td><?php echo form_submit('submit', 'Guardar'); ?><!--<a href="#" class="orange">LOGIN</a>--></td>
        </tr>
    </table>
    <?php echo form_close(); ?>
</div>
<div class="table">
    <?php
    $attributes = array('id' => 'id-form');
    echo form_open_multipart(base_url().'admin/barrios/crea',$attributes); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">

        <tr>
            <th class="full" colspan="2">Incorporacion de Viviendas</th>
        </tr>


          <tr class="row1">
            <td> 
                <input id="sede" value="1" type="hidden" />
                <div class="field">
                    <div class="eti">N° de Barrio/Sector:</div> <input type="text" name="barrio" id="barrio"  class="inp-form" onchange="traeNombreBarrio()" />
                </div>    
                <br>
                <div class="field"> 
                    <div class="eti">Nombre:</div> <input type="text" name="nombre"  class="inp-form" id="nombre_barrio" readonly />
                </div>
                <br>
                <div class="field"> 
                    <div class="eti">N° de Manzana:</div> <input type="text"  class="inp-form" id="manzana" name="manzana" />
                </div>
                <br>
                <div class="field">
                    <div class="eti"> N° de Vivienda:</div><input type="text"  class="inp-form" id="vivienda" name="vivienda" />
                </div>
            </td>
        </tr>
        <tr class="trborde">
            <td>
                <div class="field">  
                    <div class="eti"><button type="button" id="calc_id" >Calcular id de la vivienda</button></div>
                </div>
                <br>
                <div class="field">
                    <div class="eti">ID Vivienda:</div> <input type="text" id="idvivienda" name="idvivienda"  class="inp-form" readonly />
                </div>
            </td>
        </tr>




       <tr>
            <td>&nbsp;</td>
            <td><?php echo form_submit('submit', 'Guardar'); ?><!--<a href="#" class="orange">LOGIN</a>--></td>
        </tr>
        <tr style="height:200px;"><td>&nbsp;</td><td>&nbsp;</td></tr>

    </table>
    <?php

    echo form_close(); ?>
</div>


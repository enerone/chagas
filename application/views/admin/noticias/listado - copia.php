
<div class="top-bar">
    <?php if($this->session->userdata('type')==1 || $this->session->userdata('type')==10 ){ ?>
    <a href="<?php echo base_url(); ?>admin/noticias/crea" class="button nuevo">Nueva Noticia</a>
    <?php } ?>
    <h1>Noticias</h1>
   
</div>

<?php
if ($this->session->flashdata('message')) {
    echo "<div class='message'>" . $this->session->flashdata('message') . "</div> ";
}
?>
<div class="table1">
   <table id='example' class='display datatable' border='0' cellspacing='0' cellpadding='0' >
        <thead>
            <tr>
                <th>Empresa</th>
                <th>Fecha</th>            
                <th>T&iacute;tulo</th>
                <th>Texto</th>
                <th>Copete</th>
                <th>Medio</th>
                <th>Origen</th>
                <th>Status</th>
                <th style="width:180px;">Herraminetas</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if (isset($items) && count($items) > 0) {
            foreach ($items as $u) {
                ?>
                <tr class="comun">
                    <td class="style1"> <?php echo $u->empresa; ?> </td>
                    <td class="style1"> <?php echo $u->fecha1; ?> </td>
                    <td class="style1"> <a href="#" onclick="muestraNota(<?php echo $u->id; ?>);"> <?php echo $u->titulo; ?></a> </td>
                    <td class="style1"><?php echo $u->texto; ?></td>
                    <td class="style1"><?php echo $u->copete; ?></td>
                    <td class="style1"> <?php echo $u->fuente; ?> </td>
                     <?php if($u->externo == 1){ ?>
                            <td class="style1"> X </td>
                    <?php }else{ ?>
                            <td class="style1">   </td>
                    <?php } ?>
                    <td class="style1"> <a href="#" id="link<?php echo $u->id; ?>" onclick="cambiaEstado(<?php echo $u->id; ?>);"> <?php echo $u->status; ?></a> </td>
                    <?php if($this->session->userdata('type')==1 || $this->session->userdata('type')==10){ ?>
                    <td style="width:30px;"><a href="<?php echo base_url(); ?>admin/noticias/imagenes/<?php echo $u->id; ?>" ><img src="<?php echo base_url(); ?>assets/img/img.jpg" width="16" height="16" alt="Agregar Imagenes o videos" /> |
                    <a href="<?php echo base_url(); ?>admin/noticias/edita/<?php echo $u->id; ?>" ><img src="<?php echo base_url(); ?>assets/img/edit-icon.gif" width="16" height="16" alt="" />   | 
                    <a href="<?php echo base_url(); ?>admin/noticias/borra/<?php echo $u->id; ?>" class="borranoticia"  style="cursor:pointer;"><img src="<?php echo base_url(); ?>assets/img/hr.gif" width="16" height="16" alt="" /> </a></td>
                    <?php } ?>
                </tr>
    <?php }
} else { ?>
            <tr><td>No hay criterios cargados actualmente</td></tr>
        <?php } ?>
    </tbody>
    </table>
    
</div>

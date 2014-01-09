
<div class="top-bar">
    <?php if($this->session->userdata('type')==1 || $this->session->userdata('type')==10 ){ ?>
    <a href="<?php echo base_url(); ?>admin/barrios/crea" class="button nuevo">Nuevo Barrio</a>
    <?php } ?>
    <h1 class="titulo">Administraci&oacute;n de barrios</h1>
</div>
<?php
if ($this->session->flashdata('message')) {
    echo "<div class='message'>" . $this->session->flashdata('message') . "</div> ";
}
?>
<div class="table1">
   <table id='example1' class='display datatable' border='0' cellspacing='0' cellpadding='0' >
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Barrio</th>
                <th>Sede</th>

                <th style="width:180px;">Herraminetas</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if(!is_null($items)){
            if (isset($items) && count($items) > 0 ) {
                foreach ($items as $u) {
                    ?>
                    <tr>
                        <td class="nombre_fuente"> <?php echo $u->codigo; ?> </td>
                        <td class="url_fuente"> <?php echo $u->nombre; ?> </td>
                        <td class="url_fuente"> <?php

                                                $this->db->where('id',$u->id_sede);
                                                $q = $this->db->get('sedes')->result();
                                                if(isset($q[0])){
                                                    if(is_object($q[0])){
                                                            echo $q[0]->localidad;
                                                    }else{
                                                        echo "sin nombre";
                                                    }
                                                }

                        ?> </td>

                        <td class="herramientas_fuentes">
                        <a href="<?php echo base_url(); ?>admin/barrios/edita/<?php echo $u->id; ?>" ><img src="<?php echo base_url(); ?>assets/img/edit-icon.gif" width="16" height="16" alt="" /> Editar
                        <a href="<?php echo base_url(); ?>admin/barrios/borra/<?php echo $u->id; ?>" class="borranoticia"  style="cursor:pointer;"><img src="<?php echo base_url(); ?>assets/img/hr.gif" width="16" height="16" alt="" /> </a> Borrar</td>
                    </tr>
            <?php }
            } else { ?>
            <tr><td>No hay barrios cargados actualmente</td></tr>
        <?php }

        }else { ?>
            <tr><td>No hay barrios cargados actualmente</td></tr>
    <?php }
    ?>
    </tbody>
    </table>

</div>

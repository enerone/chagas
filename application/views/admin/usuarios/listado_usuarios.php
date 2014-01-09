
<div class="top-bar" >
    <a href="<?php echo base_url(); ?>admin/usuarios/crear" class="button nuevo">Nuevo Usuario </a>
    <h1>Usuarios</h1>
    <div class="breadcrumbs"><a href="<?php echo base_url(); ?>admin/admin">Homepage</a> / <a href="<?php echo base_url(); ?>admin/usuarios/index">Usuarios</a></div>
</div>
<div class="select-bar">
    
      
   
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
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Sede</th>
                <th>Herramientas</th>
               
            </tr>
        </thead>
        <tbody>
        <?php
        if (isset($usuarios) && count($usuarios) > 0) {
            foreach ($usuarios as $u) {
                ?>
                <tr>
                    <td><?php echo $u->nombre;?> </td>
                    <td class="style1"><?php echo $u->apellido; ?> </td>
                    <td class="style1"><?php echo $u->email; ?> </td>
                    <td class="style1"><?php echo $u->sede; ?> </td>

                    <td><a href="<?php echo base_url(); ?>admin/usuarios/editar/<?php echo $u->id; ?>" ><img src="<?php echo base_url(); ?>assets/img/edit-icon.gif" width="16" height="16" alt="" />Editar | <a href="<?php echo base_url(); ?>admin/usuarios/borrar/<?php echo $u->id; ?>" class="borrausuario"  style="cursor:pointer;"><img src="<?php echo base_url(); ?>assets/img/hr.gif" width="16" height="16" alt="" /> Borrar</a></td>
                </tr>
        <?php }
        } else { ?>
            <tr><td>No Hay usuarios actualmente</td></tr>
        <?php } ?>
        </tbody>
    </table>
   
</div>

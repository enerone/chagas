<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	$base = base_url();
	$js = $base.'assets/js/';
?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Fundacion Mundo Sano ( chagas )</title>
<link rel="stylesheet" href="<?php echo $base;?>assets/css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="<?php echo $js;?>jquery-1.4.1.min.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="<?php echo $js;?>ui.core.js" type="text/javascript"></script>
<
<script src="<?php echo $js;?>jquery.bind.js" type="text/javascript"></script>

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="<?php echo $js;?>jquery.selectbox-0.5.js" type="text/javascript"></script>



<![endif]>

<!--  styled select box script version 2 -->
<script src="<?php echo $js;?>jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>


<!--  styled select box script version 3 -->
<script src="<?php echo $js;?>jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>


<!--  styled file upload script -->
<script src="<?php echo $js;?>jquery.filestyle.js" type="text/javascript"></script>


<!-- Custom jquery scripts -->
<script src="<?php echo $js;?>custom_jquery.js" type="text/javascript"></script>

<!-- Tooltips -->
<script src="<?php echo $js;?>jquery.tooltip.js" type="text/javascript"></script>
<script src="<?php echo $js;?>jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true,
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script>


<!--  date picker script -->
<link rel="stylesheet" href="<?php echo $base;?>assets/css/datePicker.css" type="text/css" />
<script src="<?php echo $js;?>date.js" type="text/javascript"></script>
<script src="<?php echo $js;?>jquery.datePicker.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo $js;?>jquery.pngFix.pack.js" type="text/javascript"></script>
 <link  href="<?php echo $base; ?>assets/js/ui-lightness/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css" />
        <link  href="<?php echo $base; ?>assets/datatables/media/css/demo_table.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo $base; ?>assets/js/jquery-1.9.1.js"></script>
        <script src="<?php echo $base; ?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="<?php echo $base; ?>assets/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src="<?php echo $base; ?>assets/js/jquery-ui-timepicker-addon.js"></script>

        <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/datatables/media/js/jquery.dataTables.js"></script>


<script>

           var baseurl = "<?php print base_url(); ?>";
            $(document).ready(function() {
                 $('#calc_id').on('click', function(){
                barrio = parseInt($("#barrio").val());
                manzana = parseInt($("#manzana").val());
                vivienda = parseInt($("#vivienda").val());
                if(barrio>0 && manzana >0 && vivienda >0){
                    codigo = (barrio * 1000000)+(manzana*1000)+vivienda;
                    $('#idvivienda').val(codigo);
                }else{
                    alert( 'Faltan datos para calcular');
                }
            })
                 <?php if(isset($items) && !is_null($items)){ ?>
                     var oTable = $('#example').dataTable({
                        "aoColumns": [
                           null,null,null,{ "bVisible":    false },{ "bVisible":    false },null,null, null, null
                        ],
                        "aLengthMenu": [[ 50, -1], [50, "Todas"]],
                        "iDisplayLength": 50

                    });

                     $("#example1 tbody tr").click( function( e ) {
                        if ( $(this).hasClass('row_selected') ) {
                            $(this).removeClass('row_selected');
                        }
                        else {
                            oTable.$('tr.row_selected').removeClass('row_selected');
                            $(this).addClass('row_selected');
                        }
                    });


                     $('#example1').dataTable({
                        "aLengthMenu": [[ 50, -1], [50, "Todas"]],
                        "iDisplayLength": 50
                    });

                 <?php } ?>
                $( "#post_date" ).datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true
                });
                if($('#inicio')){

                }

                $.datepicker.setDefaults({

                    dateFormat: 'dd/mm/yy'

                });

                if($( "#desde" )){
                    $( "#desde" ).datepicker({
                        dateFormat: 'yy-mm-dd',
                        changeMonth: true
                    });
                }
                if($( "#hasta" )){
                    $( "#hasta" ).datepicker({
                        dateFormat: 'yy-mm-dd',
                        changeMonth: true
                    });
                }
                $( "#fecha_nota" ).datepicker();
		        if($('#ciaSel')){
                    chequeaTipo();
                }
                $('#<?php echo $menusel; ?>').addClass('active');

            });

            function chequeaTipo(){
                valor = $('#ciaSel').val();
                //alert(valor);
                if(valor=='0'){
                    $('#selTipo').val(2);
                }
            };

            function checkAdmin(){
                valor = $('#selTipo').val();
                if(valor==1 || valor==10){
                    $('#trSelCia').css('visibility','hidden');
                    $('#passBlock').css('visibility','visible');

                }else if(valor==3){
                    $('#trSelCia').css('visibility','visible');
                    $('#passBlock').css('visibility','hidden');
                }else{
                    $('#trSelCia').css('visibility','hidden');
                    $('#passBlock').css('visibility','hidden');
                }
            }

            function actualizaDrop(id){
                cant = $('#cant'+id).val();
                 $.post("<?php echo base_url(); ?>admin/proyectos/get_proyectos_by_sede/"+id,
                 function(data) {
                     alert("cantidad actualizada");


                 }, "json");
            }


            function cambiaEstado(id){

                $.ajax({
                    type:'post',
                    url: '<?php echo base_url(); ?>admin/noticias/cambiaEstado/'+id,
                    //data: $("#postentry").serialize(),
                    success:function(data){
                        $('#link'+id).text(data);
                    }
                });

            }

            function sale(id,tipo){
                precio = $('#bar'+id).val();
                 $.post("<?php echo base_url(); ?>admin/ventas/sale/"+id+"/"+precio+"/"+tipo,
                 function(data) {
                     alert("cantidad actualizada");


                 }, "json");
            }

            function actualizaPrecio(id){
                cant = $('#precio'+id).val();
                 $.post("<?php echo base_url(); ?>admin/stock_bar/actualiza_precio/"+id+"/"+cant,
                 function(data) {
                     alert("cantidad actualizada");


                 }, "json");
            }

            function llenaDrop(){
                var id = $('#sede').val();

                $.ajax({
                    type:'post',
                    url: '<?php echo base_url(); ?>admin/proyectos/getProyectosBySede/'+id,
                    success: function(proyectos) //we're calling the response json array 'cities'
                      {
                        $('#proyecto').empty();
                       // $('#f_city, #f_city_label').show();
                           $.each(proyectos,function(id,nombre)
                           {
                            var opt = $('<option />'); // here we're creating a new select option for each group
                              opt.val(id);
                              opt.text(nombre);
                              $('#proyecto').append(opt);
                        });
                       } //end success

                });
            }
           
            function traeNombreBarrio(){
                var id = $('#barrio').val();               
                var id_sede = $('#sede').val();               
                $.ajax({
                    type:'post',
                    url: '<?php echo base_url(); ?>admin/barrios/getBarrioById/'+id+'/<?php echo $sede; ?>',
                    success: function(barrio) //we're calling the response json array 'cities'
                      {
                        $('#nombre_barrio').empty();
                        
                         if(barrio != '[]'){
                        datos = $.parseJSON(barrio);
                       
                          $('#nombre_barrio').val(datos[0].nombre);
                        }else{
                          $('#nombre_barrio').val('sin nombre');
                        }
                       } //end success
                    
                });
            }
        </script>

</head>
<body>
<!-- Start: page-top-outer -->
<div id="page-top-outer">

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo" style="margin-top:5px;">
	<a href=""><img src="<?php echo $base; ?>assets/img/logo2.png" width="113" height="85" alt="" /></a>
	</div>
	<!-- end logo -->


 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->

<div class="clear">&nbsp;</div>

<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat">
<!--  start nav-outer -->
<div class="nav-outer">

		<!-- start nav-right -->
		<div id="nav-right">

			<div class="nav-divider">&nbsp;</div>

			<a href="<?php echo base_url() ?>sessions/logout" id="logout"><img src="<?php echo $base; ?>assets/images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>



		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">

        <ul class="select"><li><a id="sedes" href="<?php echo base_url(); ?>admin/sedes/index" ><b>Sedes</b></a></li></ul>
        <div class="nav-divider">&nbsp;</div>
        <ul class="select"><li><a id="barrios" href="<?php echo base_url(); ?>admin/barrios/index" ><b>Barrios</b></a></li></ul>
        <div class="nav-divider">&nbsp;</div>
        <ul class="select"><li><a id="viviendas" href="<?php echo base_url(); ?>admin/viviendas/index" ><b>Viviendas</b></a></li></ul>
        <div class="nav-divider">&nbsp;</div>
        <ul class="select"><li><a id="lugares" href="<?php echo base_url(); ?>admin/lugares/index" ><b>Lugares</b></a></li></ul>
        <div class="nav-divider">&nbsp;</div>
        <ul class="select"><li><a id="usuarios" href="<?php echo base_url(); ?>admin/usuarios/index" ><b>Usuarios</b></a></li></ul>
        <div class="nav-divider">&nbsp;</div>
        <ul class="select"><li><a id="administradores" href="<?php echo base_url(); ?>admin/administradores/index" ><b>Administradores</b></a>
        </li></ul>





		<div class="clear"></div>
		</div>

		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

 <div class="clear"></div>

<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">
	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="<?php echo $base; ?>assets/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="<?php echo $base; ?>assets/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner -->
		<div id="content-table-inner">

		<table border="0" width="100%" cellpadding="0" cellspacing="0">
		<tr valign="top">
		<td>
			<?php if (isset($listado)) { ?>
                        <!--listado-->
                        <?php $this->load->view($listado); ?>
                    <?php } ?>
			<div class="clear">&nbsp;</div>

		</td>
		</tr>
		<tr>
		<td><img src="<?php echo $base; ?>assets/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
		<td></td>
		</tr>
		</table>

		<div class="clear"></div>
        <div class="clear"></div>


		</div>
		<!--  end content-table-inner  -->
		</td>
		<td id="tbl-border-right"></td>
		</tr>
		<tr>
			<th class="sized bottomleft"></th>
			<td id="tbl-border-bottom">&nbsp;</td>
			<th class="sized bottomright"></th>
		</tr>
		</table>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>

<!-- start footer -->
<div id="footer">
	<!--  start footer-left -->

	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->
<script>
        $('#<?php echo $menusel;?>').parent().parent().removeClass('select');
        $('#<?php echo $menusel;?>').parent().parent().addClass('current');
</script>

</body>
</html>

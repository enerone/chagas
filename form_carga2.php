<style>
	.titulo_form{
		background-color: #003300;
		height:25px;
		text-align: center;
		padding:15px;
		font-weight: bold;
		color:#fff;
		font-size: 20px;
		
	}
	.pieform{
		background-color: #758c48;
		height:25px;
		color: #fff;
		padding:10px;
	}
	.campos_numericos{
		width:50px;
		text-align: center;
		margin: 5px;
	}
	.campos_check{
		width:12px;
		text-align: center;
		margin: 5px;
		margin-right: 45px;
	}
	.grayed{
		background-color: #ccc;
	}
	.row1{
		height:50px;

	}
	.trborde td{
		border-bottom: 1pt solid #030;
		padding:10px;
	}
	.tabla_form{
		background-color: #ccc;
		font-family: "times, serif";
		font-size: 1.1em;
		font-weight: bold;
		color: #003300;
	}
	.tdpanel{
		padding:10px;
	}
	.eti{
		width:200px;
	}
	#calc_id{
		margin-top: 12px;
	}
	.tablita{
		border:1px solid #333;
	}
	
</style>

	<table class="tabla_form">
		<tr class="row1"><td class=" titulo_form">Carga de Datos</td></tr>
		<tr class="row1 trborde" >
			<td >
				
 
				<div class="field">  
					<span class="eti">N° de Ciclo/Muestreo: </span>
					<input type="text" id="ciclo" name="ciclo"  />
				</div>

				<div class="field">  
					Fecha:
					<input type="text" name="fecha" id="fecha" />
				</div>


			</td>
			
		</tr>
		<tr class="row1">
			<td> 
				<div class="field">
					<div class="eti">N° de Barrio/Sector:</div> <input type="text" name="barrio" id="barrio" onchange="traeNombreBarrio()" />
				</div>    
				<div class="field"> 
					<div class="eti">Nombre:</div> <input type="text" name="nombre" id="nombre_barrio" readonly />
				</div>
				<div class="field"> 
					<div class="eti">N° de Manzana:</div> <input type="text" id="manzana" name="manzana" />
				</div>
				<div class="field">
					<div class="eti"> N° de Vivienda:</div><input type="text" id="vivienda" name="vivienda" />
				</div>
			</td>
		</tr>
		<tr class="trborde">
			<td>
				<div class="field">  
					<div class="eti"><button type="button" id="calc_id" >Calcular id de la vivienda</button></div>
				</div>
				<div class="field">
					<div class="eti">ID Vivienda:</div> <input type="text" id="idvivienda" name="idvivienda" readonly />
				</div>
			</td>
		</tr>
	
	<tr class="row1 trborde" >
		<td>
			
			
			Vivienda Inspeccionada: 
			<input type="hidden"  name="vivienda_inspeccionada" value="0"  />
			<input type="checkbox"  name="vivienda_inspeccionada" value="1" class="campos_check habilitador"   />
			
			Vivienda Cerrada: 
			<input type="hidden"  name="vivienda_cerrada" value="0"   />
			<input type="checkbox"  name="vivienda_cerrada"  value="1" class="campos_check anulador"   />
			
			Vivienda Renuente: 
			<input type="hidden"  name="vivienda_renuente" value="0"   />
			<input type="checkbox"  name="vivienda_renuente" value="1" class="campos_check anulador"   />
			
			Habitantes: 
			<input type="text" class="campos_numericos" name="habitantes" value="0" />

		</td>

	</tr>
	
	<tr>
		<td>
			<table>
				<thead>
					<th> </th>
					<th>A</th>
					<th>B</th>
					<th>C</th>
					<th>D</th>
					<th>E</th>
					<th>F</th>
					<th>G</th>
					<th>H</th>
					
					<th>Total</th>
				</thead>
				<tbody>
					<tr>
						<td>Totales</td>
						<td>
							<input type="hidden" name="totales_A" value="0"  />
							<input type="hidden" name="totales_B" value="0"  />
							<input type="hidden" name="totales_C" value="0"  />
							<input type="hidden" name="totales_D" value="0"  />
							<input type="hidden" name="totales_E" value="0"  />
							<input type="hidden" name="totales_F" value="0"  />
							<input type="hidden" name="totales_G" value="0"  />
							<input type="hidden" name="totales_H" value="0"  />
							<input type="hidden" name="totales_total" value="0"  />

							<input type="text" class="campos_numericos totales tablita" id="tot_a" name="totales_A" value="0"  /></td>
						<td><input type="text" class="campos_numericos totales tablita" id="tot_b" name="totales_B" value="0"  /></td>
						<td><input type="text" class="campos_numericos totales tablita" id="tot_c" name="totales_C" value="0"  /></td>
						<td><input type="text" class="campos_numericos totales tablita" id="tot_d" name="totales_D" value="0"  /></td>
						<td><input type="text" class="campos_numericos totales tablita" id="tot_e" name="totales_E" value="0"  /></td>
						<td><input type="text" class="campos_numericos totales tablita" id="tot_f" name="totales_F" value="0"  /></td>
						<td><input type="text" class="campos_numericos totales tablita" id="tot_g" name="totales_G" value="0"  /></td>
						<td><input type="text" class="campos_numericos totales tablita" id="tot_h" name="totales_H" value="0"  /></td>
						
						<td>
							<input type="text" class="campos_numericos tablita" id="totales_total"  name="totales_total" value="0"   /></td>
					</tr>
					<tr>
						<td>Con Agua</td>
						<td>
							<input type="hidden" name="conagua_A" value="0"  />
							<input type="hidden" name="conagua_B" value="0"  />
							<input type="hidden" name="conagua_C" value="0"  />
							<input type="hidden" name="conagua_D" value="0"  />
							<input type="hidden" name="conagua_E" value="0"  />
							<input type="hidden" name="conagua_F" value="0"  />
							<input type="hidden" name="conagua_G" value="0"  />
							<input type="hidden" name="conagua_H" value="0"  />
							<input type="hidden" name="conagua_total" value="0"  />

							<input type="text" class="campos_numericos conagua tablita" id="conagua_a" name="conagua_A" value="0"  /></td>
						<td><input type="text" class="campos_numericos conagua tablita" id="conagua_b" name="conagua_B" value="0"  /></td>
						<td><input type="text" class="campos_numericos conagua tablita" id="conagua_c" name="conagua_C" value="0"  /></td>
						<td><input type="text" class="campos_numericos conagua tablita" id="conagua_d" name="conagua_D" value="0"  /></td>
						<td><input type="text" class="campos_numericos conagua tablita" id="conagua_e" name="conagua_E" value="0"  /></td>

						<td><input type="text" class="campos_numericos conagua tablita" id="conagua_f" name="conagua_F" value="0"  /></td>
						<td><input type="text" class="campos_numericos conagua tablita" id="conagua_g" name="conagua_G" value="0"  /></td>
						<td><input type="text" class="campos_numericos conagua tablita" id="conagua_h" name="conagua_H" value="0"  /></td>
						
						<td><input type="text" class="campos_numericos tablita" id="conagua_total" name="conagua_total" value="0"  /></td>
					</tr>
					<tr>
						<td>Con Larvas/Pupas</td>
						<td>
							<input type="hidden" name="conlarvas_A" value="0"  />
							<input type="hidden" name="conlarvas_B" value="0"  />
							<input type="hidden" name="conlarvas_C" value="0"  />
							<input type="hidden" name="conlarvas_D" value="0"  />
							<input type="hidden" name="conlarvas_E" value="0"  />
							<input type="hidden" name="conlarvas_F" value="0"  />
							<input type="hidden" name="conlarvas_G" value="0"  />
							<input type="hidden" name="conlarvas_H" value="0"  />
							<input type="hidden" name="conlarvas_total" value="0"  />

							<input type="text" class="campos_numericos conlarvas tablita"  id="conlarvas_a" name="conlarvas_A" value="0"  /></td>
						<td><input type="text" class="campos_numericos conlarvas tablita"  id="conlarvas_b" name="conlarvas_B" value="0"  /></td>
						<td><input type="text" class="campos_numericos conlarvas tablita"  id="conlarvas_c" name="conlarvas_C" value="0"  /></td>
						<td><input type="text" class="campos_numericos conlarvas tablita"  id="conlarvas_d" name="conlarvas_D" value="0"  /></td>
						<td><input type="text" class="campos_numericos conlarvas tablita"  id="conlarvas_e" name="conlarvas_E" value="0"  /></td>
						<td><input type="text" class="campos_numericos conlarvas tablita"  id="conlarvas_f" name="conlarvas_F" value="0"  /></td>
						<td><input type="text" class="campos_numericos conlarvas tablita"  id="conlarvas_g" name="conlarvas_G" value="0"  /></td>
						<td><input type="text" class="campos_numericos conlarvas tablita"  id="conlarvas_h" name="conlarvas_H" value="0"  /></td>
						
						<td><input type="text" class="campos_numericos tablita"  id="conlarvas_total"  name="conlarvas_total" value="0"  /></td>
					</tr>
					<tr>
						<td>Positivos</td>
						<td>
							<input type="hidden" name="positivos_A" value="0"  />
							<input type="hidden" name="positivos_B" value="0"  />
							<input type="hidden" name="positivos_C" value="0"  />
							<input type="hidden" name="positivos_D" value="0"  />
							<input type="hidden" name="positivos_E" value="0"  />
							<input type="hidden" name="positivos_F" value="0"  />
							<input type="hidden" name="positivos_G" value="0"  />
							<input type="hidden" name="positivos_H" value="0"  />
							<input type="hidden" name="positivos_total" value="0"  />
							<input type="text" class="campos_numericos positivos tablita"  id="positivos_a" name="positivos_A" value="0"  /></td>
						<td><input type="text" class="campos_numericos positivos tablita"  id="positivos_b" name="positivos_B" value="0"  /></td>
						<td><input type="text" class="campos_numericos positivos tablita"  id="positivos_c" name="positivos_C"<div class="eti"  /></td>
						<td><input type="text" class="campos_numericos positivos tablita"  id="positivos_d" name="positivos_D" value="0"  /></td>
						<td><input type="text" class="campos_numericos positivos tablita"  id="positivos_e" name="positivos_E" value="0"  /></td>
						<td><input type="text" class="campos_numericos positivos tablita"  id="positivos_f" name="positivos_F" value="0"  /></td>
						<td><input type="text" class="campos_numericos positivos tablita"  id="positivos_g" name="positivos_G" value="0"  /></td>
						<td><input type="text" class="campos_numericos positivos tablita"  id="positivos_h" name="positivos_H" value="0"  /></td>
						
						<td><input type="text" class="campos_numericos tablita" id="positivos_total" name="positivos_total" value="0"  /> </td>
					</tr>
				</tbody>
			</table>
	</td>
	
	</tr>
		<tr>
			<td class="pieform">
				Control Químico
				<input type="hidden"  name="control_quimico" value="0" />
				<input type="checkbox"  name="control_quimico" value="1" id="control_quimico"  class="campos_check"  />
				
				
				    
				Gramos Aplicados: <input type="text" class="campos_numericos grayed" id="gramos_aplicados"  name="gramos_aplicados" value="" readonly />
				    
				
			</td>
		</tr>
	

	

</table>
<script>


	
     $(function() {


     	$('.tablita').each(function(){
     		$('.tablita').attr('disabled', 'disabled');
     		$(this).addClass('grayed');
     		$(this).val('0');
     	});

     	$('.tablita').on('click',function(){
     		if($(this).val()=='0'){
     			$(this).val('');
     		}
     	})

     	$('.habilitador').click (function(){
		  
		  if(this.checked) {
		  	$('.tablita').attr('disabled', false);
		  	$('.campos_check').attr('disabled','disabled' );
		  	$(this).attr('disabled', false);
		  	$('#control_quimico').attr('disabled', false);
			$('.tablita').removeClass('grayed');

		    
		  }else{
		  	


			$('.tablita').attr('disabled', 'disabled');
		  	$('.campos_check').attr('disabled', false);
		  	$('.tablita').css('border-color','#333');
			$('.tablita').addClass('grayed');
			$('.campos_check').addClass('grayed');
			$('.tablita').val('-');
		  }
		});


     	$('.anulador').click (function(){
		  
		  if(this.checked) {
		  	$('.tablita').attr('disabled', 'disabled');
		  	$('.campos_check').attr('disabled', 'dissabled');
		  	$(this).attr('disabled', false);
			$('.tablita').addClass('grayed');
			$('.campos_check').addClass('grayed');
			$('.tablita').val('0');
			$('.tablita').css('border-color','#333');

		    
		  }else{
		  	
		  	$('.campos_check').attr('disabled', false);
			
		  }
		});

		$('#control_quimico').click (function(){
		  
		  if(this.checked) {
		    $('#gramos_aplicados').removeAttr('readonly');
			$('#gramos_aplicados').removeClass('grayed');
		  }else{
		  	$('#gramos_aplicados').attr('readonly', 'readonly');
			$('#gramos_aplicados').addClass('grayed');
			$('#gramos_aplicados').val('');
		  }
		});

        var filas = {
            totales   : 'totales_total',
            conagua   : 'conagua_total',
            conlarvas : 'conlarvas_total',
            positivos : 'positivos_total'
            }

        $.each(filas,function(key,value){
            $('.'+key).on('change',function(){
                var total = 0;
              $("."+key).each(function(){ 
              	valor = ($(this).val()=='0' || $(this).val()=='')?0:parseInt($(this).val());

              	if(valor == 0 ){
              		$(this).val('0');
	            }else{
	            	$(this).val(valor);
	            }
                total += valor; 
                }); 
              $("#"+value).val(total);
            })
        }); //fin each

        /******/
        var letras = {
        	a:'a',b:'b',c:'c',d:'d',e:'e',f:'f',g:'g',h:'h'
        }

        $.each(letras,function(key,value){
	        
	        $('#tot_'+key).on('change', function(){
	        	var valor_larvas = ($('#conlarvas_'+key).val()=='0' || $('#conlarvas_'+key).val()=='0')?0:parseInt($('#conlarvas_'+key).val());
				var valor_conagua = ($('#conagua_'+key).val()=='0' || $('#conagua_'+key).val()=='')?0:parseInt($('#conagua_'+key).val());
				var valor_total = ($(this).val()=='0' || $(this).val()=='')?0:parseInt($(this).val());
				var valor_positivo  = ($('#positivos_'+key).val()=='0' || $('#positivos_'+key).val()=='')?0:parseInt($('#positivos_'+key).val());
				//console.log('TOTAL : conlarvas='+valor_larvas+' conagua='+valor_conagua+' total='+valor_total+' positivo='+valor_positivo);
				color = (valor_total >= valor_conagua)?'#333':'#f00';
				$(this).css('border-color',color);
				$('conagua_'+key).css('border-color',color);
			})

			$('#conagua_'+key).on('change', function(){
				
				var valor_larvas = ($('#conlarvas_'+key).val()=='0' || $('#conlarvas_'+key).val()=='0')?0:parseInt($('#conlarvas_'+key).val());
				var valor_conagua = ($(this).val()=='0' || $(this).val()=='')?0:parseInt($(this).val());
				var valor_total = ($('#tot_'+key).val()=='0' || $('#tot_'+key).val()=='')?0:parseInt($('#tot_'+key).val());
				var valor_positivo  = ($('#positivos_'+key).val()=='0' || $('#positivos_'+key).val()=='')?0:parseInt($('#positivos_'+key).val());
				//console.log('CONAGUA : conlarvas='+valor_larvas+' conagua='+valor_conagua+' total='+valor_total+' positivo='+valor_positivo);
				color = (valor_conagua >= valor_larvas)?'#333':'#f00';
				$(this).css('border-color',color);
				
				color_total = (valor_total < valor_conagua)?'#f00':'#333';
				$('#tot_'+key).css('border-color',color_total);
			})

			$('#conlarvas_'+key).on('change', function(){
				var valor_conagua = ($('#conagua_'+key).val()=='0' || $('#conagua_'+key).val()=='0')?0:parseInt($('#conagua_'+key).val());
				var valor_larvas = ($(this).val()=='0' || $(this).val()=='')?0:parseInt($(this).val());
				var valor_total = ($('#tot_'+key).val()=='0' || $('#tot_'+key).val()=='')?0:parseInt($('#tot_'+key).val());
				var valor_positivo  = ($('#positivos_'+key).val()=='0' || $('#positivos_'+key).val()=='')?0:parseInt($('#positivos_'+key).val());
				//console.log('CONLARVAS : conlarvas='+valor_larvas+' conagua='+valor_conagua+' total='+valor_total+' positivo='+valor_positivo);
				color = (valor_larvas >= valor_positivo)?'#333':'#f00';
				$(this).css('border-color',color);
				color1 = (valor_conagua < valor_larvas)?'#f00':'#333';
				$('#conagua_'+key).css('border-color',color1);
				color_total = (valor_total < valor_larvas || valor_total < valor_conagua)?'#f00':'#333';
				$('#tot_'+key).css('border-color',color_total);

			})

			$('#positivos_'+key).on('change', function(){

				var valor_conagua = ($('#conagua_'+key).val()=='0' || $('#conagua_'+key).val()=='0')?0:parseInt($('#conagua_'+key).val());
				var valor_larvas = ($('#conlarvas_'+key).val()=='0' || $('#conlarvas_'+key).val()=='')?0:parseInt($('#conlarvas_'+key).val());
				var valor_total = ($('#tot_'+key).val()=='0' || $('#tot_'+key).val()=='')?0:parseInt($('#tot_'+key).val());
				var valor_positivo  = ($(this).val()=='0' || $(this).val()=='')?0:parseInt($(this).val());
				//console.log('POSITIVO : conlarvas='+valor_larvas+' conagua='+valor_conagua+' total='+valor_total+' positivo='+valor_positivo);
				color = (valor_larvas < valor_positivo)?'#f00':'#333';
				$('#conlarvas_'+key).css('border-color',color);
				color1 = (valor_conagua < valor_positivo || valor_conagua < valor_larvas)?'#f00':'#333';
				$('#conagua_'+key).css('border-color',color1);
				color_total = (valor_total < valor_positivo || valor_total < valor_larvas || valor_total < valor_conagua)?'#f00':'#333';
				$('#tot_'+key).css('border-color',color_total);
			})
		}); //fin each

		/******/



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
			
        $("#form1").validate({
        	submitHandler: function(form) {
			  form.submit()
        },
        // Specify the validation rules
        rules: {
            ciclo:          "required",
            barrio:         "required",
            fecha:          "required",
            manzana:        "required",
            idvivienda :    "required",
            vivienda:       "required",
            gramos_aplicados: {
            	required: {
		          depends: function(element) {
		          	status = true;
		          	
		          	if($("#control_quimico:checked").val()!==undefined ){
		          			status=false;

		          	}
		          	console.log(status);
		            return status;
		          }
		        }
            }

        },
        
        // Specify the validation error messages
        messages: {
            ciclo: "Ciclo es un campo requerido",
            barrio: "Barrio es un campo requerido",
            fecha: "Fecha es un campo requerido",
            manzana: "Manzana es un campo requerido",
            idvivienda: "El id de la vivienda debe ser generado para continuar",
            vivienda: "El nro de vivienda es requerido",
            gramos_aplicados: "Si Control Quimico esta marcado el campo gramos aplicados es requerido"
        },

        errorContainer: $('#errorContainer'),
        errorLabelContainer: $('#errorContainer ul'),
        wrapper: 'li'

    
        
        
    });
        

     });
</script>

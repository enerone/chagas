<style>
	.titulo_form{
		background-color: #050;
		height:25px;
		text-align: center;
		padding:15px;
		font-weight: bold;
		color:#fff;
		font-size: 20px;
		
	}
	.pieform{
		background-color: #050;
		height:25px;
		color: #fff;
		padding:10px;
	}
	.campos_numericos{
		width:50px;
		text-align: center;
		margin: 5px;
	}
	.row1{
		height:50px;

	}
	.tabla_form{
		background-color: #ccc;
	}
	.tdpanel{
		padding:10px;
	}
</style>

	<table class="tabla_form">
		<tr class="row1"><td class=" titulo_form">Carga de Datos</td></tr>
		<tr class="row1" >
			<td > N&deg; de Ciclo/Muestreo: <input type="text" name="item[ciclo]" />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Fecha: <input type="text" name="item[fecha]" /></td>
			
		</tr>
		<tr class="row1">
			<td> N&deg; de Barrio/Sector: <input type="text" name="item[barrio]" /> &nbsp;&nbsp;&nbsp;
			 Nombre: <input type="text" name="item[nombre]" id="nombre_barrio" /> &nbsp;&nbsp;&nbsp;
			 N&deg; de Lote: <input type="text" name="item[lote]" /> &nbsp;&nbsp;&nbsp;
			 N&deg; de Manzana: <input type="text" name="item[manzana]" /></td>
		</tr>
	
	<tr class="row1">
		<td>
			Vivienda Recuperada: 
			<input type="checkbox"  name="item[vivienda_recuperada]" />
			
		 &nbsp;&nbsp;&nbsp;
			Vivienda Inspeccionada: 
			<input type="checkbox"  name="item[vivienda_inspeccionada]" />
			
		 &nbsp;&nbsp;&nbsp;
			Vivienda Cerrada: 
			<input type="checkbox"  name="item[vivienda_cerrada]" />
			
		
			&nbsp;&nbsp;&nbsp;
			Vivienda Renuente: 
			<input type="checkbox"  name="item[vivienda_renuente]" />
			
		 &nbsp;&nbsp;&nbsp;
			Vivienda Positiva: 
			<input type="checkbox"  name="item[vivienda_positiva]" />
			&nbsp;&nbsp;&nbsp;
			Habitantes: <input type="text" class="campos_numericos" name="item[habitantes]" />
		</td>

	</tr>
	
	<tr>
		<td>
			<table>
				<thead>
					<th>&nbsp;</th>
					<th>A</th>
					<th>B</th>
					<th>C</th>
					<th>D</th>
					<th>E</th>
					<th>F</th>
					<th>G</th>
					<th>H</th>
					<th>---</th>
					<th>Total</th>
				</thead>
				<tbody>
					<tr>
						<td>Totales</td>
						<td><input type="text" class="campos_numericos" name="item[totales_A]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[totales_B]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[totales_C]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[totales_D]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[totales_E]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[totales_F]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[totales_G]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[totales_H]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[totales_sub]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[totales_total]" /></td>
					</tr>
					<tr>
						<td>Con Agua</td>
						<td><input type="text" class="campos_numericos"  name="item[conagua_A]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[conagua_B]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[conagua_C]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[conagua_D]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[conagua_E]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[conagua_F]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[conagua_G]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[conagua_H]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[conagua_sub]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[conagua_total]" /></td>
					</tr>
					<tr>
						<td>Con Larvas/Pupas</td>
						<td><input type="text" class="campos_numericos"  name="item[conlarvas_A]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[conlarvas_B]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[conlarvas_C]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[conlarvas_D]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[conlarvas_E]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[conlarvas_F]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[conlarvas_G]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[conlarvas_H]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[conlarvas_sub]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[conlarvas_total]" /></td>
					</tr>
					<tr>
						<td>Positivos</td>
						<td><input type="text" class="campos_numericos"  name="item[positivos_A]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[positivos_B]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[positivos_C]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[positivos_D]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[positivos_E]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[positivos_F]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[positivos_G]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[positivos_H]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[positivos_sub]" /></td>
						<td><input type="text" class="campos_numericos"  name="item[positivos_total]" /></td>
					</tr>
				</tbody>
			</table>
	</td>
	
	</tr>
		<tr>
			<td class="pieform">
				Control Qu&iacute;mico
				<input type="checkbox"  name="item[control_quimico]" />
				
				
				 &nbsp;&nbsp;&nbsp;
				Gramos Aplicados: <input type="text" class="campos_numericos"  name="item[gramos_aplicados]" />
				 &nbsp;&nbsp;&nbsp;
				<input type="submit" name="submit" value="Enviar" />
			</td>
		</tr>
	

	

</table>




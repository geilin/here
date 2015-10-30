<?php 
include('libreria/engine.php');
$laboratorio=$_POST['txtBusqueda'];
echo "<form  id='frmbuscarLaboratorio' name='frmbuscarLaboratorio'>";
						$rs = pacientes::getLaboratorios($laboratorio);
					foreach($rs as $fila)
					{$codigo = $fila['RecordId'];
					$NombreLaboratorio=utf8_encode($fila['Nombre']);
						echo "<table border='1px'>
						<tr>
							<td onclick='getCodigoLaboratorioID($codigo)'>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								{$fila['LaboratorioID']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$NombreLaboratorio
							</td>
						</tr>";
					}
					echo "
						</table>";
							?>
			<a href="#close" title="Cerrar" onclick="toogle('none','modalLaboratorioID','ventanaLaboratorioID')" >Close</a>
							<!--campo que me guardara el idDeldoctor-->
							<tr>
								<td>
									<input type = "hidden"  id= "txtCodigoLaboratorioID" name = "txtCodigoLaboratorioID"/>
								</td>
							</tr>
						</form>
<script>
	         function getCodigoLaboratorioID(cod){
document.frmbuscarLaboratorio.txtCodigoLaboratorioID.value=cod;
$(document).ready(function() {
	    $.post("manejarCodLaboratorioID.php", $("#frmbuscarLaboratorio").serialize(), function(respuesta){
	            $("#contenido").html(respuesta);
	        });
	     
	    });
    }

</script>
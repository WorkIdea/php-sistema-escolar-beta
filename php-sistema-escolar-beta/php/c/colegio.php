<?php
	require_once("../php_default.php");
	$query="select * from colegio order by 1";
   	$result=mysql_query($query, $link) or die(mysql_error());
   	$totEmp=mysql_num_rows($result);  	
?>
<!DOCTYPE HTML>
<html>		
	<head>
		<title>Colegios</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_colegio.css" media="screen"/>
	</head>
	<body>
		<div class="DivGeneral">
			<!---->
			<div class="DivTitulo">				
				<a href="../admin.php" id="linkAtras">Atras</a>
				<strong>Registro de Colegios</strong>
				<a href="colegio_f_agrega.php" id="linkAgrega">Agregar</a><br>
			</div>
			<!---->			
			<div class="DivPanelData">
				<table border=1>
				<tr>
					<th>ID</th>					
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Años Escolares</th>
					<th>Representantes</th>
					<th>Alumnos</th>
					<th>Docentes</th>
					<th colspan="2">Acciones</th>
				</tr>
				<?php   
					if ($totEmp>0){
						while ($rowEmp = mysql_fetch_assoc($result)){
							$query="select * from ae_colegio where idcol=".$rowEmp['idcol'];
							$result2=mysql_query($query, $link) or die(mysql_error());
							$totEmp2=mysql_num_rows($result2);					

							$query="select * from rep_colegio where idcol=".$rowEmp['idcol'];
							$result2=mysql_query($query, $link) or die(mysql_error());
							$totEmp3=mysql_num_rows($result2);

							$query="select distinct iddoc from doc_asig_ae_colegio where idcol=".$rowEmp['idcol'];
							$result2=mysql_query($query, $link) or die(mysql_error());
							$totEmp4=mysql_num_rows($result2);	

							$query="select * from alu_ae_colegio where idcol=".$rowEmp['idcol'];
							$result3=mysql_query($query, $link) or die(mysql_error());
							$totEmp5=mysql_num_rows($result3);							

							echo "<tr>";
							echo "<td>".$rowEmp['idcol']."</td>";
							echo "<td>".$rowEmp['nomcol']."</td>";
							echo "<td>".$rowEmp['direcol']."</td>";							
							echo "<td><a href='../ae_c/ae_colegio.php?id_col=$rowEmp[idcol]' id='Link'>Ver (".$totEmp2.")</a></td>";
							echo "<td><a href='../r_c/rep_colegio.php?id_col=$rowEmp[idcol]' id='Link'>Ver (".$totEmp3.")</a></td>";
							echo "<td><a href='../a_ae_c/alu_ae_colegio.php?id_col=$rowEmp[idcol]' id='Link'>Ver (".$totEmp5.")</a></td>";
							echo "<td><a href='../d_c/doc_colegio.php?id_col=$rowEmp[idcol]' id='Link'>Ver (".$totEmp4.")"."</td>";			
							echo "<td><a href='colegio_f_edita.php?id_col=$rowEmp[idcol]' id='LinkEdita'>Editar</a></td>";
							echo "<td><a href='colegio_f_borra.php?id_col=$rowEmp[idcol]' id='LinkBorra'>Borrar</a></td>";
							echo "</tr>";
						}	
					}
				?>
				</table>			
			</div>
			<!---->						
		</div>
	</body>		
</html>
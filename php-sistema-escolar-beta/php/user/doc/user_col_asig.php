<!DOCTYPE HTML>
<html>		
	<head>
		<title>Perfil de Usuario: Docente</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_user_doc.css" media="screen"/>
	</head>
	<body>
		<a href="user_col_doc.php?id_usu=<?php echo $_REQUEST['id_usu']; ?>" id="linkAtras"><< Atras</a><br>
		<div class="DivGeneral">
			<!---->			
			<div class="DivInfoUser">				
				<strong>Datos del Colegio</strong>
				<blockquote>
				<?php
					require_once("../../php_default.php");
					$query="select * from colegio where idcol=$_REQUEST[id_col]";
					$result=mysql_query($query, $link) or die(mysql_error());
					$row=mysql_fetch_row($result);

					echo "Nombre: ".$row[1]."<br>";
					echo "Direccion: ".$row[2]."<br>";
				?>
				</blockquote>				
			</div>
			<!---->			
			<div class="DivInfoColegio">
				<strong>Asignaturas/Año Escolar</strong>
				<blockquote>
				<?php				
					$query="select * from doc_asig_ae_colegio where idcol=".$row[0]." and iddoc=".$_REQUEST['id_usu'];	
					$result2=mysql_query($query, $link) or die(mysql_error());
					$totEmp=mysql_num_rows($result2);

					if ($totEmp>0){
						while ($rowEmp = mysql_fetch_assoc($result2)){
							$query="select * from asignatura where idasig = ".$rowEmp['idasig'];
							$result3=mysql_query($query, $link) or die(mysql_error());
							$row3=mysql_fetch_row($result3);

							$query="select * from anio_escolar where idanio = ".$rowEmp['idanio'];
							$result4=mysql_query($query, $link) or die(mysql_error());
							$row4=mysql_fetch_row($result4);
							echo "<a href='profile_asig.php?id_col=$rowEmp[idcol]&id_anio=$rowEmp[idanio]&id_doc=$_REQUEST[id_usu]&id_asig=$rowEmp[idasig]' id='linkEntra'>".$row3[1]." - ".$row4[1]."</a><br>";							
						}
					}
				?>
				</blockquote>
			</div>
			<!---->						
		</div>
	</body>		
</html>
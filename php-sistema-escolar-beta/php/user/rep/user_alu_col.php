<!DOCTYPE HTML>
<html>		
	<head>
		<title>Perfil de Usuario: Representante</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_user_rep.css" media="screen"/>
	</head>
	<body>
		<a href="user_col_rep.php?id_usu=<?php echo $_REQUEST['id_usu']; ?>" id="linkAtras"><< Atras</a><br>
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
				<strong>Alumnos</strong>
				<blockquote>
				<?php
					$query="select idcol,idanio,idalu from alu_ae_colegio a
								where exists(select 1 from alu_rep b
												where a.idalu=b.idalu
												and b.idrep=$_REQUEST[id_usu])
								and a.idcol=$_REQUEST[id_col]";
					$result=mysql_query($query, $link) or die(mysql_error());
					$totEmp=mysql_num_rows($result);

					if ($totEmp>0){
						while ($rowEmp = mysql_fetch_assoc($result)){
							$query="select * from usuario_info where idusu = ".$rowEmp['idalu'];
							$result2=mysql_query($query, $link) or die(mysql_error());
							$row2=mysql_fetch_row($result2);

							$query="select * from anio_escolar where idanio = ".$rowEmp['idanio'];
							$result3=mysql_query($query, $link) or die(mysql_error());
							$row3=mysql_fetch_row($result3);
							echo "<a href='profile_alu.php?id_col=$rowEmp[idcol]&id_rep=$_REQUEST[id_usu]&id_alu=$rowEmp[idalu]' id='linkEntra'>".$row2[3]." ".$row2[4]." - ".$row3[1]."</a><br>";
						}
					}
					else{
						echo "<center><label>Sin alumnos asociados</label></center>";
					}
				?>
			</blockquote>
			</div>
		</div>	
	</body>		
</html>	
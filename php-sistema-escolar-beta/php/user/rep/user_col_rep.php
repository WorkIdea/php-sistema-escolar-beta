<!DOCTYPE HTML>
<html>		
	<head>
		<title>Perfil de Usuario: Representante</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../../css/css_user_rep.css" media="screen"/>
	</head>
	<body>
		<a href="../../../index.php" id="linkAtras"><< Salir</a><br>
		<div class="DivGeneral">
			<!---->			
			<div class="DivInfoUser">				
				<strong>Datos Personales</strong>
				<blockquote>
				<?php
					require_once("../../php_default.php");
					$query="select * from usuario_info where idusu=".$_REQUEST['id_usu'];
					$result=mysql_query($query, $link) or die(mysql_error());
					$row=mysql_fetch_row($result);

					echo "Identificacion: ".$row[1]." - ".$row[2]."<br>";
					echo "Nombre: ".$row[3]." ".$row[4]."<br>";
					echo " Direccion: ".$row[5]."<br>";
				?>
				</blockquote>				
			</div>
			<!---->			
			<div class="DivInfoColegio">
				<strong>Colegios</strong>
				<blockquote>
				<?php
					$query="select * from rep_colegio where idrep=".$_REQUEST['id_usu'];					
					$result2=mysql_query($query, $link) or die(mysql_error());
					$totEmp=mysql_num_rows($result2);

					if ($totEmp==1){
						$row3=mysql_fetch_row($result2);
						$query="select nomcol from colegio where idcol = ".$row3[0];						
						$result4=mysql_query($query, $link) or die(mysql_error());
						$row4=mysql_fetch_row($result4);

						echo "<a href='user_alu_col.php?id_usu=$row[0]&id_col=$row3[0]' id='linkEntra'>".$row4[0]."</a><br>";						
					}
					elseif ($totEmp>1) {
						while ($rowEmp = mysql_fetch_assoc($result2)){		
							$query="select nomcol from colegio where idcol = ".$rowEmp['idcol'];
							$result3=mysql_query($query, $link) or die(mysql_error());
							$row2=mysql_fetch_row($result3);

							echo "<a href='user_alu_col.php?id_usu=$row[0]&id_col=$rowEmp[idcol]' id='linkEntra'>".$row2[0]."</a><br>";
						}	
					}
					else{
						echo "No posee colegios asociados.";						
					}
				?>
				</blockquote>
			</div>
			<!---->						
		</div>
	</body>		
</html>
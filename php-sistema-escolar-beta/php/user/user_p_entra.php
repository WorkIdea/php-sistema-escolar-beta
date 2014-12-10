<!DOCTYPE HTML>
<html>		
	<head>
		<title>Elige Rol</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_default.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="../../css/css_index.css" media="screen"/>
	</head>
	<body>
		<div class="DivGeneral">
<?php
	require_once("../php_default.php");
	$query="select * from usuario_login where tipoid = '".$_POST["tipoid"]."' and numid = ".$_POST["numid"]." and passusu = '".$_POST["passusu"]."'";
	$result=mysql_query($query, $link) or die(mysql_error());	
	$totEmp=mysql_num_rows($result); 		

	if ($totEmp>0){
		$row=mysql_fetch_row($result);		
		
		$query="select * from usuario_rol where idusu=".$row[0];				
		$result2=mysql_query($query, $link) or die(mysql_error());		
		$totEmp2=mysql_num_rows($result2);

		if ($totEmp2==0){
			echo "<center><label>Usuario sin rol Asignado</label></center>";
			echo "<center><a href=../../index.php>Volver</a></center>";
		}
		elseif ($totEmp2==1) {		
			$row2=mysql_fetch_row($result2);	
			if ($row2[1]=='REP'){
				header ("Location: rep/user_col_rep.php?id_usu=".$row2[0]);
			}
			elseif ($row2[1]=='DOC') {
				header ("Location: doc/user_col_doc.php?id_usu=".$row2[0]);
			}
			else{
				echo "<center><label>Usuario no autorizado</label></center>";
				echo "<center><a href=../../index.php>Volver</a></center>";				
			}			
		}
		else{	
			echo "<div class='DivLogin'><blockquote>";
			echo "<label><strong>Elige perfil de acceso</strong></label><br>";			
			while ($rowEmp = mysql_fetch_assoc($result2)){
				$query="select * from tab_central where tipotab='ROLUSU' and codtab='".$rowEmp['rolusu']."'";
				$result3=mysql_query($query, $link) or die(mysql_error());	
				$row3=mysql_fetch_row($result3);	
				echo "<a href='".strtolower($row3[1])."/user_col_".strtolower($row3[1]).".php?id_usu=".$row[0]."' id='linkEntra'>".$row3[2]."</a><br>";
			}
			echo "</blockquote></div>";
		}
	}
	else{
		echo "<center><label>Usuario Incorrecto</label></center>";
		echo "<center><a href=../../index.php>Volver</a></center>";
	}    		
?>
</div>
	</body>		
</html>		

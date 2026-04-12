<?php
  /**
 Bienvenidos al Ejemplo de Paginación
 */

?>
<!DOCTYPE html>
<html>
<head>
	<title>Paginacion en PHP</title>
	
	<style type="text/css">
	table{
		width: 450px;
	}
	table th{




background: -webkit-linear-gradient(top,  rgba(30,87,153,1) 0%,rgba(41,137,216,1) 50%,rgba(125,185,232,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom,  rgba(30,87,153,1) 0%,rgba(41,137,216,1) 50%,rgba(125,185,232,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
color: #FFFFFF;
height: 30px;
	}
	   .active > a{
	   	background: rgb(255,116,0); 
	   }
	  ul{
	  	margin-left: 0px;
	  	    padding: 0px;
	  } 
      ul > li{
      	list-style: none;
      	display: inline-block;
      	margin-right:7px;
      }
      ul > li > a {
      	color: #FFFFFF;
      	text-decoration: none;
      	padding: 5px 10px 5px 10px;
        display: block;
		background: #1e5799; /* Old browsers */
		border-radius: 20px;

      }
      .btn > a{
      	padding: 2px;
		background: #1e5799; /* Old browsers */
		 border-radius: 2px;
		 text-align: center;
		 width:30px;
      }
      table{
      	border: solid 1px #7E7C7C;
      	border-collapse: collapse;
      }
td , th{
      	border: solid 1px #7E7C7C;
      	padding: 2px;
      	text-align: center;
      }
	</style>
</head>
<body>
	<center>
<?php 
require_once 'paginador.php';
 ?>
 </center>
</body>
</html>



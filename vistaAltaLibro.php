<!DOCTYPE HTML>
<html>
<head>
<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">

<script type="text/javascript" src="/JAMP/JS/validar.js"></script>


<title>Administracion de Libros</title>
<script src="/JAMP/LIBS/jquery.js" type="text/javascript"></script>
<script src="/JAMP/LIBS/codigoAdminUsuarios.js" type="text/javascript"></script>
<script type="text/javascript" src="../JAMP/LIBS/bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/font-awesome/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="/JAMP/home.css"/>
</head>
<body class="laboratorix">
<nav class="navbar navbar-inverse" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <label class="navbar-brand">CookBooks</label> 
  </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
        <li><a href="../ADMIN/cookBooksAdmin.php">Inicio</a></li>
        <li><a href="../PORTI/llamadaController.php?action=cargarLibro&clase=entidad">Administrar Libros</a></li>
        <li class="active"><a href="#">Alta Libro</a></li>
        <li><a href ="/JAMP/PORTI/llamadaController.php?action=borradosLibro&clase=entidad">Libros Borradas </a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
      
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
<div class="row">
<div class="col-md-12">
<form method="POST" onSubmit = "return validar()" action="llamadaController.php?action=confirmarAltaLibro&clase=entidad">
  <table class="table table">
    <tr>
    <td>
      <input id="nombre" type="text" placeholder="Ingrese nombre Libro" name="nom_libro">
      <input id="nombre" type="text" placeholder="Ingrese ISBN" name="isbn_libro">
      <input id="nombre" type="text" placeholder="Ingrese cantidad de hojas" name="cantHojas_libro"> 
      <input id="nombre" type="text" placeholder="Ingrese cantidad de libros" name="cant_libro">
      <input id="nombre" type="text" placeholder="Ingrese precio" name="precio_libro">
      <input id="nombre" type="text" placeholder="Ingrese editorial" name="editorial_libro"> 
      <input id="nombre" type="text" placeholder="Ingrese etiqueta" name="etiqueta_libro">
      <input id="nombre" type="text" placeholder="Ingrese autor" name="autor_libro">

    </td>
    <td>
      <button class="btn btn-info" type="submit">Enviar</button>

    </td>
    </tr>
  </table>
</form>
<div>
<?php
  if(isset($existe)){
    echo "Ya existe el nombre ingresado, busque en la lista o en los borrados";
  }

?>
          <p>
                <label for="filtroEtiqueta">Etiqueta: </label><br>
                <select name="filtroEtqueta" id="filtroEtiqueta">
                  <option value="">--Ninguno--</option>  
                  <?php
                     foreach ($arrayNa as $key){
                      echo  "<td class='separados'><p>".$key['nombre']."</p></td>";
                     
                    }

                  ?>

                </select>           
          </p>


</div>
</div>
</div>

</body>
</html>
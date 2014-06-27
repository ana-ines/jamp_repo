<?php
require_once("../Modelo/modelo.php");
$nombre=$_GET["action"];
session_start();
class entidad{
    function altaEtiqueta (){
        require_once("../vistaAltaEtiqueta.php");
    }
    function agregarBorradaEtiqueta (){
        $per=$_SESSION['permiso'];
        if($per==1){
            $id=$_POST['id_etiqueta'];
            $borrar=agregarBorradaEtiqueta($id);
            $etiquetas=obtenerEtiquetas();
            if ( $etiquetas!="error"){
                $arrayNa = array();
                $i=0;
                $sePudoModificar = true;
                foreach ($etiquetas as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_etiqueta'] );
                    $i++;
                }
            }
        
            require_once("../vistaEtiquetas.php");
        }
    }
    function bajaEtiqueta(){
        $per=$_SESSION['permiso'];
        if($per==1){
        $id=$_POST['id_etiqueta'];
        $borrar=eliminarEtiqueta($id);
        $etiquetas=obtenerEtiquetas();
        if ( $etiquetas!="error"){
            $arrayNa = array();
            $i=0;
            foreach ($etiquetas as $key ) {
                $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                        'id_us' => $key['id_etiqueta'] );
                $i++;
            }
        }
        require_once("../vistaEtiquetas.php");
        }
    }
    function modificarEtiqueta () {
        $per=$_SESSION['permiso'];
        $n=$_GET['nombre'];
        //echo $n;
        if($per==1){
        $id=$_POST['id_etiqueta'];
        require_once("../vistaModificarEtiqueta.php");}
    }
    function borradosEtiqueta () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $etiquetas=obtenerEtiquetasBorradas();

                if ( $etiquetas!="error"){
                    $arrayNa = array();
                    $i=0;
                    foreach ($etiquetas as $key ) {
                        $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                                'id_us' => $key['id_etiqueta'] );
                        $i++;
            
                    }
                }
            require_once("../vistaEtiquetasBorradas.php");
        }else{
            //ir al login
        }
    }
    function confirmarAltaEtiqueta() {
        $per=$_SESSION['permiso'];
        if($per==1){
            $nom=$_POST["nom_etiqueta"];
            $arreglo= validarAltaEtiqueta($nom);     
            if((!empty($arreglo)) && ($arreglo[0]['nombre'] == $nom)){
                $existe = 'existe';
                require_once("../vistaAltaEtiqueta.php");
            }else{
                $intento=insertarEtiqueta($nom);
                if ($intento){
                    $etiquetas=obtenerEtiquetas();
                    if ( $etiquetas!="error"){
                        $arrayNa = array();
                        $sePudoModificar = true;
                        $i=0;
                        foreach ($etiquetas as $key ) {
                            $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_etiqueta'] );
                            $i++;
                        }
                        require_once("../vistaEtiquetas.php");
                    }
                }
            }
        }
    }
    function confirmarModificacionEtiqueta (){
        $per=$_SESSION['permiso'];
        if($per==1){
            $nom=$_POST['nom_etiqueta'];
            $id=$_POST['id_etiqueta'];
            $arreglo= validarAltaEtiqueta($nom);
            if((!empty($arreglo)) && ($arreglo[0]['nombre'] == $nom)){
                $existe = 'existe';
                require_once("../vistaAltaEtiqueta.php");
            }else{
                $intento=modificarEtiqueta($nom,$id);
                if ($intento){
                    $etiquetas=obtenerEtiquetas();
                    if ( $etiquetas!="error"){
                        $arrayNa = array();
                        $sePudoModificar = true;
                        $i=0;
                        foreach ($etiquetas as $key ) {
                            $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                                'id_us' => $key['id_etiqueta'] );
                            $i++;
                        }
                        require_once("../vistaEtiquetas.php");
                    }    
                }   
            }    
        }
    }
    function cargarEtiqueta () {
        $per=$_SESSION['permiso']; 
        if($per==1){
            $etiquetas=obtenerEtiquetas();
            if ( $etiquetas!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($etiquetas as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_etiqueta'] );
                    $i++;
                }
            }
            require_once("../vistaEtiquetas.php");
        }else{
            require_once "../cookbooks.php";
        }
    }
    function altaEditorial () {
        require_once("../vistaAltaEditorial.php");
    }
    function agregarBorradaEditorial (){   
        $per=$_SESSION['permiso'];
        if($per==1){
            $id=$_POST['id_editorial'];
            $borrar=agregarBorradaEditoriales($id);
            $editoriales=obtenerEditoriales();
            if ( $editoriales!="error"){
                $arrayNa = array();
                $i=0;
                $sePudoModificar = true;
                foreach ($editoriales as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_editorial'] );
                    $i++;
                }
            }
        }
    }
    function bajaEditorial () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $id=$_POST['id_editorial'];
            $borrar=eliminarEditorial($id);
            $editoriales=obtenerEditoriales();
            if ( $editoriales!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($editoriales as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_editorial'] );
                    $i++;
                }
            }
            require_once("../vistaEditorial.php");
        }
    }
    function modificarEditorial () {
        $per=$_SESSION['permiso'];
        $n=$_GET['nombre'];
        //echo $n;
        if($per==1){
            $id=$_POST['id_editorial'];
            require_once("../vistaModificarEditorial.php");
        }
    }
    function borradosEditorial () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $editoriales=obtenerEditorialesBorradas();

                if ( $editoriales!="error"){
                    $arrayNa = array();
                    $i=0;
                    foreach ($editoriales as $key ) {
                        $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                                'id_us' => $key['id_editorial'] );
                        $i++;
            
                    }
                }
            require_once("../vistaEditorialesBorradas.php");
        }else{
            //ir al login
        }
    }   
    function confirmarAltaEditorial () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $nom=$_POST["nom_editorial"];
            $arreglo= validarAltaEditorial($nom);
            if((!empty($arreglo)) && ($arreglo[0]['nombre'] == $nom)){
                $existe = 'existe';
                require_once("../vistaAltaEditorial.php");
            }else{
                $intento=insertarEditorial($nom);
                if ($intento){
                    $editoriales=obtenerEditoriales();
                    if ( $editoriales!="error"){
                        $arrayNa = array();
                        $sePudoModificar = true;
                        $i=0;
                    foreach ($editoriales as $key ) {
                        $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                             'id_us' => $key['id_editorial'] );
                        $i++;           
                    }
                    require_once("../vistaEditorial.php");
                    }
                }
            }
        }
    }
    function confirmarModificacionEditorial () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $nom=$_POST['nom_editorial'];
            $id=$_POST['id_editorial'];
            $arreglo= validarAltaEditorial($nom);
            if((!empty($arreglo)) && ($arreglo[0]['nombre'] == $nom)){
                $existe = 'existe';
                require_once("../vistaAltaEditorial.php");
            }else{
                $intento=modificarEditorial($nom,$id);
                if ($intento){
                    $editoriales=obtenerEditoriales();
                    if ( $editoriales!="error"){
                        $arrayNa = array();
                        $sePudoModificar = true;
                        $i=0;
                        foreach ($editoriales as $key ) {
                            $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                                'id_us' => $key['id_editorial'] );
                            $i++;
                        }
                        require_once("../vistaEditorial.php");
                    }           
                }
            }   
        }
    }
    function cargarEditorial () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $editoriales=obtenerEditoriales();
            if ( $editoriales!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($editoriales as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_editorial'] );
                    $i++;
                }
            }
            require_once("../vistaEditorial.php");
        }else{
            require_once './cookbooks.php';
        }
    }
    function altaAutor (){
            require_once("../vistaAltaAutor.php");
    }
    function agregarBorradaAutor () {   
        $per=$_SESSION['permiso'];
        if($per==1){
            $id=$_POST['id_autor'];
            $borrar=agregarBorradaAutores($id);
            $autores=obtenerAutores();
            if ( $autores!="error"){
                $sePudoModificar = true;
                $arrayNa = array();
                $i=0;
                foreach ($autores as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_autor'] );
                    $i++;
                }
            }
        
            require_once("../vistaAutores.php");
        }
    }
   function bajaAutor () {
        $per=$_SESSION['permiso'];
        if($per==1){
        $id=$_POST['id_autor'];
        $borrar=eliminarAutor($id);
        $autores=obtenerAutores();
        if ( $autores!="error"){
            $arrayNa = array();
            $i=0;
            foreach ($autores as $key ) {
                $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                        'id_us' => $key['id_autor'] );
                $i++;
            }
        }
        require_once("../vistaAutores.php");
        }
    }
    function modificarAutor () {
        $per=$_SESSION['permiso'];
        $n=$_GET['nombre'];
        //echo $n;
        if($per==1){
            $id=$_POST['id_autor'];
            require_once("../vistaModificarAutor.php");
        }
    }
    function borradosAutores () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $autores=obtenerAutoresBorrados();
                if ( $autores!="error"){
                    $arrayNa = array();
                    $i=0;
                    foreach ($autores as $key ) {
                        $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                                'id_us' => $key['id_autor'] );
                        $i++;
                    }
                }
            require_once("../vistaAutoresBorrados.php");
        }else{
            //ir al login
        }
    }    
    function confirmarAltaAutor () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $nom=$_POST["nom_autor"];
            $arreglo= validarAltaAutor($nom);
            if((!empty($arreglo)) && ($arreglo[0]['nombre'] == $nom)){
                $existe = 'existe';
                require_once("../vistaAltaAutor.php");
            }else{
                $intento=insertarAutor($nom);
                if ($intento){
                    $autores=obtenerAutores();
                    if ( $autores!="error"){
                        $arrayNa = array();
                        $sePudoModificar = true;
                        $i=0;
                        foreach ($autores as $key ) {
                            $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                                'id_us' => $key['id_autor'] );
                            $i++;
                        }
                        require_once("../vistaAutores.php");
                    }
                }
            }
        }
    }
    function confirmarModificacionAutor () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $nom=$_POST['nom_autor'];
            $id=$_POST['id_autor'];
            $arreglo= validarAltaAutor($nom);
            if((!empty($arreglo)) && ($arreglo[0]['nombre'] == $nom)){
                $existe = 'existe';
                require_once("../vistaAltaAutor.php");
            }else{
                $intento=modificarAutor($nom,$id);
                if ($intento){
                    $autores=obtenerAutores();
                    if ( $autores!="error"){
                        $arrayNa = array();
                        $sePudoModificar = true;
                        $i=0;
                        foreach ($autores as $key ) {
                            $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                                'id_us' => $key['id_autor'] );
                            $i++;
                        }
                        require_once("../vistaAutores.php");
                    }            
                }
            }       
        }
    }

    function cargarAutor () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $autores=obtenerAutores();
            if ( $autores!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($autores as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_autor'] );
                    $i++;
                }
            }
            require_once("../vistaAutores.php");
        }else{
            require_once './cookbooks.php';
        }
    }
    function altaLibro (){
        require_once("../vistaAltaLibro.php");
    }
    function agregarBorradaLibro (){
        $per=$_SESSION['permiso'];
        if($per==1){
            $id=$_POST['id_libro'];
            $borrar=agregarBorradaLibro($id);
            $libros=obtenerLibros();
            if ( $libros!="error"){
                $arrayNa = array();
                $i=0;
                $sePudoModificar = true;
                foreach ($libros as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,'isbn' => $key['isbn'],'cantPag' =>$key['cantPag'], 
                                'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'] );
                    $i++;
                }
            }
            require_once("../vistaLibros.php");
        }
    }
    function bajaLibro(){
        $per=$_SESSION['permiso'];
        if($per==1){
            $id=$_POST['id_libro'];
            $borrar=eliminarLibro($id);
            $libros=obtenerLibros();
            if ( $libros!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($libros as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'], 'isbn' => $key['isbn'],'cantPag' =>$key['cantPag'], 
                                'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'] );
                    $i++;
                }
            }
            require_once("../vistaLibros.php");
        }
    }
    function modificarLibro () {
        $per=$_SESSION['permiso'];
        $n=$_GET['nombre'];
        //echo $n;
        if($per==1){
            $id=$_POST['id_libro'];
            require_once("../vistaModificarLibro.php");
        }
    }
    function borradosLibro () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $libros=obtenerLibrosBorrados();
            if ( $libros!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($libros as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,'isbn' => $key['isbn'],'cantPag' =>$key['cantPag'], 
                                'stock' =>$key['stock'],'precio'=>$key['precio'],'id_libro' => $key['id_libro'] );
                    $i++;
                }
            }
            require_once("../vistaLibrosBorradas.php");
        }else{
            //ir al login
        }
    }
    function confirmarAltaLibro() {
        $per=$_SESSION['permiso'];
        if($per==1){
            $nom=$_POST["nom_libro"];
            $isbn=$_POST["isbn_libro"];
            $cantHojas=$_POST["cantHojas_libro"];
            $cantLibros=$_POST["cant_libro"];
            $precio=$_POST["precio_libro"];
            $id_editorial=$_POST["id_editorial_libro"];
            $id_etiqueta=$_POST["id_etiqueta_libro"];
            $id_autor=$_POST["id_autor_libro"];
            //$imagen= $_POST["imagen"];
            //print_r($_FILES);
            //echo $imagen;
            $imagen= $_FILES["image"];
            echo $imagen;
            var_dump($imagen);
            $arreglo= validarAltaLibro($nom, $isbn);   
            if((!empty($arreglo))){
                $existe = 'existe';
                require_once("../vistaAltaLibro.php");
            }else{
                $intento=insertarLibro($nom, $isbn, $cantHojas, $cantLibros, $precio, $id_editorial, $id_etiqueta, $id_autor, $imagen);
                if ($intento){
                    $libros=obtenerLibros();
                    if ( $libros!="error"){
                       $arrayNa = array();
                       $sePudoModificar = true;
                       $i=0;
                       foreach ($libros as $key ) {
                            $arrayNa[$i]=array('nombre' => $key['nombre'],'isbn' => $key['isbn'],'cantPag' =>$key['cantPag'], 
                                'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'] );
                            $i++;
                        }
                    require_once("../vistaLibros.php");
                    }
                }
            }
        }
    }
    function confirmarModificacionLibro (){
        $per=$_SESSION['permiso'];
        if($per==1){
            $nom=$_POST["nom_libro"];
            $isbn=$_POST["isbn_libro"];
            $cantHojas=$_POST["cantHojas_libro"];
            $cantLibros=$_POST["cant_libro"];
            $precio=$_POST["precio_libro"];
            $id_editorial=$_POST["id_editorial_libro"];
            $id_etiqueta=$_POST["id_etiqueta_libro"];
            $id_autor=$_POST["id_autor_libro"];
            $id_libro=$_POST["id_libro"];
            $arreglo = validarAltaLibro($nom, $isbn);
            if((!empty($arreglo))){
                if ($arreglo[0]['nombre'] == $nom){
                $existe = 'existe';
                require_once("../vistaModificarLibro.php");
               }
            }else{
                $intento=modificarLibro($id_libro, $nom, $isbn, $cantHojas, $cantLibros, $precio, $id_editorial, $id_etiqueta, $id_autor);
                if ($intento){
                    $libros=obtenerLibros();
                    if ( $libros!="error"){
                        $sePudoModificar = true;
                        $arrayNa = array();
                        $i=0;
                        foreach ($libros as $key ) {
                            $arrayNa[$i]=array('nombre' => $key['nombre'] ,'isbn' => $key['isbn'],'cantPag' =>$key['cantPag'], 
                                'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'] );
                            $i++;
                        }
                    require_once("../vistaLibros.php");
                    }
                }  
            } 
        }
    }
    function cargarLibro () {
        $per=$_SESSION['permiso']; 
        if($per==1){
            $libros=obtenerLibros();
            if ( $libros!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($libros as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] , 'isbn' => $key['isbn'], 
                        'cantPag' =>$key['cantPag'], 'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'] );
                    $i++;
                }
            }
            require_once("../vistaLibros.php");
        }else{
            $libros=obtenerLibros();
            if ( $libros!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($libros as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] , 'isbn' => $key['isbn'], 
                        'cantPag' =>$key['cantPag'], 'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'] );
                    $i++;
                }
            } //TENGO QUE VER CÓMO HACER PARA LISTAR LOS LIBROS EN EL INICIO
            require_once "../cookbooks.php";
        }
    }

    function cargarCarrito(){
        $idUsuario = $_POST['idUsuario'];
       // var_dump($idUsuario);
        $libros=recuperarLibroCarrito($idUsuario);
        //print_r($libros);
        //var_dump($libros);
            if ( $libros!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($libros as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] , 'isbn' => $key['isbn'], 
                        'cantPag' =>$key['cantPag'], 'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'] );
                    $i++;
                }
            } //TENGO QUE VER CÓMO HACER PARA LISTAR LOS LIBROS EN EL INICIO
            require_once "../vistaCarritoLibro.php";

    }

    function registrarme () {
        require_once "../vistaRegistrar.php";
    }
    function registrarCliente () {
        $nombreUsuario= $_POST['nombreusuario'];
        $cliente= recuperarCliente($nombreUsuario);
        if ($cliente!="error"){
            $arreglo= validarAltaUsuario($nombreUsuario);
            if((!empty($arreglo))){
                if ($arreglo[0]['nombreUsuario'] == $nombreUsuario){
                $existe = 'existe';
                require_once("../vistaRegistrar.php");
               }
            }else{
                $nombre= $_POST['nombre'];
                $apellido= $_POST['apellido'];
                $dni= $_POST['dni'];
                $contrasena= $_POST['contrasena'];
                $telefono= $_POST['telefono'];
                $email= $_POST['email'];       
                $intento= altaCliente($nombreUsuario, $nombre, $apellido, $dni,  $email, $telefono,$contrasena);
                if ($intento){
                    $res = recuperarCliente($nombreUsuario);
                    altaCarrito($res[0]['id_usuario']);
                    $sePudoAlta = true;
                    require_once("../vistaRegistrar.php");
                    //require_once("../cookbooks.php");
                    //header("Location: ../cookbooks.php");
                    //var_dump($res);
                //else
                    //mensaje de error y que vuelva a vistaRegistrar.php
                }
            }
        }
    }

    function mostrarPerfil () {
        $usuario=$_POST ['id_usuario'];
        $cliente=obtenerDatosCliente($usuario);
        require_once ("../vistaPerfil.php");
    }

    function modificarCliente () {
        $nombre=$_POST ['nombre'];
        $apellido=$_POST ['apellido'];
        $email=$_POST ['email'];
        $telefono=$_POST ['telefono'];
        $dni=$_POST ['dni'];
        $nombreUsuario=$_POST ['nombreUsuario'];
        $contrasena=$_POST ['contrasena'];
        $usuario=$_POST ['idUsuario'];
        $cliente=modificarDatosCliente($nombre,$apellido, $email,   $telefono, $dni, $nombreUsuario, $contrasena, $usuario);
        $cliente=obtenerDatosCliente($usuario);
        require_once ("../vistaPerfil.php"); 

    }
    function cargarUsuario () {
        $per=$_SESSION['permiso']; 
        if($per==1){
            $usuarios=obtenerUsuarios();
            if ( $usuarios!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($usuarios as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] , 'apellido' => $key['apellido'] , 'email' =>$key['email'] ,
                        'telefono' => $key['telefono'] , 'dni' =>$key['dni'] ,'nombreUsuario'=>$key['nombreUsuario'] , 'contrasena'=>$key['contrasena'] ,   
                            'id_usuario' => $key['id_usuario'] );
                    $i++;
                }
            }
            require_once("../vistaUsuarios.php");
        }else{
            require_once "../cookbooks.php";
        }
    }
    function bajaUsuario(){
        $per=$_SESSION['permiso'];
        if($per==1){
            $id=$_POST['id_usuario'];
            $res = eliminarUsuario($id);
            $usuarios=obtenerUsuarios();
            if($usuarios!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($usuarios as $key){
                    $arrayNa[$i]=array('nombre' => $key['nombre'] , 'apellido' => $key['apellido'] , 'email' =>$key['email'] ,
                        'telefono' => $key['telefono'] , 'dni' =>$key['dni'] ,'nombreUsuario'=>$key['nombreUsuario'] , 'contrasena'=>$key['contrasena'] ,   
                            'id_usuario' => $key['id_usuario'] );
                    $i++;
                }
            }
            require_once("../vistaUsuarios.php");
        }
    }



}



 
?>
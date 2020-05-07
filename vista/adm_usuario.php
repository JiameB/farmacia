<?php
session_start();

if ($_SESSION['usuario_tipo']==1) {
include_once 'layouts/cabecera.php';
?>
  <title>Editar Datos</title>
<?php
include_once 'layouts/menu_izquierda.php';
?>
<!-- Modal -->
<div class="modal fade" id="crearusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <div class="card card-success">
        <div class="card-header">
             <h3 class="card-title">Crear Usuario</h3>
             <button data-dismiss="modal" aria-label="close" class="close">
               <span aria-hidden="true">&times;</span>
             </button>
        </div>
        <div class="card-body">
             <form id="form-crearusuario">
               <div class="form-group">
                 <label for="nombre">Nombres</label>
                 <input id="nombre" type="text" class="form-control" placeholder="Ingrese nombre" required="">
               </div>
               <div class="form-group">
                 <label for="apellido">Apellidos</label>
                 <input id="apellido" type="text" class="form-control" placeholder="Ingrese apellidos" required="">
               </div>
               <div class="form-group">
                 <label for="edad">Fecha de nacimiento</label>
                 <input id="edad" type="date" class="form-control" placeholder="Ingrese fecha de nacimiento" required="">
               </div>
               <div class="form-group">
                 <label for="cedula">Cedula</label>
                 <input id="cedula" type="text" class="form-control" placeholder="Ingrese cedula" required="">
               </div>
               <div class="form-group">
                 <label for="pass">Contraseña/Password</label>
                 <input id="pass" type="password" class="form-control" placeholder="Ingrese contraseña" required="">
               </div>
            
        </div>
        <div class="card-footer">
              <button type="submit" class="btn bg-gradient-primary float-right m-1">Guardar</button>
              <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
               </form> 
        </div>
     </div>
    </div>
  </div>
</div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestionar usuarios <button type="button" data-toggle="modal" data-target="#crearusuario" class="btn bg-gradient-primary ml-2">Crear Usuario</button></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="adm_catalogo.php">Home</a></li>
              <li class="breadcrumb-item active">Gestionar usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      </section>
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Buscar usuario</h3>
              <div class="input-group">
                <input type="text" id="buscar" class="form-control float-left" placeholder="Ingrese nombre de usuario">
                <div class="input-group-append">
                  <button class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div id="usuarios" class="row d-flex align-items-stretch">
                
              </div>
              
            </div>
            <div class="card-footer">
              
            </div>
          </div>

       <section>
    
   </section>
<?php
include_once 'layouts/footer.php';
}
else{
	header('Location: ../index.php');
}
?>
<script src="../js/gestion_usuario.js"></script>
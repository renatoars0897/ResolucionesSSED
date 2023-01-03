<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->

<div class="container-fluid mt-3 ">
  <div class="row justify-content-md-center">
<!-- Button trigger modal -->
<div class="container-fluid mt-3">
   <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Agregar registro
</button>
</div>
<!--Modal cambio de contraseña-->
<div class="modal fade" id="ccontra" tabindex="-1" aria-labelledby="ccontra" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cambio de contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
        <form method="POST" action="action.php" enctype="multipart/form-data">
              <input type="text" name="metodo" value="2" hidden>
             <div clas="mb-3">
                <label class="form-label"><h4>Usuario</h4></label>
                <input name="usuario" type="text" class="file" size="40" value='<?php echo $_SESSION["s_usuario"];?>' disabled></td>
             </div>
             <div clas="mb-3">
                <label class="form-label"><h4>Nueva Contraseña</h4></label>
                <input name="nueva" type="password" class="file" size="25"></td>
             </div>
             <div class="mt-3" align="center">
                <input type="submit" class="btn btn-secondary" value="Modificar clave" name="modificar" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" class="btn btn-primary" value="Borrar campos" />
             </div>
           </form></p>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Resolución</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                 <form method="POST" action="action.php" enctype="multipart/form-data">
                  <input type="text" name="metodo" value="1" hidden>
        <div class="form-row">
           <div class="mb-3 col-md-6">
             <label class="form-label">Numero de Expediente</label>
             <input type="text" class="form-control" name="nexp" required>
           </div>
           <div class="mb-3 col-md-6">
              <label class="form-label" for="jpon">Juzgado de Origen</label>
                <select class="form-select" name="origen" id="origen" required>
                <option value="" >Seleccione un Juzgado</option>
                <option value="LIMA (PERMANENTE)">LIMA (PERMANENTE)</option>
                <option value="LIMA (TRANSITORIO)">LIMA (TRANSITORIO)</option>
                <option value="LIMA ESTE">LIMA ESTE</option>
                <option value="CALLAO">CALLAO</option>
                <option value="AYACUCHO">AYACUCHO</option>
                <option value="HUÁNUCO">HUÁNUCO</option>
                <option value="JUNÍN">JUNÍN</option>
                <option value="UCAYALI">UCAYALI</option>
                </select>
           </div>
        </div>
      <div class="row">
        <div class="mb-3 col-md-6">
          <label class="form-label">Materia</label>
          <input type="text" name="mat" class="form-control" required onKeyUp="this.value=this.value.toUpperCase();">
        </div>
        <div class="mb-3 col-md-6">
        <label for="tactp">Tipo de Acto Procesal</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="tactp" value="A" checked>
            <label class="form-check-label" for="Auto">
              Auto de Vista
            </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="tactp" value="S">
          <label class="form-check-label" for="Sent">
            Sentencia
          </label>
        </div>
        </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Requerido</label>
          <input type="text" name="req" class="form-control" required onKeyUp="this.value=this.value.toUpperCase();">
        </div>
        <div class="row">
        <div class="mb-3 col-md-6">
          <label for="jpon">Juez Ponente</label>
          <select class="form-select" name="jpon" id="jpon" required>
            <option value="">Seleccione un Juez</option>
            <option value="Dra. Vásquez">DRA. VÁSQUEZ</option>
            <option value="Dr. Huerta">DR. HUERTA</option>
            <option value="Dr. Arbulú">DR. ARBULÚ</option>
          </select>
        </div>
        <div class="mb-3 col-md-6">
          <label class="form-label">Voto en Discordia</label>
          <input type="text" class="form-control" name="voto" >
        </div>
        </div>
        <div class="row">
        <div class="mb-3 col-md-6">
          <label class="form-label">Numero de Resolucion</label>
          <input type="number" class="form-control" name="res" required>
        </div>
        <div class="mb-3 col-md-6">
           <label class="form-label">Fecha de Auto / Sentencia</label>
              <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                   <input class="form-control" type="text" name="datepicker" readonly />
                   <span class="input-group-addon"></span>
              </div>
        </div>
        </div>
        <div class="mb-3 ">
          <label  class="form-label">Sentido del Fallo</label>
          <textarea type="text"class="form-control" id="sentido" name="sentido" rows="2"></textarea>
        </div>
        <div class="mb-3 mt-3">
          <label  class="form-label">Tema Tratado</label>
          <textarea type="text"class="form-control" id="tema" name="tema" rows="2"></textarea>
        </div>
        <div class="mb-3 mt-3">
          <label for="formFile" class="form-label">Resolucion</label>
          <input class="form-control" type="file" name="doc" accept="application/pdf" required>
        </div>         
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Guardar Registro</button>
      </div>
    </div>
  </div>
</div>
<!--tabla-->
    <?php
    include('config.php');
    $sqlAlumnos   = ("SELECT * FROM table_resoluciones ORDER BY autor DESC");
    $queryAlumnos = mysqli_query($con, $sqlAlumnos);
    $totalAlumnos = mysqli_num_rows($queryAlumnos);
    ?>
    <div class="container-fluid ">
    <h3 class="text-center">Resoluciones-Sala de Apelaciones Transitoria Especializada en Extincion de Dominio - Lima</h3>
      <div class="table-responsive">
            <table id="example" class="table table-bordered table-striped table-hover " style="width:100%">
              <thead >
                <tr>
                  <th >ID</th>
                  <th >Numero de Expediente</th>
                  <th>Materia</th>
                  <th >Tipo de Acto Procesal</th>
                  <th >Requerido</th>
                  <th >Juez Ponente</th>
                  <th >N° Res. <br> Fecha</th>
                  <th>Sentido de Fallo</th>
                  <th>Temas Tratados</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $conteo =1;
              while ($dataAlumno = mysqli_fetch_array($queryAlumnos)) { ?>
                <tr>
                  <td><?php echo  $conteo++ .''; ?></td>
                  <td><?php echo $dataAlumno['nexp']; ?><br><?php echo $dataAlumno['origen']; ?></td>
                  <td><?php echo $dataAlumno['mat']; ?></td>
                  <td><?php echo $dataAlumno['tactp']==='A' ?  'AUTO DE VISTA' : 'SENTENCIA DE VISTA' ?></td>
                  <td><?php echo $dataAlumno['req']; ?></td>
                  <td><?php echo $dataAlumno['jpon']; ?></td>
                  <td><div class="fecha"> R. N° <?php echo $dataAlumno['res']; ?> <br><br><?php echo $dataAlumno['faut']; ?></div></td>
                  <td><div class="sentido"><?php echo $dataAlumno['sentido']; ?> <br> <?php echo $dataAlumno['voto']; ?></div></td>
                  <td><div class="sentido"><?php echo $dataAlumno['ttrata']; ?></div>     <a target="_blank" href="resoluciones/<?php echo $dataAlumno['doc']; ?>" class="btn btn-warning mb-2"   title="Ver Resolución <?php echo $dataAlumno['nexp']; ?>">
                   Ver Res.</a></td>
                </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
   </div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>

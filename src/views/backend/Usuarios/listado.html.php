{{ title :: Usuarios }}


<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"> Usuarios </h6>
  </div>
  <div class="card-body">

    <a class="btn btn-primary btn-icon-split  action" href="/backend/usuarios/crear">Crear Usuario</a>

    <div class="table-responsive">
      <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
        <tr>
          <th>Id</th>
          <th>Nombre </th>
          <th>Email</th>
          <th>Estado</th>
          <th></th>
        </tr>
        <!-- en la parte de abajo los nombres tienen que ser igual a base de datos -->
        <?php foreach ($usuarios_listado as $usuario) { ?>
          <tr>
            <td> <a class="btn btn-success btn-circle" href="/backend/usuarios/detalle/<?= $usuario->getId() ?>"> <?= $usuario->getId() ?> </a> </td>
            <td> <?= $usuario->getFullName() ?> </td>
            <td> <?= $usuario->getEmail() ?> </td>
            <td> <?= $usuario->getEstado() ?> </td>
            <td>
              <a class="btn btn-danger btn-icon-split  action action-borrar" data-id="<?= $usuario->getId() ?>" href="/backend/usuarios/borrar/<?= $usuario->getId() ?>">Borrar </a>
              <a class="btn btn-info btn-icon-split action action-modificar" data-id="<?= $usuario->getId() ?>" href="/backend/usuarios/modificar/<?= $usuario->getId() ?>">Modificar </a>
            </td>
          </tr>
        <?php } ?>

      </table>
    </div>
  </div>
</div>

<script>
</script>
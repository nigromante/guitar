{{ title :: Instrumentos }}

<a class="btn btn-primary btn-icon-split  action" href="/backend/instrumentos/crear">Crear Instrumento</a>

<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <tr>  
    <th>Id</th>
    <th> Alias </th>
    <th>Nombre</th>
    <th>Descripcion</th>
    <th>Acciones</th>
  </tr>

    <?php foreach( $instrumentos_listado as $instrumento) { ?>
        <tr>
            <td> <a class="btn btn-success btn-circle"  href="/backend/instrumentos/detalle/<?= $instrumento["id"] ?>" > <?= $instrumento["id"] ?> </a>  </td>
            <td>  <?= $instrumento["alias"] ?> </td>
            <td>  <?= $instrumento["nombre"] ?> </td>
            <td>  <?= $instrumento["descripcion"] ?> </td>
            <td>
            <a class="btn btn-danger btn-icon-split  action action-borrar" data-id="<?= $instrumento["id"] ?>"  href="/backend/instrumentos/borrar/<?= $instrumento["id"] ?>" >Borrar </a>
            <a class="btn btn-info btn-icon-split action action-modificar" data-id="<?= $instrumento["id"] ?>"  href="/backend/instrumentos/modificar/<?= $instrumento["id"] ?>" >Modificar </a>
            </td>
        </tr>
    <?php } ?>

</table>
</div>


<script>
</script>

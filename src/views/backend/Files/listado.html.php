{{ title :: Files }}

<a class="btn btn-primary btn-icon-split  action" href="/backend/instrumentos/crear">Subir archivo</a>
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <tr>  
    <th>Id</th>
    <th> Filename </th>
    <th> Filetype </th>
    <th> Description</th>
    <th> Path </th>
    <th>Acciones</th>
  </tr>

    <?php foreach( $files as $file) { ?>
        <tr>
        <td> <a class="btn btn-success btn-circle" href="/backend/files/detalle/<?= $file["id"] ?>" > <?= $file["id"] ?> </a>  </td>
            <td>  <?= $file["filename"] ?> </td>
            <td>  <?= $file["filetype"] ?> </td>
            <td>  <?= $file["description"] ?> </td>
            <td>  <?= $file["path"] ?> </td>
            <td>
            <a class="btn btn-danger btn-icon-split  action action-borrar"  href="/backend/files/borrar/<?= $file["id"] ?>" >Borrar </a>
            </td>
        </tr>
    <?php } ?>

</table>
</div>

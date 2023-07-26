{{ title :: Files }}


<table>
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
            <td> <a href="/backend/files/detalle/<?= $file["id"] ?>" > <?= $file["id"] ?> </a>  </td>
            <td>  <?= $file["filename"] ?> </td>
            <td>  <?= $file["filetype"] ?> </td>
            <td>  <?= $file["description"] ?> </td>
            <td>  <?= $file["path"] ?> </td>
            <td>
            <a class="action action-borrar"  href="/backend/files/borrar/<?= $file["id"] ?>" >Borrar </a>
            </td>
        </tr>
    <?php } ?>

</table>


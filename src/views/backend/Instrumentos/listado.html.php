{{ title :: Instrumentos }}


<table>
  <tr>  
    <th>Id</th>
    <th> Alias </th>
    <th>Nombre</th>
    <th>Descripcion</th>
    <th>Acciones</th>
  </tr>

    <?php foreach( $instrumentos_listado as $instrumento) { ?>
        <tr>
            <td> <a href="/backend/instrumentos/detalle/<?= $instrumento["id"] ?>" > <?= $instrumento["id"] ?> </a>  </td>
            <td>  <?= $instrumento["alias"] ?> </td>
            <td>  <?= $instrumento["nombre"] ?> </td>
            <td>  <?= $instrumento["descripcion"] ?> </td>
            <td>
            <a class="action action-borrar"  href="/backend/instrumentos/borrar/<?= $instrumento["id"] ?>" >Borrar </a>
            </td>
        </tr>
    <?php } ?>

</table>

<script>
</script>

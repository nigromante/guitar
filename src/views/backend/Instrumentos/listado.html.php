{{ title :: Instrumentos }}

<a class="action action-crear" href="/backend/instrumentos/crear">crear instrumento</a>

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
            <a class="action action-borrar" data-id="<?= $instrumento["id"] ?>"  href="/backend/instrumentos/borrar/<?= $instrumento["id"] ?>" >Borrar </a>
            <a class="action action-modificar" data-id="<?= $instrumento["id"] ?>"  href="/backend/instrumentos/modificar/<?= $instrumento["id"] ?>" >Modificar </a>
            </td>
        </tr>
    <?php } ?>

</table>


<script>
</script>

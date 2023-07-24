¡<style>
th  {
    padding: 8px ; 
    border : 1px solid green ; 
}

td  {
    padding: 8px ; 
    border : 1px solid red ; 
}
.action {
    display: inline-block ;
    padding: 20px ;
}
.action.action-borrar {

    background-color: red ;
    color: white ;

}

</style>



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
 const links = document.querySelectorAll('.action-borrar');
links.forEach((link) => {

  link.addEventListener('click', (event) => {
    event.preventDefault();

    if (confirm("Confirme la eliminacion") == true) {

      row = event.target.closest("tr") ;
      url = event.target.getAttribute("href") ;

      fetch( url )
      .then(function (response) {
          row.remove();
        })
      .catch(function (err) {
          console.warn('Something went wrong.', err);
        });
    }

  });

});</script>

{{ title :: Dashboard }}

<h1> Dashboard </h1>

<div class="table-responsive">
    <h2> Usuarios </h2>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <tr>  
        <th> Nombre </th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Creado</th>
        <th>Estado</th>
        <th>Session</th>
    </tr>
        <?php foreach( $usuarios as $usuario) { ?>
            <tr>
                <td>  <?= $usuario["Nombre"] ?> </td>
                <td>  <?= $usuario["Apellido"] ?> </td>
                <td>  <?= $usuario["Email"] ?> </td>
                <td>  <?= $usuario["fecha_creacion"] ?> </td>
                <td>  <?= $usuario["enable"] == 1 ? 'Activo' : 'Deshabilitado'  ?> </td>
                <td>  <?= $usuario["fecha_session"] ?> </td>
            </tr>
        <?php } ?>
    </table>
</div>


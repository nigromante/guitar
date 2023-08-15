   <h1> Editar Perfil </h1>

    <form class="row g-3" method="post" action="/backend/profile/editarperfil/<?= $usuario->getId() ?>">

        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input name="Nombre" class="form-control" id="Nombre"  value="<?= $usuario->getNombre() ?>" >
        </div>

        <div class="mb-3">
            <label for="Apellido" class="form-label">Apellido</label>
            <input name="Apellido" class="form-control" id="Apellido" value="<?= $usuario->getApellido() ?>" >

        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input name="password" class="form-control" id="password" value="" >

        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary btn-icon-split"> Editar </button>
        </div>


    </form>
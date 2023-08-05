
{{ title :: Contactanos }}  

    <h1> Modificar Usuario </h1>

    <form class="row g-3" method="post" action="/backend/usuarios/modificar/<?= $id ?>">

        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input name="Nombre" class="form-control" id="Nombre"  value="<?= $usuario["Nombre"] ?>" >
        </div>

        <div class="mb-3">
            <label for="Apellido" class="form-label">Apellido</label>
            <input name="Apellido" class="form-control" id="Apellido" value="<?= $usuario["Apellido"] ?>" >

        </div>

        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <textarea name="Email" class="form-control" id="Email" rows="1"    ><?= $usuario["Email"] ?></textarea>
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input name="password" class="form-control" id="password" value="" >

        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary btn-icon-split"> Modificar </button>
        </div>


    </form>
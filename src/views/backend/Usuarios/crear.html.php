
{{ title :: Contactanos }}  

    <h1>  Nuevo Usuario </h1>

    <form class="row g-3" method="post" action="/backend/usuarios/crear">

        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input name="Nombre" class="form-control" id="Nombre" >
        </div>

        <div class="mb-3">
            <label for="Apellido" class="form-label">Apellido</label>
            <textarea name="Apellido" class="form-control" id="Apellido" rows="1"></textarea>  
        </div>

        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <textarea name="Email" class="form-control" id="Email" rows="1"></textarea>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" textarea name="password" class="form-control" id="password" rows="1"></textarea>
        
        </div>


        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Crear </button>
        </div>


    </form>
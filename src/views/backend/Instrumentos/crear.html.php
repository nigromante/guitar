
{{ title :: Contactanos }}  

    <h1> Crear Nuevo Instruemnto </h1>

    <form class="row g-3" method="post" action="/backend/instrumentos/crear">

        <div class="mb-3">
            <label for="alias" class="form-label">Alias</label>
            <input name="alias" class="form-control" id="alias" placeholder="Ejemplo: GIB para Gibson">
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <textarea name="nombre" class="form-control" id="nombre" rows="1"></textarea>  
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <textarea name="descripcion" class="form-control" id="descripcion" rows="3"></textarea>
        </div>


        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Crear </button>
        </div>


    </form>
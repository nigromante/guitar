
{{ title :: Contactanos }}  

    <h1> Modificar Instrumento </h1>

    <form class="row g-3" method="post" action="/instrumentos/mantencion/modificar/<?= $id ?>">

        <div class="mb-3">
            <label for="alias" class="form-label">Alias</label>
            <input name="alias" class="form-control" id="alias" placeholder="Ejemplo: GIB para Gibson" value="<?= $instrumento["alias"] ?>" >
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input name="nombre" class="form-control" id="nombre" placeholder="Nombre del instrumento" value="<?= $instrumento["nombre"] ?>" >

        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <textarea name="descripcion" class="form-control" id="descripcion" rows="3"    ><?= $instrumento["descripcion"] ?></textarea>
        </div>


        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Modificar </button>
        </div>


    </form>
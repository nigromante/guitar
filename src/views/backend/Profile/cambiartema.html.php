<h1>CAMBIAR TEMA</h1>
<form class="row g-3" method="post" action="">

        <div class="mb-3">
            <label for="Tema" class="form-label">Tema</label>
            <!-- <input name="Tema" class="form-control" id="Tema" > -->
            <select name="Tema"    class="form-control" id="Tema">
                <option value="" > Seleccionar tema </option>
                <option value="dune" <?php echo $tema=="dune" ? "selected" : "" ; ?> > Dune </option>
                <option value="lotr" <?php echo $tema=="lotr" ? "selected" : "" ; ?> > Lord of the rings </option>
                <option value="startrek" <?php echo $tema=="startrek" ? "selected" : "" ; ?>> Star Trek </option>
                <option value="starwars" <?php echo $tema=="starwars" ? "selected" : "" ; ?>> Star Wars </option>
                <option value="tmnt" <?php echo $tema=="tmnt" ? "selected" : "" ; ?>> Teenage Mutant Ninja Turtles </option>
            </select>
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary btn-icon-split"> Confirmar </button>
        </div>

</form>
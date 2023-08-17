<h1>CAMBIAR TEMA Y AVATAR</h1>
<form  method="post" action="/backend/profile/cambiartema">
<div class="row">

<div class="mb-3">
            <label for="Tema" class="form-label">Tema</label>
            <select name="Tema"    class="form-control" id="Tema">
                <option value="" > Seleccionar tema </option>
                <option value="dune" <?php echo $tema=="dune" ? "selected" : "" ; ?> > Dune </option>
                <option value="lotr" <?php echo $tema=="lotr" ? "selected" : "" ; ?> > Lord of the rings </option>
                <option value="startrek" <?php echo $tema=="startrek" ? "selected" : "" ; ?>> Star Trek </option>
                <option value="starwars" <?php echo $tema=="starwars" ? "selected" : "" ; ?>> Star Wars </option>
                <option value="tmnt" <?php echo $tema=="tmnt" ? "selected" : "" ; ?>> Teenage Mutant Ninja Turtles </option>
            </select>
        </div>

</div>
     
<div class="row">

<div class="mb-3">
            <label for="Avatar" class="form-label">Avatar</label>
            <select name="Avatar"    class="form-control" id="Avatar">
                <option value="" > Seleccionar avatar </option>
                <option value="paul" <?php echo $avatar=="paul" ? "selected" : "" ; ?> > Paul </option>
                <option value="gandalf" <?php echo $avatar=="gandalf" ? "selected" : "" ; ?> > Gandalf </option>
                <option value="cptkirk" <?php echo $avatar=="cptkirk" ? "selected" : "" ; ?>> Cpt Kirk </option>
                <option value="luke" <?php echo $avatar=="luke" ? "selected" : "" ; ?>> Luke </option>
                <option value="leonardo" <?php echo $avatar=="leonardo" ? "selected" : "" ; ?>> Leonardo </option>
            </select>
        </div>

    

</div>
<div class="col-auto">
            <button type="submit" class="btn btn-primary btn-icon-split"> Confirmar </button>
        </div>


     

</form>
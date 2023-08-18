<h1>CAMBIAR TEMA Y AVATAR</h1>
<form  method="post" action="/backend/profile/cambiartema">
<div class="row">

<div class="mb-3">
            <label for="Tema" class="form-label">Tema</label>
            <select name="Tema"    class="form-control" id="Tema">
                <option value="" > Seleccionar tema </option>

                <?php 

                    $temas=Utilities\AvatarImages::AllThemes(  ) ; 
                    foreach ($temas as $key=>$value){ ?>
                            <option value="<?=$key?>" <?php echo $tema==$key ? "selected" : "" ; ?> > <?=$value?> </option>

                    <?php  } ?>
            </select>
        </div>

</div>
     
<div class="row">

<div class="mb-3">
            <label for="Avatar" class="form-label">Avatar</label>
            <select name="Avatar"    class="form-control" id="Avatar">
                <option value="" > Seleccionar avatar </option>

                <?php 

                    $avatars=Utilities\AvatarImages::All( Utilities\AppSession::UserThemeGet() ) ; 
                    foreach ($avatars as $key=>$value){ ?>
                            <option value="<?=$key?>" <?php echo $avatar==$key ? "selected" : "" ; ?> > <?=$value['description']?> </option>

                  <?php  } ?>

            </select>
        </div>

    

</div>
<div class="col-auto">
            <button type="submit" class="btn btn-primary btn-icon-split"> Confirmar </button>
        </div>


     

</form>
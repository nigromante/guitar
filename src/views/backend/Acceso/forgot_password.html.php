{{ title :: Acceso Asistencia }}
<div class="login-container_wrapper">

    <div class="login-container">
        <div class="login-image">
        </div>

        <div class="login-fieldset">

            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4"> Asistencia  </h1>
            </div>

            <form class="user" method="POST"  action="/backend/acceso/forgot-password">

                <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user" placeholder="Email">
                </div>


                <button type="submit" class="btn btn-primary btn-user btn-block"> Solicitar asistencia </button>

            </form>


            <hr>

            <div class="text-center">
                <a class="small" href="/backend/acceso/login"> Volver a pagina de login </a>
            </div>

            <div class="text-center">
                <a class="small" href="/"> Ir al sitio público </a>
            </div>


        </div>
    </div>
</div>

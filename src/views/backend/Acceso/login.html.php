{{ title :: Acceso Restringido }}
<div class="login-container_wrapper">

    <div class="login-container">
        <div class="login-image">
        </div>

        <div class="login-fieldset">

            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Acceso Restringido </h1>
            </div>

            <form class="user" method="POST" action="/backend/acceso/login">

                <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user" placeholder="Email">
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Contraseña">
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block"> Ingresar </button>

            </form>

            <hr>

            <div class="text-center">
                <a class="small" href="/backend/acceso/forgot-password">Problemas con su contraseña?</a>
            </div>

            <div class="text-center">
                <a class="small" href="/"> Ir al sitio público </a>
            </div>


        </div>
    </div>
</div>
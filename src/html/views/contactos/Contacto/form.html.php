{{ title :: Contactanos }}  

    <h1> Contactanos </h1>

    <form class="row g-3" method="post" action="/contacto/form">

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
        </div>

        <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje</label>
            <textarea name="mensaje" class="form-control" id="mensaje" rows="3"></textarea>
        </div>


        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Enviar mensaje</button>
        </div>


    </form>



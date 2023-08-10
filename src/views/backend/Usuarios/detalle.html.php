{{ title :: usuario: <?= $usuario->getNombre() ?> }}

<p> <?= $usuario->getId() ?> </p>
<p> <?= $usuario->getNombre() ?> </p>
<p> <?= $usuario->getApellido() ?> </p>
<p> <?= $usuario->getEmail() ?> </p>
<p> <?= $usuario->getEstado() ?> </p>

<br>
<br>
<a href="/backend/usuarios/listado"> Volver </a>
<br>

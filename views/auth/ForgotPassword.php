<h1 class="nombre-pagina">Recuperar Contraseña</h1>
<p class="descripcion-pagina">Ingresa tu correo para recuperar tu contraseña</p>

<?php include_once __DIR__ . '/../templates/Alerts.php'; ?>

<form class="formulario" method="POST" action="/forgot-password">

  <div class="campo">
    <label for="email">Correo</label>
    <input type="email" id="email" name="email" placeholder="Ingresa tu correo" />
  </div>

  <input type="submit" class="boton" value="Enviar correo de recuperación" />
</form>

<div class="acciones">
  <a href="/">Iniciar Sesión</a>
  <a href="/signup">Crear Cuenta</a>
</div>
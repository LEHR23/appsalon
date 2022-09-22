<h1 class="nombre-pagina">Recuperar contraseña</h1>
<p class="descripcion-pagina">Ingresa tu nueva contraseña</p>

<?php include_once __DIR__ . '/../templates/Alerts.php'; ?>

<?php if($error) return ?>

<form class="formulario" method="POST">

  <div class="campo">
    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña">
  </div>

  <div class="campo">
    <label for="passwordConfirm">Confirmar contraseña</label>
    <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Confirma tu contraseña">
  </div>

  <div class="campo">
    <input type="submit" value="Recuperar contraseña" class="boton">
  </div>

</form>

<div class="acciones">
  <a href="/">Tienes una cuenta? Inicia sesión</a>
  <a href="/signup">Aun no tienes una cuenta? Registrate</a>
</div>
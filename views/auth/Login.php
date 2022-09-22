<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Inicia sesión con tus datos</p>

<?php include_once __DIR__ . '/../templates/Alerts.php'; ?>

<form class="formulario" method="POST" action="/">

  <div class="campo">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Ingresa tu correo" value="<?php echo s($auth->email); ?>">
  </div>
  <div class="campo">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña">
  </div>

  <input type="submit" value="Iniciar Sesión" class="boton boton-verde">

</form>

<div class="acciones">
  <a href="/signup">Crear Cuenta</a>
  <a href="/forgot-password">¿Olvidaste tu contraseña?</a>
</div>
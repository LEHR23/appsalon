<h1 class="nombre-pagina">Recuperar Contraseña</h1>
<p class="descripcion-pagina">Ingresa tu correo para recuperar tu contraseña</p>

<form class="formulario" method="POST" action="/forgot-password">

  <div class="campo">
    <label for="correo">Correo</label>
    <input type="email" id="correo" name="correo" placeholder="Ingresa tu correo" />
  </div>

  <input type="submit" class="boton" value="Enviar correo de recuperación" />
</form>

<div class="acciones">
  <a href="/">Iniciar Sesión</a>
  <a href="/signup">Crear Cuenta</a>
</div>
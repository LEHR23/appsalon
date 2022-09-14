<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Ingresa tus datos para crear una cuenta</p>

<form class="formulario" method="POST" action="/signup">

  <div class="campo">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" />
  </div>

  <div class="campo">
    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="apellido" placeholder="Ingresa tu apellido" />
  </div>

  <div class="campo">
    <label for="telefono">Teléfono</label>
    <input type="tel" id="telefono" name="telefono" placeholder="Ingresa tu teléfono" />
  </div>

  <div class="campo">
    <label for="correo">Correo</label>
    <input type="email" id="correo" name="correo" placeholder="Ingresa tu correo" />
  </div>

  <div class="campo">
    <label for="password">Contraseña</label>
    <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" />
  </div>

  <div class="campo">
    <label for="confirmar">Confirmar Contraseña</label>
    <input type="password" id="confirmar" name="confirmar" placeholder="Confirma tu contraseña" />
  </div>

  <input type="submit" class="boton" value="Crear Cuenta" />
</form>

<div class="acciones">
  <a href="/">Iniciar Sesión</a>
  <a href="/forgot-password">¿Olvidaste tu contraseña?</a>
</div>
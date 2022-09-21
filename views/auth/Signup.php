<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Ingresa tus datos para crear una cuenta</p>

<?php include_once __DIR__ . "/../templates/Alerts.php"; ?>

<form class="formulario" method="POST" action="/signup">

  <div class="campo">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="name" placeholder="Ingresa tu nombre" value="<?php echo s($user->name); ?>">
  </div>

  <div class="campo">
    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="lastName" placeholder="Ingresa tu apellido" value="<?php echo s($user->lastName); ?>">
  </div>

  <div class="campo">
    <label for="telefono">Teléfono</label>
    <input type="tel" id="telefono" name="phone" placeholder="Ingresa tu teléfono" value="<?php echo s($user->phone); ?>">
  </div>

  <div class="campo">
    <label for="correo">Correo</label>
    <input type="email" id="correo" name="email" placeholder="Ingresa tu correo" value="<?php echo s($user->email); ?>">
  </div>

  <div class="campo">
    <label for="password">Contraseña</label>
    <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" />
  </div>

  <div class="campo">
    <label for="confirmar">Confirmar Contraseña</label>
    <input type="password" id="confirmar" name="passwordConfirm" placeholder="Confirma tu contraseña" />
  </div>

  <input type="submit" class="boton" value="Crear Cuenta" />
</form>

<div class="acciones">
  <a href="/">Iniciar Sesión</a>
  <a href="/forgot-password">¿Olvidaste tu contraseña?</a>
</div>
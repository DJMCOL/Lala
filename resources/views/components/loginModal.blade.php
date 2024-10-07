<div id="loginModal" class="modal loginModal">
    <h3>Iniciar sesión</h3>
    <hr>
    <div class="loginForm colflex">
        <input type="email" placeholder="Ingresa tu email" id="user_login" name="user_login">
        <input type="password" placeholder="Ingresa tu contraseña" id="pass_login" name="pass_login">
        <!--
        <div class="flex">
            <input type="checkbox">
            <label for="">Recordar contraseña</label>
        </div>
        -->
        <a class="forgotBtn forgetPassword">¿olvidaste tu contraseña?</a>
        <div class="colflex session">
            <a class="btnFormLogin">Iniciar sesión</a>
            <!--
            <div class="flex">
                <hr>
                <span>ó</span>
                <hr>
            </div>
            <a class="google">
                <img src="{{asset('./img/gbtn.svg')}}" alt="">
                <span>Ingresa con Google</span>
            </a>
            -->
        </div>

        <div class="flex register">
            <span>¿No tienes cuenta?</span>
            <a href="#registerModal" rel="modal:open">Registrate</a>
        </div>
    </div>
</div>

<div id="registerModal" class="modal registerModal">
    <h1>Formulario de registro</h1>
    <hr>
    <form class="colflex registro2" id="registerForm">
        <input type="text" placeholder="Nombre completo" id="name" name="name">
        <input type="tel" placeholder="Teléfono" id="phone" name="phone">
        <input type="email" placeholder="Correo" id="mail" name="mail">
        <input type="password" placeholder="Contraseña" id="password" name="password">
        @php
            $countries = \App\Models\Country::all();
        @endphp
        <input type="hidden" name="numberList" id="numberList" class="form-control" readonly required>
        <input type="text" placeholder="Dirección" name="address1" id="address1">
        <input type="text" placeholder="Barrio" name="town1" id="town1">
        <select class="countryRegister" id="country1" name="country1" data-id="1">
            <option value="" disabled selected>País</option>
            @foreach($countries as $key => $con)
                <option value="{{$con->PaisCodigo}}">{{$con->PaisNombre}}</option>
            @endforeach
        </select>
        <select class="statesRegister" id="state1" name="state1" data-id="1">
            <option value="">Departamento</option>
        </select>
        <select id="city1" name="city1" data-id="1">
            <option value="">Ciudad</option>
        </select>
        <textarea rows="6" placeholder="Detalles adicionales de dirección..." name="description1" id="description1"></textarea>
        <a class="guardar btnFormRegister">Guardar</a>
    </form>
</div>

<div id="shopModal" class="modal registerModal">
    <h1>Datos de Donación</h1>
    <hr>
    <form class="colflex registro2" id="shopForm">
        <input type="text" placeholder="Nombre completo" id="nameShop" name="name">
        <input type="tel" placeholder="Teléfono" id="phoneShop" name="phone">
        <input type="email" placeholder="Correo" id="mailShop" name="mail">
        <a class="guardar shopFormRegister"
           style="
    margin-top: 0% !important;
    margin-left: 0% !important;
    margin-right: 0% !important;
    height: 2.5rem;
    width: 49%;"
        >Guardar y Donar</a>
    </form>
</div>

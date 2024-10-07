<div class="contRegistro2 mg90">
    <h2>Datos de Usuario</h2>
    <form class="colflex registro2" id="registerForm">
        <input type="text" placeholder="Nombre completo" id="name" name="name">
        <input type="tel" placeholder="Teléfono" id="phone" name="phone">
        <input type="email" placeholder="Correo" id="mail" name="mail">
        <input type="password" placeholder="Contraseña" id="password" name="password">
        <h3>Dirección actual</h3>
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

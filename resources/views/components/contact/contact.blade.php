<section class="contact relative">
  <picture class="bgContact">
    <source srcset="{{asset('./img/contact2.svg')}}" media="(min-width: 1900px)">
    <img  src="{{asset('./img/contact.svg')}}" alt="">
  </picture>
  <div class="mg90 flex containerContact">
    <div class="colflex">
      <h1>Haz parte de nuestros voluntarios</h1>
      <p>Contáctanos en caso de dudas e inquietudes</p>
      <div class="colflex">
        <div class="flex itemInfo">
          <img src="{{asset('./img/tel.svg')}}" alt="">
          <a href="tel:+1{{$info_value->tel}}">+1 {{$info_value->tel}}</a>
        </div>
        <div class="flex itemInfo">
          <img src="{{asset('./img/insta.svg')}}" alt="">
          <a target="_blank" href="{{$info_value->instagram}}">@lalahelpingkids</a>
        </div>
        <div class="flex itemInfo">
          <img src="{{asset('./img/face.svg')}}" alt="">
          <a target="_blank" href="{{$info_value->facebook}}">Lala Helping Kids</a>
        </div>
        <div class="flex itemInfo">
          <img src="{{asset('./img/tiktok.svg')}}" alt="">
          <a target="_blank" href="https://www.tiktok.com/@fundacion.lala">@fundacion.lala</a>
        </div>
        
      </div>
    </div>
    <div class="form flex relative">
      <img class="leaf" src="{{asset('./img/leafs.jpg')}}" alt="">
      <form class="flex contactForm" id="formContacto">
        <div class="colflex">
          <div class="flex inputs">
            <div class="colflex">
              <label for="">Nombre</label>
              <input type="text" id="nameContact" name="nameContact">
            </div>
            <div class="colflex">
              <label for="">Email</label>
              <input type="email" id="mailContact" name="mailContact">
            </div>
          </div>
          <label for="">Mensaje</label>
          <textarea rows="6" placeholder="Escribe aquí tu mensaje..." id="messagueContact" name="messagueContact"></textarea>
          <div class="flex policy">
            <a class="btnFormContacto">Enviar</a>
            <p class="docPolicy" >
              <span>Al enviar este mensaje autorizo el </span>
              <a target="_blank" href="{{asset('img/policy.pdf')}}"> uso y tratamiento de datos</a>
            </p>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
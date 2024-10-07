<section class="shoppingMob">
  <h1>Shopping</h1>
  <div class="containerShoppingMob mg90 grid">
    <div class="itemShopping colflex">
      <img src="{{asset('./img/shop1.jpg')}}" alt="">
      <div class="flex">
        <h3>Nuestros Cursos</h3>
        <a href="{{route('cursos')}}">ver más</a>
      </div>
    </div>
    <div class="itemShopping colflex">
      <img src="{{asset('./img/shop2.jpg')}}" alt="">
      <div class="flex">
        <h3>Asesorías Personalizadas</h3>
        <a href="{{route('asesorias')}}">ver más</a>
      </div>
    </div>
    <div class="itemShopping colflex">
      <img src="{{asset('./img/shop3.jpg')}}" alt="">
      <div class="flex">
        <h3>Talleres</h3>
        <a href="{{route('talleres')}}">ver más</a>
      </div>
    </div>
    <div class="itemShopping colflex">
      <img src="{{asset('./img/shop4.jpg')}}" alt="">
      <div class="flex">
        <h3>Productos de nutrición</h3>
        <a href="{{$links_value->colombia}}">Colombia</a>
        <a href="{{$links_value->eeuu}}}">EE.UU.</a>
      </div>
    </div>
  </div>
</section>
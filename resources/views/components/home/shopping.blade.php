<section class="shopping relative" id="shopping" style="display: none">
    <div class="containerShopping vh100 relative">
        <div class="colflex mg90">
            <div class="flex shapes">
                <img src="{{asset('./img/circle.svg')}}" alt="">
                <img class="line" src="{{asset('./img/line.svg')}}" alt="">
                <p>Shopping</p>
            </div>
            <div class="grid contShopping">
                <div class="itemShopping colflex">
                    <img src="{{asset('./img/shop1.jpg')}}" alt="">
                    <div class="flex">
                        <h3>Nuestros Cursos</h3>
                        <a href="{{route('cursos')}}">ver más</a>
                    </div>
                </div>
                <!---->
                <div class="itemShopping colflex">
                    <img src="{{asset('./img/shop2.jpg')}}" alt="">
                    <div class="flex">
                        <h3>Asesorías Personalizadas</h3>
                        <a href="{{route('asesorias')}}">ver más</a>
                    </div>
                </div>
                <!---->
                <div class="itemShopping colflex">
                    <img src="{{asset('./img/shop3.jpg')}}" alt="">
                    <div class="flex">
                        <h3>Talleres</h3>
                        <a href="{{route('talleres')}}">ver más</a>
                    </div>
                </div>
                <!---->
                <div class="itemShopping colflex">
                    <img src="{{asset('./img/shop4.jpg')}}" alt="">
                    <div class="flex">
                        <h3>Productos de nutrición</h3>
                        <a target="_blank" href="{{$links_value->colombia}}">Colombia</a>
                        <a target="_blank" href="{{$links_value->eeuu}}">EE.UU.</a>
                    </div>
                </div>
                <!---->
            </div>
        </div>
        <div class="greyBar"></div>
    </div>
</section>
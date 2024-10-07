@component('components.home.mobile.banner',[
  'info_value'=>$info_value,
  'banners_value'=>$banners_value
])
@endcomponent

@component('components.home.mobile.conoceme',[
  'info_value'=>$info_value
])
@endcomponent

<!--
@component('components.home.mobile.shopping',[
  'links_value'=>$links_value,
  'info_value'=>$info_value
])
@endcomponent
-->

@component('components.home.mobile.blog',[
    'blog_value'=>$blog_value
])
@endcomponent

<!--
@component('components.home.mobile.instagram')
@endcomponent

@component('components.home.mobile.subscribe')
@endcomponent
-->

@section('script')
    <script>
      let instagram = document.querySelector('.instagramImages')
      if (instagram){

        var instagram_count = 1;
        $(window).scroll(function() {
          if(elementVisible( $('.instagramMob') )){
            if(instagram_count === 1){
              instagram_count = 2;
              getInstagram();
            }
          }
        });
        function elementVisible(element){
          var visible = true;
          var windowTop = $(document).scrollTop();
          var windowBottom = windowTop + window.innerHeight;
          var elementPositionTop =  $(element).offset().top;
          var elementPositionBottom = elementPositionTop + $(element).height();
          if (elementPositionTop >= windowBottom || elementPositionBottom <= windowTop) {
            visible = false;
          }
          return visible;
        }

        function getInstagram() {
          //return false;
          var token_instagram = 'IGQVJWeEdQb2RxdHdzcjcwdmlHQ2dQMTRrWFpEeW1NQi1FemlnaUQ3cG5SNHNmOFMwdGxVa0MwSEktcU5scXpGWC0yVFh2d0ZAvRFRnLWdFRlNaUjVkOVkzSlBZAMUUyc1AxMmwtRm5JVUdzR3NFdFQyTQZDZD';
          var URL_API_INSTAGRAM = "https://graph.instagram.com/me?fields=username,media&access_token="+token_instagram;
          $.getJSON(URL_API_INSTAGRAM, function (data) {
            var i = 1;
            var url_instagram = '';
            $('.instragramImages').html("");
            $.each(data.media.data, function (item, value) {
              if (i <= 6) {
                var MediaInstagram = "https://graph.instagram.com/"+value.id+"?fields=caption,media_url,media_type,id,permalink,thumbnail_url&access_token="+token_instagram;
                $.getJSON(MediaInstagram, function (data_media) {
                  if(data_media.media_type === 'VIDEO'){
                    url_instagram = data_media.thumbnail_url;
                  }else{
                    url_instagram = data_media.media_url;
                  }
                  $('.instagramImages').append('' +
                    '                                <div class="inst">\n' +
                    '                                    <a target="_blank" href="'+data_media.permalink+'">\n' +
                    '                                        <div class="containerInstagram" >\n' +
                    '                                            <div class="imgInsta" >\n' +
                    '                                                <img src="'+url_instagram+'" alt="">\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                    </a>\n' +
                    '                               </div>');
                });
              }
              i++;
            });
          });
        }
      }
    </script>
@endsection
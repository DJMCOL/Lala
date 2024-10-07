let _ = require('lodash');
window.$ = window.jQuery = require('jquery');
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

require('slick-carousel')
require('sweetalert')
require('jquery-modal')
require('./contact')
require('./subscribe')
require('./subscribeMob')
require('./instagram')
require('./getCity')
require('./course')
require('./login')
require('./forget')
require('./taller')
require('./services')
require('./update')

//header
window.addEventListener('scroll', function() {
  let header = document.getElementById('header');
  header.classList.toggle('headerBlanco', window.scrollY > 100)
})

/*===== MENU SHOW Y HIDDEN =====*/
const navMenu = document.getElementById('nav-menu'),
      toggleMenu = document.getElementById('nav-toggle'),
      closeMenu = document.getElementById('nav-close')

/*SHOW*/
toggleMenu.addEventListener('click', ()=>{
  navMenu.classList.toggle('show')
})

/*HIDDEN*/
closeMenu.addEventListener('click', ()=>{
  navMenu.classList.remove('show')
})

$('a.ctaLogin').click(function(event) {
  $(this).modal({
    clickClose: false,
    showClose: true,
    fadeDuration: 120
  });
  return false;
});

if(
  window.location.pathname.replace(https,'') + window.location.hash == 
  "/conoceme#nuestra_historia"
){
  $('html, body').animate({
    scrollTop: $('.nuestra_historia').offset().top - 150
  }, 500);
}
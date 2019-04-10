document.addEventListener('DOMContentLoaded', function() {
  // do your setup here
  console.log('Initialized app');
});

var app = {

  // init: function() {

  //   console.log('init'); // a comenté en prod
  //   var rellax = new Rellax('.carousel-inner', {
  //     speed: 2,
  //     center: false,
  //     wrapper: null,
  //     round: false,
  //     vertical: true,
  //     horizontal: false
  //   });
  
  // },



  // gallery: function() {
  //   console.log('gallery')
  //   $body = $('body');
  //   $header = $('.header');
  //   $img = $('.wp-post-image')
  //   $('.size-large').on('click', app.toggleGallery);
  //   $('.overlay').on('click', app.hideGallery);
  // },
  // toggleGallery: function(evt) {
  //   console.log('app.toggleGallery');
  //   evt.preventDefault();
  //   src = $(this).attr('src');
  //   $('.overlay img').attr('src', src);
  //   $('.overlay').show();
  //   $body.toggleClass('image-visible');
  // },
  // hideGallery: function(evt) {
  //   evt.preventDefault();
  //   console.log('app.hideGallery');
  //   $('.overlay').hide(); 
  //   $body.removeClass('image-visible');   
  // }
}

$(app.init);
// $(app.gallery);
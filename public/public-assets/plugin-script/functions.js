//*** Ready Function
jQuery(document).ready(function($) {

	   'use strict';
     
    //*** Function Counter
    jQuery('.word-counter').countUp({
      delay: 190,
      time: 3000,
    });



    //*** Function FancyBox
    jQuery(".fancybox").fancybox({
      openEffect  : 'elastic',
      closeEffect : 'elastic',
    });

    //*** Function Masonery
    jQuery('.grid').isotope({
      itemSelector: '.grid-item',
      percentPosition: true,
      masonry: {
        fitWidth: false
      },
    });

    //*** Function Progressbar
    jQuery('.jobsearch_progressbar1').progressBar({
        percentage : false,
        backgroundColor : "#dbdbdb",
        barColor : "#13b5ea",
        animation : true,
        height : "6",
    });
      

});


//*** Function SearchToggle
jQuery( ".careerfy-click-btn" ).on('click', function (e) {
  jQuery( this ).parents('.careerfy-search-filter-toggle').find('.careerfy-checkbox-toggle').slideToggle( "slow", function() {});
  jQuery( this ).parents('.careerfy-search-filter-toggle').toggleClass( "careerfy-remove-padding", function() {});
   return false;
});

//*** Function AddToggle
jQuery( ".careerfy-resume-addbtn" ).on('click', function (e) {
  jQuery( this ).parents('.careerfy-candidate-resume-wrap').find('.careerfy-add-popup').slideToggle( "slow", function() {});
   return false;
});

//*** Function Popup
function jobsearch_modal_popup_open(target) {
    jQuery('#' + target).removeClass('fade').addClass('fade-in');
    jQuery('body').addClass('careerfy-modal-active');
}

jQuery(document).on('click', '.careerfy-modal .modal-close', function () {
    jQuery('.careerfy-modal').removeClass('fade-in').addClass('fade');
    jQuery('body').removeClass('careerfy-modal-active');
});

jQuery('.modal-content-area').on('click', function (e) {
    //
    if(e.target !== e.currentTarget) return;
    
    jQuery('.careerfy-modal').removeClass('fade-in').addClass('fade');
    jQuery('body').removeClass('careerfy-modal-active');
});

//for login popup
jQuery(document).on('click', '.careerfy-open-signin-tab', function () {
    jobsearch_modal_popup_open('JobSearchModalLogin');
});
//for login popup
jQuery(document).on('click', '.careerfy-open-signup-tab', function () {
    jobsearch_modal_popup_open('JobSearchModalSignup');
});

//*** Function Upload Button
document.getElementById("careerfy-uploadbtn").onchange = function () {
  document.getElementById("careerfy-uploadfile").value = this.value;
};

let loginForm = document.querySelector('.login-form-container');

document.querySelector('#login-btn').onclick = () =>{
  loginForm.classList.toggle('active');
}

document.querySelector('#close-login-btn').onclick = () =>{
  loginForm.classList.remove('active');
}

window.onscroll = () =>{

  searchForm.classList.remove('active');

  if(window.scrollY > 80){
    document.querySelector('.header .header-2').classList.add('active');
  }else{
    document.querySelector('.header .header-2').classList.remove('active');
  }

}

window.onload = () =>{

  if(window.scrollY > 80){
    document.querySelector('.header .header-2').classList.add('active');
  }else{
    document.querySelector('.header .header-2').classList.remove('active');
  }

  fadeOut();

}



var swiper = new Swiper(".job-slider", {
  loop:true,
  centeredSlides: true,
  autoplay: {
    delay: 9500,
    disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});

var swiper = new Swiper(".featured-slider", {
  spaceBetween: 10,
  loop:true,
  centeredSlides: true,
  autoplay: {
    delay: 9500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    450: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    1024: {
      slidesPerView: 4,
    },
  },
});

var swiper = new Swiper(".arrivals-slider", {
  spaceBetween: 10,
  loop:true,
  centeredSlides: true,
  autoplay: {
    delay: 9500,
    disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});

var swiper = new Swiper(".reviews-slider", {
  spaceBetween: 10,
  grabCursor:true,
  loop:true,
  centeredSlides: true,
  autoplay: {
    delay: 9500,
    disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});

var swiper = new Swiper(".blogs-slider", {
  spaceBetween: 10,
  grabCursor:true,
  loop:true,
  centeredSlides: true,
  autoplay: {
    delay: 9500,
    disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});


/*transistion*/
var $loader = document.querySelector('.loader')

window.onload = function() {
  $loader.classList.remove('loader--active')
};

document.querySelector('.btn').addEventListener('click', function () {
  $loader.classList.add('loader--active')
  
  window.setTimeout(function () {
    $loader.classList.remove('loader--active')
  }, 5000)
})


function cnamefunction() {
  var compname = document.getElementById("cname").value;
  localStorage.setItem("textvalue",compname);
  return ;
}
document.getElementById("demo").innerHTML=localStorage.getItem("textvalue")


/*application*/
var all_spc = document.querySelectorAll("form[id='221293076704454'] .si" + "mple" + "_spc");
for (var i = 0; i < all_spc.length; i++)
{
  all_spc[i].value = "221293076704454-221293076704454";
}

JotForm.newDefaultTheme = true;
	JotForm.extendsNewTheme = false;
	JotForm.newPaymentUIForNewCreatedForms = false;
	JotForm.newPaymentUI = true;

	JotForm.init(function(){
	/*INIT-START*/
      setTimeout(function() {
          $('input_12').hint('ex: myname@example.com');
       }, 20);
      JotForm.setPhoneMaskingValidator( 'input_13_full', '(###) ###-####' );
if (window.JotForm && JotForm.accessible) $('input_19').setAttribute('tabindex',0);

 JotForm.calendarMonths = ["January","February","March","April","May","June","July","August","September","October","November","December"];
 JotForm.calendarDays = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
 JotForm.calendarOther = {"today":"Today"};
 var languageOptions = document.querySelectorAll('#langList li'); 
 for(var langIndex = 0; langIndex < languageOptions.length; langIndex++) { 
   languageOptions[langIndex].on('click', function(e) { setTimeout(function(){ JotForm.setCalendar("15", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""}); }, 0); });
 } 
 JotForm.onTranslationsFetch(function() { JotForm.setCalendar("15", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""}); });
 JotForm.formatDate({date:(new Date()), dateField:$("id_"+15)});
 JotForm.displayLocalTime("input_15_hourSelect", "input_15_minuteSelect","input_15_ampm", "input_15_timeInput", false);
if (window.JotForm && JotForm.accessible) $('input_22').setAttribute('tabindex',0);
      setTimeout(function() {
          JotForm.initMultipleUploads();
      }, 2);
	/*INIT-END*/
	});

   JotForm.prepareCalculationsOnTheFly([null,null,null,null,null,null,null,null,null,{"name":"_nbsp_","qid":"9","text":"Submit","type":"control_button"},{"name":"clickTo","qid":"10","text":"Job Application","type":"control_head"},{"name":"fullName","qid":"11","text":"Full Name","type":"control_fullname"},{"name":"emailAddress","qid":"12","subLabel":"example@example.com","text":"Email Address","type":"control_email"},{"name":"phoneNumber13","qid":"13","text":"Phone Number","type":"control_phone"},{"name":"positionApplied","qid":"14","text":"Position Applied","type":"control_dropdown"},{"name":"availableStart","qid":"15","text":"Available Start Date","type":"control_datetime"},{"name":"currentAddress","qid":"16","text":"Current Address","type":"control_address"},{"name":"uploadYour","qid":"17","text":"Upload Your Resume","type":"control_fileupload"},{"name":"birthDate","qid":"18","text":"Birth Date","type":"control_birthdate"},{"name":"linkedin","qid":"19","text":"LinkedIn","type":"control_textbox"},{"name":"divider","qid":"20","type":"control_divider"},{"name":"howDid21","qid":"21","text":"How did you hear about us","type":"control_dropdown"},{"name":"coverLetter","qid":"22","text":"Cover Letter","type":"control_textarea"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,null,null,null,null,null,null,null,null,{"name":"_nbsp_","qid":"9","text":"Submit","type":"control_button"},{"name":"clickTo","qid":"10","text":"Job Application","type":"control_head"},{"name":"fullName","qid":"11","text":"Full Name","type":"control_fullname"},{"name":"emailAddress","qid":"12","subLabel":"example@example.com","text":"Email Address","type":"control_email"},{"name":"phoneNumber13","qid":"13","text":"Phone Number","type":"control_phone"},{"name":"positionApplied","qid":"14","text":"Position Applied","type":"control_dropdown"},{"name":"availableStart","qid":"15","text":"Available Start Date","type":"control_datetime"},{"name":"currentAddress","qid":"16","text":"Current Address","type":"control_address"},{"name":"uploadYour","qid":"17","text":"Upload Your Resume","type":"control_fileupload"},{"name":"birthDate","qid":"18","text":"Birth Date","type":"control_birthdate"},{"name":"linkedin","qid":"19","text":"LinkedIn","type":"control_textbox"},{"name":"divider","qid":"20","type":"control_divider"},{"name":"howDid21","qid":"21","text":"How did you hear about us","type":"control_dropdown"},{"name":"coverLetter","qid":"22","text":"Cover Letter","type":"control_textarea"}]);}, 20); 











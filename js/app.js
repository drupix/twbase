/*Toggle header colours*/
var scrollpos = window.scrollY;
var window_width = window.innerWidth;
var body = document.body;
var header = document.getElementById("header");
var slogan = document.getElementById("site-slogan");
var dark_logo = document.getElementById("dark-logo");
var light_logo = document.getElementById("light-logo");
var main = document.getElementById("main");
var main_nav = document.getElementById("main-nav");
// var locales_switcher = document.getElementById("locales-switcher");
var scrolled = false;
var resized = false;
var navbar_fixed = body.classList.contains('navbar-is-fixed');
var has_showcase = body.classList.contains('has-showcase');

function windowResize() {
  /*Apply classes for slide in bar*/
  scrollpos = window.scrollY;
  window_width = window.innerWidth;

  // console.log('app.js windowResize()');
  // console.log('windowResize()->scrollpos: ' + scrollpos);
  // console.log('windowResize()->window_width: ' + window_width);
  // console.log('windowResize() themeMode: ' + localStorage.themeMode)

  if(window_width <= 767) {
    if(scrollpos > 10){
      if(localStorage.themeMode === 'tw-dark') {
        main_nav.classList.remove("tw-bg-white");
        main_nav.classList.add("tw-text-white");
        main_nav.classList.remove("tw-text-black");
      }
      else {
        main_nav.classList.add("tw-bg-white");
        main_nav.classList.remove("tw-text-white");
        main_nav.classList.add("tw-text-black");
      }
    }
    else {
      if(localStorage.themeMode === 'tw-dark') {
        main_nav.classList.remove("tw-bg-white");
        main_nav.classList.remove("tw-text-black");
        main_nav.classList.add("tw-text-white");
      }
      else {
        main_nav.classList.add("tw-bg-white");
        main_nav.classList.add("tw-text-black");
        main_nav.classList.remove("tw-text-white");
      }
    }

    // locales_switcher.classList.add("tw-mt-4");
  }
  else {
    if(scrollpos > 10){
      main_nav.classList.remove("tw-bg-white");
      if(localStorage.themeMode == 'tw-dark') {
        main_nav.classList.add("tw-text-white");
        main_nav.classList.remove("tw-text-black");
      }
      else {
        main_nav.classList.remove("tw-text-white");
        main_nav.classList.add("tw-text-black");
      }
    }
    else {
      main_nav.classList.remove("tw-bg-white");
      main_nav.classList.remove("tw-text-black");
      main_nav.classList.add("tw-text-white");
    }

    // locales_switcher.classList.remove("tw-mt-4");
  }

  header_height = header.offsetHeight;
  if(navbar_fixed && !has_showcase) {
    body.style.marginTop = header_height + 'px'
  }
  else if(!navbar_fixed && has_showcase) {
    main.style.marginTop = -header_height + 'px'
  }

  if(localStorage.themeMode === 'tw-dark') {
    header.classList.add("tw-border-b");
  }
  else {
    header.classList.remove("tw-border-b");
  }
}

function documentScroll(forceScrolled = false) {
  /*Apply classes for slide in bar*/
  scrollpos = window.scrollY;
  window_width = window.innerWidth;

  // console.log('app.js documentScroll()');
  // console.log('documentScroll()->scrollpos: ' + scrollpos);
  // console.log('documentScroll()->window_width: ' + window_width);
  // console.log('documentScroll() themeMode: ' + localStorage.themeMode)
  // console.log(localStorage.themeMode);

  if(scrollpos > 10) {
    if(scrolled && !forceScrolled) return false;

    scrolled = true;

    if(localStorage.themeMode === 'tw-dark') {
      header.classList.remove("tw-bg-white");
      header.classList.add("tw-text-white");
      header.classList.remove("tw-text-black");
      header.classList.remove("tw-shadow");
      if(slogan != undefined) {
        slogan.classList.add("tw-text-slate-500");
        slogan.classList.remove("tw-text-slate-200");
      }
      light_logo.classList.remove("tw-hidden");
      dark_logo.classList.add("tw-hidden");
    }
    else {
      header.classList.add("tw-bg-white");
      header.classList.remove("tw-text-white");
      header.classList.add("tw-text-black");
      header.classList.add("tw-shadow");
      if(slogan != undefined) {
        slogan.classList.remove("tw-text-slate-200");
        slogan.classList.add("tw-text-slate-500");
      }
      light_logo.classList.add("tw-hidden");
      dark_logo.classList.remove("tw-hidden");
    }

    if(window_width <= 767) {
      if(localStorage.themeMode === 'tw-dark') {
        main_nav.classList.remove("tw-bg-white");
        main_nav.classList.add("tw-text-white");
        main_nav.classList.remove("tw-text-black");
      }
      else {
        main_nav.classList.add("tw-bg-white");
        main_nav.classList.remove("tw-text-white");
        main_nav.classList.add("tw-text-black");
      }
    }
    else {
      main_nav.classList.remove("tw-bg-white");
      if(localStorage.themeMode === 'tw-dark') {
        main_nav.classList.add("tw-text-white");
        main_nav.classList.remove("tw-text-black");
      }
      else {
        main_nav.classList.remove("tw-text-white");
        main_nav.classList.add("tw-text-black");
      }
    }
  }
  else {
    scrolled = false;
    header.classList.remove("tw-bg-white");
    header.classList.remove("tw-text-black");
    header.classList.add("tw-text-white");

    if(window_width <= 767) {
      if(localStorage.themeMode === 'tw-dark') {
        main_nav.classList.remove("tw-bg-white");
        main_nav.classList.add("tw-text-white");
        main_nav.classList.remove("tw-text-black");
      }
      else {
        main_nav.classList.add("tw-bg-white");
        main_nav.classList.remove("tw-text-white");
        main_nav.classList.add("tw-text-black");
      }
    }
    else {
      main_nav.classList.remove("tw-bg-white");
      main_nav.classList.remove("tw-text-black");
      main_nav.classList.add("tw-text-white");
    }

    header.classList.add("tw-text-white");
    header.classList.remove("tw-shadow");

    if(slogan != undefined) {
      if(localStorage.themeMode === 'tw-dark') {
        slogan.classList.add("tw-text-slate-500");
        slogan.classList.remove("tw-text-slate-200");
      }
      else {
        slogan.classList.add("tw-text-slate-200");
        slogan.classList.remove("tw-text-slate-500");
      }
    }

    light_logo.classList.remove("tw-hidden");
    dark_logo.classList.add("tw-hidden");

  }

  if(localStorage.themeMode === 'tw-dark') {
    header.classList.add("tw-border-b");
  }
  else {
    header.classList.remove("tw-border-b");
  }

}

window.addEventListener('resize', function() {
  windowResize();
});

document.addEventListener('scroll', function() {
  documentScroll();
});


/* Progress bar */
//Source: https://alligator.io/js/progress-bar-javascript-css-variables/
var docEl = document.documentElement,
  body = document.body,
  st = 'scrollTop',
  sh = 'scrollHeight',
  progress = document.querySelector('#progress');
var scrollpos = window.scrollY;
var header = document.getElementById("header");

document.addEventListener('scroll', function () {
  if(progress) {
    /*Refresh scroll % width*/
    scroll = (docEl[st] || body[st]) / ((docEl[sh] || body[sh]) - docEl.clientHeight) * 100;
    progress.style.setProperty('--scroll', scroll + '%');
  }
});


// Initial states simulation
windowResize();
documentScroll();

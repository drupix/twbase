// Ecobeez theme - themeSwitcher.js
//    See https://tailwindcss.com/docs/dark-mode
//    and source of https://symfony.com/

// console.log('themeSwitcher.js download start!');

//
// This come from source of https://symfony.com/
//
const availableThemes = ['tw-light', 'tw-dark']; //, 'dynamic-theme'];
const themeSwitcher = document.getElementById("theme-switcher");
const showcase_divider_1 = document.getElementById("showcase-divider-1");
const showcase_divider_2 = document.getElementById("showcase-divider-2");
// const index_divider_bottom_1 = document.getElementById("index-divider-bottom_1");
// const index_divider_bottom_2 = document.getElementById("index-divider-bottom_2");
// const record_divider_bottom = document.getElementById("record-divider-bottom");
const tailwindcss_typography_logo_text = document.getElementById("tailwindcss-typography-logo-text");

const color_white = '#FFFFFF';
const color_slate_200 = '#E2E8F0';
const color_slate_800 = '#1E293B';

//
// This come from https://tailwindcss.com/docs/dark-mode
//
if (localStorage.themeMode === 'tw-dark' || (!('themeMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
  document.documentElement.classList.add('tw-dark')
  themeSwitcher.checked = true;
} else {
  document.documentElement.classList.add('tw-light')
  themeSwitcher.checked = false;
}
_switchColors(themeSwitcher.checked);

//
// This come from source of https://symfony.com/
//
themeSwitcher.addEventListener('click', () => {
  const darkModeIsOn = themeSwitcher.checked;
  var darkMode = 'tw-light';

  if(darkModeIsOn) {
    darkMode = 'tw-dark';
    document.documentElement.classList.remove('tw-light');
    _switchColors(true);
  }
  else {
    darkMode = 'tw-light';
    document.documentElement.classList.remove('tw-dark');
    _switchColors(false);
  }
  document.documentElement.classList.add(darkMode);
  localStorage.setItem('themeMode', darkMode);

  // Reinitialize states simulation
  // See: theme/twbase/js/app.js
  documentScroll(true);
});


function _switchColors(darkModeIsOn = false) {
  if(darkModeIsOn) {
    if(tailwindcss_typography_logo_text) {
      tailwindcss_typography_logo_text.setAttribute('fill', color_slate_200);
    }

    if(showcase_divider_1) {
      showcase_divider_1.setAttribute('fill', color_white);
    }
    if(showcase_divider_2) {
      showcase_divider_2.setAttribute('fill', color_slate_800);
    }

    // if(index_divider_bottom_1) {
    //   index_divider_bottom_1.setAttribute('fill', color_slate_800);
    // }
    // if(index_divider_bottom_2) {
    //   index_divider_bottom_2.setAttribute('fill', color_slate_800);
    // }

    // if(record_divider_bottom) {
    //   record_divider_bottom.setAttribute('fill', color_slate_800);
    // }
  }
  else {
    if(tailwindcss_typography_logo_text) {
      tailwindcss_typography_logo_text.setAttribute('fill', '#1a202c');
    }

    if(showcase_divider_1) {
      showcase_divider_1.setAttribute('fill', color_white);
    }
    if(showcase_divider_2) {
      showcase_divider_2.setAttribute('fill', color_white);
    }

    // if(index_divider_bottom_1) {
    //   index_divider_bottom_1.setAttribute('fill', color_slate_200);
    // }
    // if(index_divider_bottom_2) {
    //   index_divider_bottom_2.setAttribute('fill', color_white);
    // }

    // if(record_divider_bottom) {
    //   record_divider_bottom.setAttribute('fill', color_white);
    // }
  }
}

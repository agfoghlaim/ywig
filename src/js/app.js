import selectLocation from './select-location';
import ywigToggleTabs from './toggle-tabs';
import {
  handleShowDropdownMenus,
  handleHideDropdownMenus,
} from './handle-dropdowns';

ywigToggleTabs();

selectLocation();

handleShowDropdownMenus();

handleHideDropdownMenus();



// Handle Small Screen Nav Toggle
const navToggle = document.querySelector('.navbar-toggler');
navToggle.addEventListener('click', toggleNavBar);
function toggleNavBar(e) {
  const menu = document.querySelector('#navbarSupportedContent');
  if (!menu) return;
  //menu.classList.toggle('show');
  if (!menu.classList.contains('show')) {
    // window.setTimeout(function(){
    menu.classList.add('show');
    // },200)
  } else if (menu.classList.contains('show')) {
    menu.classList.remove('show');
  }
  // console.log(menu)
  // menu.style.display = 'grid';
  // menu.style.height = 'auto';
}

// hide small screen nav when any link clicked
document.querySelectorAll('.menu-item a').forEach((link) =>
  link.addEventListener('click', function(e) {
    const menu = document.querySelector('#navbarSupportedContent');
    if (!menu || !menu.classList.contains('show')) return;
    menu.classList.remove('show');
  })
);

// handle aria-expanded
function handleAria() {}
// Smooth Scroll, might as well. Also add .ywig-menu-active to custom links onClick.
// const menu = jQuery('#menu-main-menu a');

// menu.on('click', function(e) {
//   if (this.hash !== '') {
//     //e.preventDefault();

//     const hash = this.hash;
//     const allCurrent = document.querySelectorAll('.ywig-menu-active');

//     allCurrent.forEach((withCurrentClass) =>
//       withCurrentClass.classList.remove('ywig-menu-active')
//     );
//     const parent = this.parentElement;
//     parent.classList.add('ywig-menu-active');

//     const test = jQuery('html, body');
//     // scroll top will be something like ...
//     // scrollTop: target.offset().top - headerHeight - navigationHeight + 10
//     test.animate(
//       {
//         scrollTop: jQuery(hash).offset().top,
//       },
//       600
//     );

//   }
// });

import selectLocation from './select-location';
import ywigToggleTabs from './toggle-tabs';
import resourcesAccordian from './resources-page';
// import {
//   handleShowDropdownMenus,
//   handleHideDropdownMenus,
// } from './handle-dropdowns';
//import scrollTo from './scroll-to';

//scrollTo();

resourcesAccordian();
ywigToggleTabs();

// Project Finder Section.
selectLocation();

// CSS handles this.
// handleShowDropdownMenus();
// handleHideDropdownMenus();

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
    navToggle.classList.add('nav-open');
    // },200)
  } else if (menu.classList.contains('show')) {
    menu.classList.remove('show');
    navToggle.classList.remove('nav-open');
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

    // also change burger/minimise icon
    const burgerIcon  = document.querySelector('.navbar-toggler');
    if(!burgerIcon) return;
    if(burgerIcon.classList.contains('nav-open')) {
      burgerIcon.classList.remove('nav-open');
    }

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

// firebase Experiment
async function getPosts() {
  // const postsUrl = `https://firestore.googleapis.com/v1/projects/wp-app-d5c42/databases/(default)/documents/posts`;
  const postsUrl = `http://localhost:3000/ywig-theme/wp-json/wp/v2/quickpost?author=2`;
  const res = await fetch(postsUrl);
  const posts = await res.json();
   console.log(posts);
  // const nicePosts = [];
  // posts.documents.forEach((doc) => {
  //   // console.log(doc.fields);
  //   nicePosts.push(doc.fields);
  // });
  showPosts(posts);
}

function showPosts(posts) {
  // const newsSection = document.querySelector('#news');
  const newsSection = document.querySelector('#posts-from-app');
  posts.forEach((post) => {
    // console.log('post.........');
    const postHtml = htmlPosts(post);
    const div = `<div class="wrap-fb" style="display:grid;">${postHtml}</div>`
    if (newsSection) {
      //newsSection.innerHTML = postHtml;
      newsSection.insertAdjacentHTML('beforeend', postHtml);
    }
  });
}
getPosts();

function htmlPosts(post) {
  // console.log('Post', post);
  const html = `
    
    <div style="border: 1px solid #332d2d;" class="item-fb">
    <a href=${post.meta.quickpost_link}>
     <img src=${post.meta.featured_media_src} style="object-fit: fill;" />
     </a>
     <div style="background:#332d2d; display:grid" >
     <h4 style="color:white;">${post.title.rendered}</h4>
     <p style="color:white;">${post.content.rendered}</p>
     </div>
    </div>
  
  `;
  return html;
}


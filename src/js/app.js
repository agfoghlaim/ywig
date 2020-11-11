import selectLocation from './select-location';
import ywigToggleTabs from './toggle-tabs';
import {
  handleShowDropdownMenus,
  handleHideDropdownMenus,
} from './handle-dropdowns';
//import scrollTo from './scroll-to';

//scrollTo();

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

// firebase Experiment
async function getPosts() {
  const postsUrl = `https://firestore.googleapis.com/v1/projects/wp-app-d5c42/databases/(default)/documents/posts`;
  const res = await fetch(postsUrl);
  const posts = await res.json();
  console.log(posts.documents);
  const nicePosts = [];
  posts.documents.forEach((doc) => {
    console.log(doc.fields);
    nicePosts.push(doc.fields);
  });
  showPosts(nicePosts);
}

function showPosts(posts) {
  // const newsSection = document.querySelector('#news');
  const newsSection = document.querySelector('#posts-from-app');
  posts.forEach((post) => {
    console.log('post.........');
    const postHtml = htmlPosts(post);

    if (newsSection) {
      //newsSection.innerHTML = postHtml;
      newsSection.insertAdjacentHTML('beforeend', postHtml);
    }
  });
}
getPosts();

function htmlPosts(post) {
  console.log('Post', post);
  const html = `
    <a href=${post.link.stringValue}>
    <div style="border: 1px solid #332d2d;">
     <img src=${post.imageUrl.stringValue} style="object-fit: fill; width:300px; " />
     <div style="background:#332d2d;" >
     <h4 style="color:white;">${post.title.stringValue}</h4>
     <p style="color:white;">${post.postBody.stringValue}</p>
     </div>
    </div>
    </a>
  `;
  return html;
}

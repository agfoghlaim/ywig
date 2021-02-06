import selectLocation from './select-location';
import ywigToggleTabs from './toggle-tabs';
import resourcesAccordian from './resources-page';
import navigation from './navigation';
import loadMoreQuickPosts from './loadMoreQuickPosts';

navigation();

//scrollTo();

// Resources page.
resourcesAccordian();

// Project Finder
ywigToggleTabs();

// Project Finder Section.
selectLocation();

// TODO... this is incomplete
loadMoreQuickPosts();

/*

Header -add bg color on scroll

*/

document.addEventListener('scroll', handleHeaderBgColor);

const header = document.getElementById('home');

const headerHeight = document.getElementsByTagName('header')[0].offsetHeight;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function handleHeaderBgColor() {
  if (!header) return;
  if (window.pageYOffset > headerHeight) {
    header.classList.add('with-bg-color');
  } else {
    header.classList.remove('with-bg-color');
  }
}


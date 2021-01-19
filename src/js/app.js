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

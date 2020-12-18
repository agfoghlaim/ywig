import { navigationUtil } from './util';
import { navigationHandlers } from './handlers';
const { keepSubMenusVisible, toggleAriaExpanded } = navigationUtil;

const {
  handleToggleMobileMenu,
  handleCloseMobileNavOnAnchorLinkClicked,
  handleExpandAppropiateSubMenu,
} = navigationHandlers;


const navigation = () => {

  // Handle Small Screen Nav Toggle
  const navToggle = document.querySelector('.navbar-toggler');
  if (navToggle) {
    navToggle.addEventListener('click', handleToggleMobileMenu);
  }

  // hide mobile/small screen nav menu when any link clicked (applies to /#anchor-links on same page).
  // (Menu will automatically close if nav-link goes to new page.)
  const allNavLinks = document.querySelectorAll('.menu-item a');
  if (allNavLinks && allNavLinks.length) {
    allNavLinks.forEach((link) =>
      link.addEventListener('click', handleCloseMobileNavOnAnchorLinkClicked)
    );
  }

  /**
   * EVERYTHING BELOW ADAPTED FROM Twenty Twentyone THEME'S primary-navigation.js
   * Twenty Twentyone has inline onClick="twentytwentyoneExpandSubMenu(this)" .sub-menu-toggle
   * Instead add a listener to .sub-menu-toggle(s) and pass the element that it expects.
   * Twenty Twentyone only covers one depth of children in the menu, this version covers nested sub-menus.
   */

  // Listen to all button.sub-menu-toggle s
  const allSubMenuToggleButtons = document.querySelectorAll('.sub-menu-toggle');

	// Show ul.sub-menu onClick button.sub-menu-toggle
  if (allSubMenuToggleButtons && allSubMenuToggleButtons.length) {
    allSubMenuToggleButtons.forEach((button) =>
      button.addEventListener('click', handleExpandAppropiateSubMenu)
    );
  }

  /**
   * Menu Toggle Behaviors.
   * Keeps tabbing inside mobile menu once it's in.
   * Use esc key to exit & close the menu.
   * Code adapted from Twenty Twentyone Theme. I changed their event.keyCodes (deprecated) to use event.key. IE is dodgy but all other major browsers okay. Also I think ideally Arrows should be used so people can tab away --TODO.
   */
  var navMenu = function() {
    const mobileButton = document.querySelector('.navbar-toggler');
    const wrapper = document.getElementById('home');

    document.addEventListener('keydown', function(event) {
      if (!wrapper.classList.contains('nav-open')) {
        return;
      }

      const mainNavMenu = document.querySelector('#navbarSupportedContent');
      const selectors = 'input, a, button';
			
			const tabKey = event.key === 'Tab';
      const shiftKey = event.shiftKey;
			const escKey = event.key === 'Escape';
			
      const els = mainNavMenu.querySelectorAll(selectors);
      const elements = Array.prototype.slice.call(els);
      const activeEl = document.activeElement;
      const lastEl = elements[elements.length - 1];
      const firstEl = elements[0];

      if (escKey) {
        event.preventDefault();
        wrapper.classList.remove('nav-open');
        mainNavMenu.classList.remove('show');
        toggleAriaExpanded(mobileButton);
        mobileButton.focus();
      }

      if (!shiftKey && tabKey && lastEl === activeEl) {
        event.preventDefault();
        firstEl.focus();
      }

      if (shiftKey && tabKey && firstEl === activeEl) {
        event.preventDefault();
        lastEl.focus();
      }

      // If there are no elements in the menu, don't move the focus
      if (tabKey && firstEl === lastEl) {
        event.preventDefault();
      }
		});
		

    /**
     * Show/hide sub-menus onmouseenter/leave toggle buttons.
     */

    // Get ALL <li> items with nested ul.sub-menus
    const lisWithChildren = document.querySelectorAll(
      '#menu-main-menu .menu-item-has-children'
		);
		
		if (!lisWithChildren || !lisWithChildren.length) return;
		
		// show onMouseEnter
    lisWithChildren.forEach(function(li) {
      li.addEventListener('mouseenter', function showSubMenu() {

        // note this.querySelector. this = li (button is inside li);
        this.querySelector('.sub-menu-toggle').setAttribute(
          'aria-expanded',
          'true'
				);
				
				// change css class of sub-menu goes off RHS of screen.
        keepSubMenusVisible(li);
			});
			
			// hide onMouseLeave
      li.addEventListener('mouseleave', function hideSubMenu() {
        this.querySelector('.sub-menu-toggle').setAttribute(
          'aria-expanded',
          'false'
        );
      });
    });
  };
  navMenu();
};

export default navigation;

import { navigationUtil } from './util';

const {
  getIsOutermost,
  toggleAriaExpanded,
  closeSubMenuOnTabAway,
} = navigationUtil;

export const navigationHandlers = {
  handleCloseMobileNavOnAnchorLinkClicked: function(e) {
    const menu = document.querySelector('#navbarSupportedContent');
    const togglerButton = document.querySelector('.navbar-toggler');

    if (!menu || !menu.classList.contains('show')) return;
    menu.classList.remove('show');

    // also change burger/minimise icon
    const burgerIcon = document.querySelector('.navbar-toggler');
    if (!burgerIcon) return;
    if (burgerIcon.classList.contains('nav-open')) {
      burgerIcon.classList.remove('nav-open');
      togglerButton.setAttribute('aria-expanded', false);
    }

    const wrapper = document.getElementById('home');
    if (!wrapper) return;
    if (wrapper.classList.contains('nav-open')) {
      wrapper.classList.remove('nav-open');
    }
  },
  handleToggleMobileMenu: function(e) {
    const menu = document.querySelector('#navbarSupportedContent');
    const header = document.getElementById('home');

    if (!menu) return;

    if (!menu.classList.contains('show')) {
      menu.classList.add('show');
      this.focus();
      this.classList.add('nav-open');
      header.classList.add('nav-open');
      this.setAttribute('aria-expanded', true);
    } else if (menu.classList.contains('show')) {
      menu.classList.remove('show');
      this.classList.remove('nav-open');
      header.classList.remove('nav-open');
      this.setAttribute('aria-expanded', false);
    }
  },
  handleExpandAppropiateSubMenu: function(e) {
    /**
     * Handle clicks on submenu toggles - only used in this handler.
     *
     * @param {Element} el - The element (expecting button.sub-menu-toggle).
     */
    function expandSubMenu(el) {
      // So we only close other menus if this toggle button is on the main nav (not nested).
      const isOutermost = getIsOutermost(el);

      if (isOutermost) {
        // Close other menus
        el.closest('nav')
          .querySelectorAll('.sub-menu-toggle')
          .forEach(function(button) {
            if (button !== el) {
              button.setAttribute('aria-expanded', 'false');
            }
          });
      }

      // Always open this menu
      toggleAriaExpanded(el, true);

      // Listen & close .sub-menu on tab away
      closeSubMenuOnTabAway(el);
    }

    e.stopPropagation();

    if (!e.currentTarget.nodeName === 'BUTTON') return;
    const el = e.currentTarget;
    el.focus();
    expandSubMenu(el);
  },
};

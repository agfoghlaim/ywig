export const navigationUtil = {
  getIsOutermost: (el) => {
    return el.parentElement.parentElement.id === 'menu-main-menu';
  },

  closeSubMenuOnTabAway: (el) => {
    console.log(typeof el);
    if (!el) return;
    el.parentNode // ie <li>
      .querySelectorAll('ul > li:last-child > a')
      .forEach(function(linkEl) {
        linkEl.addEventListener('blur', function(event) {
          if (!el.parentNode.contains(event.relatedTarget)) {
            el.setAttribute('aria-expanded', 'false');
          }
        });
      });
  },
  collapseSubMenuOnClickOutside: (e) => {
    if (!document.getElementById('navbarSupportedContent').contains(e.target)) {
      document
        .getElementById('navbarSupportedContent')
        .querySelectorAll('.sub-menu-toggle')
        .forEach(function(button) {
          button.setAttribute('aria-expanded', 'false');
        });
    }
  },
  /**
   * Changes the position of submenus so they always fit the screen horizontally. It's unlikely this would happen without multiple nested submenus
   *
   * @param {Element} li - The li element.
   */
  keepSubMenusVisible: (li) => {
    const subMenu = li.querySelector('ul.sub-menu');
    if (!subMenu) return;

    const rect = subMenu.getBoundingClientRect();
    const right = Math.round(rect.right);
    const windowWidth = Math.round(window.innerWidth);

    if (right > windowWidth) {
      subMenu.classList.add('submenu-reposition-right');
    }
  },
  /**
   * Required to open and close the mobile navigation.
   */

  /**
   * Toggle an attribute's value
   *
   * @param {Element} el - The element.
   * @param {boolean} withListeners - Whether we want to add/remove listeners or not.
   */
  toggleAriaExpanded: function(el, withListeners) {
    if ('true' !== el.getAttribute('aria-expanded')) {
      el.setAttribute('aria-expanded', 'true');
      navigationUtil.keepSubMenusVisible(el.parentElement);
      if (withListeners) {
        document.addEventListener(
          'click',
          navigationUtil.collapseSubMenuOnClickOutside
        );
      }
    } else {
      el.setAttribute('aria-expanded', 'false');
      if (withListeners) {
        document.removeEventListener(
          'click',
          navigationUtil.collapseSubMenuOnClickOutside
        );
      }
    }
  },
};

const scrollTo = () => {
  /** If is front page...
   - Listen to menu items with #anchor links to home page (.menu-item-type-custom)
   - Also listen to a.ywig-maybe-custom-link (used in what-section)
   - Get hashes on click
   - get element with hashes' corresponding #id
   - scroll there with header offset accounted for.
*/
  const menuItems = document.querySelectorAll('.menu-item-type-custom');
  if (menuItems && menuItems.length) {
    menuItems.forEach((menuItem) =>
      menuItem.addEventListener('click', handleScrollTo)
    );
  }
  
  const whatSectionLinks = document.querySelectorAll('.ywig-maybe-custom-link');
  if (whatSectionLinks && whatSectionLinks.length) {
    whatSectionLinks.forEach((linkItem) =>
      linkItem.addEventListener('click', handleScrollTo)
    );
  }

  function handleScrollTo(e) {
    const DURATION = 300;

    const targetElementId = getTargetElementIdFromHash(e);
    if (!targetElementId) {
      return;
    }
    e.stopPropagation();

    // add active class to menu item > a when clicked
    // todo need to enqueue script that checks slug or something on non front page pages (or move this) so it doesn't only work on the front page.
    menuItems.forEach((menuItem) => {
      if (
        menuItem.firstElementChild.tagName === 'A' &&
        menuItem.firstElementChild.classList.contains('nav-active')
      ) {
        menuItem.firstElementChild.classList.remove('nav-active');
        // maybeRemoveGrandparentActive(menuItem);
      }
    });

    // just use currentTarget!!
    if (e.currentTarget.tagName === 'LI') {
      // e.target.classList.add('nav-active'); // e.target will be <a>
    }

    // if current target (li) has parent ul.sub-menu there is no point changing appearance of just the link because it may not be visible, add 'nav-active' to both the link and the parent (li) of the parent ul.sub-menu.
    //maybeMakeGranparentActive(e.currentTarget);

    function maybeMakeGranparentActive(li) {
      console.log(li, '...current targetarget');

      const mum = li.parentElement;
      const gran = mum.parentElement;
      console.log('mum', mum);
      console.log('gran', gran);
      if (mum.tagName === 'UL' && mum.classList.contains('sub-menu')) {
        if (
          gran.tagName === 'LI' &&
          gran.classList.contains('menu-item-has-children')
        ) {
          gran.classList.add('nav-active');
        }
      }
    }
    function maybeRemoveGrandparentActive(el) {
      const mum = el.parentElement;
      const gran = mum.parentElement;
      if (mum.tagName === 'UL' && mum.classList.contains('sub-menu')) {
        if (gran.tagName === 'LI' && gran.classList.contains('nav-active')) {
          gran.classList.remove('nav-active');
        }
      }
    }
    // const targetEl = document.querySelector(`#${tar}`)
    // targetElementId.classList.add('nav-active');
    // TODO, controversial? test...
    // what happens on refresh? Is this needed??
    // Update: it's been months and this seems to work okay...
    var temp = targetElementId.substring(1, targetElementId.length);
    history.replaceState({ page: temp }, '', `#${temp}`);

    e.preventDefault();

    // Unlikely that main nav is not the first <header>?!
    const headerHeight = document.getElementsByTagName('header')[0]
      .offsetHeight;

    const targetEl = document.querySelector(`${targetElementId}`);

    // return if there is no target element. The nav item will just not work...
    if (!targetEl) return;

    const targetPosition =
      targetEl.getBoundingClientRect().top + window.scrollY; // Note scrollY
    const startPosition = window.pageYOffset;
    const distance = targetPosition - startPosition - headerHeight;
    let startTime = null;

    function animation(currentTime) {
      if (startTime === null) {
        startTime = currentTime;
      }
      const timeElapsed = currentTime - startTime;
      const run = easy(timeElapsed, startPosition, distance, DURATION);

      window.scrollTo(0, run);
      if (timeElapsed < DURATION) {
        requestAnimationFrame(animation);
      }
    }

    // util function
    function getTargetElementIdFromHash(e) {
      if (e.target.tagName === 'A') {
        return e.target.hash;
      } else if (e.currentTarget.tagName === 'A') {
        return e.currentTarget.hash;
      } else {
        return null;
      }
    }

    // util function (taken from http://www.gizma.com/easing/)
    function easy(t, b, c, d) {
      t /= d / 2;
      if (t < 1) return (c / 2) * t * t * t * t + b;
      t -= 2;
      return (-c / 2) * (t * t * t * t - 2) + b;
    }

    requestAnimationFrame(animation);
  }
};
scrollTo();
// export default scrollTo;


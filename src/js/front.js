const scrollTo = () => {
  // If is front page...
  // Listen to menu items with urls to home page (.menu-item-type-custom)
  // Get hashes on click
  // get element with hashes' corresponding #id
  // scroll there with header offset accounted for.

  const menuItems = document.querySelectorAll('.menu-item-type-custom');
  if (!menuItems || !menuItems.length) {
    return;
  }
  menuItems.forEach((menuItem) =>
    menuItem.addEventListener('click', handleScrollTo)
  );

  function handleScrollTo(e) {
    const DURATION = 300;
    const targetElementId = getTargetElementIdFromHash(e);
    if (!targetElementId) {
      return;
    }

    // Only prevent default if we have the target #id.
    e.preventDefault();

    // Unlikely that main nav is not the first <header>?!
    const headerHeight = document.getElementsByTagName('header')[0]
      .offsetHeight;
    const targetEl = document.querySelector(`${targetElementId}`);
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

    function getTargetElementIdFromHash(e) {
      if (e.target.tagName === 'A') {
        return e.target.hash;
      } else if (e.currentTarget.tagName === 'A') {
        return e.currentTarget.hash;
      } else {
        return null;
      }
    }

    function easy(t, b, c, d) {
      // http://www.gizma.com/easing/
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

const scrollTo = () => {
  /** If is front page...
   - Listen to menu items with urls to home page (.menu-item-type-custom)
   - Get hashes on click
   - get element with hashes' corresponding #id
   - scroll there with header offset accounted for.
*/
  // Handle page refresh, avoid 404s
  // window.addEventListener('beforeunload', function(event) {
  //   console.log("unloading");
  //   event.preventDefault();
  //   // Chrome requires returnValue to be set.
  //   //history.pushState({}, null, '');
  //   history.replaceState({}, null, "")
  //   event.returnValue = '';
  //   return 'You have unsaved changes!';
  // })

  // window.onpopstate = function(event) {
  //   alert(
  //     `location: ${document.location}, state: ${JSON.stringify(event.state)}`
  //   );
  // };

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

    // add active class to menu item > a when clicked
    // todo need to enqueue script that checks slug or something on non front page pages (or move this) so it doesn't only work on the front page.
    menuItems.forEach((menuItem) => {
      if (
        menuItem.firstElementChild.tagName === 'A' &&
        menuItem.firstElementChild.classList.contains('nav-active')
      ) {
        menuItem.firstElementChild.classList.remove('nav-active');
      }
    });
    
    // if target is <a>, add .nav-active class to target
    if (e.target.tagName === 'A') {
      e.target.classList.add('nav-active');
      
    // if target is <li> add .nav-active class link to it's child <a>
    } else if (
      e.target.tagName === 'LI' &&
      e.target.classList.contains('menu-item') &&
      e.target.firstElementChild.tagName === 'A'
    ) {
      e.target.firstElementChild.classList.add('nav-active');
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

/*

Header -add bg color on scroll

*/

document.addEventListener('scroll', handleHeaderBgColor);

const header = document.getElementById('home');
const headerHeight = document.getElementsByTagName('header')[0].offsetHeight;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function handleHeaderBgColor() {
  if (window.pageYOffset > headerHeight) {
    header.classList.add('with-bg-color');
  } else {
    header.classList.remove('with-bg-color');
  }
}

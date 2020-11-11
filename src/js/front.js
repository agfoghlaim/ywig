const scrollTo = () => {
  // If is front page...
  // Listen to menu items with urls to home page (.menu-item-type-custom)
  // Get hashes on click
  // get element with hashes' corresponding #id
  // scroll there with header offset accounted for.

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

  window.onpopstate = function(event) {
  alert(`location: ${document.location}, state: ${JSON.stringify(event.state)}`)
}

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

    // TODO, controversial? test...
    // what happens on refresh?
    var temp = targetElementId.substring(1, targetElementId.length);
    // history.pushState({}, null, temp);
    // history.replaceState({}, '', temp);
    history.replaceState({page: temp}, "", `#${temp}`)
// history.pushState({page: 2}, "title 2", "?page=2")
// history.replaceState({page: 3}, "title 3", "?page=3")
//history.back() // alerts "location: http://example.com/example.html?page=1, state: {"page":1}"
 
    e.preventDefault();

    // Unlikely that main nav is not the first <header>?!
    const headerHeight = document.getElementsByTagName('header')[0]
      .offsetHeight;
    // if( !targetEl) {
    //   // window.location =
    //   return;
    // }
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

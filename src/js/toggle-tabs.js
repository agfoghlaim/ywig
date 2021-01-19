// Handle toggable tabs without bootstrap.

const ywigToggleTabs = () => {
  const locationTabs = document.querySelectorAll('#pills-tab a');

  if (!locationTabs || !locationTabs.length) return;

  const locationContents = document.querySelectorAll(
    '#pills-tabContent .tab-pane'
  );

  if (!locationContents || !locationContents.length) return;

  locationTabs.forEach((tab) =>
    tab.addEventListener('click', function(e) {
      e.preventDefault();

      // return early if id missing or incorrect
      if (!e.currentTarget.id || !e.currentTarget.id.includes('-tab')) return;
    
      const tabContent = findCorrespondingContentById(e.currentTarget.id);

      if (!tabContent) return;

      removeActiveClassFromContentTabs();

      tabContent.classList.add('show', 'active');

      window.setTimeout(function() {
        tabContent.classList.add('fade');
      }, 12);

      removeActiveClassFromTabs(e.currentTarget);

			e.currentTarget.classList.add('active');
      e.currentTarget.setAttribute('aria-selected', true);
      
    })
  );

  function removeActiveClassFromTabs() {
    // Remove all active classes.
    locationTabs.forEach((tab) => {
      if (tab.classList.contains('active')) {
        tab.classList.remove('active');
      }
      if (tab.classList.contains('fade')) {
        tab.classList.remove('fade');
			}
			tab.setAttribute('aria-selected', false);
    });
  }

  function removeActiveClassFromContentTabs() {
    // remove all show
    locationContents.forEach((l) => {
      l.classList.remove('show', 'active', 'fade');
    });
  }

  function findCorrespondingContentById(id) {
    const array = Array.from(locationContents);
    const ans = array.filter((a) => {
      if (`${a.id}-tab` === id) {
        return true;
      } else {
        return false;
      }
    });

    if (ans.length) {
      return ans[0];
    } else {
      return false;
    }
  }
};

export default ywigToggleTabs;

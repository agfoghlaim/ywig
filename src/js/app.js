// This handles toggable tabs and is most likely temporary. bootstrap.native should be doing this.

const locationTabs = document.querySelectorAll('#pills-tab li a');
const locationContents = document.querySelectorAll(
  '#pills-tabContent .tab-pane'
);

locationTabs.forEach((tab) =>
  tab.addEventListener('click', function(e) {
    e.preventDefault();
    const ans = findCorrespondingContentById(e.target.id);

    removeClass();

    ans.classList.add('show', 'active');
  })
);

function removeClass() {
  // remove all show
  locationContents.forEach((l) => {
    l.classList.remove('show', 'active');
  });
}

function findCorrespondingContentById(id) {
  const array = Array.from(locationContents);
  return array.filter((a) => {
    if (`${a.id}-tab` === id) {
      return true;
    } else {
      return false;
    }
  })[0];
}

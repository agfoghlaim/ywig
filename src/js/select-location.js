const selectLocation = () => {

  // Listen to each location button (including 'all projects' btn).
  const locations = document.querySelectorAll('.ywig-finder-loc');
  if (locations && locations.length) {
    locations.forEach((location) =>
      location.addEventListener('click', handleSelectLocation)
    );

  }

  function handleSelectLocation(e) {

     if (!e.currentTarget.dataset.location) return;

    const allProjects = document.querySelectorAll('.project-info-all');

    // Show All Projects
    if (e.currentTarget.dataset.location === 'all') {
      allProjects.forEach((proj) => {
        if (!proj.classList.contains('show-proj')) {
          proj.classList.add('show-proj');
          window.setTimeout(function() {
            proj.classList.add('fade');
          }, 12);
        }
      });
      return;
    } else {
      // Show Projects for one Location
      allProjects.forEach((proj) => {
        if (proj.classList.contains('show-proj')) {
          proj.classList.remove('show-proj');
        }
        if (proj.classList.contains('fade')) {
          proj.classList.remove('fade');
        }
      });

      allProjects.forEach((proj) => {
        if (proj.dataset.locations.includes(e.currentTarget.dataset.location)) {
        // if (proj.dataset.locations.includes(e.target.dataset.location)) {
          proj.classList.add('show-proj');
          window.setTimeout(function() {
            proj.classList.add('fade');
          }, 12);
        }
      });
    }
  }
};

export default selectLocation;

const resourcesAccordian = () => {
  const toggleResourcesBtns = document.querySelectorAll('.showHideResourcesBtn');
  if (!toggleResourcesBtns || !toggleResourcesBtns.length) return;

  toggleResourcesBtns.forEach((btn) => {
 
    btn.addEventListener('click', (e) => {
			e.preventDefault();
			
			const targetId = e.target.dataset.targetId;
			if(!targetId) return;

			const targetEl = document.getElementById(targetId);
			if(!targetEl) return;

			// show/hide list of files
			if(targetEl.classList.contains('show')) {
				targetEl.classList.remove('show');

				// set aria-expanded on the button
				e.target.setAttribute('aria-expanded', false);
			} else {
				targetEl.classList.add('show');
				e.target.setAttribute('aria-expanded', true)
			}

			const targetSection = document.querySelector(`.section-${targetId}`);
			if(!targetSection) return;

			// add .show to parent <section> so it's easier to handle + - icon on button
			targetSection.classList.toggle('show');
    });

  });
};
export default resourcesAccordian;

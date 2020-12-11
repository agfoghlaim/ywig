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
			targetEl.classList.toggle('show');

			const targetSection = document.querySelector(`.section-${targetId}`);
			if(!targetSection) return;

			//	handle + - icon on button
			targetSection.classList.toggle('show');
			
    });

  });
};
export default resourcesAccordian;

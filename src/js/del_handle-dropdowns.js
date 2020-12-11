export const handleShowDropdownMenus = () => {
  // Handle Show Dropdown menu
  const menuItemsWithDropdowns = document.querySelectorAll(
    '.menu-item-has-children'
  );

  menuItemsWithDropdowns.forEach((item) =>
    item.addEventListener('mouseenter', handleShowItemsDropdown)
  );

  function handleShowItemsDropdown(e) {
    if (!e.target) return;
    console.log("show")
    Array.from(e.target.children).forEach((childElement) => {
      if (
        childElement.tagName === 'UL' &&
        childElement.classList.contains('dropdown-menu')
      ) {
        childElement.style.display = 'grid';
      }
    });
  }
};

// Handle Hide Dropdown menu.
export const handleHideDropdownMenus = () => {
  const allDropdownMenus = document.querySelectorAll('.dropdown-menu');
  allDropdownMenus.forEach((menu) =>
    menu.addEventListener('mouseleave', handleHideDropdownMenus)
  );

  function handleHideDropdownMenus(e) {
    if (allDropdownMenus) {
      allDropdownMenus.forEach((menu) => {
        menu.style.display = 'none';
      });
    }
  }
};

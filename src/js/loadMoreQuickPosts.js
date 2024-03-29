const loadMoreQuickPosts = () => {
  
  async function theAjaxWay(e) {
    const quickPostsWrap = document.querySelector('.quickpost-wrap');
    const page = quickBtn.dataset.currentPage;
    const postsPerPage = quickBtn.dataset.postsPerPage;
    const maxPages = quickBtn.dataset.maxPages;
    const currentPage = quickBtn.dataset.currentPage;

    //const url = `http://localhost/ywig-theme/wp-json/wp/v2/quickpost`;
    // const url = `/wp-admin/admin-ajax.php`;
    const url = `http://localhost:3000/ywig-theme/wp-admin/admin-ajax.php`;
    // console.log('clicked', url);
    let params = new URLSearchParams();
    params.append('action', 'load_more_posts');
    params.append('current_page', currentPage);

    const response = await fetch(url, {
      method: 'POST',
      body: params,
      // headers: {"Content-type": "application/json; charset=UTF-8"}
    });

    const ans = await response.json();
    // update data attr on button
    quickBtn.dataset.currentPage++;

    // const currentLocation = window.location;
    // const baseUrl = `${currentLocation.protocol}//${currentLocation.host}/`
    // window.history.pushState()
    if (quickBtn.dataset.currentPage > quickBtn.dataset.maxPages) {
      const newP = document.createElement('p');
      const newContent = document.createTextNode('No more news to load!');

      // add the text node to the newly created div
      newP.appendChild(newContent);
      quickBtn.parentNode.replaceChild(newP, quickBtn);
    }
   
    quickPostsWrap.innerHTML += ans.data;
  }

  // !! I don't like this
  let reqOngoing = false;

  async function theRestWay(e) {
	
    // return if button pressed again before request completes
    if (reqOngoing) return;
    const quickPostsWrap = document.querySelector('.quickpost-wrap');
    if( !quickPostsWrap ) return;

    const currentPage = quickBtn.dataset.currentPage;
    if (! currentPage ) return;


    
    // Get localized variables set in php (see enqueue.php).
    const { api_url, api_nonce } = rest_object;
    const url = `${api_url}quickpost`;
    const params = new URLSearchParams();
    params.append('action', 'load_more_posts');
    params.append('current_page', currentPage);
    //params.append('current_page', null);

    reqOngoing = true;

    try {

      const response = await fetch(url, {
        method: 'POST',
        body: params,
        headers: { 'X-WP-Nonce': api_nonce },
      });
  
      const ans = await response.json();
      // console.log("ans", ans);
      reqOngoing = false;
      if( !ans.success ) {
        throw new Error();
      }
      // this shouldn't happen because button should have been disabled on previous request. 
      if(ans.data === 'No more posts') {
        quickBtn.disabled = true;
      }
      // update data attr on button
      quickBtn.dataset.currentPage++;
  
      // disable button if that was the last page
      if (quickBtn.dataset.currentPage >= quickBtn.dataset.maxPages) {
       quickBtn.disabled = true;
      }
  
      quickPostsWrap.innerHTML += ans.data;
    } catch(err) {
      console.error('Error fetching posts.');
      quickPostsWrap.innerHTML += '<span class="ywig-error-text">Sorry, something went wrong while getting the posts. </span>';
    }
  }

  // Load more quickposts
  const quickBtn = document.querySelector('.load-more-quickposts');
  if (quickBtn) {
    //quickBtn.addEventListener('click', theAjaxWay)
    quickBtn.addEventListener('click', theRestWay);
  }
};

export default loadMoreQuickPosts;

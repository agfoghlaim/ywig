window.addEventListener('DOMContentLoaded', function onDomContentLoaded() {

  var mediaUploader;
  document.querySelector('#upload-button')
  .addEventListener('click', function onUploadLogoButtonClicked(e) {
    e.preventDefault();
 
    if(mediaUploader) {
      mediaUploader.open();
      return;  
    }
    
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Upload Logo',
      button: {text: 'Choose Logo'},
      multiple: false
    });
    
    mediaUploader.on('select', function() {
      const attachment = mediaUploader.state().get('selection').first().toJSON();
      document.querySelector('#logo-input').value = attachment.url;
    });

    mediaUploader.open();
  })
});
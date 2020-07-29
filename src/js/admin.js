window.addEventListener('DOMContentLoaded', function onDomContentLoaded() { 

  var mediaUploader;

  // UPload Button
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
      console.log(attachment);
      console.log(mediaUploader)
      document.querySelector('#logo-input').value = attachment.url;
    });

    mediaUploader.open();
  })

  // Delete Button

  document.getElementById('logo-delete-button')
  .addEventListener('click', function(e) {
    e.preventDefault();

    document.querySelector('#logo-input').value = '';
    document.querySelector('.ywig-settings-form').submit();
  })
});


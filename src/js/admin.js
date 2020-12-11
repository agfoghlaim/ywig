window.addEventListener('DOMContentLoaded', function onDomContentLoaded() {
  // Header
  const headerUploadButton = document.querySelector('#upload-button');
  const headerPreview = document.querySelector('.header-logo-preview');
  const headerLogoDeleteButton = document.querySelector('#logo-delete-button');

  // Footer
  const footerUploadButton = document.querySelector('#footer-upload-button');

  const footerPreview = document.querySelector('.footer-logo-preview');
  const footerLogoDeleteButton = document.querySelector(
    '#footer-logo-delete-button'
  );

  // Upload Button - Header
  if (headerUploadButton) {
    headerUploadButton.addEventListener(
      'click',
      function onUploadLogoButtonClicked(e) {
        e.preventDefault();

        if (mediaUploader) {
          mediaUploader.open();
          return;
        }

        const mediaUploader = (wp.media.frames.file_frame = wp.media({
          title: 'Upload Logo',
          button: { text: 'Choose Logo' },
          multiple: false,
        }));

        mediaUploader.on('select', function() {
          const attachment = mediaUploader
            .state()
            .get('selection')
            .first()
            .toJSON();
          document.querySelector('#logo-input').value = attachment.url;
          console.log("set header url ", attachment.url)
          if (headerPreview) {
            headerPreview.innerHTML = `<img style="max-width:100px;" src="${attachment.url}" />`;
          }
        });

        mediaUploader.open();
      }
    );
  }

  // Delete Button - Header
  if (headerLogoDeleteButton) {
    headerLogoDeleteButton.addEventListener('click', function(e) {
      e.preventDefault();

      document.querySelector('#logo-input').value = '';
      console.log("set this val to empth", document.querySelector('#logo-input'))
      console.log("dis not change this", document.querySelector('#footer-logo-input'))

      document.querySelector('.ywig-settings-form').submit();
    });
  
  }

  // Upload Button - Footer
  if (footerUploadButton) {

    footerUploadButton.addEventListener(
      'click',
      function onUploadLogoButtonClicked(e) {
        console.log('something');
        e.preventDefault();

        if (mediaUploader) {
          mediaUploader.open();
          return;
        }

        const mediaUploader = (wp.media.frames.file_frame = wp.media({
          title: 'Upload Logo',
          button: { text: 'Choose Logo' },
          multiple: false,
        }));

        mediaUploader.on('select', function() {
          const attachment = mediaUploader
            .state()
            .get('selection')
            .first()
            .toJSON();
          document.querySelector('#footer-logo-input').value = attachment.url;

          // test
          //const footerPreview = document.querySelector('.preview-footer-logo');
          console.log('set footer url', attachment.url);
          if (footerPreview) {
            footerPreview.innerHTML = `<img style="max-width:100px;" src="${attachment.url}" />`;
          }
        });

        mediaUploader.open();
      }
    );
  } else{
    console.log("no footer", footerUploadButton)
  }

  // Delete Button - Footer
  if (footerLogoDeleteButton) {
    footerLogoDeleteButton.addEventListener('click', function(e) {
      e.preventDefault();

      document.querySelector('#footer-logo-input').value = '';
      document.querySelector('.ywig-settings-form').submit();
    });
  }
});

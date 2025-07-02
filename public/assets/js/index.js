//adds data tables to users view

let table = new DataTable('#myTable', {
  paging: true,
  
});

//adds rich text editor plugin to textarea
tinymce.init({
  selector: '#mytextarea',
  plugins: 'advlist link image lists',
  toolbar: 'undo redo styles fontfamily fontsizeinput forecolor backcolor | bold italic underline strikethrough | alignright aligncenter alignleft alignjustify | indent outdent bullist numlist | image',
  toolbar_mode: 'wrap',
  image_caption: true,
  image_title: true,
  license_key: 'gpl',
  file_picker_types: 'image',

   file_picker_callback: (cb, value, meta) => {
    const input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');

    input.addEventListener('change', (e) => {
      const file = e.target.files[0];

      const reader = new FileReader();
      reader.addEventListener('load', () => {
        /*
          Note: Now we need to register the blob in TinyMCEs image blob
          registry. In the next release this part hopefully won't be
          necessary, as we are looking to handle it internally.
        */
        const id = 'blobid' + (new Date()).getTime();
        const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        const base64 = reader.result.split(',')[1];
        const blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        /* call the callback and populate the Title field with the file name */
        cb(blobInfo.blobUri(), { title: file.name });
      });
      reader.readAsDataURL(file);
    });

    input.click();
  },

});
// Handles tags input
UseBootstrapTag(document.getElementById('tags'))
 

//handles the navbar on scroll effect
const navbrand = document.querySelector('.navbrand');

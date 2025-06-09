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
  license_key: 'gpl'

});
// Handles tags input
UseBootstrapTag(document.getElementById('tags'))
 

//handles the navbar on scroll effect
const navbrand = document.querySelector('.navbrand');

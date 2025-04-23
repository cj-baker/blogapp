//adds data tables to users view

let table = new DataTable('#myTable', {
  paging: true,
  
});

//adds rich text editor plugin to textarea
tinymce.init({
  selector: '#mytextarea',
  plugins: 'advlist link image lists emoticons',
  images_file_types: 'jpg,jpeg,png,gif',
  toolbar_mode: 'wrap',
  license_key: 'gpl'

});

//handles the navbar on scroll effect
const navbrand = document.querySelector('.navbrand');

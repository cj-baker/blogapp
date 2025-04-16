let table = new DataTable('#myTable', {
  paging: true,
  
});

tinymce.init({
  selector: '#mytextarea',
  plugins: 'advlist link image lists',
  license_key: 'gpl'
});
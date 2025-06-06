//adds data tables to users view

let table = new DataTable('#myTable', {
  paging: true,
  
});
// Handles tags input
        // Get the tags and input elements from the DOM
        const tags = document.getElementById('tags');
        const input = document.getElementById('input-tag');

        // Add an event listener for keydown on the input element
        input.addEventListener('keydown', function (event) {

            // Check if the key pressed is 'Enter'
            if (event.key === 'Enter') {
            
                // Prevent the default action of the keypress
                // event (submitting the form)
                event.preventDefault();
            
                // Create a new list item element for the tag
                const tag = document.createElement('li');
            
                // Get the trimmed value of the input element
                const tagContent = input.value.trim();
            
                // If the trimmed value is not an empty string
                if (tagContent !== '') {
            
                    // Set the text content of the tag to 
                    // the trimmed value
                    tag.innerText = tagContent;

                    // Add a delete button to the tag
                    tag.innerHTML += '<button class="delete-button">X</button>';
                    
                    // Append the tag to the tags list
                    tags.appendChild(tag);
                    
                    // Clear the input element's value
                    input.value = '';
                }
            }
        });

        // Add an event listener for click on the tags list
        tags.addEventListener('click', function (event) {

            // If the clicked element has the class 'delete-button'
            if (event.target.classList.contains('delete-button')) {
            
                // Remove the parent element (the tag)
                event.target.parentNode.remove();
            }
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

 

//handles the navbar on scroll effect
const navbrand = document.querySelector('.navbrand');

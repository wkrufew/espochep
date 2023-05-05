//Slug automático
document.getElementById("title_es").addEventListener('keyup', slugChange);

function slugChange() {

    title = document.getElementById("title_es").value;
    document.getElementById("slug").value = slug(title);

}

function slug(str) {
    var $slug = '';
    var trimmed = str.trim(str);
    $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
    replace(/-+/g, '-').
    replace(/^-|-$/g, '');
    return $slug.toLowerCase();
}


ClassicEditor
        .create( document.querySelector( '#description_es' ) ,{
           /*  alignment: {
                options: [ 'left', 'right' ,'center']
            }, */
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'],
            heading: {
            options: [{
                    model: 'paragraph',
                    title: 'Paragraph',
                    class: 'ck-heading_paragraph'
                },
                {
                    model: 'heading1',
                    view: 'h1',
                    title: 'Heading 1',
                    class: 'ck-heading_heading1'
                },
                {
                    model: 'heading2',
                    view: 'h2',
                    title: 'Heading 2',
                    class: 'ck-heading_heading2'
                }
            ],
            /* alignment: {
                options: [
                    { name: 'left', className: 'my-align-left' },
                    { name: 'right', className: 'my-align-right' },
                    { name: 'center', className: 'my-align-center' }
                ]
            }, */
        }
        })
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#description_en' ) ,{
           /*  alignment: {
                options: [ 'left', 'right' ,'center']
            }, */
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'],
            heading: {
            options: [{
                    model: 'paragraph',
                    title: 'Paragraph',
                    class: 'ck-heading_paragraph'
                },
                {
                    model: 'heading1',
                    view: 'h1',
                    title: 'Heading 1',
                    class: 'ck-heading_heading1'
                },
                {
                    model: 'heading2',
                    view: 'h2',
                    title: 'Heading 2',
                    class: 'ck-heading_heading2'
                }
            ],
            /* alignment: {
                options: [
                    { name: 'left', className: 'my-align-left' },
                    { name: 'right', className: 'my-align-right' },
                    { name: 'center', className: 'my-align-center' }
                ]
            }, */
        }
        })
        .catch( error => {
            console.error( error );
        } );

 //Cambiar imagen
 document.getElementById("file").addEventListener('change', cambiarImagen);

 function cambiarImagen(event){
     var file = event.target.files[0];

     var reader = new FileReader();
     reader.onload = (event) => {
         document.getElementById("picture").setAttribute('src', event.target.result); 
     };

     reader.readAsDataURL(file);
 }


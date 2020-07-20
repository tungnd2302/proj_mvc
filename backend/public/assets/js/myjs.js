$(document).ready(function(){
		$('#blah').click(function(){
  			 $("input[type='file']").trigger('click');
		})

        CKEDITOR.replace( 'category-description', {
        filebrowserBrowseUrl: 'public/ckfinder/ckfinder/ckfinder.html',
        filebrowserUploadUrl: 'public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    } );
})
	  function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        
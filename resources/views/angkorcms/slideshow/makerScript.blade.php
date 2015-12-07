<script type="text/javascript" src="{{ asset('js/angkorcmsslideshows/jquery.tablednd.js') }}"></script>
<script>
$(function() {
	tablednd();
});
function tablednd(){
    $("#listSlides").tableDnD({
        onDrop: function(table, row) {
            saveSlideOrder();
        },
    });
}
$('#addSlide').submit(function(e){
	e.preventDefault();
	$.ajax({
		url: '{{route('angkorcmsslideshows.addSlide.ajax')}}',
		type: 'POST',
		data: new FormData(this),
		processData: false,
		contentType: false,
		success: function(data){
			if(data.ok){
				$('#formAddSlideError').html('')
				$('#formAddSlide .form-group').each(function() {$( this ).removeClass('has-feedback');});
				$('#formAddSlide .form-group').each(function() {$( this ).removeClass('has-error');});
				$('#formAddSlide .text-danger').each(function() {$( this ).html('');});
				$('#listSlides').append(data.html);
				tablednd();saveSlideOrder();
			}else if(data.error){
				$('#formAddSlideError').html(data.error)
				$('#formAddSlide').addClass('has-feedback');
				$('#formAddSlide').addClass('has-error');
			}
		},
		error: function(xhr, textStatus, errorThrown){
			var errors = xhr.responseJSON;
			for(var error in errors){
				$('#formAddSlide .text-danger-'+error).html(errors[error]);
				$('#formAddSlide .form-group-'+error).addClass('has-feedback');
				$('#formAddSlide .form-group-'+error).addClass('has-error');
			}
		}
	})
});
function delSlide(id, action){
	$.ajax({
		url: action,
		type: 'post',
		data: "",
		headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
		processData: false,
		contentType: false,
		success: function(data){
			if(data.ok){
				$('#SlideRow'+id).remove();
			}
		},
		error: function(xhr, textStatus, errorThrown){
		}
	})
}
function saveSlideOrder(){
	var listSlides = Array();
	$('#listSlides tbody tr').each(function() {listSlides.push($(this).attr('idSlide'));});
	var formData = {};
	formData['order'] = listSlides;
	formData['slideshow_id'] = $('#listSlides').attr('idSlideshow');
	$.ajax({
		url: '{{ route('angkorcmsslideshows.saveOrder.ajax') }}',
		type: 'post',
		headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
		data: formData,
		success: function(data){
			if(data.ok){
			}
		},
		error: function(xhr, textStatus, errorThrown){
		}
	})
}
</script>
{!! View::make('angkorcms/medias/form/scriptChooseOneImage')->with('image_id', 'null') !!}
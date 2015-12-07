<script type="text/javascript" src="{{ asset('js/angkorcmslistings/jquery.tablednd.js') }}"></script>
<script>
$(function() {
	tablednd();
});
function tablednd(){
    $("#listListItems").tableDnD({
        onDrop: function(table, row) {
            saveListItemOrder();
        },
    });
}
$('#addListItem').submit(function(e){
	e.preventDefault();
	$.ajax({
		url: '{{route('angkorcmslistings.addListItem.ajax')}}',
		type: 'POST',
		data: new FormData(this),
		processData: false,
		contentType: false,
		success: function(data){
			if(data.ok){
				$('#formAddListItemError').html('')
				$('#formAddListItem .form-group').each(function() {$( this ).removeClass('has-feedback');});
				$('#formAddListItem .form-group').each(function() {$( this ).removeClass('has-error');});
				$('#formAddListItem .text-danger').each(function() {$( this ).html('');});
				$('#listListItems').append(data.html);
				tablednd();saveListItemOrder();
			}else if(data.error){
				$('#formAddListItemError').html(data.error)
				$('#formAddListItem').addClass('has-feedback');
				$('#formAddListItem').addClass('has-error');
			}
		},
		error: function(xhr, textStatus, errorThrown){
			var errors = xhr.responseJSON;
			for(var error in errors){
				$('#formAddListItem .text-danger-'+error).html(errors[error]);
				$('#formAddListItem .form-group-'+error).addClass('has-feedback');
				$('#formAddListItem .form-group-'+error).addClass('has-error');
			}
		}
	})
});
function delListItem(id, action){
	$.ajax({
		url: action,
		type: 'post',
		data: "",
		headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
		processData: false,
		contentType: false,
		success: function(data){
			if(data.ok){
				$('#ListItemRow'+id).remove();
			}
		},
		error: function(xhr, textStatus, errorThrown){
		}
	})
}
function saveListItemOrder(){
	var listListItems = Array();
	$('#listListItems tbody tr').each(function() {listListItems.push($(this).attr('idListItem'));});
	var formData = {};
	formData['order'] = listListItems;
	formData['list_id'] = $('#listListItems').attr('idList');
	$.ajax({
		url: '{{ route('angkorcmslistings.saveOrder.ajax') }}',
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
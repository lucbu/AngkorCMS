@if($mode == 'show')
	<div class="@if(isset($attr['profile-panelprimary-class'])) {{$attr['profile-panelprimary-class']}} @else panel panel-primary @endif">
		<div class="@if(isset($attr['profile-panelheading-class'])) {{$attr['profile-panelheading-class']}} @else panel-heading @endif">{{ Lang::get('angkorcmsprofile.title.profile') }}</div>
		<div class="@if(isset($attr['profile-panelbody-class'])) {{$attr['profile-panelbody-class']}} @else panel-body @endif">
			<p>{{ Lang::get('angkorcmsprofile.name') }} : {{ $user->name }}</p>
			@if(!Auth::guest() and Auth::user()->admin)
			<p>{{ Lang::get('angkorcmsprofile.email') }} : {{ $user->email }}</p>
				@if($user->admin == 1)
					{{ Lang::get('angkorcmsprofile.admin') }}
				@endif
			@endif
		</div>
	</div>
	<a class="btn btn-primary" href="{{$parameters['url_base']}}"><- {{ Lang::get('angkorcmsprofile.list') }}</a>
@elseif($mode == 'list')
	<div class="@if(isset($attr['profile-panelprimary-class'])) {{$attr['profile-panelprimary-class']}} @else panel panel-primary @endif">
		<div class="@if(isset($attr['profile-panelheading-class'])) {{$attr['profile-panelheading-class']}} @else panel-heading @endif">{{ Lang::get('angkorcmsprofile.title.list') }}</div>
		<div class="@if(isset($attr['profile-panelbody-class'])) {{$attr['profile-panelbody-class']}} @else panel-body @endif">
			<table class="{{ isset($attr['profile-table-class']) ? $attr['profile-table-class'] : 'table' }}">
				<thead>
					<tr>
						<th>#</th>
						<th>{{ Lang::get('angkorcmsprofile.name') }} </th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
						<td>{{ $user->id }}</td>
						<td class="text-primary"><strong><a href="{{$parameters['url_base']}}/profile/{{$user->id}}">{{ $user->name }}</a></strong></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
{!! $users->render() !!}
@endif
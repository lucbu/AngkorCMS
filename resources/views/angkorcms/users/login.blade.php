@if (Auth::guest())
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form class="@if(isset($attr['login-formClass'])) {{$attr['login-formClass']}} @else form-horizontal @endif" role="form" method="POST" action="{{ url('/auth/login') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			{{ Lang::get('angkorcmslogin.email') }} : <input type="email" class="@if(isset($attr['login-inputClass'])) {{$attr['login-inputClass']}} @else form-control @endif" name="email" value="{{ old('email') }}">
			{{ Lang::get('angkorcmslogin.password') }} :<input type="password" class="@if(isset($attr['login-inputClass'])) {{$attr['login-inputClass']}} @else form-control @endif" name="password">
			<label>
				<input type="checkbox" name="remember"> {{ Lang::get('angkorcmslogin.remember') }}
			</label>
			<button type="submit" class="@if(isset($attr['login-btnLogClass'])) {{$attr['login-btnClass']}} @else btn @endif">{{ Lang::get('angkorcmslogin.login') }}</button>
			<a class="@if(isset($attr['login-btnLogClass'])) {{$attr['login-btnClass']}} @else btn btn-link @endif" href="{{ url('/password/email') }}">{{ Lang::get('angkorcmslogin.forgot') }}</a>
	</form>
@else
	<p>
		<a href="{{ url('/'.Config::get("angkorcmspages.alias.".Session::get('language')->code.".users").'/profile/'.Auth::user()->id) }}">{{ Auth::user()->name }}</a></br>
		<a href="{{ url('/auth/logout') }}">{{ Lang::get('angkorcmslogin.logout') }}</a>
	</p>
@endif
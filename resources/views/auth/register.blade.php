@extends('adminlte::auth.layout', ['title' => trans('adminlte::adminlte.register')])

@section('content')
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ config('adminlte.urls.base') }}">
                {!! config('adminlte.logo') !!}
            </a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">@lang('adminlte::adminlte.register_message')</p>
            <form action="{{ url(config('adminlte.urls.register')) }}" method="post">
                {{ csrf_field() }}

                <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                           placeholder="@lang('adminlte::adminlte.full_name')">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                           placeholder="@lang('adminlte::adminlte.email')">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="@lang('adminlte::adminlte.password')">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="@lang('adminlte::adminlte.retype_password')">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit"
                        class="btn btn-primary btn-block btn-flat"
                >@lang('adminlte::adminlte.register')</button>
            </form>
            <div class="auth-links">
                <a href="{{ url(config('adminlte.urls.login', 'login')) }}"
                   class="text-center">@lang('adminlte::adminlte.i_already_have_a_membership')</a>
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@endsection
@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-body">
        <table class="table">
          <tr>
            <th>Login</th>
            <th>Email</th>
          </tr>
          <tr>
            <th>{{ $user->name }}</th>
            <th>{{ $user->email }}</th>
          </tr>
        </table>

        <a class="col-sm-12 btn btn-primary" href="{{ route('user.edit', [$user->id]) }}" role="button">Изменить пароль</a>
      </div>
    </div>
  </div>
</div>
@endsection

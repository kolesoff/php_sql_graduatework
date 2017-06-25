@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" role="form" action="{{ route('question.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="author" class="col-sm-3 control-label">Имя</label>
              <div class="col-sm-9">
                <input type="text" name="author" class="form-control" id="name" value="{{ old('author') }}">
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-3 control-label">Емайл</label>
              <div class="col-sm-9">
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
              </div>
            </div>
            <div class="form-group">
              <label for="topic_id" class="col-sm-3 control-label">Тема вопроса</label>
              <div class="col-sm-9">
                <select name="topic_id" class="form-control">
                  @foreach ($topics as $topic)
                    <option value="{{ $topic->id }}">{{ $topic->topic }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="question" class="col-sm-3 control-label">Ваш вопрос</label>
              <div class="col-sm-9">
                <textarea name="question" class="form-control" rows="3">{{ old('question') }}</textarea>
              </div>
            </div>
            <button type="submit" class="col-sm-12 btn btn-primary">Отправить</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

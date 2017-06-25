@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <h2><a href="{{ route('topic.show', [$question->topic_id]) }}">{{ $question->topic->topic }}</a></h2>
          <hr>
          <h3>Вопрос</h3>
          <p>{{ $question->question }}</p>
          <p>Автор: {{ $question->author }}</p>
          <p>Емайл: {{ $question->email }}</p>
          <div>
            <small>Создано: {{ $question->created_at }}</small>
          </div>         
          <hr>
          <h3>Ответ</h3>
          <p>{{ $question->answer }}</p>
          <div>
            @if (Auth::check())
              <p>Статус: <strong>
                @if ($question->status == 'expected')
                  ожидает ответа
                @elseif ($question->status == 'public')
                  опубликован 
                @elseif ($question->status == 'hidden') 
                  скрыт
                @endif
              </strong></p>
            @endif
          </div>
          <div>          
            <small>Обновлено: {{ $question->updated_at }}</small>
          </div>
          <hr>
          <a class="col-sm-12 btn btn-primary" href="{{ route('question.edit', [$question->id]) }}" role="button">
            Редактировать
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection

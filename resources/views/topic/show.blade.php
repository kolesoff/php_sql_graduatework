@extends('layouts.app')

@section('content')
  <h2>{{ $topic->topic }}</h2>
  <table class="table table-condensed">
    <tr>
      <th>#</th>
      <th>Aвтор</th>
      <th>Емайл</th>
      <th>Вопрос</th>
      <th>Ответ</th>
      <th>Статус</th>
      <th>Создано</th>
      <th>Обновлено</th>
      <th>Редактировать</th>
    </tr>
    @foreach ($topic->questions as $question)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $question->author }}</td>
      <td>{{ $question->email }}</td>
      <td>{{ $question->question }}</td>
      <td>{{ $question->answer }}</td>
      <td>
        @if ($question->status == 'expected')
          ожидает ответа
        @elseif ($question->status == 'public')
          опубликован
        @else
          скрыт
        @endif
      </td>
      <td>{{ $question->created_at }}</td>
      <td>{{ $question->updated_at }}</td>
      <td><a class="btn btn-primary btn-xs" href="{{ route('admin.question.edit', [$question->id]) }}" role="button">&gt;</a></td>
    </tr>
    @endforeach
  </table>
  <hr>
  <form action="{{ route('topic.destroy', [$topic->id]) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit" class="col-md-12 btn btn-danger">Удалить тему</button>
  </form>
@endsection

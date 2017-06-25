@extends('layouts.app')

@section('content')
  <h2>Список тем</h2>
  <table class="table table-condensed">
    <tr>
      <th>#</th>
      <th>Название темы</th>
      <th>Всего вопросов</th>
      <th>Опубликовано</th>
      <th>Без ответа</th>
      <th>Подробно</th>
    </tr>
    @foreach ($topics as $topic)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $topic->topic }}</td>
      <td>{{ $topic->questions->count() }}</td>
      <td>{{ $topic->questions->where('status', 'public')->count() }}</td>
      <td>{{ $topic->questions->where('status', 'expected')->count() }}</td>
      <td><a class="btn btn-primary btn-xs" href="{{ route('topic.show', [$topic->id]) }}" role="button">&gt;</a></td>
    </tr>
    @endforeach
  </table>
  <hr>
  <a class="col-md-12 btn btn-primary" href="{{ route('topic.create') }}">Добавить тему</a>
@endsection

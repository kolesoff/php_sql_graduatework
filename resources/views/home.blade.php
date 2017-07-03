@extends('layouts.app')

@section('content')
  @if ($questions->where('status', 'expected')->count() !== 0)
    <h2 class="text-primary">Ожидают ответа</h2>
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
      @php $i = 1; @endphp
      @foreach ($questions as $question)
        @if ($question->status == 'expected')
          <tr>
            <td>{{ $i }}</td>
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
            <td><a class="btn btn-primary btn-xs" href="{{ route('question.edit', [$question->id]) }}" role="button">&gt;</a></td>
          </tr>
          @php $i++; @endphp
        @endif
      @endforeach
    </table>
  @endif

  @foreach ($topics as $topic)
    @if ($topic->questions->count() !== 0)
      <h2>
        <a href="{{ route('topic.show', [$topic->id]) }}">{{ $topic->topic }}</a>
      </h2>  
      <table class="table table-condensed">
        <tr>
          <th>#</th>
          <th>№</th>
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
          <td>{{ $question->id }}</td>
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
          <td><a class="btn btn-primary btn-xs" href="{{ route('question.edit', [$question->id]) }}" role="button">&gt;</a></td>
        </tr>
        @endforeach
      </table>
      <hr>
    @endif
  @endforeach
@endsection

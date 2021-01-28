@extends("layouts.app")
@section("content")

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-primary font-weight-bold">
                一覧画面
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <a href="{{ url('todos/create') }}" class="btn btn-success mb-3">登録</a><p>~1日の始まりは重要なタスクから~</p>
                <table class="table">
                    <thead>
                        <tr class="p-3 mb-2 bg-secondary text-white">
                            <th>id</th>
                            <th>title</th>
                            <th>detail</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($todos as $todo)
                        <tr>
                            <td class="font-weight-bold">{{ $todo->id }}</td>
                            <td class="font-italic">{{ $todo->title }}</td>
                            <td><a href="{{ url('todos/' . $todo->id) }}" class="btn btn-info">詳細</a></td>
                            <td><a href="{{ url('todos/' . $todo->id . '/edit') }}" class="btn btn-primary">編集</a></td>
                            <td>
                                <form method="POST" action="/todos/{{ $todo->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">削除</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
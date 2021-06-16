@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tasks</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tasks.create') }}">{{ __('messages.CreateNew') }}</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>{{ __('messages.name') }}</th>
            <th>{{ __('messages.account') }}</th>
            <th>{{ __('messages.email') }}</th>
            <th>{{ __('messages.action') }}</th>
        </tr>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->name }}</td>
            <td>{{ $task->user->name }}</td>
            <td>{{ $task->user->email }}</td>
            <td>

                <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('tasks.show',$task->id) }}">{{ __('messages.show') }}</a>
                    <a class="btn btn-primary" href="{{ route('tasks.edit',$task->id) }}">{{ __('messages.edit') }}</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('messages.delete') }}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection

@extends('layouts.app')
@section('content')

@section('title', ' | Show List')

@if(isset($todo) || (isset($todo) && count($todo) >= 0))

<div class="row">
    <div class="col-md-10">
        <h3 class="text-center">Task List</h3>
    </div>
    <div class="col-md-2">
        <a href="{{ route('tasks.create') }}" class="btn btn-block btn-lg btn-info">Add new task</a>
    </div>
    <div class="col-md-12">
        <hr/>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
            <th>Title</th>
            <th>Description</th>
            <th>Created at</th>
            <th>Actions</th>
            </thead>
            <tbody>
                @if(count($todo) > 0)
                @foreach($todo as $task)
                <tr>
                    <th>{{ $task->title }}</th>
                    <th>{{ substr($task->description, 0, 5)}} {{ strlen($task->description) > 5 ? '...' : '' }}</th>
                    <th>{{ date('M j, Y', strtotime($task->created_at)) }}</th>
                    <th><a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">View</a> 
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-success">Edit</a></th>
                </tr>
                @endforeach
                @endif
            </tbody>

        </table>
        @if(count($todo) == 0)
        <h1 class="text-center">You do not have any tasks!</h1>
        @endif
    </div>
</div>

{{ $todo->links() }}

@endif

@if(!isset($todo))
<h2 class="text-center">Welcome to our site! Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a>.</h2>
@endif

@section('scripts')
<script type="text/javascript">
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        getPage(page);
    });

    function getPage(page) {
        $.ajax({
            url: '?page=' + page
        }).done(function (data) {
            $('.main').html(data);
            location.hash = page;
        });
    }
</script>
@endsection
@endsection
@extends('layouts.app')
@section('content')

@section('styles')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('title', ' | Create')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center">Create new task</h1>
        <hr/>
        <div class="table">
            {!! Form::open(['route' => 'tasks.store', 'data-parsley-validate' => '']) !!}
                {{ Form::label('title', '*Title: ') }}
                {{ Form::text('title', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}
                <br/>
                {{ Form::label('description', '*Description: ') }}
                {{ Form::textarea('description', null, ['class' => 'form-control', 'required' => '']) }}
                <br/>
                {{ Form::submit('Save', ['class' => 'btn btn-block btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}
@endsection
@endsection
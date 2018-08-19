@extends('layouts.app')
@section('content')

@section('title', ' | Show List')

<div class="row">
    @if(isset($item))
    {!! Form::model($item[0], ['route' => ['tasks.update', $item[0]->id], 'method' => 'PUT']) !!}
    <div class="col-md-12">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}
        <hr/>
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
    </div>

    <div class="col-md-12">
        <div class="well">
            <dl class="dl-horizontal">
                <dt>Created At:</dt>
                <dd>{{ date('M j, Y h:ia', strtotime($item[0]->created_at)) }}</dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Last Updated:</dt>
                <dd>{{ date('M j, Y h:ia', strtotime($item[0]->updated_at)) }}</dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('tasks.show', 'Cancel', [$item[0]->id], ['class' => 'btn btn-danger btn-block']) !!}
                </div>
                <div class="col-sm-6">
                    {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                </div>
            </div>

        </div>
    </div>
    {!! Form::close() !!}
    @endif

    @if(isset($err))
    <div class="col-md-8">
        <h1>{{ $err }}</h1>
    </div>
    @endif
</div>

@endsection
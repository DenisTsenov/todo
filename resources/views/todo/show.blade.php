@extends('layouts.app')
@section('content')

@section('title', ' | Show List')
<div class="row">
    <div class="col-md-8">
        <h1>{{ $item[0]->title }}</h1>
        <p class="lead">{{ $item[0]->description }}</p>
    </div>
    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                <dt>Create At:</dt>
                <dd>{{ date('M j, Y h:ia', strtotime($item[0]->created_at)) }}</dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Last Updated:</dt>
                <dd>{{ date('M j, Y h:ia', strtotime($item[0]->updated_at)) }}</dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('tasks.edit', 'Edit', [$item[0]->id], ['class' => 'btn btn-primary btn-block']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::open(['route' => ['tasks.destroy', $item[0]->id], 'method' => 'DELETE']) !!}
                    
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
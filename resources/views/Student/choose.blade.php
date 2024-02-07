<!-- resources/views/student/choose.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-6">
            <div class="card shadow-lg mx-auto px-4 py-5">
                <h2>Select Department and Subject</h2>
                {!! Form::open(['route' => 'question.view']) !!}
                <div class="form-group">
                    {!! Form::label('department_id', 'Department:') !!}
                    {!! Form::select('department_id', $departments, null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('subject_id', 'Subject:') !!}
                    {!! Form::select('subject_id', $subjects, null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('View Questions', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-3">View Questions</h2>
        <h5 class="bg-warning d-block py-2 px-2 rounded-2">Department: {{ $department->department_name }}</h5>
        <h5 class="bg-warning d-block py-2 px-2 rounded-2" >Subject: {{ $subject->name }}</h5>

        @if($subject->questions->count() > 0)
            <form action="{{ route('answers.store') }}" method="post">
                @csrf
                <input type="hidden" name="department_id" value="{{ $department->id }}">
                <input type="hidden" name="subject_id" value="{{ $subject->id }}">

                @foreach($subject->questions as $question)
                    <div class="card my-4 ">
                        <div class="px-3 py-3">
                            <h3 class="mb-0">Q # : {{ $question->question }}</h3>
                        </div>
                        <div class="card-body">
                            @if($question->type === 'short')
                                <input type="text" class="form-control" name="answers[{{ $question->id }}]" placeholder="Enter your answer">
                            @elseif($question->type === 'long')
                                <textarea class="form-control" name="answers[{{ $question->id }}]" placeholder="Enter your answer"></textarea>
                            @elseif($question->type === 'mcq')
                                @php
                                    $options = $question->mcqs_options;
                                @endphp

                                @if($options)
                                    <div class="form-check">
                                        @foreach($options as $value => $label)
                                            <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="{{ $value }}" id="option-{{ $value }}">
                                            <label class="form-check-label" for="option-{{ $value }}">
                                                {{ $label }}
                                            </label><br>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-danger">Invalid MCQ options</p>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary">Submit Answers</button>
            </form>
        @else
            <p>No questions found for this subject.</p>
        @endif
    </div>
@endsection

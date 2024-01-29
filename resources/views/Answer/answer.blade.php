<!-- resources/views/Answer/ChoosePaper.blade.php -->

@extends('Layout.main')

@section('main-container')
    <div class="container">
        <h2>Answer Questions</h2>

        <form action="{{ route('store.question') }}" method="post">
            @csrf

            @foreach($questions as $question)
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="mb-0">Que : {{ $question->question }}</h3>
                        <p>Type: {{ $question->type }}</p>
                    </div>
                    <div class="card-body">
                        @if($question->type === 'short')
                            <div class="form-group">
                                <label for="answer_{{ $question->id }}">Your Answer:</label>
                                <input type="text" class="form-control" name="answers[{{ $question->id }}]" id="answer_{{ $question->id }}" placeholder="Enter your answer">
                            </div>
                        @elseif($question->type === 'long')
                            <div class="form-group">
                                <label for="answer_{{ $question->id }}">Your Answer:</label>
                                <textarea class="form-control" name="answers[{{ $question->id }}]" id="answer_{{ $question->id }}" placeholder="Enter your answer"></textarea>
                            </div>
                        @elseif($question->type === 'MCQs')
                            @php
                                $options = is_array($question->mcqs_options) ? $question->mcqs_options : json_decode($question->mcqs_options, true);
                            @endphp

                            @if($options !== null && is_array($options) && count($options) > 0)
                                <div class="form-check">
                                    @foreach($options as $option)
                                        <input class="form-check-input" type="checkbox" name="answers[{{ $question->id }}][]" value="{{ $option }}" id="option_{{ $question->id }}_{{ $loop->index }}">
                                        <label class="form-check-label" for="option_{{ $question->id }}_{{ $loop->index }}">
                                            {{ $option }}
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

            <button type="submit" class="btn btn-primary mt-4 mb-5">Submit Answers</button>
        </form>
    </div>
@endsection

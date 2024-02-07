{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <h2>Submitted Papers</h2>--}}

{{--        <table class="table">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Student Name</th>--}}
{{--                <th>Student Email</th>--}}
{{--                <th>Question</th>--}}
{{--                <th>Answer</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($papers as $paper)--}}
{{--                <tr>--}}
{{--                    <td>{{ $paper->user->name }}</td>--}}
{{--                    <td>{{ optional($paper->user)->email }}</td>--}}
{{--                    <td>{{ optional($paper->question)->question }}</td>--}}
{{--                    <td>{{ $paper->answer }}</td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
{{--@endsection--}}


@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center mb-4">Submitted Papers</h2>

        <div class="row justify-content-center">
            <div class="col-md-8">
                @forelse($papers as $paper)
                    @if($loop->first || $paper->user_id !== $papers[$loop->index - 1]->user_id)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 align="right" class="card-title">{{ $paper->user->name }}</h2>
                                <h5 align="right" class="card-text">
                                    <strong>Email:</strong> {{ optional($paper->user)->email }}
                                </h5>
                                <h6 class="card-subtitle mb-2 text-muted">Submitted Papers:</h6>
                                @endif
                                <p class="card-text">
                                    <strong>Question:</strong> {{ optional($paper->question)->question }}<br>
                                    <strong>Answer:</strong> {{ $paper->answer }}
                                </p>
                                @if($loop->last || $paper->user_id !== $papers[$loop->index + 1]->user_id)
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="alert alert-info" role="alert">
                        No papers submitted yet.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection


<!-- resources/views/questions/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container col-10 shadow-lg px-5 py-5 rounded-4">
        <h2 align="center">Create Paper</h2>
        {!! Form::open(['route' => 'store.question']) !!}

       <div class="row paper-selecting-area py-4">
           <div class="col-6">
               <div class="form-group">
                   {!! Form::label('subject_id', 'Subject:') !!}
                   {!! Form::select('subject_id', $subjects, null, ['class' => 'form-control']) !!}
               </div>
           </div>
           <div class="col-6">
               <div class="form-group">
                   {!! Form::label('paper_id', 'Paper:') !!}
                   {!! Form::select('paper_id', $papers, null, ['class' => 'form-control']) !!}
               </div>
           </div>
       </div>

        <h3>Type Your Questions</h3>
        <table class="table mt-4" id="questions-table">
            <thead>
            <tr>
                <th>Sr#</th>
                <th>Question</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @for($i = 1; $i <= 1; $i++)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{!! Form::text("questions[$i][content]", null, ['class' => 'form-control']) !!}

                        @error('questions.*.content')
                        <div class="d-block invalid-feedback">{{$message}}</div>
                        @enderror()
                    </td>
                    <td>
                        {!! Form::select("questions[$i][type]", ['short' => 'Short', 'long' => 'Long', 'mcq' => 'MCQ'], null, ['class' => 'form-control question-type']) !!}
                        <div class="mcq-options" style="display: none;">
                            @for($j = 1; $j <= 4; $j++)
                                {!! Form::text("questions[$i][options][$j]", null, ['class' => 'form-control options']) !!}
                            @endfor
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success px-3 add-row">+</button>
                        <button type="button" class="btn btn-danger px-3 remove-row">-</button>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>

        {!! Form::submit('Create Paper', ['class' => 'btn btn-primary']) !!}


        {!! Form::hidden('num_questions', 1, ['id' => 'num-questions']) !!}

        {!! Form::close() !!}
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Add row
            $("#questions-table").on("click", ".add-row", function () {
                var count = $("#questions-table tbody tr").length;
                count++;
                var newRow = '<tr>' +
                    '<td>'+count+'</td>' +
                    '<td><input type="text" name="questions[' + count + '][content]" class="form-control"></td>' +
                    '<td>' +
                    '<select name="questions[' + count + '][type]" class="form-control question-type">' +
                    '<option value="short">Short</option>' +
                    '<option value="long">Long</option>' +
                    '<option value="mcq">MCQ</option>' +
                    '</select>' +
                    '<div class="mcq-options" style="display: none;">';

                for (var j = 1; j <= 4; j++) {
                    newRow += '<input type="text" name="questions[' + count + '][options][' + j + ']" class="form-control">';
                }

                newRow += '</div>' +
                    '</td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-success add-row">+</button>' +
                    '<button type="button" class="btn btn-danger remove-row">-</button>' +
                    '</td>' +
                    '</tr>';

                $("#questions-table tbody").append(newRow);

                // Update the hidden input field value
                $('#num-questions').val(count);
            });

            // Remove row
            $("#questions-table").on("click", ".remove-row", function () {
                $(this).closest("tr").remove();

                // Update the hidden input field value
                var count = $("#questions-table tbody tr").length;
                $('#num-questions').val(count);
            });

            // Show/hide MCQ options
            $("#questions-table").on("change", ".question-type", function () {
                var mcqOptions = $(this).closest("td").find(".mcq-options");
                if ($(this).val() === "mcq") {
                    mcqOptions.show();
                } else {
                    mcqOptions.hide();
                }
            });
        });
    </script>
@endsection

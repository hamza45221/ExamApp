@extends('Layout.main')
@section('main-container')

    <div class="container">
        <div class="row justify-content-center align-items-start" style="height: 600px;">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h4>Question paper</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-12 my-4">
                            <label>Select your term</label>
                            <select class="form-control form-select" name="paper_id">
                                @foreach($paper as $papers)
                                    <option value="{{$papers->id}}">{{$papers->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-4">
                            <h4>Create your paper</h4>
                        </div>
                        <form id="repeater-form" action="{{ route('store.question') }}" method="post">
                            @csrf
                            <div id="repeater-container">
                                <div class="row repeater-item mb-4">
                                    <div class="col-2"></div>
                                    <div class="col-2">
                                        <select class="form-control question-type" name="questions[0][type]">
                                            <option value="short">Short</option>
                                            <option value="long">Long</option>
                                            <option value="MCQs">MCQs</option>
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" name="questions[0][question]" class="form-control" placeholder="Title">
                                    </div>
                                    <div class="col-3 additional-fields" style="display: none;">
                                        <div class="form-group">

                                            <input type="text" name="questions[0][mcqs_options1][]" class="form-control" placeholder="Option 1">
                                        </div>
                                        <div class="form-group">

                                            <input type="text" name="questions[0][mcqs_options2][]" class="form-control" placeholder="Option 2">
                                        </div>
                                        <div class="form-group">

                                            <input type="text" name="questions[0][mcqs_options3][]" class="form-control" placeholder="Option 3">
                                        </div>
                                        <div class="form-group">

                                            <input type="text" name="questions[0][mcqs_options4][]" class="form-control" placeholder="Option 4">
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="remove-item btn btn-danger">Remove</button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="add-item" class="btn btn-primary">Add Item</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

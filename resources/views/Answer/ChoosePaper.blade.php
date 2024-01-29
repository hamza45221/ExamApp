@extends('Layout.main')
@section('main-container')


    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 600px;">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Select your Subject name</h4>
                    </div>
                    <div class="card-body">
                        <form >
                            @csrf
                            <label>Select Paper</label>
                            <select class="form-select form-control my-4">
                                @foreach($department as $departments)
                                    <option value="{{$departments->id}}">{{$departments->department_name}}</option>
                                @endforeach
                            </select>
                            <label>Select Subject</label>
                            <select class="form-select form-control my-4">
                                @foreach($subject as $subjects)
                                <option value="{{$subjects->id}}">{{$subjects->name}}</option>
                                @endforeach
                            </select>


                            <a href="{{route('answers.answer')}}" class="  btn form-control text-light bg-success my-4" >Submit</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

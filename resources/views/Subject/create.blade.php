@extends('Layout.main')
@section('main-container')


    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 600px;">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Write Your Subject name</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('store.subject')}}" method="post" >
                            @csrf
                            <label>Select your department</label>
                                <select class="form-control form-select mb-4" name="department_id">
                                    @foreach($department as $departments)
                                    <option value="{{$departments->id}}">{{$departments->department_name}}</option>
                                    @endforeach
                                </select>
                                <label>Type your Subject Name</label>
                            <input type="text" name="name" class="form-control" >
                            <input type="submit" class="form-control bg-success text-light my-4"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

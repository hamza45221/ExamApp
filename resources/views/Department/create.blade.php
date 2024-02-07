@extends('Layout.main')
@section('main-container')


    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 600px;">
            <div class="col-6">
                <div class="card shadow-lg rounded-3">
                    <div class="px-3 py-3">
                        <h3>Department name</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('store.department')}}" method="post" >
                            @csrf
                            <label>Department</label>
                            <input type="text" name="department_name" class="form-control" />
                            @error('department_name')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                            <input type="submit" class="form-control bg-success text-light my-4"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

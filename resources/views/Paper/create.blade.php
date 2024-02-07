@extends('Layout.main')
@section('main-container')


    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 600px;">
            <div class="col-6">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header">
                        <h4>Write Your Paper name</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('store.paper')}}" method="post" >
                            @csrf
                            <label>Select your Subject</label>
                            <select class="form-control my-4" name="subject_id" >
                                @foreach($subject as $subjects )
                                    <option value="{{$subjects->id}}">{{$subjects->name}}</option>
                                @endforeach
                            </select>
                            <label>Select User</label>
                            <select class="form-control my-4" name="User_id[]" multiple>
                                @foreach($user as $users )
                                    <option value="{{$users->id}}">{{$users->name}}</option>
                                @endforeach
                            </select>
                            <label>paper</label>
                            <input type="text" name="name" class="form-control" />

                            <input type="submit" class="form-control bg-success text-light my-4"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

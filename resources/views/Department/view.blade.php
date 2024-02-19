@extends('Layout.main')
@section('main-container')


    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 500px;">
            <div class="col-10">
                <div class="card shadow-lg rounded-3">
                    <div class="px-3 py-3 d-flex justify-content-between">
                        <h3>Departments</h3>
                        <a href="{{route('create.department')}}" class="btn px-3 py-2 bg-info">Create Department</a>
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                           <div class="row">
                               @foreach( $department as $departments)
                                   <div class="col-3">

                                       <div class="dep" style="height: auto; background-color: #4b5563;color: white;border-radius: 20px;">
                                           <h6 class="px-3 py-2">{{$departments->department_name}}</h6>
                                       </div>

                                   </div>
                               @endforeach
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

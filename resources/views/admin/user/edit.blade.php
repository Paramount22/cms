@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Edit employee

                </li>
            </ol>
        </nav>
        @include('_partials._messages')
        <form action="{{route('users.update', $user)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">General Information</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Full name</label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control
@error('name')
                                    is-invalid @enderror" required="">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" value="{{$user->address}}"  class="form-control ">

                            </div>

                            <div class="form-group">
                                <label>Mobile number </label>
                                <input type="text" name="mobile_number" class="form-control"
                                       value="{{$user->mobile_number}}">
                            </div>
                            <div class="form-group">
                                <label>Department</label>
                                <select class="form-control" name="department_id" required="">
                                    @foreach(App\Models\Department::all() as $department)
                                        <option value="{{$department->id}}"
                                        @if($user->department_id == $department->id) selected @endif
                                            >{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" name="designation" value="{{$user->designation}}"
                                       class="form-control @error('designation') is-invalid @enderror" required="">
                                @error('designation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Start date</label>
                                <input name="start_from" class="form-control @error('start_from') is-invalid
                                    @enderror" placeholder="dd-mm-yyyy" value="{{$user->start_from}}" required="" id="datepicker">
                                @error('start_from')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" >
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Login Information</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Email </label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid
                                @enderror" required="" value="{{$user->email}}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" name="role_id" required="">
                                    @foreach(App\Models\Role::all() as $role)
                                        <option value="{{$role->id}}"
                                          @if($user->role_id == $role->id) selected @endif
                                        >{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        @if( isset(auth()->user()->role->permission['name']['user']['can-edit']))
                            <button class="btn btn-info" type="submit">Update</button>
                        @endif
                        <a class="btn btn-outline-secondary" href="{{route('users.index')}}">
                            Back
                        </a>

                    </div>
                </div>

            </div>
        </form>
    </div>

@endsection



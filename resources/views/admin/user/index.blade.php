@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row ">
            <div class="col-md-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">All Employees</li>
                    </ol>
                </nav>
               @include('_partials._messages')

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Start Date</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                    </thead>

                    <tbody>
                    @if($users->count() > 0)
                    @foreach($users as $key => $user)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>
                            <img src="{{asset('profile')}}/{{$user->image}}" width="60" alt="{{$user->name}}">
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->department->name ? $user->department->name : 'default'}}</td>
                        <td>{{$user->designation}}</td>
                        <td>{{$user->mobile_number}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->start_from}}</td>
                        <td>
                            @if($user->role_id === 1)
                                <span class="badge badge-danger">{{$user->role->name ? $user->role->name : ''}}</span>
                            @else
                                <span class="badge badge-info">{{$user->role->name ? $user->role->name : ''}}</span>
                            @endif
                        </td>
                        <td>
                            @if(isset( auth()->user()->role->permission['name']['user']['can-edit'] ))
                            <a href="{{route('users.edit', $user)}}" class="text-success">
                                <i class="fas fa-edit"></i>
                            </a>
                            @endif
                        </td>

                        <td>
                            @if(isset( auth()->user()->role->permission['name']['user']['can-delete'] ))
                            <a href="#" data-toggle="modal" data-target="#exampleModal{{$user->id}}" class="text-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                            @endif
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('users.destroy', $user)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirm </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Do you want to delete?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--Modal end-->


                        </td>
                        @endforeach


                    </tr>
                    @else
                    <td>No users to display</td>

                    @endif





                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

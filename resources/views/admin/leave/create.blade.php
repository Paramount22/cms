@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Leave form</li>
                    </ol>
                </div>
            </div>

        </nav>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('_partials._messages')
                    <div class="card">
                        <div class="card-header">Create leave</div>
                        <div class="card-body">
                            <form action="{{route('leaves.store')}}" method="post" enctype="multipart/form-data">@csrf
                                <div class="form-group">
                                    <label>From date</label>
                                    <input name="from" class="form-control
                                    @error('from') is-invalid @enderror" required="" id="datepicker">
                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label>To date</label>
                                    <input name="to" class="form-control @error('to') is-invalid @enderror"
                                           required="" id="datepicker1">
                                    @error('to')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Type of leave</label>
                                    <select class="form-control" name="type" required="">
                                        <option value="annualleave">Annual leave</option>
                                        <option value="sickleave">Sick leave</option>
                                        <option value="parental">Parental leave</option>
                                        <option value="other">Other leave</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Description </label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                              name="description" rows="3"></textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button class="btn btn-success">Submit</button>

                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <table class="table mt-3" id="leaves">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date from</th>
                            <th scope="col">Date to</th>
                            <th scope="col">Description</th>
                            <th scope="col">Type</th>
                            <th scope="col">Reply</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($leaves as $key => $leave)
                            <tr>
                                <th scope="row"> {{$key + 1}} </th>
                                <td>{{$leave->from}}</td>
                                <td>{{$leave->to}}</td>
                                <td>{{$leave->description}}</td>
                                <td>{{$leave->type}}</td>
                                <td>{{$leave->message}}</td>
                                <td>
                                    @if($leave->status == 0)
                                        <span class="badge badge-danger">Pending</span>
                                    @else
                                        <span class="badge badge-success">Approved</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('leaves.edit', $leave)}}" class="text-success">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal{{$leave->id}}"
                                       class="text-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>

                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$leave->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('leaves.destroy', $leave)}}" method="post">
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
                         @empty
                            <tr>
                                    No records yet.

                             </tr>

                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

@endsection




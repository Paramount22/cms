@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('All leaves') }}</div>

                    <div class="card-body">
                        <table class="table mt-3">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Date from</th>
                                <th scope="col">Date to</th>
                                <th scope="col">Description</th>
                                <th scope="col">Type</th>
                                <th scope="col">Reply</th>
                                <th scope="col">Status</th>
                                <th scope="col">Approve / Reject</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($leaves as $key => $leave)
                                <tr>
                                    <td> {{$leave->user->name}} </td>
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
                                        <a href="#" data-toggle="modal" data-target="#exampleModal{{$leave->id}}"
                                           class="text-danger">
                                            <button class="btn btn-sm btn-outline-info">Approve / Reject</button>
                                        </a>
                                    </td>

                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$leave->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{route('accept.reject', $leave)}}" method="post">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirm leave</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        <select class="form-control" name="status" id="status">
                                                            <option value="0">Pending</option>
                                                            <option value="1">Accept</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="message">Message</label>
                                                        <textarea class="form-control" name="message" id="message"
                                                          rows="3" required></textarea>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-info">Submit</button>
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
        </div>
    </div>
@endsection

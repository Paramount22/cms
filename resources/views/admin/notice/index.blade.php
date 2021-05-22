@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('_partials._messages')
                @forelse($notices as $notice)
                <div class="card mb-2">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h6 class="m-0">{{$notice->title}}</h6>

                    </div>

                    <div class="card-body">
                        <p>{{$notice->description}}</p>
                        <p class="badge badge-success">{{$notice->date}}</p>
                        <p class="badge badge-info">{{$notice->name}}</p>
                    </div>
                    <div class="card-footer">
                        <a class="text-info" href="{{route('notices.edit', $notice)}}">
                            <i class="fas fa-edit"></i>
                        </a>

                        <a class="ml-2 text-danger" href="" data-toggle="modal"
                           data-target="#exampleModal{{$notice->id}}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$notice->id}}" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure ?</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    The record will be deleted.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form action="{{route('notices.destroy', $notice)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-warning" role="alert">
                        No notices yet!
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('_partials._messages')
                <div class="card">
                    <div class="card-header">{{ __('Edit notice') }}</div>

                    <div class="card-body">
                        <form action="{{route('notices.update', $notice)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input id="title" type="text" name="title"
                                       class="form-control @error('title') is-invalid @enderror"
                                       placeholder="Title"
                                       value="{{ $notice->title }}"
                                >
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" rows="3"
                                          class="form-control @error('description') is-invalid @enderror"
                                          placeholder="Your notice"
                                >{{$notice->description}}</textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Date</label>
                                <input name="date" class="form-control @error('date') is-invalid @enderror"
                                       required="" id="datepicker1" value="{{$notice->date}}">
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Created by</label>
                                <input id="name" type="text" name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Name"
                                       value="{{ auth()->user()->name }}"
                                >
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button class="btn btn-success">Update</button>
                            <a class="ml-2 btn btn-outline-secondary" href="{{route('notices.index')}}">Back</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

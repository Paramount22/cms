@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('_partials._messages')
                <div class="card">
                    <div class="card-header">{{ __('Send email') }}</div>
                    <div class="card-body">
                        <form action="{{route('mails.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="mail">Select</label>
                                <select name="" id="mail" class="form-control">
                                    <option value="0">mail to all staff</option>
                                    <option value="1">choose department</option>
                                    <option value="2">choose person</option>
                                </select>

                                <br>

                                <select name="department" id="department" class="form-control">
                                    <option value="">Select</option>
                                    @foreach(\App\Models\Department::all() as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>

                                <br>

                                <select name="user" id="user" class="form-control">
                                    <option value="">Select</option>
                                    @foreach(\App\Models\User::all() as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Body</label>
                                <textarea name="body" id="" rows="5" class="form-control @error('body') is-invalid @enderror"></textarea>
                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="file">File</label>
                                <input type="file" id="file" name="file" class="form-control @error('file')
                                    is-invalid @enderror">
                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button class="btn btn-outline-primary">Send</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

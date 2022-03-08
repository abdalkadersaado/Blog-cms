@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Edit comment on ({{ $comment->post->title }})</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.post_comments.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">Comments</span>
                </a>
            </div>
        </div>
        <div class="card-body">


            <form action="{{ route('admin.post_comments.update', $comment->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name',$comment->name) }}" class="form-control">
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="{{ old('email',$comment->email) }}" class="form-control">
                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" name="url" value="{{ old('url',$comment->url) }}" class="form-control">
                        @error('url')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

            </div>

            <div class="row">

                 <div  class="col-6">
                        <label for="ip_address">ip address</label>
                        <input type="text" name="ip_address" value="{{ old('ip_address',$comment->ip_address) }}" class="form-control">
                        @error('ip_address')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                 <div  class="col-4">
                        <label for="status">status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status',$comment->status) == '1' ? 'select' : '' }} >Active</option>
                            <option value="0" {{ old('status',$comment->status) == '0' ? 'select' : '' }} >InActive</option>
                        </select>
                        <input type="text" name="status" value="{{ old('status',$comment->status) }}" class="form-control">
                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

            </div>

            <div class="row">
                <div  class="col-12">
                        <label for="comment">comment</label>
                        <textarea type="text" name="comment" class="form-control" rows="5">{{ old('comment',$comment->comment) }}</textarea>
                        @error('comment')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-group pt-4">
                <button type="submit" class="btn btn-primary" >Update comment</button>
            </div>
           </form>
        </div>
    </div>

@endsection

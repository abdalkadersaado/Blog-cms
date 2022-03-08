@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Edit tag ({{ $tag->name }})</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.post_tags.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">Tags</span>
                </a>
            </div>
        </div>
        <div class="card-body">

                <form action="{{ route('admin.post_tags.update',$tag->id) }}" method="post">
                @csrf
                @method('PATCH')

                <div class="row">
                    <div class="col-12">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ old('name',$tag->name) }}" class="form-control">
                                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name_en">Name English</label>
                                <input type="text" name="name_en" value="{{ old('name_en',$tag->name_en) }}" class="form-control">
                                @error('name_en')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group pt-4">
                <button type="submit" class="btn btn-primary" >Update tag</button>
            </div>
            </form>
        </div>
    </div>

@endsection

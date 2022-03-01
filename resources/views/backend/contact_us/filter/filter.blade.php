<div class="card-body">
    {!! Form::open(['route' => 'admin.contact_us.index', 'method' => 'get']) !!}
    <div class="row">
        <div class="col-2">
            <div class="form-group">
                {!! Form::text('keyword', old('keyword', request()->input('keyword')), ['class' => 'form-control', 'placeholder' => __('BackEnd/contact_us.search_here')]) !!}
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                {!! Form::select('status', ['' => '---', '1' => __('BackEnd/contact_us.read'), '0' => __('BackEnd/contact_us.new')], old('status', request()->input('status')), ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                {!! Form::select('sort_by', ['' => '---', 'name' => __('BackEnd/contact_us.name'), 'title' => __('BackEnd/contact_us.title') , 'created_at' => __('BackEnd/contact_us.created_at')], old('sort_by', request()->input('sort_by')), ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                {!! Form::select('order_by', ['' => '---', 'asc' => __('BackEnd/contact_us.ascending'), 'desc' => __('BackEnd/contact_us.descending')], old('order_by', request()->input('order_by')), ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-1">
            <div class="form-group">
                {!! Form::select('limit_by', ['' => '---', '10' => '10', '20' => '20', '50' => '50', '100' => '100'], old('limit_by', request()->input('limit_by')), ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-2"></div>
        <div class="col-1">
            <div class="form-group">
                {!! Form::button('Search', ['class' => 'btn btn-link', 'type' => 'submit']) !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>

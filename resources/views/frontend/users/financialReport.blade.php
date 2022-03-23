@extends('layouts.app')
@section('content')
 <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
        @include('partial.frontend.users.sidebar')
</div>
<div class="col-lg-9 col-12">

        <h3>Financial Report Information</h3>
            @if ($financial_file === null)
                        <div class="col-3">
                            <div class="form-group">
                            <img src="" width="60">
                        </div>
                        </div>
                    </div>
            @else
                @forelse ($financial_file as $f_file)

                    <div class="col-4">
                        <div class="forn-control">
                            <p>{{ $f_file->financial  }}</p>
                        <a class="btn btn-outline-success btn-sm"
                            href="{{ url('View_file') }}/{{ $f_file->upload_to }}/{{ $f_file->financial }}"
                            target="_blank"
                            ><i class="fas fa-eye"></i>&nbsp;
                            Show File
                        </a>
                        <a class="btn btn-outline-info btn-sm"
                                href="{{ url('download') }}/{{ $f_file->upload_to  }}/{{ $f_file->financial }}">
                                <i class="fas fa-download"></i>&nbsp;
                                Download File
                        </a>
                        <a class="btn btn-outline-info btn-sm"
                             href="{{ route('users.show_financial_report',$f_file->id) }}">
                             <i class="fas fa-download"></i>&nbsp;
                             Open Comments
                        </a>
                        </div>

                    </div>
                @empty
                <br>
                <h5 class="text-center">No Financial Report found</h5>
                @endforelse
            @endif
</div>

@endsection

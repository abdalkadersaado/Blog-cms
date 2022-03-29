@extends('layouts.admin')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('BackEnd/user.User') }} ({{ $user->name }})</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">{{ __('BackEnd/user.users') }}</span>
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <td colspan="4">
                            @if ($user->user_image != '')
                                <img src="{{ asset('assets/users/' . $user->user_image) }}" class="img-fluid">
                            @else
                                <img src="{{ asset('assets/users/default.png') }}" class="img-fluid">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>{{ __('BackEnd/user.name') }} </th>
                        <td>{{ $user->name }} ({{ $user->username }})</td>
                        <th>{{ __('BackEnd/user.email') }}</th>
                        <td>{{ $user->email }}</td>
                        <th></th>
                        <td></td>
                        <th></th>
                        <td></td>
                        <th></th>
                        <td></td>

                    </tr>
                    <tr>
                        <th>{{ __('BackEnd/user.mobile') }} </th>
                        <td>{{ $user->mobile }}</td>
                        <th>{{ __('BackEnd/user.status') }} </th>
                        <td>{{ $user->status() }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('BackEnd/user.created_at') }} </th>
                        <td>{{ $user->created_at->format('d-m-Y h:i a') }}</td>

                    </tr>
                     <tr>
                        <th>Company Name </th>
                        <td>{{ $user->company_name }}</td>
                        <th>Trade License Number: </th>
                        <td>{{ $user->license_number }}</td>
                        <th>  </th>
                        <td> </td>
                        <th> </th>
                        <td> </td>
                        <th>  </th>
                        <td>    </td>
                        <th>Trade License Number: </th>

                        <td>
                             <a class="btn btn-outline-success btn-sm btn_submit"
                                href="{{ url('view-trade-license') }}/{{ $user->id }}/{{ $user->Commercial_Register }}"
                                target="_blank"
                                ><i class="fas fa-eye"></i>&nbsp;
                                Show Trade License
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <th>Contract Approval Date</th>
                        <td>{{ $user->date_contract }}</td>
                        <th>  </th>
                        <td> </td>
                        <th> </th>
                        <td> </td>
                        <th>  </th>
                        <td>    </td>
                        <th>  </th>
                        <td>    </td>
                        <th>Contract Attachment: </th>
                        <td>
                             <a class="btn btn-outline-success btn-sm btn_submit"
                                href="{{ url('view-contract') }}/{{ $user->id}}/{{ $user->contract_pdf }}"
                                target="_blank"
                                ><i class="fas fa-eye"></i>&nbsp;
                                Show file  Contract
                            </a>
                        </td>
                    </tr>

                     <tr>
                        <th>About the Owner</th>
                        <td></td>
                         <th>Passport Number:</th>
                        <td>{{ $user->passport_number }}</td>
                        <th>Expiry Date:</th>
                        <td>{{ $user->expiry_date_passport }}</td>
                        <th>ID Number:</th>
                        <td>{{ $user->id_number }}</td>
                        <th>Expiry Date:</th>
                        <td>{{ $user->expiry_date }}</td>

                        <th> Visa attachement</th>
                        <td>
                             <a class="btn btn-outline-success btn-sm btn_submit"
                            href="{{ url('view-visa') }}/{{ $user->id }}/{{ $user->emirates_id }}"
                            target="_blank"
                            ><i class="fas fa-eye"></i>&nbsp;
                            Show File Visa
                        </a>
                        </td>
                    </tr>

                     <tr>

                        <th>Status Order </th>
                        <td>
                            @if($user->status_order == 1)
                            <td>Under Processing</td>
                            @elseif ($user->status_order == 2 )
                                <td>Accepted</td>
                            @else
                            <td>null</td>
                            @endif
                        </td>

                        <th> </th>
                        <td> </td>
                        <th> </th>
                        <th> Change Status Order</th>
                        <td>

                                @if($user->status_order == 1)
                                <form action="{{ route('admin.order.accepted',$user->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success btn-sm btn_submit"> Tanslate to Accepted</button>
                                </form>
                            @else
                                <form action="{{ route('admin.order.under_processing',$user->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success ">Translate to under processing</button>
                                </form>
                            @endif
                        </td>
                        <td> </td>
                        <th> </th>
                        <td> </td>
                        <td> </td>


                    </tr>

                    <tr>

                        <th>upload financial Report</th>
                        <td>
                            <form action="{{ route('users.financial.store',$user->id) }}"  method="Post" autocomplete="off" enctype="multipart/form-data">
                                @csrf

                                <h3>Financial Report Information</h3>
                                <br>
                                <hr>
                                <div class="row">

                                        <div class="form-group">
                                            <label for="financial_report1">Financial Report PDF</label>
                                        <input type="file" name="financial_report1" class="form-control">
                                            @error('financial_report1')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>

                                </div>

                                <div class="row">
                                        <div class="form-group">
                                            <button type="submit" name="update_information" class="btn btn-primary">Upload Financial Report</button>
                                        </div>

                                </div>

                                </form>
                        </td>

                        <th>Display financial report</th>
                        <td>


                            @if ($financial_file === null)
                                <div class="col-3">
                                    <div class="form-group">
                                    <img src="" width="60">
                                    </div>
                                </div>

                            @else
                                @foreach ($financial_file as $f_file)
                                            <td>
                                                <p>{{ $f_file->user->name  }}</p>

                                             <button href="javascript:void(0)"
                                                onclick="if (confirm('Are you sure to delete this file?') ) { document.getElementById('user-delete-{{ $f_file->id }}').submit(); } else { return false; }"
                                                class="btn btn-outline-success btn-sm btn_submit"><i class="fa fa-trash"></i>
                                                Delete
                                            </button>
                                            <form action="{{ route('users.delete_file', $f_file->id) }}" method="post" id="user-delete-{{ $f_file->id }}" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                            </form>

                                            <a class="btn btn-outline-success btn-sm btn_submit"
                                                href="{{ url('View_file') }}/{{ $f_file->upload_to }}/{{ $f_file->financial }}"
                                                target="_blank"
                                                ><i class="fas fa-eye"></i>&nbsp;
                                                View
                                            </a>
                                            <a class="btn btn-outline-info btn-sm btn_submit"
                                                    href="{{ url('download') }}/{{ $f_file->upload_to  }}/{{ $f_file->financial }}">
                                                    <i class="fas fa-download"></i>&nbsp;
                                                    Download
                                            </a>


                                            <a class="btn btn-outline-info btn-sm btn_submit"
                                                    href="{{ route('admin.show_financial_report',$f_file->id) }}">
                                                    <i class="fas fa-comment"></i>&nbsp;
                                                    Comments
                                            </a>
                                            </td>


                                    <hr>
                                @endforeach

                            @endif
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

@endsection


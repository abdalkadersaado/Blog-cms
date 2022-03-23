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
        		<!-- Main content -->
	<section class="content">
		  <div class="row">


        <div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>order Details</strong> </h4>
		          </div>


                    <table class="table">
                        <tr>
                        <th>  Emirates ID : </th>
                        <th> </th>
                        </tr>

                        <tr>
                        <th> ID Number : </th>
                        <th> {{ $user->id_number }} </th>
                        </tr>

                        <tr>
                        <th> expiry_date : </th>
                        <th> {{ $user->expiry_date }} </th>
                        </tr>

                        <tr>
                        <th> passport_image : </th>
                        <th>  </th>
                        </tr>

                        <tr>
                        <th> passport_number : </th>
                        <th> {{ $user->passport_number }} </th>
                        </tr>

                        <tr>
                        <th> release_date : </th>
                        <th>{{ $user->release_date }} </th>
                        </tr>

                        <tr>
                        <th> expiry_date_passport : </th>
                        <th> {{ $user->expiry_date_passport }} </th>
                        </tr>

                    </table>



				</div>
		</div> <!--  // cod md -6 -->


            <div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Order Details</strong><span class="text-danger"> User : {{ $user->name }} </span></h4>
				  </div>


                    <table class="table">
                       <tr>
                        <th> company_name : </th>
                        <th> {{ $user->company_name }} </th>
                        </tr>

                        <tr>
                        <th> license_number : </th>
                        <th> {{ $user->license_number }} </th>
                        </tr>
                        <tr>
                        <th> Commercial_Register : </th>
                        <th> {{ $user->Commercial_Register }} </th>
                        </tr>
                        <tr>
                        <th> contract_pdf : </th>
                        <th>  </th>
                        </tr>

                         <tr>
                        <th> about_company : </th>
                        <th> {{ $user->about_company }} </th>
                        </tr>
                         <tr>
                        <th> about_owner_company : </th>
                        <th> {{ $user->about_owner_company }} </th>
                        </tr>

                        <tr>
                        <th> partners_company : </th>
                        <th> {{ $user->partners_company }} </th>
                        </tr>

                        <tr>
                        <th> assign_editor : </th>
                        <th>{{ $user->assign_editor }}

                        </th>
                        </tr>
                        <tr>
                        <th> Order : </th>
                        <th>
                            <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $user->status }} </span> </th>
                        </tr>


                        <tr>
                        <th>  </th>
                        <th>
                            {{-- @if($order->status == 'pending')
                            <a href="{{ route('pending-confirm',$order->id) }}" class="btn btn-block btn-success" id="confirm">Confirm Order</a>

                            @elseif($order->status == 'confirm')
                            <a href="{{ route('confirm.processing',$order->id) }}" class="btn btn-block btn-success" id="processing">Processing Order</a>

                            @elseif($order->status == 'processing')
                            <a href="{{ route('processing.picked',$order->id) }}" class="btn btn-block btn-success" id="picked">Picked Order</a>

                            @elseif($order->status == 'picked')
                            <a href="{{ route('picked.shipped',$order->id) }}" class="btn btn-block btn-success" id="shipped">Shipped Order</a>

                            @elseif($order->status == 'shipped')
                            <a href="{{ route('shipped.delivered',$order->id) }}" class="btn btn-block btn-success" id="delivered">Delivered Order</a>

                            @endif --}}

                            </th>
                        </tr>



                    </table>
			    </div>
			</div> <!--  // cod md -6 -->
  <!--  // cod md -12 -->

		</div>
		  <!-- /. end row -->
		</section>

    </div>

@endsection

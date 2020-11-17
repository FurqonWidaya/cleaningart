@extends('master.layouts.master')
<style>
		.modal-dialog {
		    flex: initial;
		}
		</style>
<section class="inner-intro bg-img light-color overlay-before parallax-background">
  <div class="container">
    <div class="row title">
      <div class="title_row">
        <h1 data-title="Service"><span>Order Paket</span></h1>
        <div class="page-breadcrumb">
          <a href="{{url('/home')}}">Home</a>/ <span>Order Paket</span>
        </div>

      </div>

    </div>
  </div>
</section>
<!-- Modal -->
    <div class="modal fade" id="pilihart" tabindex="-5" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Pilih ART</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
         </div>
    <div class="modal-body">
    <form action="#" method="POST" enctype="multipart/form-data" name="form">
        	{{csrf_field()}}
        <div class="form-group ">
        	@for($i = 0; $i < 4; $i++ )
        	<input type="checkbox" name="vehicle1" value="Bike" id="cek">
  			<label for="cek" >hallo <span>I have a bike</span> </label><br>
  			@endfor
        </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
      </form>
    </div>
         </div>
      </div>
    </div>
@section('content')
<section class="padding ptb-xs-40">
				<div class="romana_chect_out_form_area sp">
					<div class="container">
						<form action="{{url('/paket/order/.$order->id')}}">
							<div class="romana_check_out_form">
								<div class="row">
									<div class="col-lg-8">
										<div class="check_form_left common_input">
											<div class="heading-box pb-30">
												<h2><span>Detail&nbsp;</span>Pesanan</h2>
												<span class="b-line l-left"></span>
											</div>

											<div class="row">
												<div class="col-sm-6">

													<span>Nama:</span>
													<input type="text" name="name" value="{{auth()->user()->masters->name}}" readonly="">
												</div>
												<div class="col-sm-6">
													<span>Username:</span>
													<input type="text" name="username" value="{{auth()->user()->username}}" readonly="">
												</div>
											</div>
											
										
												<div class="row">
												<div class="col-sm-6">
													<span>kecamatan:</span>
													<input type="text" name="kecamatan" value="{{auth()->user()->masters->kecamatan}}" placeholder="silahkan isi kecamatan">
												</div>
												<div class="col-sm-6">
													<span>Kodepos:</span>
													<input type="text" name="kodepos" value="{{auth()->user()->masters->kodepos}}" placeholder="silahkan isi kodepos">
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<span>Alamat:</span>
													<textarea class="col-sm-12" name="alamat" placeholder="silahkan isi alamat">{{auth()->user()->masters->alamat}}</textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="check_form_right bg-color light-color">
											<div class="heading-box pb-15 ">
												<h2><span>your</span> order</h2>
												<span class="b-line l-left secondary_bg"></span>

											</div>

											<div class="product_order">
												<ul>
													<li>
														Nama Paket<span>Harga</span>
													</li>
													<li>{{$data_paket->nama_paket}}
														<span>
													Rp {{$data_paket->harga_paket}}</span>
													</li>
													
													<li>
														total:<span>Rp {{$data_paket->harga_paket}}</span>
													</li>
													<!-- <li>

														<button  type="button" class="btn btn-danger btn-rounded btn-outline
   hidden-xs hidden-sm waves-effect waves-light" data-toggle="modal" data-target="#pilihart">Pilih ART: </button><span><h4> Paimin</h4></span>
													</li> -->
													<li>
														Pilih ART:<span>
															<select name="id_art" class="form-control mb-25" style="color: #000; background-color: #479c18"> 
															<option value="">
																- pilih -
															</option>
															@foreach($art as $item)
															<option value="{{$item->id}}">
																{{$item->name}}
															</option>
															@endforeach
															</select> 
														</span>
													</li>
												</ul>
											</div>
											<div class="romana_select_method border" style="    margin-top: 60px;">
												<ul class="mb-20" style="padding: 10px">
													Pilih Bank:
													<li>
														@foreach($bank as $item)
														<input type="radio"  name="pajak_id" value="{{$item->id}}">
														<label>{{$item->bank}}</label>
														@endforeach
													</li>
												</ul>
												
											</div>
											<div class="text-center pt-15" >
											<button class="btn-text white-btn ">CheckOut</button> </div>
										</div>
									</div>
								</div>
							</div>
						</form>
						<!-- column End -->
					</div>
					<!-- container End -->
				</div>
			</section>

			<!--End Contact-->
			
@endsection

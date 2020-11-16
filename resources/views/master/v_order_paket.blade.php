@extends('master.layouts.master')
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
@section('content')
<section class="padding ptb-xs-40">
				<div class="romana_chect_out_form_area sp">
					<div class="container">
						<form action="#">
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
													<li>
														<button style="color: #17202A " >Pilih ART: </button><span></span>
													</li>
												</ul>
											</div>
											<div class="romana_select_method ">
												<ul class="mb-40">
													Pilih Bank:
													<li>
														<input type="radio" id="option1" name="BRI">
														<label for="option1">BRI</label>
													</li>
													<li>
														<input type="radio" id="option2" name="BNI" checked="">
														<label for="option2">BNI</label>
													</li>
													<li>
														<input type="radio" id="option3" name="MANDIRI" checked="">
														<label for="option3">MANDIRI</label>
													</li>
												</ul>
												<a href="#" class="btn-text white-btn">place order</a>
											</div>
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

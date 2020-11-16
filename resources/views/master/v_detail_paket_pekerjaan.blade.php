@extends('master.layouts.master')
<section class="inner-intro bg-img light-color overlay-before parallax-background">
			<div class="container">
				<div class="row title">
					<div class="title_row">
						<h1 data-title="Cart"><span>Cart</span></h1>
						<div class="page-breadcrumb">
							<a>Home</a>/ <span>Cart</span>
						</div>

					</div>

				</div>
			</div>
		</section>
			<!-- End Intro Section -->
@section('content')
			<section class="padding ptb-xs-40">
				<div class="cart_page_area sp100">
					<div class="container">
						<div class="cart_table_wraper">
							<div class="row">
								<div class="col-md-12">
									<div class="cart_wrpaer">
										<div class="table_scroll table-responsive">
											<table class=" table table-striped">
												<thead class="dark-bg">
													<tr>
														<th><span>Paket</span></th>
														<th><span>Description</span></th>
														<th><span>Price</span></th>
														<th><span>Total</span></th>
														<th><span></span></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><img class="img-rounded" src="{{}}" alt=""></td>
														<td class="padding_all">
														<p>
															Finance Book
														</p></td>
														<td class="padding_all">
														<p>
															$ 59.99
														</p></td>
														<td class="padding_all">
														<div class="cart_amount_wrap">
															<div class="product-regulator">
																<button class="minus" type="button">
																	<i class="fa fa-minus"></i>
																</button>
																<div class="output">
																	0
																</div>
																<button class="plus" type="button">
																	<i class="fa fa-plus"></i>
																</button>
															</div>
														</div></td>
														<td class="padding_all">
														<p>
															$ 59.99
														</p></td>
														<td class="padding_all"><a href="#"><i class="fa fa-times"></i></a></td>
													</tr>
													
												</tbody>
											</table>
											<!-- table End -->
										</div>
										<div class="row cart_btns">
											<div class="col-md-8">
												<form action="#">
													<input type="text" placeholder="Coupon Code" class="common_btn cart_page_btn1" name="coupon">
												</form>
												<a class="cart_page_btn2 btn-text  hvr-bounce-to-right" href="#">Apply coupon</a>
											</div>
											<!-- column End -->
											<div class="col-md-4 text-md-right">
												<a class="btn-text secondary_bg mt-xs-20" href="#">Continue Shopping </a>
											</div>
											<!-- column End -->
										</div>
										<!-- cart_btns End -->
									</div>
								</div>
								<!-- column End -->
							</div>
							<!-- row End -->
							<div class="row">
								<div class="col-lg-6 offset-lg-6">
									<div class="cart_totals_area gray-bg">

										<ul>
											<li>
												Subtotal <span>$29.99</span>
											</li>
											<li>
												Shipping Charge<span>free</span>
											</li>
											<li>
												<strong>Total</strong><span><strong> $ 59.99 </strong></span>
											</li>
										</ul>
										<a class="btn-text pull-right" href="checkout.html">Proceed To Checkout</a>
									</div>
								</div>
								<!-- column End -->
							</div>
							<!-- row End -->
						</div>
					</div>
					<!-- container End -->
				</div>

			</section>

			<!--End Contact-->
@endsection

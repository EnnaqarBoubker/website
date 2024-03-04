@extends("layouts.front-master")

@section("content-main")
	<main>
		<section id="hero_in" class="contacts">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>اتصل الان بمركـــز مقــــداد</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->
		<div class="contact_info">
			<div class="container">
				<ul class="clearfix">
					<li>
						<i class="pe-7s-map-marker"></i>
						<h4> العنــوان</h4>
						<span> مراكــش, المــغرب</span>
					</li>
					<li>
						<i class="pe-7s-mail-open-file"></i>
						<h4> البريد الكترونـــي</h4>
						<span> contact@centremikdad.com</span>

					</li>
					<li>
						<i class="pe-7s-phone"></i>
						<h4>هاتف الواتــساب</h4>
						<span> +212 6 84 50 54 42</span>
					</li>
				</ul>
			</div>

		</div>
		<!--/contact_info-->

		<div class="bg_color_1">
			<div class="container margin_120_95">
				<div class="row justify-content-between">
					<div class="col-lg-3"></div>
					<div class="col-lg-6">
						<h4>إبعث رسالة من هنـــا</h4>
						<p>نحن هنا للتواصل معكم والإجـــــــابة على أسئلتكم، ومستعدون لمناقشة اقتراحاتكـــــم.</p>
						<div id="message-contact"></div>
						<form method="post" action="{{ url("contactus") }}" autocomplete="off">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-md-12">
									<span class="input">
										<input class="input_field" type="text" required id="nom" name="name">
										<label class="input_label">
											<span class="input__label-content">الاسم الكــامل</span>
										</label>
									</span>
								</div>

							</div>
							<!-- /row -->
							<div class="row">
								<div class="col-md-6">
									<span class="input">
										<input class="input_field" type="text" required id="phone" name="tel">
										<label class="input_label">
											<span class="input__label-content">رقم الهاتف</span>
										</label>
									</span>
								</div>
								<div class="col-md-6">
									<span class="input">
										<input class="input_field" type="email" id="email" name="email">
										<label class="input_label">
											<span class="input__label-content">البريد الكتروني</span>
										</label>
									</span>
								</div>

							</div>
							<!-- /row -->
							<span class="input">
									<textarea class="input_field" id="message" required name="message" style="height:90px;"></textarea>
									<label class="input_label">
										<span class="input__label-content">اكتب رسالتك هنا</span>
									</label>
							</span>
							{{--							<span class="input">--}}
							{{--									<input class="input_field" type="text" id="verify_contact" name="verify_contact">--}}
							{{--									<label class="input_label">--}}
							{{--									<span class="input__label-content">Vous êtes humain? 3 + 1 =</span>--}}
							{{--									</label>--}}
							{{--							</span>--}}
							<p class="add_top_30"><input type="submit" value="ارســـال" class="btn_1 rounded" ></p>
						</form>
					</div>
					<div class="col-lg-3"></div>
				</div>
				<!-- /row -->
				<div class="row">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13586.882592556127!2d-8.009174!3d31.6414982!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7bef09ac6418606b!2scentre%20mikdad%20de%20formation%20coaching!5e0!3m2!1sfr!2sma!4v1622586947042!5m2!1sfr!2sma" width="100%" style="border:2px solid #a29178; height: 350px" allowfullscreen="" loading="lazy"></iframe>
				</div>
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
	</main>
@endsection
<!-- /main -->

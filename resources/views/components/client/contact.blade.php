<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container px-0">
            <div class="row no-gutters block-9">
                <div class="col-lg-6 order-md-last">
                    <form action="{{ route('message.feedback') }}" method="post" class="bg-info p-5 contact-form">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Họ tên">
                            @error('name')
                            <span class="invalid-feedback d-inline" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback d-inline" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="" cols="30" rows="7" class="form-control @error('message') is-invalid @enderror" placeholder="Tin nhắn"></textarea>
                            @error('message')
                            <span class="invalid-feedback d-inline" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Gửi" class="btn btn-white cbtn py-3 px-5" style="border: none !important;">
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 d-flex">
                    <div id="map" class="bg-light"></div>
                </div>
            </div>
            <div class="row d-flex mb-5 px-4 px-md-4 contact-info mt-5">
                <div class="col-md-12 mb-4">
                    <h2 class="h3" style="color: #1C84BC;">Thông tin liên hệ</h2>
                </div>
                <div class="w-100"></div>
                <div class="col-lg-6 col-xl-3 mb-4">
                    <div class="info">
                        <p><span style="color: #1C84BC">Đại chỉ:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 mb-4">
                    <div class="info">
                        <p><span style="color: #1C84BC">Điện thoại:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 mb-4">
                    <div class="info">
                        <p><span style="color: #1C84BC">Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 mb-4">
                    <div class="info">
                        <p><span style="color: #1C84BC">Website</span> <a href="#">{{ config('app.url', 'http://hello-world.epizy.com') }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->

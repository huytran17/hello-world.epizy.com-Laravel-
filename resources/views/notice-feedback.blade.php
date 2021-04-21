<x-client.home>
    <x-slot name="title">
        Thông báo
    </x-slot>
    <x-slot name="content">
        <div id="colorlib-main">
            <section class="ftco-section ftco-no-pt ftco-no-pb">
                <div class="container px-0">
                    <div class="row no-gutters">
                    	<div class="notice">
		                    <div class="card">
		                        <div class="card-header">
		                            <h5 class="card-title">Cảm ơn bạn!</h5>
		                        </div>
		                        <div class="card-body">
		                            <div class="card-text">
		                            	<p>Xin chào {{ $name }},</p>
				                        <p>Cảm ơn bạn rất nhiều vì đã dành thời gian để gửi tin nhắn này! Mọi người ở đây ({{ config('app.name') }}) đều mong muốn rằng bạn sẽ hài lòng với những gì chúng tôi làm. Chúng tôi luôn cố gắng hết sức để làm cho trải nghiệm của bạn trở nên đáng nhớ và chúng tôi rất vui vì đã đạt được điều đó!</p>
				                        <p>Chúng tôi hy vọng bạn sẽ giúp {{ config('app.name') }} chia sẻ những điều tốt đẹp đến với tất cả mọi người!</p>
				                        <p>Cảm ơn bạn một lần nữa! Chúc bạn một ngày tràn ngập niềm vui!</p>
				                    </div>
		                        </div>
		                        <div class="card-footer">
		                            <a href="" onclick="event.preventDefault(); window.history.back();">Về trang trước</a>
		                        </div>
		                    </div>
		                </div>
                    </div>
                </div>
            </section>
        </div>
    </x-slot>
</x-client.home>

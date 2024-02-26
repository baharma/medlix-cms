<div class="pt-10 pt-sm-20 z-index-2" id="team">
    <div class="container">
        <div class="tns tns-default">
            <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000"
                data-tns-autoplay="true" data-tns-autoplay-timeout="5000" data-tns-controls="true" data-tns-nav="false"
                data-tns-items="1" data-tns-center="false" data-tns-dots="false"
                data-tns-prev-button="#kt_team_slider_prev1" data-tns-next-button="#kt_team_slider_next1">
                @foreach ($slider as $item)
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="{{ $item['image'] }}" class="card-rounded shadow mh-lg-650px mw-100" alt="" />
                    </div>
                @endforeach
            </div>
            <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev1">
                <i class="ki-duotone ki-left fs-2x"></i>
            </button>
            <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next1">
                <i class="ki-duotone ki-right fs-2x"></i>
            </button>
        </div>
    </div>
</div>

<section class="left-text-sec overlay-dark-gradient padding-tb-120" style="background-image:url({{ $sectionDetail->image_url ?? config('constants.section_image_default.our_founder_banner_one') }})">
    <div class="container position-relative z-10">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="section-head text-white">
                    <h2 class="text-white">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h2>
                    {!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}
                    <div class="button-group">
                        <a class="custom-btn outline-color-azul" href="javascript:void(0)" id="joinMyTeam-btn-banner">{{ $allKeysProvider['join_my_team'] ?? 'Join My Team'}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
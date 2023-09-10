<div>
    @if ($teamMembers->count() > 0)
        <section class="meet-our-team padding-tb-120 bg-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-sm-12">
                        <div class="section-head text-center mw-100">
                            <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h2>
                            <div class="discription">
                                <p>{!! $sectionDetail ? ucwords($sectionDetail->discription) : '' !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gap-24">
                    @foreach ($teamMembers as $member)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="team-member-list">
                                <div class="team-member-img">
                                    <img src="{{ $member->image_url }}" alt="surgetrader-team">
                                </div>
                                <div class="team-member-text">
                                    <div class="team-member-head text-center">
                                        <h4 class="mb-20">{{ ucfirst($member->name) }}</h4>
                                        <p>{!! $member->designation !!}</p>
                                    </div>
                                    <div class="team-member-social">
                                        <ul>
                                            <li><a
                                                    href="{{ getSetting('facebook') ? getSetting('facebook') : 'javascript:void(0);' }}"><img
                                                        src="{{ asset('images/surgetrader-team/facebook.svg') }}"
                                                        alt="facebook"></a></li>
                                            <li><a
                                                    href="{{ getSetting('twitter') ? getSetting('twitter') : 'javascript:void(0);' }}"><img
                                                        src="{{ asset('images/surgetrader-team/twitter.svg') }}"
                                                        alt="twitter"></a></li>
                                            <li><a
                                                    href="{{ getSetting('instagram') ? getSetting('instagram') : 'javascript:void(0);' }}"><img
                                                        src="{{ asset('images/surgetrader-team/instagram.svg') }}"
                                                        alt="instagram"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $teamMembers->links('vendor.pagination.custom') }}
            </div>
        </section>
    @endif
</div>

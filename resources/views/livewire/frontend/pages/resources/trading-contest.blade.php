<div class="outer-inner-container">
    @if($pageDetail)
    <section class="other-page-banner ovarlay-color" style="background-image: url({{$pageDetail && $pageDetail->image_url ? $pageDetail->image_url :  config('constants.banner_image_default.other') }});">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : 'Title' }}</h1>
                        <div class="discription text-white body-font-large mb-0">
                            <p>{{ $pageDetail ? ucwords($pageDetail->sub_title) : '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section class="bg-light-white blog-latest padding-tb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="section-head">
                        <h2 class="fw-700">contest list</h2>
                        <div class="discription mb-0">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 align-self-end">
                    <div class="d-flex justify-content-end trading-contest-filters">
                        <button class="filter-button custom-btn fill-btn" data-filter="all">All</button>
                        <button class="filter-button custom-btn" data-filter="finished">Finished</button>
                        <button class="filter-button custom-btn" data-filter="upcoming">Upcoming</button>
                    </div>
                </div>
            </div>
            <div class="blog-list">
                <div class="row gap-24">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12 filter upcoming">
                        <div class="trading-contest-dateils">
                            <div class="trading-contest-trophy">
                                <img src="{{asset('images/trading-contest/trophy.svg')}}" alt="trophy">
                            </div>
                            <h4 class="text-white text-center">July Trading Contest</h4>
                            <div class="demo-box body-font-small">
                                Demo
                            </div>
                            <div class="contest-name">Upcoming</div>
                            <div class="contestants-boxes">
                                <ul>
                                    <li>
                                        <div class="prize-inner">
                                            <div class="img-price">
                                                <img src="{{asset('images/trading-contest/money.png')}}">
                                            </div>
                                            <div class="prize-text">
                                                <p class="body-font-small"><strong>Auditions + Cash</strong> Prize Pool</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="prize-inner">
                                            <div class="img-price">
                                                <img src="{{asset('images/trading-contest/contestants.png')}}">
                                            </div>
                                            <div class="prize-text">
                                                <p class="body-font-small"><strong>2347</strong> Contestants</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="time-contest">
                                <div class="time-contest-inner">
                                    <p class="body-font-small fw-700 text-center text-white">Time Until Start</p>
                                    <div class="counter-main">
                                        <div class="counter-outer">
                                            <div class="main-time"><span id="days"></span>Day</div>
                                        </div>
                                        <div class="counter-outer">
                                            <div class="main-time"><span id="hours"></span>HR</div>
                                        </div>
                                        <div class="counter-outer">
                                            <div class="main-time"><span id="minutes"></span>Min</div>
                                        </div>
                                        <div class="counter-outer">
                                            <div class="main-time"><span id="seconds"></span>Sec</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contest-buttons">
                                <a href="#" class="custom-btn"><span>Rules</span></a>
                                <a href="#" class="custom-btn"><span>Register</span></a>
                            </div>
                            <div class="contest-full-btn">
                                <a href="#" class="custom-btn fill-gradient">Standings</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12 filter finished">
                        <div class="trading-contest-dateils">
                            <div class="trading-contest-trophy">
                                <img src="{{asset('images/trading-contest/trophy.svg')}}" alt="trophy">
                            </div>
                            <h4 class="text-white text-center">July Trading Contest</h4>
                            <div class="demo-box body-font-small">
                                Demo
                            </div>
                            <div class="contest-name">Finished</div>
                            <div class="contestants-boxes">
                                <ul>
                                    <li>
                                        <div class="prize-inner">
                                            <div class="img-price">
                                                <img src="{{asset('images/trading-contest/money.png')}}">
                                            </div>
                                            <div class="prize-text">
                                                <p class="body-font-small"><strong>Auditions + Cash</strong> Prize Pool</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="prize-inner">
                                            <div class="img-price">
                                                <img src="{{asset('images/trading-contest/contestants.png')}}">
                                            </div>
                                            <div class="prize-text">
                                                <p class="body-font-small"><strong>2347</strong> Contestants</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="time-contest">
                                <div class="time-contest-inner">
                                    <p class="body-font-small text-white">Time Until Start</p>
                                    <h4 class="text-white mb-0">April 28th - 2023</h4>
                                </div>
                            </div>
                            <div class="contest-buttons">
                                <a href="#" class="custom-btn"><span>Rules</span></a>
                                <a href="#" class="custom-btn"><span>Register</span></a>
                            </div>
                            <div class="contest-full-btn">
                                <a href="#" class="custom-btn fill-gradient">Standings</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12 filter finished">
                        <div class="trading-contest-dateils">
                            <div class="trading-contest-trophy">
                                <img src="{{asset('images/trading-contest/trophy.svg')}}" alt="trophy">
                            </div>
                            <h4 class="text-white text-center">July Trading Contest</h4>
                            <div class="demo-box body-font-small">
                                Demo
                            </div>
                            <div class="contest-name">Finished</div>
                            <div class="contestants-boxes">
                                <ul>
                                    <li>
                                        <div class="prize-inner">
                                            <div class="img-price">
                                                <img src="{{asset('images/trading-contest/money.png')}}">
                                            </div>
                                            <div class="prize-text">
                                                <p class="body-font-small"><strong>Auditions + Cash</strong> Prize Pool</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="prize-inner">
                                            <div class="img-price">
                                                <img src="{{asset('images/trading-contest/contestants.png')}}">
                                            </div>
                                            <div class="prize-text">
                                                <p class="body-font-small"><strong>2347</strong> Contestants</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="time-contest">
                                <div class="time-contest-inner">
                                    <p class="body-font-small text-white">Time Until Start</p>
                                    <h4 class="text-white mb-0">April 28th - 2023</h4>
                                </div>
                            </div>
                            <div class="contest-buttons">
                                <a href="#" class="custom-btn"><span>Rules</span></a>
                                <a href="#" class="custom-btn"><span>Register</span></a>
                            </div>
                            <div class="contest-full-btn">
                                <a href="#" class="custom-btn fill-gradient">Standings</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12 filter finished">
                        <div class="trading-contest-dateils">
                            <div class="trading-contest-trophy">
                                <img src="{{asset('images/trading-contest/trophy.svg')}}" alt="trophy">
                            </div>
                            <h4 class="text-white text-center">July Trading Contest</h4>
                            <div class="demo-box body-font-small">
                                Demo
                            </div>
                            <div class="contest-name">Finished</div>
                            <div class="contestants-boxes">
                                <ul>
                                    <li>
                                        <div class="prize-inner">
                                            <div class="img-price">
                                                <img src="{{asset('images/trading-contest/money.png')}}">
                                            </div>
                                            <div class="prize-text">
                                                <p class="body-font-small"><strong>Auditions + Cash</strong> Prize Pool</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="prize-inner">
                                            <div class="img-price">
                                                <img src="{{asset('images/trading-contest/contestants.png')}}">
                                            </div>
                                            <div class="prize-text">
                                                <p class="body-font-small"><strong>2347</strong> Contestants</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="time-contest">
                                <div class="time-contest-inner">
                                    <p class="body-font-small text-white">Time Until Start</p>
                                    <h4 class="text-white mb-0">April 28th - 2023</h4>
                                </div>
                            </div>
                            <div class="contest-buttons">
                                <a href="#" class="custom-btn"><span>Rules</span></a>
                                <a href="#" class="custom-btn"><span>Register</span></a>
                            </div>
                            <div class="contest-full-btn">
                                <a href="#" class="custom-btn fill-gradient">Standings</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12 filter finished">
                        <div class="trading-contest-dateils">
                            <div class="trading-contest-trophy">
                                <img src="{{asset('images/trading-contest/trophy.svg')}}" alt="trophy">
                            </div>
                            <h4 class="text-white text-center">July Trading Contest</h4>
                            <div class="demo-box body-font-small">
                                Demo
                            </div>
                            <div class="contest-name">Finished</div>
                            <div class="contestants-boxes">
                                <ul>
                                    <li>
                                        <div class="prize-inner">
                                            <div class="img-price">
                                                <img src="{{asset('images/trading-contest/money.png')}}">
                                            </div>
                                            <div class="prize-text">
                                                <p class="body-font-small"><strong>Auditions + Cash</strong> Prize Pool</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="prize-inner">
                                            <div class="img-price">
                                                <img src="{{asset('images/trading-contest/contestants.png')}}">
                                            </div>
                                            <div class="prize-text">
                                                <p class="body-font-small"><strong>2347</strong> Contestants</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="time-contest">
                                <div class="time-contest-inner">
                                    <p class="body-font-small text-white">Time Until Start</p>
                                    <h4 class="text-white mb-0">April 28th - 2023</h4>
                                </div>
                            </div>
                            <div class="contest-buttons">
                                <a href="#" class="custom-btn"><span>Rules</span></a>
                                <a href="#" class="custom-btn"><span>Register</span></a>
                            </div>
                            <div class="contest-full-btn">
                                <a href="#" class="custom-btn fill-gradient">Standings</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12 filter finished">
                        <div class="trading-contest-dateils">
                            <div class="trading-contest-trophy">
                                <img src="{{asset('images/trading-contest/trophy.svg')}}" alt="trophy">
                            </div>
                            <h4 class="text-white text-center">July Trading Contest</h4>
                            <div class="demo-box body-font-small">
                                Demo
                            </div>
                            <div class="contest-name">Finished</div>
                            <div class="contestants-boxes">
                                <ul>
                                    <li>
                                        <div class="prize-inner">
                                            <div class="img-price">
                                                <img src="{{asset('images/trading-contest/money.png')}}">
                                            </div>
                                            <div class="prize-text">
                                                <p class="body-font-small"><strong>Auditions + Cash</strong> Prize Pool</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="prize-inner">
                                            <div class="img-price">
                                                <img src="{{asset('images/trading-contest/contestants.png')}}">
                                            </div>
                                            <div class="prize-text">
                                                <p class="body-font-small"><strong>2347</strong> Contestants</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="time-contest">
                                <div class="time-contest-inner">
                                    <p class="body-font-small text-white">Time Until Start</p>
                                    <h4 class="text-white mb-0">April 28th - 2023</h4>
                                </div>
                            </div>
                            <div class="contest-buttons">
                                <a href="#" class="custom-btn"><span>Rules</span></a>
                                <a href="#" class="custom-btn"><span>Register</span></a>
                            </div>
                            <div class="contest-full-btn">
                                <a href="#" class="custom-btn fill-gradient">Standings</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12 filter finished">
                        <div class="trading-contest-dateils">
                            <div class="trading-contest-trophy">
                                <img src="{{asset('images/trading-contest/trophy.svg')}}" alt="trophy">
                            </div>
                            <h4 class="text-white text-center">July Trading Contest</h4>
                            <div class="demo-box body-font-small">
                                Demo
                            </div>
                            <div class="contest-name">Finished</div>
                            <div class="contestants-boxes">
                                <ul>
                                    <li>
                                        <div class="prize-inner">
                                            <div class="img-price">
                                                <img src="{{asset('images/trading-contest/money.png')}}">
                                            </div>
                                            <div class="prize-text">
                                                <p class="body-font-small"><strong>Auditions + Cash</strong> Prize Pool</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="prize-inner">
                                            <div class="img-price">
                                                <img src="{{asset('images/trading-contest/contestants.png')}}">
                                            </div>
                                            <div class="prize-text">
                                                <p class="body-font-small"><strong>2347</strong> Contestants</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="time-contest">
                                <div class="time-contest-inner">
                                    <p class="body-font-small text-white">Time Until Start</p>
                                    <h4 class="text-white mb-0">April 28th - 2023</h4>
                                </div>
                            </div>
                            <div class="contest-buttons">
                                <a href="#" class="custom-btn"><span>Rules</span></a>
                                <a href="#" class="custom-btn"><span>Register</span></a>
                            </div>
                            <div class="contest-full-btn">
                                <a href="#" class="custom-btn fill-gradient">Standings</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12 filter finished">
                        <div class="trading-contest-dateils">
                            <div class="trading-contest-trophy">
                                <img src="{{asset('images/trading-contest/trophy.svg')}}" alt="trophy">
                            </div>
                            <h4 class="text-white text-center">July Trading Contest</h4>
                            <div class="demo-box body-font-small">
                                Demo
                            </div>
                            <div class="contest-name">Finished</div>
                            <div class="contestants-boxes">
                                <ul>
                                    <li>
                                        <div class="prize-inner">
                                            <div class="img-price">
                                                <img src="{{asset('images/trading-contest/money.png')}}">
                                            </div>
                                            <div class="prize-text">
                                                <p class="body-font-small"><strong>Auditions + Cash</strong> Prize Pool</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="prize-inner">
                                            <div class="img-price">
                                                <img src="{{asset('images/trading-contest/contestants.png')}}">
                                            </div>
                                            <div class="prize-text">
                                                <p class="body-font-small"><strong>2347</strong> Contestants</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="time-contest">
                                <div class="time-contest-inner">
                                    <p class="body-font-small text-white">Time Until Start</p>
                                    <h4 class="text-white mb-0">April 28th - 2023</h4>
                                </div>
                            </div>
                            <div class="contest-buttons">
                                <a href="#" class="custom-btn"><span>Rules</span></a>
                                <a href="#" class="custom-btn"><span>Register</span></a>
                            </div>
                            <div class="contest-full-btn">
                                <a href="#" class="custom-btn fill-gradient">Standings</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                    <svg width="22" height="13" viewBox="0 0 22 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.3027 5.7313C20.7722 5.7313 21.1527 6.11186 21.1527 6.5813C21.1527 7.05074 20.7722 7.4313 20.3027 7.4313V5.7313ZM0.515647 7.18234C0.183701 6.85039 0.183701 6.3122 0.515647 5.98026L5.92501 0.570891C6.25696 0.238945 6.79515 0.238945 7.1271 0.570891C7.45904 0.902837 7.45904 1.44103 7.1271 1.77297L2.31877 6.5813L7.1271 11.3896C7.45904 11.7216 7.45904 12.2598 7.1271 12.5917C6.79515 12.9237 6.25696 12.9237 5.92501 12.5917L0.515647 7.18234ZM20.3027 7.4313H1.11669V5.7313H20.3027V7.4313Z"></path>
                                    </svg>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">01</a></li>
                            <li class="page-item active"><a class="page-link" href="#">02</a></li>
                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <svg width="22" height="13" viewBox="0 0 22 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.11719 5.7313C0.647745 5.7313 0.267187 6.11186 0.267187 6.5813C0.267187 7.05074 0.647745 7.4313 1.11719 7.4313V5.7313ZM20.9043 7.18234C21.2362 6.85039 21.2362 6.3122 20.9043 5.98026L15.4949 0.570891C15.163 0.238945 14.6248 0.238945 14.2928 0.570891C13.9609 0.902837 13.9609 1.44103 14.2928 1.77297L19.1012 6.5813L14.2928 11.3896C13.9609 11.7216 13.9609 12.2598 14.2928 12.5917C14.6248 12.9237 15.163 12.9237 15.4949 12.5917L20.9043 7.18234ZM1.11719 7.4313H20.3032V5.7313H1.11719V7.4313Z"></path>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="padding-tb-120 bg-white-to-offblue-gradient-color">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="section-head text-center">
                        <h2>stay informed about our contests</h2>
                        <div class="discription">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-sm-12">
                    <div class="form-outer">
                        <form>
                            <div class="grid-outer row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group position-relative">
                                        <img class="input-icon" src="{{asset('images/form-icon/email.svg')}}" alt="email">
                                        <input type="email" placeholder="Enter Email Address" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group position-relative">
                                        <input type="tel" id="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label text-jet-gray" for="exampleCheck1">I agree to the terms of the SurgeTrader <a href="#" class="text-azul">Privacy Policy</a> and to receive exclusive discounts, promos, and updates from SurgeTrader by SMS and email.*</label>
                            </div>
                            <div class="button-group justify-content-center">
                                <input type="submit" class="custom-btn outline-color-azul" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('styles')
<link rel="stylesheet" href="{{asset('css/intlTelInput.css')}}">
@endpush

@push('scripts')
<script src="{{asset('js/intlTelInput.js')}}"></script>
<script>
    $(".filter-button").click(function() {
        $(this).addClass('fill-btn').siblings().removeClass('fill-btn');
        var value = $(this).attr('data-filter');
        if (value == "all") {
            $('.filter').show('1000');
        } else {
            $(".filter").not('.' + value).hide('3000');
            $('.filter').filter('.' + value).show('3000');
        }
    });
    // 
    // The End Of Year Date To Countdown To

    const main = () => {
        const second = 1000
        const minute = second * 60
        const hour = minute * 60
        const day = hour * 24

        //INSERT EVENT DATE AND TIME HERE IN THIS FORMAT: 'June 1, 2023, 19:00:00'
        const EVENTDATE = new Date('july 31, 2024, 19:00:00')

        const countDown = new Date(EVENTDATE).getTime()
        const x = setInterval(() => {

            const now = new Date().getTime()
            const distance = countDown - now

            document.getElementById("days").innerText = Math.floor(distance / day)
            document.getElementById("hours").innerText = Math.floor((distance % day) / (hour))
            document.getElementById("minutes").innerText = Math.floor((distance % hour) / (minute))
            document.getElementById("seconds").innerText = Math.floor((distance % minute) / second)

            //delay in milliseconds
        }, 0)
    }

    main();
    // select country   
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.0/build/js/utils.js",
    });
    window.iti = iti;
</script>
@endpush
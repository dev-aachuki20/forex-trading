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

    @if($allContestList->count()>0)
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

                    @foreach($allContestList as $contest)
                    @php
                    $contestStatus = null;
                    $now = now();
                    if ($now < $contest->start_date_time) {
                        $contestStatus = 'upcoming';
                        } else {
                        $contestStatus = 'finished';
                        }


                        $start_date_string = $contest->start_date_time;
                        $start_date = \Carbon\Carbon::create($contest->start_date_time);
                        $current_date = \Carbon\Carbon::now()->tz(config('set_timezone'))->format('Y-m-d H:i:s');

                        $time_until_start = $start_date->diff($current_date);

                        $days_until_start = $time_until_start->days;
                        $hours_until_start = $time_until_start->h;
                        $minutes_until_start = $time_until_start->i;
                        $seconds_until_start = $time_until_start->s;

                        @endphp
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12 filter {{$contestStatus ?? $contestStatus}}">
                            <div class="trading-contest-dateils">
                                <div class="trading-contest-trophy">
                                    <img src="images/trading-contest/trophy.svg" alt="trophy">
                                </div>
                                <h4 class="text-white text-center">{{$contest->title}}</h4>
                                <div class="demo-box body-font-small">
                                    Demo
                                </div>
                                <div class="contest-name">{{ $contestStatus }}</div>
                                <div class="contestants-boxes">
                                    <ul>
                                        <li>
                                            <div class="prize-inner">
                                                <div class="img-price">
                                                    <img src="images/trading-contest/money.png">
                                                </div>
                                                <div class="prize-text">
                                                    <p class="body-font-small"><strong>Auditions + Cash</strong> Prize Pool</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="prize-inner">
                                                <div class="img-price">
                                                    <img src="images/trading-contest/contestants.png">
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
                                            <div class="counter-outer" data-label="days" data-value="{{$days_until_start}}">
                                                <div class="main-time"><span id="days">{{$days_until_start}}</span>Day</div>
                                            </div>
                                            <div class="counter-outer" data-label="hours" data-value="{{$hours_until_start}}">
                                                <div class="main-time"><span id="hours"></span>HR</div>
                                            </div>
                                            <div class="counter-outer" data-label="minutes" data-value="{{$minutes_until_start}}">
                                                <div class="main-time"><span id="minutes"></span>Min</div>
                                            </div>
                                            <div class="counter-outer" data-label="seconds" data-value="{{$seconds_until_start}}">
                                                <div class="main-time"><span id="seconds"></span>Sec</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="contest-buttons">
                                    <a href="#" class="custom-btn" data-bs-toggle="modal" data-bs-target="#rulesModal"><span>Rules</span></a>
                                    <a href="#" class="custom-btn {{$contestStatus == 'finished' ? 'disabled' : '' }}" @if($contestStatus !='finished' ) data-bs-toggle="modal" data-bs-target="#registerModal" @endif><span>Register</span></a>
                                </div>
                                <div class="contest-full-btn">
                                    <a href="#" class="custom-btn fill-gradient">Standings</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{ $allContestList->links('vendor.pagination.custom') }}
                </div>

                <!-- pagination -->
                <!-- <div class="">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                    <svg width="22" height="13" viewBox="0 0 22 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.3027 5.7313C20.7722 5.7313 21.1527 6.11186 21.1527 6.5813C21.1527 7.05074 20.7722 7.4313 20.3027 7.4313V5.7313ZM0.515647 7.18234C0.183701 6.85039 0.183701 6.3122 0.515647 5.98026L5.92501 0.570891C6.25696 0.238945 6.79515 0.238945 7.1271 0.570891C7.45904 0.902837 7.45904 1.44103 7.1271 1.77297L2.31877 6.5813L7.1271 11.3896C7.45904 11.7216 7.45904 12.2598 7.1271 12.5917C6.79515 12.9237 6.25696 12.9237 5.92501 12.5917L0.515647 7.18234ZM20.3027 7.4313H1.11669V5.7313H20.3027V7.4313Z">
                                        </path>
                                    </svg>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">01</a></li>
                            <li class="page-item active"><a class="page-link" href="#">02</a></li>
                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <svg width="22" height="13" viewBox="0 0 22 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.11719 5.7313C0.647745 5.7313 0.267187 6.11186 0.267187 6.5813C0.267187 7.05074 0.647745 7.4313 1.11719 7.4313V5.7313ZM20.9043 7.18234C21.2362 6.85039 21.2362 6.3122 20.9043 5.98026L15.4949 0.570891C15.163 0.238945 14.6248 0.238945 14.2928 0.570891C13.9609 0.902837 13.9609 1.44103 14.2928 1.77297L19.1012 6.5813L14.2928 11.3896C13.9609 11.7216 13.9609 12.2598 14.2928 12.5917C14.6248 12.9237 15.163 12.9237 15.4949 12.5917L20.9043 7.18234ZM1.11719 7.4313H20.3032V5.7313H1.11719V7.4313Z">
                                        </path>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div> -->
                <!-- pagination -->
            </div>
        </div>
    </section>
    @endif



    <section class="padding-tb-120 bg-white-to-offblue-gradient-color">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="section-head text-center">
                        <h2>stay informed about our contests</h2>
                        <div class="discription">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                industry's standard dummy text ever </p>
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
                                        <img class="input-icon" src="images/form-icon/email.svg" alt="email">
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
                                <label class="form-check-label text-jet-gray" for="exampleCheck1">I agree to the terms of the
                                    SurgeTrader <a href="#" class="text-azul">Privacy Policy</a> and to receive exclusive discounts,
                                    promos, and updates from SurgeTrader by SMS and email.*</label>
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

    <!-- Register Modal -->
    <div class="modal fade contestModal" id="registerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-head">
                    <h3>Register for August Trading Contest</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-outer">
                    <form>
                        <input type="text" name="" id="" value="">
                        <div class="grid-outer row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="images/form-icon/user.svg" alt="user">
                                    <input type="text" placeholder="Enter First Name" class="form-control" name="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="images/form-icon/user.svg" alt="user">
                                    <input type="text" placeholder="Enter Last Name" class="form-control" name="">
                                </div>
                            </div>
                            <div class=" col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="images/form-icon/email.svg" alt="email">
                                    <input type="email" placeholder="Enter Email Address" class="form-control" name="">
                                </div>
                            </div>
                            <div class=" col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <input type="tel" id="phone2">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="images/form-icon/user.svg" alt="user">
                                    <input type="text" placeholder="Nickname" class="form-control" name="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="images/form-icon/state.svg" alt="Country">
                                    <select class="form-control">
                                        <option>Select Country</option>
                                        <option>Categories 1</option>
                                        <option>Categories 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="images/form-icon/bank.svg" alt="Account No.">
                                    <input type="text" placeholder="Enter Your Trading Account No." class="form-control" name="">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label text-jet-gray" for="exampleCheck1">I agree to the <a href="#" class="text-azul">Terms and Conditions</a></label>
                                </div>
                            </div>
                        </div>
                        <div class="button-group">
                            <input type="submit" class="custom-btn fill-btn" value="Register">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Rules Modal -->
    <div class="modal fade contestModal contestrulesModal" id="rulesModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-head">
                    <h3>Rules</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-outer">
                    <div class="row g-4">
                        <div class="col-sm-12 col-md-4">
                            <div class="rules-card">
                                <h4>$100k Audition Account & $1,000 Cash</h4>
                                <a href="#">First Place</a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="rules-card">
                                <h4>$50k Audition <br>Account</h4>
                                <a href="#">Second Place</a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="rules-card">
                                <h4>$25k Audition <br>Account</h4>
                                <a href="#">Third Place</a>
                            </div>
                        </div>
                    </div>
                    <!-- Place Grid -->
                    <div class="place-grid">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>4th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>5th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>6th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>7th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>8th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>9th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>10th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>11th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>12th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>13th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>14th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>15th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>16th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>17th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>18th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>19th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>20th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>21th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>22th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>23th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>24th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>25th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>26th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>27th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>28th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>29th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>30th</span>
                                        Place
                                    </div>
                                    <div class="place-description">
                                        10% Discount on any Future Audition
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="faq-accordion">
                        <div class="accordion" id="accordionExample1">
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#audition-1" aria-expanded="true" aria-controls="audition-1">1. The Contest</a>
                                <div id="audition-1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Subject to these terms and conditions, the top (30) finishers of this contest (the
                                                        “Contest”) will receive
                                                        the prizes listed above.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audition-2" aria-expanded="false" aria-controls="audition-2">2. Binding Agreement</a>
                                <div id="audition-2" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Subject to these terms and conditions, the top (30) finishers of this contest (the
                                                        “Contest”) will receive
                                                        the prizes listed above.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audition-3" aria-expanded="false" aria-controls="audition-3">3. How to
                                    Participate</a>
                                <div id="audition-3" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Subject to these terms and conditions, the top (30) finishers of this contest (the
                                                        “Contest”) will receive
                                                        the prizes listed above.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audition-4" aria-expanded="false" aria-controls="audition-4">4. Contest Period</a>
                                <div id="audition-4" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Subject to these terms and conditions, the top (30) finishers of this contest (the
                                                        “Contest”) will receive
                                                        the prizes listed above.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audition-5" aria-expanded="false" aria-controls="audition-5">5. Winner Selection</a>
                                <div id="audition-5" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Subject to these terms and conditions, the top (30) finishers of this contest (the
                                                        “Contest”) will receive
                                                        the prizes listed above.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audition-6" aria-expanded="false" aria-controls="audition-6">6. Liability</a>
                                <div id="audition-6" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Subject to these terms and conditions, the top (30) finishers of this contest (the
                                                        “Contest”) will receive
                                                        the prizes listed above.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audition-7" aria-expanded="false" aria-controls="audition-7">7. General
                                    Conditions</a>
                                <div id="audition-7" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Subject to these terms and conditions, the top (30) finishers of this contest (the
                                                        “Contest”) will receive
                                                        the prizes listed above.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audition-8" aria-expanded="false" aria-controls="audition-8">8. Arbitration</a>
                                <div id="audition-8" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Subject to these terms and conditions, the top (30) finishers of this contest (the
                                                        “Contest”) will receive
                                                        the prizes listed above.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="{{asset('css/intlTelInput.css')}}">
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/intlTelInput.js')}}"></script>
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
        const contests = document.querySelectorAll(".trading-contest-dateils .time-contest .time-contest-inner .counter-main");

        contests.forEach((contestItem) => {
            contestItem.children.forEach(timeValues = () => {
                console.log(timeValues);
            })
            console.log(contestItem.children.getAttribute())

        });
        var totalSeconds = '{{$seconds_until_start}}';
        const second = parseInt(totalSeconds)
        const minute = second * 60
        const hour = minute * 60
        const day = hour * 24

        // console.log('second', second);
        // console.log('minute', minute);
        // console.log('hour', hour);
        // console.log('day', day);


        //INSERT EVENT DATE AND TIME HERE IN THIS FORMAT: 'June 1, 2023, 19:00:00'
        const EVENTDATE = new Date('september 15, 2023, 20:00:00')

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

    // select country   
    var input = document.querySelector("#phone2");
    var iti = window.intlTelInput(input, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.0/build/js/utils.js",
    });
    window.iti = iti;
</script>
@endpush
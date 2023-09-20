<div class="outer-inner-container">
    @if ($pageDetail)
    <section class="other-page-banner ovarlay-color" style="background-image: url({{ $pageDetail && $pageDetail->image_url ? $pageDetail->image_url : config('constants.banner_image_default.other') }});">
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

    @if ($allContestList->count() > 0)
    <section class="bg-light-white blog-latest padding-tb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="section-head">
                        <h2 class="fw-700">@lang('frontend.contest_list')</h2>
                        <div class="discription mb-0">
                            <p>{{ $allKeysProvider['contest_heading'] ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 align-self-end">
                    <div class="d-flex justify-content-end trading-contest-filters">
                        <button class="filter-button custom-btn fill-btn" data-filter="all">@lang('frontend.all')</button>
                        <button class="filter-button custom-btn" data-filter="finished">@lang('frontend.finished')</button>
                        <button class="filter-button custom-btn" data-filter="upcoming">@lang('frontend.upcoming')</button>
                    </div>
                </div>
            </div>
            <div class="blog-list">
                <div class="row gap-24">

                    @foreach ($allContestList as $contest)
                    @php
                    $contestStatus = null;
                    $now = now();
                    if ($now < $contest->start_date_time) {
                        $contestStatus = 'upcoming';
                        } else {
                        $contestStatus = 'finished';
                        }

                        $start_date_string = $contest->start_date_time;
                        $start_date = \Carbon\Carbon::parse($contest->start_date_time);
                        $current_date = \Carbon\Carbon::now();

                        $time_until_start = \Carbon\Carbon::create($contest->start_date_time)->diff(\Carbon\Carbon::now());

                        $days_until_start = $time_until_start->days;
                        $hours_until_start = $time_until_start->h;
                        $minutes_until_start = $time_until_start->i;
                        $seconds_until_start = $time_until_start->s;

                        @endphp
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12 filter {{ $contestStatus ?? $contestStatus }}">
                            <div class="trading-contest-dateils">
                                <div class="trading-contest-trophy">
                                    <img src="{{ asset('images/trading-contest/trophy.svg') }}" alt="trophy">
                                </div>
                                <h4 class="text-white text-center">{{ $contest->title }}</h4>
                                <div class="demo-box body-font-small">
                                    Demo
                                </div>
                                <div class="contest-name">{{ $contestStatus }}</div>
                                <div class="contestants-boxes">
                                    <ul>
                                        <li>
                                            <div class="prize-inner">
                                                <div class="img-price">
                                                    <img src="{{ asset('images/trading-contest/money.png') }}">
                                                </div>
                                                <div class="prize-text">
                                                    <p class="body-font-small"><strong>Auditions + Cash</strong>
                                                        Prize Pool</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="prize-inner">
                                                <div class="img-price">
                                                    <img src="{{ asset('images/trading-contest/contestants.png') }}">
                                                </div>
                                                <div class="prize-text">
                                                    <p class="body-font-small"><strong>{{ $contest->registrations->count() }}</strong> @lang('frontend.contestants')</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="time-contest">
                                    <div class="time-contest-inner">
                                        <p class="body-font-small fw-700 text-center text-white">@lang('frontend.time_until_start')
                                        </p>
                                        <div class="counter-main">
                                            <div class="counter-outer" data-label="days" data-value="{{ $days_until_start }}">
                                                <div class="main-time"><span id="days">{{ $days_until_start }}</span>@lang('frontend.day')</div>
                                            </div>
                                            <div class="counter-outer" data-label="hours" data-value="{{ $hours_until_start }}">
                                                <div class="main-time"><span id="hours">{{ $hours_until_start }}</span>@lang('frontend.hour')</div>
                                            </div>
                                            <div class="counter-outer" data-label="minutes" data-value="{{ $minutes_until_start }}">
                                                <div class="main-time"><span id="minutes">{{ $minutes_until_start }}</span>@lang('frontend.minute')</div>
                                            </div>
                                            <div class="counter-outer" data-label="seconds" data-value="{{ $seconds_until_start }}">
                                                <div class="main-time"><span id="seconds">{{ $seconds_until_start }}</span>@lang('frontend.second')</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="contest-buttons">
                                    <a href="#" wire:click="getAllRules({{$contest->id }})" class="custom-btn rules-btn" data-bs-toggle="modal" data-bs-target="#rulesModal"><span>@lang('frontend.rule')</span></a>

                                    <a wire:click="cancel()" data-contestid="{{ $contest->id }}" data-contestname="{{ $contest->title }}" href="#" class="custom-btn register-btn {{ $contestStatus == 'finished' ? 'disabled' : '' }}" @if ($contestStatus !='finished' ) data-bs-toggle="modal" data-bs-target="#registerModal" @endif><span>@lang('frontend.register')</span></a>

                                </div>
                                <div class="contest-full-btn">
                                    <a href="#" class="custom-btn fill-gradient">{{ $allKeysProvider['standings'] ?? 'Standings' }}</a>
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
                        <h2>{{ $allKeysProvider['stay_informed_about_our_contests'] ?? 'Stay Informed About Our Contests.' }}</h2>
                        <div class="discription">
                            <p>{{ $allKeysProvider['stay_informed_about_our_contests_para'] ?? "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever" }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-sm-12">
                    <div class="form-outer">
                        <form wire:submit.prevent="storeContestInformUserlist">
                            <div class="grid-outer row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group position-relative">
                                        <img class="input-icon" src="{{ asset('images/form-icon/email.svg') }}" alt="email">
                                        <input wire:model="subscriber_email" type="email" placeholder="{{ __('Enter email address')}}" class="form-control">
                                    </div>
                                    @error('subscriber_email')
                                    <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group position-relative" wire:ignore>
                                        <input wire:model="phone_number" type="tel" id="phone">
                                    </div>
                                    @error('phone_number')
                                    <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-check">
<<<<<<< Updated upstream
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label text-jet-gray" for="exampleCheck1">I agree to the terms
                                    of the
                                    SurgeTrader <a href="{{ route('other-page','privacy-policy') }}" class="text-azul">Privacy Policy</a> and to receive
                                    exclusive discounts,
                                    promos, and updates from SurgeTrader by SMS and email.*</label>
=======
                                <input wire:model="is_accept" type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label text-jet-gray" for="exampleCheck1">{{__('I have read & agree to the terms of the SurgeTrader')}} <a href="#" class="text-azul">{{__('Privacy Policy')}}</a> {{__('and to receive exclusive discounts, promos, and updates from SurgeTrader by SMS and email.*')}}</label>
>>>>>>> Stashed changes
                            </div>
                            @error('is_accept')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
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
    @if ($modal)
    <div wire:ignore.self class="modal fade contestModal " id="registerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-head">
                    <h3>{{__('Register for')}} {{$contestName}}</h3>
                    <p>{{ $allKeysProvider['register_model_heading'] ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.' }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-outer">
                    <form wire:submit.prevent="store" autocomplete="off">
                        <div class="grid-outer row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/user.svg') }}" alt="user">
                                    <input type="text" placeholder="{{ $allKeysProvider['first_name'] }}" class="form-control" wire:model="first_name">
                                </div>
                                @error('first_name')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/user.svg') }}" alt="user">
                                    <input type="text" placeholder="{{ $allKeysProvider['last_name'] }}" class="form-control" wire:model="last_name">
                                </div>
                                @error('last_name')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class=" col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/email.svg') }}" alt="email">
                                    <input type="text" placeholder="{{ $allKeysProvider['email'] }}" class="form-control" wire:model="email">
                                </div>
                                @error('email')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class=" col-md-6 col-sm-12">
                                <div class="form-group position-relative" wire:ignore>
                                    <input placeholder="{{ $allKeysProvider['phone_number'] }}" type="tel" id="phone2" wire:model="contact_number">
                                </div>
                                @error('contact_number')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/user.svg') }}" alt="user">
                                    <input type="text" placeholder="Nickname" class="form-control" wire:model="nick_name">
                                </div>
                                @error('nick_name')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/state.svg') }}" alt="Country">
                                    <select class="form-control" wire:model="country_name">
                                        <option value="">Country </option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                                        <option value="Cabo Verde">Cabo Verde</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo (Congo-Brazzaville)">Congo (Congo-Brazzaville)
                                        </option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czechia (Czech Republic)">Czechia (Czech Republic)</option>
                                        <option value="Democratic Republic of the Congo">Democratic Republic of the
                                            Congo</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Eswatini (fmr. &quot;Swaziland&quot;)">Eswatini (fmr.
                                            "Swaziland")</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Holy See">Holy See</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia">Micronesia</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar (formerly Burma)">Myanmar (formerly Burma)</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="North Korea">North Korea</option>
                                        <option value="North Macedonia">North Macedonia</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestine State">Palestine State</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Vincent and the Grenadines">Saint Vincent and the
                                            Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="South Sudan">South Sudan</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-Leste">Timor-Leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States of America">United States of America</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                                @error('country_name')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/bank.svg') }}" alt="Account No.">
                                    <input type="text" placeholder="Enter Your Trading Account No." class="form-control" wire:model="trading_account_no">
                                </div>
                                @error('trading_account_no')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" wire:model="accept_term_condition">
                                    <label class="form-check-label text-jet-gray" for="exampleCheck1">I agree to
                                        the <a href="{{ route('other-page','privacy-policy') }}" class="text-azul">Terms and Conditions</a></label>
                                </div>
                                @error('accept_term_condition')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
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
    @endif
    <!-- Rules Modal -->
    <div wire:ignore.self class="modal fade contestModal contestrulesModal" id="rulesModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-head">
                    <h3>{{__('frontend.rule')}}</h3>
                    <p>{{ $allKeysProvider['rule_model_heading'] ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.' }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-outer">
                    @if($allwinnerPlaces)
                    <div class="row g-4">
                        @foreach($allwinnerPlaces as $key=> $winner)
                        @if($key == 0 || $key == 1 || $key == 2)
                        <div class="col-sm-12 col-md-4">
                            <div class="rules-card">
                                <h4>{{$winner->title}}</h4>
                                <a href="#">@if($key < 3) @switch($key) @case(0) @lang('frontend.first') @break @case(1) @lang('frontend.second') @break @case(2) @lang('frontend.third') @break @endswitch @endif @lang('frontend.place')</a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <!-- Place Grid -->
                    <div class="place-grid">
                        <div class="row g-4">
                            @foreach($allwinnerPlaces as $key=> $winner)
                            @if($key != 0 && $key != 1 && $key != 2)
                            <div class="col-sm-12 col-md-6">
                                <div class="place-outer-box">
                                    <div class="place-rank">
                                        <span>{{$key+1}}th</span>
                                        @lang('frontend.place')
                                    </div>
                                    <div class="place-description">
                                        {{$winner->title}}
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <!--  -->
                    <div class="faq-accordion">
                        <div class="accordion" id="accordionExample1">
                            @if($allRules)
                            @foreach($allRules as $key =>$rule)
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audition-{{$key}}" aria-expanded="true" aria-controls="audition-{{$key}}">{{$loop->iteration}}. {{ucfirst($rule->title)}}</a>
                                <div id="audition-{{$key}}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : ''}}" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>{!! ucfirst($rule->description) !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/intlTelInput.css') }}">
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/intlTelInput.js') }}"></script>
@endpush

@push('scripts')
<script src="{{ asset('js/intlTelInput.js') }}"></script>
<script>
    // filter
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
    // end

    // get contest id on registration model
    $(document).on('click', '.register-btn', function(e) {
        e.preventDefault();
        var $this = $(this);
        var contestid = $this.attr('data-contestid');
        var contestname = $this.attr('data-contestname');
        $('#contestId').val(contestid);
        if (contestid) {
            @this.set('contestName', contestname);
            @this.set('trading_contest_id', contestid);
        }
    });
    // end



    // The End Of Year Date To Countdown To

    const main = () => {
        const contests = document.querySelectorAll(
            ".trading-contest-dateils .time-contest .time-contest-inner .counter-main");

        contests.forEach((contestItem) => {
            $(contestItem.children).each(function(index, element) {
                // console.log(element.getAttribute('data-label'));
            });

        });
        var totalSeconds = '{{ $seconds_until_start ?? 0 }}';
        const second = parseInt(totalSeconds)
        const minute = second * 60
        const hour = minute * 60
        const day = hour * 24

        // console.log('second', second);
        // console.log('minute', minute);
        // console.log('hour', hour);
        // console.log('day', day);


        // INSERT EVENT DATE AND TIME HERE IN THIS FORMAT: 'June 1, 2023, 19:00:00'
        const EVENTDATE = new Date('september 17, 2023, 12:00:00')
        // const countDown = new Date(EVENTDATE).getTime()

        // const dateObject = new Date('');

        // Fri Sep 15 2023 18:30:00 GMT+0530 (India Standard Time)

        //start show in 'september 17, 2023, 12:00:00' format
        const date_string = '';
        const months = [
            "january", "february", "march", "april", "may", "june",
            "july", "august", "september", "october", "november", "december"
        ];
        const newDate = new Date(date_string)
        const monthName = months[newDate.getMonth()];
        // const day = newDate.getDate();
        const year = newDate.getFullYear();
        const hours = newDate.getHours();
        const minutes = newDate.getMinutes();
        const seconds = newDate.getSeconds();
        const formattedDate =
            `${monthName} ${day}, ${year}, ${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

        // console.log(formattedDate);
        // end show in 'september 17, 2023, 12:00:00' format

        const countDown = new Date(formattedDate).getTime();
        // console.log(countDown);
        const x = setInterval(() => {

            const now = new Date().getTime()
            const distance = countDown - now

            // document.getElementById("days").innerText = Math.floor(distance / day)
            // document.getElementById("hours").innerText = Math.floor((distance % day) / (hour))
            // document.getElementById("minutes").innerText = Math.floor((distance % hour) / (minute))
            // document.getElementById("seconds").innerText = Math.floor((distance % minute) / second)

            //delay in milliseconds
        }, 1000)
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

    // to fetch contest id in register model
</script>
@endpush
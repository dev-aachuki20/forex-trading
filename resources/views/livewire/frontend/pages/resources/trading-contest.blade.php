<div class="outer-inner-container">
    @if ($pageDetail)
    <section class="other-page-banner ovarlay-color" style="background-image: url({{ $pageDetail && $pageDetail->image_url ? $pageDetail->image_url : config('constants.banner_image_default.other') }});">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : 'Trading Contest' }}</h1>
                        <div class="discription text-white body-font-large mb-0">
                            <p>{{ $pageDetail ? ucwords($pageDetail->sub_title) : 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif


    @if ($allContestList->count() > 0)
    @if(!is_null($this->sectionDetail))
    <section class="bg-light-white blog-latest padding-tb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="section-head">
                        <h2 class="fw-700">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Contest List' }}</h2>
                        <div class="discription mb-0">
                            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has' !!}</p>
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
                    $startTime = \Carbon\Carbon::parse($contest->start_date_time, 'UTC');

                    //$startTime = '2023-09-27 7:00:00'; en +1, jp +9, thai +7
                    //$now = '2023-09-26 6:00:00';
                    // dd($startTime);

                    if($localeid == 1){
                    $time = $startTime->setTimezone('Europe/London');

                    }elseif ($localeid == 2) {
                    $time = $startTime->setTimezone('Asia/Tokyo');

                    }elseif ($localeid == 3) {
                    $time = $startTime->setTimezone('Asia/Bangkok');
                    }

                    if ($now < $time) { $contestStatus='upcoming' ; } else { $contestStatus='finished' ; } $time_until_start=$now->diff($time);

                        // dd($time_until_start);

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
                                <h4 class="text-white text-center">{{ ucwords($contest->title) }}</h4>
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
            </div>
        </div>
    </section>
    @endif
    @endif


    <!-- stay informed about contest -->
    {{-- @livewire('frontend.sections.stay-informed-about-contest', ['localeid' => $localeid]) --}}
    <section class="padding-tb-120 bg-white-to-offblue-gradient-color">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="section-head text-center">
                        <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Stay Informed About Our Contests.' }}</h2>
                        <div class="discription">
                            <p>{{ $sectionDetail ? ucfirst($sectionDetail->description) : "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever" }}</p>
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
                                        <input wire:model="subscriber_email" type="email" placeholder="{{ __('frontend.Enter email address')}}" class="form-control">
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
                                <input wire:model="is_accept" type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label text-jet-gray" for="exampleCheck1">{{__('frontend.I have read & agree to the terms of the SurgeTrader')}} <a href="{{ route('other-page','privacy-policy') }}" class="text-azul">{{__('frontend.Privacy Policy')}}</a> {{__('frontend.and to receive exclusive discounts, promos, and updates from SurgeTrader by SMS and email.*')}}</label>
                            </div>
                            @error('is_accept')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <div class="button-group justify-content-center">
                                <input type="submit" class="custom-btn outline-color-azul" value="{{__('frontend.submit')}}">
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
                    <h3>{{__('frontend.Register for')}} {{$contestName}}</h3>
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
                                    <input type="text" placeholder="{{__('frontend.nick_name')}}" class="form-control" wire:model="nick_name">
                                </div>
                                @error('nick_name')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/state.svg') }}" alt="Country">
                                    <select class="form-control" wire:model="country_name">
                                        <option value="">{{__('frontend.Country')}} </option>
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
                                    <input type="text" placeholder="{{__('frontend.Enter Your Trading Account No.')}}" class="form-control" wire:model="trading_account_no">
                                </div>
                                @error('trading_account_no')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" wire:model="accept_term_condition">
                                    <label class="form-check-label text-jet-gray" for="exampleCheck1">{{__('frontend.I agree to the')}} <a href="{{ route('other-page','terms-conditions') }}" class="text-azul">{{__('frontend.Terms and Conditions')}}</a></label>
                                </div>
                                @error('accept_term_condition')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="button-group">
                            <input type="submit" class="custom-btn fill-btn" value="{{__('frontend.Register')}}">
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
{{-- <script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/intlTelInput.js') }}"></script> --}}
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
        $(".trading-contest-dateils").each(function(index, element) {
            var days = $(this).find('.counter-outer[data-label = "days"]').data('value')
            var hour = $(this).find('.counter-outer[data-label = "hours"]').data('value')
            var minute = $(this).find('.counter-outer[data-label = "minutes"]').data('value')
            var sec = $(this).find('.counter-outer[data-label = "seconds"]').data('value')

            // console.log(days, hour, minute, sec);
            var totalSeconds = parseInt(days * 24 * 60 * 60) + parseInt(hour * 60 * 60) + parseInt(minute * 60) + sec;
            // console.log(totalSeconds);

            const countdownInterval = setInterval(() => {
                if (totalSeconds <= 0) {
                    // Countdown has reached zero
                    clearInterval(countdownInterval);
                    $(this).find('.counter-outer[data-label = "days"] .main-time span').text('0');
                    $(this).find('.counter-outer[data-label = "hours"] .main-time span').text('0')
                    $(this).find('.counter-outer[data-label = "minutes"] .main-time span').text('0')
                    $(this).find('.counter-outer[data-label = "seconds"] .main-time span').text('0')
                } else {
                    // Calculate days, hours, minutes, and seconds
                    var days = Math.floor(totalSeconds / (24 * 60 * 60));
                    var hours = Math.floor((totalSeconds % (24 * 60 * 60)) / (60 * 60));
                    var minutes = Math.floor((totalSeconds % (60 * 60)) / 60);
                    var seconds = totalSeconds % 60;

                    // Display the countdown
                    $(this).find('.counter-outer[data-label = "days"] .main-time span').text(days);
                    $(this).find('.counter-outer[data-label = "hours"] .main-time span').text(hours)
                    $(this).find('.counter-outer[data-label = "minutes"] .main-time span').text(minutes)
                    $(this).find('.counter-outer[data-label = "seconds"] .main-time span').text(seconds)

                    // Decrement totalSeconds by 1
                    totalSeconds--;
                }
            }, 1000);



            // const x = setInterval(() => {
            //     var days = Math.floor(totalSeconds / (3600 * 24));
            //     var hours = Math.floor((totalSeconds % (3600 * 24)) / 3600);
            //     var minutes = Math.floor((totalSeconds % 3600) / 60);
            //     var remainingSeconds = totalSeconds % 60;

            //     // console.log(days, hour, minutes, remainingSeconds);

            //     $(this).find('.counter-outer[data-label = "days"] .main-time span').text(days);
            //     $(this).find('.counter-outer[data-label = "hours"] .main-time span').text(hours)
            //     $(this).find('.counter-outer[data-label = "minutes"] .main-time span').text(minutes)
            //     $(this).find('.counter-outer[data-label = "seconds"] .main-time span').text(remainingSeconds)
            //     totalSeconds--;

            //     if (totalSeconds < 0) {
            //         clearInterval(x);
            //     }
            // }, 1000)
        });

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
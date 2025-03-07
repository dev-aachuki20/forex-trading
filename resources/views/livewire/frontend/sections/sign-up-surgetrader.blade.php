<section class="padding-tb-120 bg-white" id="affiliate-sign-up-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-sm-12">
                <div class="section-head text-center mw-100">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Sign Up For The Surgetrader Affiliate Program' }}</h2>
                    <div class="discription">
                        <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Fill out the form below to gain access to our affiliate program portal, along with your customized affiliate links, tracking metrics and affiliate marketing materials.' !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="form-outer">
                    <form wire:submit.prevent="submit">
                        <div class="grid-outer row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/user.svg') }}" alt="user">
                                    <input type="text" placeholder="{{__('frontend.first_name')}}&ast;" class="form-control" wire:model="first_name">
                                </div>
                                @error('first_name')
                                <span class="error text-danger fs-6">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/user.svg') }}" alt="user">
                                    <input type="text" placeholder="{{__('frontend.last_name')}}&ast;" class="form-control" wire:model="last_name">
                                </div>
                                @error('last_name')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/email.svg') }}" alt="email">
                                    <input type="email" placeholder="{{__('frontend.email')}}&ast;" class="form-control" wire:model="email">
                                </div>
                                @error('email')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group position-relative" wire:ignore>
                                    <input type="tel" id="phone" wire:model="mobile_no">
                                </div>
                                @error('mobile_no')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/location.svg') }}" alt="location">
                                    <input type="text" placeholder="{{__('frontend.address')}}" class="form-control" wire:model="address">
                                </div>
                                @error('address')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/city.svg') }}" alt="city">
                                    <input type="text" placeholder="{{__('frontend.city')}}&ast;" class="form-control" wire:model="city">
                                </div>
                                @error('city')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/state.svg') }}" alt="State">
                                    <input type="text" placeholder="{{__('frontend.state_region')}}" class="form-control" wire:model="state">
                                </div>
                                @error('state')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/postal-code.svg') }}" alt="postal-code">
                                    <input type="text" placeholder="{{__('frontend.postal_code')}}" class="form-control" wire:model="zipcode">
                                </div>
                                @error('zipcode')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/state.svg') }}" alt="state">
                                    <select class="form-control" wire:model="country">
                                        <option value="{{__('frontend.country')}}">{{__('frontend.country')}}</option>
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
                                        <option value="Congo (Congo-Brazzaville)">Congo (Congo-Brazzaville)</option>
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
                                    <!-- <input type="text" placeholder="Country" class="form-control" name=""> -->
                                </div>
                                @error('country')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/website.svg') }}" alt="Website">
                                    <input type="text" placeholder="{{__('frontend.Website')}}" class="form-control" wire:model="website">
                                </div>
                                @error('website')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/instagram.svg') }}" alt="Instagram Handle">
                                    <input type="text" placeholder="{{__('frontend.instagram_handle')}}" class="form-control" wire:model="instagram_handle">
                                </div>
                                @error('instagram_handle')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/youtube.svg') }}" alt="Youtube Handle">
                                    <input type="text" placeholder="{{__('frontend.youtube_handle')}}" class="form-control" wire:model="youtube_handle">
                                </div>
                                @error('youtube_handle')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/user.svg') }}" alt="user">
                                    <input type="text" placeholder="{{__('frontend.twitter_handle')}}" class="form-control" wire:model="twitter_handle">
                                </div>
                                @error('twitter_handle')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/user.svg') }}" alt="user">
                                    <select class="form-control" wire:model="purpose">
                                        <option value="{{__('frontend.i_am_a')}}">{{__('frontend.i_am_a')}}</option>
                                        <option value="Content Creator">Content Creator</option>
                                        <option value="Training Education Provider">Training Education Provider
                                        </option>
                                        <option value="Trading Group Admin">Trading Group Admin</option>
                                        <option value="Referring Friends/Associates">Referring Friends/Associates
                                        </option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <!-- <input type="text" placeholder="I am a…" class="form-control" name=""> -->
                                </div>
                                @error('purpose')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" wire:model="is_affiliate_accept" id="exampleCheck1">
                            <label class="form-check-label text-jet-gray" for="exampleCheck1">{{__('frontend.I agree to the RishardBell')}} <a href="{{ route('other-page',['pageName' => 'affiliate-agreement']) }}" class="text-azul">{{__('frontend.Affiliate Agreement')}}</a><span class="text-secondary">&ast;</span></label>
                        </div>

                        @error('is_affiliate_accept')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror

                        <div class="button-group">
                            <input type="submit" class="custom-btn outline-color-azul" value="{{__('frontend.submit')}}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
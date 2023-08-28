<div class="outer-inner-container">
    <section class="other-page-banner ovarlay-color" style="background-image: url(images/other-pages-bg.jpg);">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">We’re Here to Help You</h1>
                        <div class="discription text-white body-font-large mb-30">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                        </div>
                        <div class="button-group justify-content-center mt-0">
                            <a class="custom-btn outline-color-white" href="javascript:void(0);">Start Trading</a>
                            <a class="custom-btn outline-color-white" href="javascript:void(0);">Read FAQS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="padding-tb-120 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-sm-12">
                    <div class="section-head text-center">
                        <h2>Get in Touch</h2>
                        <div class="discription">
                            <p>We’re here to help you supercharge your trading activity with accelerated profits. Fill out the form to share your inquiry, & we’ll get back to you ASAP.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gap-24 mb-40">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="conatct-outer">
                        <a href="#">
                            <div class="contact-icon-inner d-flex align-items-center">
                                <div class="contact-icon-main">
                                    <img src="images/form-icon/call.svg" alt="call">
                                </div>
                                <div class="contact-text">
                                    <h4>+ 91 1234567890</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="conatct-outer">
                        <a href="#">
                            <div class="contact-icon-inner d-flex align-items-center">
                                <div class="contact-icon-main"><img src="images/form-icon/sms.svg" alt="sms"></div>
                                <div class="contact-text">
                                    <h4>abcd5642@gmail.com</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="conatct-outer">
                        <div class="contact-icon-inner d-flex align-items-center">
                            <div class="contact-icon-main"><img src="images/form-icon/map.svg" alt="map"></div>
                            <div class="contact-text">
                                <h4>2715 Ash Dr. San Jose, South Dakota 83475</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-outer">
                        <h3 class="mb-30">Get in Touch!</h3>
                        <form>
                            <div class="grid-outer row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group position-relative">
                                        <img class="input-icon" src="images/form-icon/user.svg" alt="user">
                                        <input type="text" placeholder="Enter First Name" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group position-relative">
                                        <img class="input-icon" src="images/form-icon/user.svg" alt="user">
                                        <input type="text" placeholder="Enter Last Name" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group position-relative">
                                        <img class="input-icon" src="images/form-icon/email.svg" alt="email">
                                        <input type="email" placeholder="Enter Email Address" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group position-relative">
                                        <input type="tel" id="phone">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group position-relative">
                                        <img class="input-icon" src="images/form-icon/notetext.svg" alt="notetext">
                                        <input type="text" placeholder="Enter Title" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group position-relative">
                                        <img class="input-icon" src="images/form-icon/notificationstatus.svg" alt="notificationstatus">
                                        <select class="form-control">
                                            <option>Select Categories</option>
                                            <option>Categories 1</option>
                                            <option>Categories 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group position-relative">
                                        <textarea placeholder="Type Massage" class="form-control" name=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label text-jet-gray" for="exampleCheck1">I have read & agree to the terms of the SurgeTrader <a href="#" class="text-azul">Privacy Policy</a>.*</label>
                            </div>
                            <div class="button-group">
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
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
        // separateDialCode:true,
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.0/build/js/utils.js",
    });
    window.iti = iti;
</script>
@endpush
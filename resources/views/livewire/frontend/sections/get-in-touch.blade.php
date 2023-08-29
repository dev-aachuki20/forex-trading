<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="form-outer">
            <h3 class="mb-30">Get in Touch!</h3>
            <form wire:submit.prevent="sendContactMail">
                <div class="grid-outer row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group position-relative">
                            <img class="input-icon" src="{{asset('images/form-icon/user.svg')}}" alt="user">
                            <input type="text" placeholder="Enter First Name" class="form-control" wire:model="first_name">
                            @error('first_name')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group position-relative">
                            <img class="input-icon" src="{{asset('images/form-icon/user.svg')}}" alt="user">
                            <input type="text" placeholder="Enter Last Name" class="form-control" wire:model="last_name">
                            @error('last_name')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group position-relative">
                            <img class="input-icon" src="{{asset('images/form-icon/email.svg')}}" alt="email">
                            <input type="email" placeholder="Enter Email Address" class="form-control" wire:model="email">
                            @error('email')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group position-relative">
                            <input wire:model="phone" type="tel" id="phone">
                            @error('phone')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group position-relative">
                            <img class="input-icon" src="{{asset('images/form-icon/notetext.svg')}}" alt="notetext">
                            <input type="text" placeholder="Enter Title" class="form-control" wire:model="title">
                            @error('title')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group position-relative">
                            <img class="input-icon" src="{{asset('images/form-icon/notificationstatus.svg')}}" alt="notificationstatus">
                            <select class="form-control" wire:model="category">
                                <option>Select Categories</option>
                                <option>Categories 1</option>
                                <option>Categories 2</option>
                            </select>
                            @error('category')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group position-relative">
                            <textarea placeholder="Type Massage" class="form-control" wire:model="message"></textarea>
                            @error('message')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
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
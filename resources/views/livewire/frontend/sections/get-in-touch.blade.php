<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="form-outer">
            <h3 class="mb-30">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}!</h3>
            <form wire:submit.prevent="sendContactMail">
                <div class="grid-outer row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <div class="contact_field">
                                <img class="input-icon" src="{{ asset('images/form-icon/user.svg') }}" alt="user">
                                <input type="text" placeholder="Enter First Name" class="form-control" wire:model="first_name">
                            </div>
                            @error('first_name')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <div class="contact_field">
                                <img class="input-icon" src="{{ asset('images/form-icon/user.svg') }}" alt="user">
                                <input type="text" placeholder="Enter Last Name" class="form-control" wire:model="last_name">
                            </div>
                            @error('last_name')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <div class="contact_field">
                                <img class="input-icon" src="{{ asset('images/form-icon/email.svg') }}" alt="email">
                                <input type="email" placeholder="Enter Email Address" class="form-control" wire:model="email">
                            </div>
                            @error('email')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <div class="contact_field" wire:ignore>
                                <input wire:model="phone" type="tel" id="phone">
                            </div>
                            @error('phone')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                           <div class="contact_field">
                           <img class="input-icon" src="{{ asset('images/form-icon/notetext.svg') }}" alt="notetext">
                            <input type="text" placeholder="Enter Title" class="form-control" wire:model="title">
                           </div>
                            @error('title')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <div class="contact_field">
                            <img class="input-icon" src="{{ asset('images/form-icon/notificationstatus.svg') }}" alt="notificationstatus">
                            <select class="form-control" wire:model="category">
                                <option>Select Categories</option>
                                <option>Categories 1</option>
                                <option>Categories 2</option>
                            </select>
                            </div>
                            @error('category')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <div class="contact_field">
                            <textarea placeholder="Type Massage" class="form-control" wire:model="message"></textarea>
                            </div>
                            @error('message')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" wire:model="terms" id="exampleCheck1">
                    <label class="form-check-label text-jet-gray" for="exampleCheck1">I have read & agree to the terms
                        of the SurgeTrader <a href="#" class="text-azul">Privacy Policy</a>.</label>
                </div>
                @error('terms')
                <span class="error text-danger">{{ $message }}</span>
                @enderror


                <div class="button-group">
                    <input type="submit" class="custom-btn outline-color-azul" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>
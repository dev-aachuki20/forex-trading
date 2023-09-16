<div class="live-preview">

    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="tablelist-form" autocomplete="off">

        <div class="row">
            <!-- name -->
            <div class="col-md-4 mt-2">
                <label class="form-label">{{ $allKeysProvider['name'] }}<span class="text-danger">&ast;</span></label>
                <input type="text" wire:model="name" class="form-control"
                    placeholder="{{ $allKeysProvider['name'] }}" >

                @error('name')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- designation -->
            <div class="col-md-4 mt-2">
                <label class="form-label">{{ $allKeysProvider['designation'] }}<span class="text-danger">&ast;</span></label>
                <input type="text" wire:model="designation" class="form-control"
                    placeholder="{{ $allKeysProvider['designation'] }}" />

                @error('designation')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- type -->
            <div class="col-md-4 mt-2">
                <label for="customername-field1" class="form-label">{{ $allKeysProvider['type'] }}<span class="text-danger">&ast;</span></label><br>
                <select class="form-control" wire:model="type" wire:change="memberupdatedType">
                    <option value="0">Select</option>
                    @foreach (config('constants.member_types') as $id => $member)
                        <option value="{{ $id }}" {{ $type == $id ? 'selected' : '' }}>
                            {{ ucwords($member) }}
                        </option>
                    @endforeach
                </select>

                @error('type')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
            
        </div>
        <!-- End Row -->

        <div class="row mt-4">
            <!-- image -->
            <div class="col-md-12">
                <div>
                    <div wire:ignore>
                        <label class="form-label">{{ $allKeysProvider['image'] }}<span class="text-danger">&ast;</span></label>
                        <div class="mx-auto">
                            <input type="file" id="dropify-image" wire:model="image" class="dropify"

                                data-default-file="{{ $originalImage }}" data-show-loader="true"

                                data-errors-position="outside" data-allowed-file-extensions="jpeg png jpg"

                                data-min-file-size-preview="1M" data-max-file-size-preview="3M"

                                accept="image/jpeg, image/png, image/jpg">
                        </div>
                    </div>

                    @error('image')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <!-- End Row -->

            @if ($teammember)
            <div class="row">

                <!-- facebook -->
                <div class="col-xxl-3 col-md-6 mt-3">

                    <div>

                        <label for="customername-field" class="form-label">{{__('cruds.team.fields.facebook_link')}}<span class="text-danger">&ast;</span></label>

                        <input type="text" wire:model="facebook_link" class="form-control"

                            placeholder="{{__('cruds.team.fields.facebook_link')}}" />

                        @error('facebook_link')

                            <span class="error text-danger">{{ $message }}</span>

                        @enderror

                    </div>

                </div>

                <!-- twitter -->
                <div class="col-xxl-3 col-md-6 mt-3">

                    <div>

                        <label for="customername-field" class="form-label">{{__('cruds.team.fields.twitter_link')}}</label>

                        <input type="text" wire:model="twitter_link" class="form-control"

                            placeholder="{{__('cruds.team.fields.twitter_link')}}" />

                        @error('twitter_link')

                            <span class="error text-danger">{{ $message }}</span>

                        @enderror

                    </div>

                </div>

                <!-- instagram -->
                <div class="col-xxl-3 col-md-6 mt-3">
                    <div>
                        <label for="customername-field" class="form-label">{{__('cruds.team.fields.instagram_link')}} </label>
                        <input type="text" wire:model="instagram_link" class="form-control"

                            placeholder="{{__('cruds.team.fields.instagram_link')}}" />

                        @error('instagram_link')

                            <span class="error text-danger">{{ $message }}</span>

                        @enderror

                    </div>
                </div>

                <!-- youtube -->
                <div class="col-xxl-3 col-md-6 mt-3">
                    <div>
                        <label for="customername-field" class="form-label">{{__('cruds.team.fields.youtube_link')}}</label>

                        <input type="text" wire:model="youtube_link" class="form-control"

                            placeholder="{{__('cruds.team.fields.youtube_link')}}" />

                        @error('youtube_link')

                            <span class="error text-danger">{{ $message }}</span>

                        @enderror
                    </div>
                </div>

                <!-- googlePlus -->
                <div class="col-xxl-3 col-md-6 mt-3">
                    <label for="customername-field" class="form-label">{{__('cruds.team.fields.google_link')}}</label>

                    <input type="text" wire:model="googleplus_link" class="form-control"

                        placeholder="{{__('cruds.team.fields.google_link')}}" />

                    @error('googleplus_link')

                        <span class="error text-danger">{{ $message }}</span>

                    @enderror

                </div>
            </div>
            <!--End Row  -->
            @endif



            @if ($bkmember)
                <div class="row mt-4">
                    <!-- description -->
                    <div class="col-md-12">

                        <div wire:ignore>

                            <label class="form-label">{{ $allKeysProvider['description'] }}<span class="text-danger">&ast;</span></label>

                            <textarea id="summernote" class="form-control" wire:model="description" rows="4"

                                placeholder="{{ $allKeysProvider['description'] }}"></textarea>

                        </div>

                        @error('description')

                            <span class="error text-danger">{{ $message }}</span>

                        @enderror

                    </div>
                </div>

                <!-- brand logo image -->
                <div class="row mt-4">
                    <div class="col-md-12">

                        {{-- <div wire:ignore> --}}
                            <label for="dropify-brand_image"
                                class="form-label">{{ $allKeysProvider['brand_logo_image'] }}</label>
                            <div class="upload__box">
                                <div class="upload__btn-box">
                                    <label class="upload__btn btn rounded-pill btn-primary waves-effect waves-light">
                                    Upload images
                                    <input type="file" wire:model.live="brand_images" multiple  class="upload__inputfile" accept="image/*" />
                                    </label>
                                </div>
                                <div class="upload__img-wrap d-flex">
                                    @if(count($originalBrandImage))
                                        @foreach($originalBrandImage as $indexKey=>$image)
                                        <div class='upload__img-box' wire:key="brand-image-{{ $indexKey }}">
                                            <div style='background-image: url({{ $image->file_url }})' data-number='{{$indexKey}}' data-file='{{ $image->original_file_name }}' class='img-bg'>
                                                <div class='upload__img-close' wire:click.prevent="removeBrandImage({{$indexKey}},'update',{{$image->id}})"></div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                                    
                                    @foreach($brand_images as $indexKey=>$image)
                                        <div class='upload__img-box' wire:key="brand-image-{{ $indexKey }}">
                                            <div style='background-image: url({{ $image->temporaryUrl() }})' data-number='{{$indexKey}}' data-file='{{ $image->getClientOriginalName() }}' class='img-bg'>
                                                <div class='upload__img-close' wire:click.prevent="removeBrandImage({{$indexKey}})"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                </div>
                            </div>

                        {{-- </div> --}}
                        @error('brand_images')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            @endif


            <div class="row mt-4">
                <!-- status -->
                <div class="col-md-12">

                    <div>

                        <label for="customername-field2" class="form-label">{{ $allKeysProvider['status'] }}</label>

                        <label class="switch">

                            <input wire:change.prevent="changeStatus({{ $status }})" value="{{ $status }}"

                                {{ $status == 1 ? 'checked' : '' }} class="switch-input" type="checkbox" />

                            <span class="switch-label" data-on="{{ $statusText }}" data-off="deactive"></span>

                            <span class="switch-handle"></span>

                        </label>

                        @error('status')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror

                    </div>

                </div>
            </div>



            <div class="row mt-4">

            <div class="col-md-12">

                <div class="hstack gap-2 justify-content-end">

                    <button type="submit" wire:loading.attr="disabled" class="btn btn-success" id="myButton">

                        {{ $updateMode ? $allKeysProvider['update'] : $allKeysProvider['submit'] }}

                        <!-- <span wire:loading wire:target="{{ $updateMode ? 'update' : 'store' }}">

                            <i class="fa-solid fa-spinner fa-spin" aria-hidden="true"></i>

                        </span> -->

                    </button>

                    <button wire:click.prevent="cancel" type="submit" wire:loading.attr="disabled"

                        class="btn btn-danger" id="add-btn">

                        {{ $allKeysProvider['cancel'] }}

                    </button>

                </div>

            </div>
            </div>

        </div>

    </form>

</div>


<form wire:submit.prevent="updateSection" class="tablelist-form" autocomplete="off">

    <!-- title -->
    @if($section_key != 'trading_rule_image_section')
    <div class="mb-3">
        <label class="form-label">{{ $allKeysProvider['title'] }}</label>
        <input type="text" wire:model="title" class="form-control" placeholder="{{ $allKeysProvider['title'] }}" />
        @error('title')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>
    @endif


    <!-- description -->
    @if(!in_array($section_key,['as-seen-on','trading_rule_image_section','simple_straight_forward_trading_rules','one_step_evaluation','no_time_limits','world_class_customer_support']))
    <div class="mb-3">
        <div wire:ignore wire:key="{{$section_key}}">
            <label class="form-label">{{ $allKeysProvider['description'] }}</label>
            <textarea id="summernote" class="form-control" wire:model="description" rows="4" placeholder="{{ $allKeysProvider['description'] }}"></textarea>
        </div>

        @error('description')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>
    @endif


    <!-- image -->
    @if($is_image)
    <div class="mb-3">
        @php
        $ignoreImage = ($imgExtensions && in_array('svg',explode(',',$imgExtensions)));
        @endphp
        @if($imgExtensions && in_array('svg',explode(',',$imgExtensions)))
        <div @if($ignoreImage) wire:ignore @endif wire:key="{{$section_key}}-svg-img">
            <label class="form-label">{{ $allKeysProvider['image'] }}</label>
            <div class="mx-auto">
                <input type="file" id="dropify-image" wire:model="image" class="dropify" data-default-file="{{ $originalImage }}" data-show-loader="true" data-errors-position="outside" data-allowed-file-extensions="svg" data-min-file-size-preview="1M" data-max-file-size-preview="3M" accept="image/svg">
            </div>
            <span wire:loading wire:target="image">
                <i class="fa fa-solid fa-spinner fa-spin" aria-hidden="true"></i> Loading
            </span>
        </div>
        @else
        <div @if(!$ignoreImage) wire:ignore @endif wire:key="{{$section_key}}-img">
            <label class="form-label">{{ $allKeysProvider['image'] }}</label>
            <div class="mx-auto">
                <input type="file" id="dropify-image" wire:model="image" class="dropify" data-default-file="{{ $originalImage }}" data-show-loader="true" data-errors-position="outside" data-allowed-file-extensions="jpeg png jpg svg" data-min-file-size-preview="1M" data-max-file-size-preview="3M" accept="image/jpeg, image/png, image/jpg, image/svg">
            </div>
            <span wire:loading wire:target="image">
                <i class="fa fa-solid fa-spinner fa-spin" aria-hidden="true"></i> Loading
            </span>
        </div>
        @endif
        @error('image')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>
    @endif

    <!-- video -->
    @if($is_video)
    <div class="mb-3">
        <div wire:ignore wire:key="{{$section_key}}-video">
            <label class="form-label">{{ $allKeysProvider['video'] }}</label>
            <div class="mx-auto">
                <input type="file" id="dropify-video" wire:model="video" class="dropify" data-default-file="{{ $originalVideo }}" data-show-loader="true" data-errors-position="outside" data-allowed-file-extensions="webm mp4 avi wmv flv mov" data-min-file-size-preview="1M" data-max-file-size-preview="3M" data-max-file-size="{{ config('constants.data_max_file_size') }}" accept="video/webm, video/mp4, video/avi,video/wmv,video/flv,video/mov">
            </div>
            <span wire:loading wire:target="video">
                <i class="fa fa-solid fa-spinner fa-spin" aria-hidden="true"></i> Loading
            </span>
        </div>
        @error('video')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>
    @endif

    @if($section_key === 'our_philanthropy')

    @if($isMultipleImage)
    <!-- for image 1 -->
    <div class="mb-3">
        <div wire:ignore>
            <label class="form-label">{{__('frontend.image1')}}</label>
            <div class="mx-auto">
                <input type="file" id="dropify-image1" wire:model="philanthropy_imageOne" class="dropify" data-default-file="{{ $originalPhilanthropyImage1 }}" data-show-loader="true" data-errors-position="outside" data-allowed-file-extensions="jpeg png jpg svg" data-min-file-size-preview="1M" data-max-file-size-preview="3M" accept="image/jpeg, image/png, image/jpg, image/svg">
            </div>
        </div>
        @error('philanthropy_imageOne')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- for image 2 -->
    <div class="mb-3">
        @php
        $ignoreImage = ($imgExtensions && in_array('svg',explode(',',$imgExtensions)));
        @endphp
        <div @if(!$ignoreImage) wire:ignore @endif>
            <label class="form-label">{{__('frontend.image2')}}</label>
            <div class="mx-auto">
                <input type="file" id="dropify-image2" wire:model="philanthropy_imageTwo" class="dropify" data-default-file="{{ $originalPhilanthropyImage2 }}" data-show-loader="true" data-errors-position="outside" data-allowed-file-extensions="jpeg png jpg svg" data-min-file-size-preview="1M" data-max-file-size-preview="3M" accept="image/jpeg, image/png, image/jpg, image/svg">
            </div>
        </div>
        @error('philanthropy_imageTwo')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- for image 3 -->
    <div class="mb-3">
        @php
        $ignoreImage = ($imgExtensions && in_array('svg',explode(',',$imgExtensions)));
        @endphp
        <div @if(!$ignoreImage) wire:ignore @endif>
            <label class="form-label">{{__('frontend.image3')}}</label>
            <div class="mx-auto">
                <input type="file" id="dropify-image3" wire:model="philanthropy_imageThree" class="dropify" data-default-file="{{ $originalPhilanthropyImage3 }}" data-show-loader="true" data-errors-position="outside" data-allowed-file-extensions="jpeg png jpg svg" data-min-file-size-preview="1M" data-max-file-size-preview="3M" accept="image/jpeg, image/png, image/jpg, image/svg">
            </div>
        </div>
        @error('philanthropy_imageThree')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- for image 4 -->
    <div class="mb-3">

        <div wire:ignore>
            <label class="form-label">{{__('frontend.image4')}}</label>
            <div class="mx-auto">
                <input type="file" id="dropify-image4" wire:model="philanthropy_imageFour" class="dropify" data-default-file="{{ $originalPhilanthropyImage4 }}" data-show-loader="true" data-errors-position="outside" data-allowed-file-extensions="jpeg png jpg svg" data-min-file-size-preview="1M" data-max-file-size-preview="3M" accept="image/jpeg, image/png, image/jpg, image/svg">
            </div>
        </div>
        @error('philanthropy_imageFour')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>
    @endif
    @endif


    <!-- button name and url -->

    @if(in_array($section_key,['track_your_progress','learn_forex_section_1','learn_forex_section_2']))
    <div class="mb-3">
        <label class="form-label">{{__('cruds.button_title')}}</label>
        <input type="text" wire:model="button_title" class="form-control" placeholder="{{__('cruds.button_title')}}" />
        @error('button')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">{{__('cruds.button_url')}}</label>
        <input type="text" wire:model="button" class="form-control" placeholder="{{__('cruds.button_url')}}" />
        @error('button')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>
    @endif



    <div class="mb-3">
        <label class="form-label">{{ $allKeysProvider['status'] }}</label>
        <label class="switch">
            <input wire:change.prevent="changeStatus({{ $status }})" value="{{ $status }}" {{ $status == 1 ? 'checked' : '' }} class="switch-input" type="checkbox" />
            <span class="switch-label" data-on="active" data-off="deactive"></span>
            <span class="switch-handle"></span>
        </label>

        @error('status')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="modal-footer">
        <div class="hstack gap-2 justify-content-end">
            <button type="submit" wire:loading.attr="disabled" class="btn btn-success" id="add-btn">

                {{ $allKeysProvider['update'] }}

            </button>
            {{-- <button wire:click.prevent="cancel" type="submit" wire:loading.attr="disabled" class="btn btn-danger" id="add-btn">
                {{ $allKeysProvider['cancel'] }}
            </button> --}}
        </div>
    </div>

</form>
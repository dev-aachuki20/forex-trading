<form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="tablelist-form" autocomplete="off">





    <!-- title -->

    <div class="mb-3">

        <label for="customername-field" class="form-label">{{$allKeysProvider['title']}}<span class="text-danger">&ast;</span></label>

        <input type="text" wire:model="title" class="form-control" placeholder="{{$allKeysProvider['title']}}" />

        @error('title')

        <span class="error text-danger">{{ $message }}</span>

        @enderror

    </div>





    <!-- sub title -->

    <div class="mb-3">

        <label for="customername-field1" class="form-label">{{$allKeysProvider['category']}}<span class="text-danger">&ast;</span></label>

        <input class="form-control" wire:model="category" placeholder="{{$allKeysProvider['category']}}">

        @error('category')

        <span class="error text-danger">{{ $message }}</span>

        @enderror

    </div>



  

    <!-- image -->

    <div class="mb-3">

        <div wire:ignore>

            <label class="form-label">{{ $allKeysProvider['image'] }}<span class="text-danger">&ast;</span></label>

            <div class="mx-auto">

                <input type="file" id="dropify-image" wire:model="image" class="dropify" data-default-file="{{ $originalImage }}" data-show-loader="true" data-errors-position="outside" data-allowed-file-extensions="jpeg png jpg" data-min-file-size-preview="1M" data-max-file-size-preview="3M" accept="image/jpeg, image/png, image/jpg">

            </div>

        </div>

        @error('image')

        <span class="error text-danger">{{ $message }}</span>

        @enderror

    </div>



    <!-- description -->

    <div class="mb-3">

        <div wire:ignore>

            <label class="form-label">{{$allKeysProvider['description']}}<span class="text-danger">&ast;</span></label>

            <textarea id="summernote-description" class="form-control" wire:model="description" rows="4" placeholder="{{$allKeysProvider['description']}}"></textarea>

        </div>

        @error('description')

        <span class="error text-danger">{{ $message }}</span>

        @enderror

    </div>



    <!-- Tags -->

    <div class="mb-3">

        <label class="form-label">{{$allKeysProvider['tags'] ?? 'Tags'}}</label>

        <div wire:ignore wire:key="tags-sel">

            <select id="tags" wire:model="tags" class="js-example-basic-multiple" multiple="multiple">

            @if($allTags)

                @foreach($allTags as $tag)

                <option value="{{$tag->title}}">{{ $tag->title }}</option>

                @endforeach

            @endif

            </select>

        </div>

        @error('tags')

        <span class="error text-danger">{{ $message }}</span>

        @enderror

    </div>



    <!-- Author Name -->

    <div class="mb-3">

        <label class="form-label">{{$allKeysProvider['author_name'] ?? 'Author Name'}}<span class="text-danger">&ast;</span></label>

        <input class="form-control" wire:model="author_name" placeholder="{{$allKeysProvider['author_name'] ?? 'Author Name'}}">

        @error('author_name')

        <span class="error text-danger">{{ $message }}</span>

        @enderror

    </div>



    <!-- author image -->

    <div class="mb-3">

        <div wire:ignore>

            <label class="form-label">{{ $allKeysProvider['author_image'] ?? 'Author Image' }}</label>

            <div class="mx-auto">

                <input type="file" id="dropify-author-image" wire:model="authorImage" class="dropify" data-default-file="{{ $originalAuthorImage }}" data-show-loader="true" data-errors-position="outside" data-allowed-file-extensions="jpeg png jpg" data-min-file-size-preview="1M" data-max-file-size-preview="3M" accept="image/jpeg, image/png, image/jpg">

            </div>

        </div>

        @error('authorImage')

        <span class="error text-danger">{{ $message }}</span>

        @enderror

    </div>



    <!-- author description -->

    <div class="mb-3">

        <div wire:ignore>

            <label class="form-label">{{$allKeysProvider['author_description'] ?? 'Author Description'}}<span class="text-danger">&ast;</span></label>

            <textarea id="summernote-author-description" class="form-control" wire:model="author_description" rows="4" placeholder="{{ $allKeysProvider['author_description'] ?? 'Author Description' }}"></textarea>

        </div>

        @error('author_description')

        <span class="error text-danger">{{ $message }}</span>

        @enderror

    </div>



    <!-- Publish Date -->

    <div class="mb-3">

        <div wire:ignore>

            <label class="form-label">{{__('cruds.publish_date')}}<span class="text-danger">&ast;</span></label>

            <input id="publish_date" class="form-control" wire:model="publish_date" data-lang="{{$activeTab}}" placeholder="{{__('cruds.publish_date')}}">

        </div>

        @error('publish_date')

        <span class="error text-danger">{{ $message }}</span>

        @enderror

    </div>



    <!-- status -->

    <div class="mb-3">

        <label for="customername-field2" class="form-label">{{ $allKeysProvider['status'] }}</label>

        <label class="switch">

            <input wire:change.prevent="changeStatus({{ $status }})" value="{{ $status }}" {{ $status == 1 ? 'checked' : '' }} class="switch-input" type="checkbox" />

            <span class="switch-label" data-on="{{ $statusText }}" data-off="deactive"></span>

            <span class="switch-handle"></span>

        </label>



        @error('status')

        <span class="error text-danger">{{ $message }}</span>

        @enderror

    </div>



    <div class="modal-footer">

        <div class="hstack gap-2 justify-content-end">

            <button type="submit" wire:loading.attr="disabled" class="btn btn-success" id="add-btn">



                {{ $updateMode ?  $allKeysProvider['update']  :  $allKeysProvider['submit']  }}



            </button>

            <button wire:click.prevent="cancel" type="submit" wire:loading.attr="disabled" class="btn btn-danger" id="add-btn">

                {{ $allKeysProvider['cancel'] }}

            </button>

        </div>

    </div>



</form>
<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Site Setting</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="listjs-table" id="customerList">
                                <!-- tabs-->
                                <div class="row">
                                    <div class="col-md-8">
                                        @if ($allSettingType->count() > 0)
                                        @foreach ($allSettingType as $key=>$groupType)
                                        @php
                                        $groupName = str_replace('_',' ',$groupType)
                                        @endphp
                                        <li wire:click.prevent="changeTab('{{$groupType}}')" class="btn {{ $tab == $groupType  ? 'active' : '' }}">
                                            {{ ucwords($groupName) }}
                                        </li>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>

                                <!-- form -->
                                <form wire:submit.prevent="update" class="tablelist-form mt-4" autocomplete="off">
                                    <div class="row">
                                        @if($settings)
                                        @foreach($settings as $setting)
                                        @if($setting->type == 'text')
                                        <div class="mb-3 {{ in_array($setting->group,array('site','banner')) ? 'col-sm-12' : 'col-sm-6'}}">
                                            <label class="form-label">{{ $setting->display_name }}</label>
                                            <input class="form-control" wire:model="state.{{$setting->key}}" placeholder="{{$setting->display_name}}"></textarea>
                                            @error('state.'.$setting->key)
                                            <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @elseif($setting->type == 'image')
                                        <div class="mb-3">
                                            <div>
                                                <label class="form-label">{{ $setting->display_name }}
                                                    <span>Size : {{ $setting->details }} </span>
                                                </label>
                                                <div class="mx-auto">
                                                    <input type="file" id="{{$setting->key}}-image" wire:model="state.{{$setting->key}}" class="dropify" data-default-file="{{ $setting->image_url }}" data-show-loader="true" data-errors-position="outside" data-allowed-file-extensions="jpeg png jpg svg" data-min-file-size-preview="1M" data-max-file-size-preview="3M" accept="image/jpeg, image/png, image/jpg,image/svg">
                                                </div>
                                            </div>
                                            @error('state.'.$setting->key)
                                            <span class="error text-danger">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        @elseif($setting->type == 'textarea')
                                        <div class="mb-3">
                                            <div>
                                                <label class="form-label">{{ $setting->display_name }}</label>

                                                <textarea id="summernote" class="form-control" wire:model="state.{{$setting->key}}" data-elementName="state.{{$setting->key}}" placeholder="{{$setting->display_name}}" rows="4">{{$setting->value}}</textarea>
                                            </div>
                                            @error('state.{{$setting->key}}')
                                            <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @endif

                                        @endforeach
                                    </div>
                                    @endif


                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" wire:loading.attr="disabled" class="btn btn-success" id="add-btn">
                                                {{$allKeysProvider['update']}}
                                            </button>
                                        </div>
                                    </div>

                                </form>
                                <!-- form end -->

                            </div>
                        </div>


                    </div>
                    <!-- end col -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
</div>











@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>


<script type="text/javascript">
    document.addEventListener('loadPlugins', function(event) {

        $(document).ready(function() {
            @if($settings)
            //  FOR TEXT EDITOR
            $('textarea#summernote').summernote({
                placeholder: 'Type somthing...',
                tabsize: 2,
                height: 200,
                fontNames: ['Arial', 'Helvetica', 'Times New Roman', 'Courier New', 'sans-serif'],
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['codeview']],
                ],
                callbacks: {
                    onChange: function(content) {
                        var variableName = $(this).attr('data-elementName');
                        @this.set(variableName, content);
                    }
                }
            });

            // FOR DROPIFY
            $('.dropify').dropify();
            $('.dropify-errors-container').remove();
            $('.dropify-clear').click(function(e) {
                e.preventDefault();
                var elementName = $(this).siblings('input[type=file]').attr('id');
                elementName = elementName.split('-');
                if (elementName[1] == 'image') {
                    @this.set('state.' + elementName[0], null);
                }
            });
            @endif
        });
    });
</script>

@endpush
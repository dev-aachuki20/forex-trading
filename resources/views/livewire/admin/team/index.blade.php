<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ $allKeysProvider['team_management'] }}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            @if ($updateMode)
                                <h4 class="card-title mb-0 flex-grow-1">{{ $allKeysProvider['edit'] }}</h4>
                                <div class="flex-shrink-0">
                                    <div class="form-check form-switch form-switch-right form-switch-md">
                                        <button wire:click.prevent="cancel" type="button"
                                            class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i>
                                            {{ $allKeysProvider['back'] }}</button>
                                    </div>
                                </div>
                            @elseif($formMode)
                                <h4 class="card-title mb-0 flex-grow-1">{{ $allKeysProvider['add'] }}</h4>
                                <div class="flex-shrink-0">
                                    <div class="form-check form-switch form-switch-right form-switch-md">
                                        <button wire:click.prevent="cancel" type="button"
                                            class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i>
                                            {{ $allKeysProvider['back'] }}</button>
                                    </div>
                                </div>
                            @elseif($viewMode)
                                <h4 class="card-title mb-0 flex-grow-1">{{ $allKeysProvider['view_team'] }}</h4>
                                <div class="flex-shrink-0">
                                    <div class="form-check form-switch form-switch-right form-switch-md">
                                        <button wire:click.prevent="cancel" type="button"
                                            class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i>
                                            {{ $allKeysProvider['back'] }}</button>
                                    </div>
                                </div>
                            @else
                                <h4 class="card-title mb-0 flex-grow-1">{{ $allKeysProvider['list'] }}</h4>
                                <div class="flex-shrink-0">
                                    <div class="form-check form-switch form-switch-right form-switch-md">
                                        <button wire:click.prevent="create" type="button"
                                            class="btn btn-success add-btn"><i class="ri-add-line"></i>
                                            {{ $allKeysProvider['add'] }}</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            @if ($formMode)
                                @include('livewire.admin.team.form', ['languageId' => $languageId])
                            @elseif($viewMode)
                                @livewire('admin.team.show', ['team_id' => $team_id])
                            @else
                                <div class="listjs-table" id="customerList">

                                    <!-- tabs-->
                                    <div class="row">
                                        <div class="col-md-8">
                                            @if ($languagedata->count() > 0)
                                                @foreach ($languagedata as $language)
                                                    <li wire:click="switchTab({{ $language->id }})"
                                                        class="btn {{ $activeTab === $language->id ? 'active' : '' }}">
                                                        {{ ucfirst($language->name) }}
                                                    </li>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>

                                    <!-- show and search -->
                                    <div class="row pt-4">
                                        <div class="col-md-8">
                                            <label>Show
                                                <select wire:change="updatePaginationLength($event.target.value)">
                                                    @foreach (config('constants.datatable_paginations') as $length)
                                                        <option value="{{ $length }}">{{ $length }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                entries</label>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="col-sm">
                                                <div class="d-flex justify-content-sm-end">
                                                    <div class="search-box ms-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="{{ $allKeysProvider['search'] }}"
                                                            wire:model.live="search">
                                                        <i class="ri-search-line search-icon"></i>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- eng tab start-->
                                    <div class="table-responsive mt-3 my-team-details table-record">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>{{ $allKeysProvider['sno'] }}</th>
                                                    <th>{{ $allKeysProvider['name'] }}</th>
                                                    <th>{{ $allKeysProvider['designation'] }}</th>
                                                    <th>{{ $allKeysProvider['status'] }}</th>
                                                    <th>{{ $allKeysProvider['createdat'] }}
                                                        <span wire:click="sortBy('created_at')"
                                                            class="float-right text-sm" style="cursor: pointer;">
                                                            <i
                                                                class="ri-arrow-up-line {{ $sortColumnName === 'created_at' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                                            <i
                                                                class="ri-arrow-down-line {{ $sortColumnName === 'created_at' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                                        </span>
                                                    </th>
                                                    <th> {{ $allKeysProvider['action'] }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($allTeams->count() > 0)
                                                    @foreach ($allTeams as $team)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ ucfirst($team->name) }}</td>
                                                            <td>{{ ucfirst($team->designation) }}</td>
                                                            <td>
                                                                <!-- <label class="switch">
                                                        <input wire:click.prevent="toggle({{ $team->id }})" class="switch-input" type="checkbox" {{ $team->status == 1 ? 'checked' : '' }} />
                                                        <span class="switch-label" data-on="{{ $statusText }}" data-off="Deactive" style="background-color:{{ $backgroundColor }}"></span>
                                                        <span class="switch-handle" style="left: {{ $switchPosition === 'left' ? '0' : 'auto' }}; right: {{ $switchPosition === 'right' ? '0' : 'auto' }}"></span>
                                                    </label> -->

                                                                <label class="switch">
                                                                    <input
                                                                        wire:click.prevent="toggle({{ $team->id }})"
                                                                        class="switch-input" type="checkbox"
                                                                        {{ $team->status == 1 ? 'checked' : '' }} />
                                                                    <span class="switch-label"
                                                                        data-on="{{ $statusText }}"
                                                                        data-off="deactive"></span>
                                                                    <span class="switch-handle"></span>
                                                                </label>
                                                                <!-- <label class="switch">
                                                        <input wire:click.prevent="toggle({{ $team->id }})" class="switch-input" type="checkbox" {{ $team->status == 1 ? 'checked' : '' }} />
                                                        <span class="switch-label" data-on="{{ $statusText }}" data-off="Deactive" style="background-color:{{ $backgroundColor }}"></span>
                                                        <span class="switch-handle"></span>
                                                    </label> -->
                                                            </td>
                                                            <td>{{ convertDateTimeFormat($team->created_at, 'date') }}
                                                            </td>

                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <div class="view">
                                                                        <button type="button"
                                                                            wire:click="show({{ $team->id }})"
                                                                            class="btn btn-sm btn-primary view-item-btn"><i
                                                                                class="ri-eye-fill"></i></button>
                                                                    </div>

                                                                    <div class="edit">
                                                                        <button type="button"
                                                                            wire:click="edit({{ $team->id }})"
                                                                            class="btn btn-sm btn-success edit-item-btn"><i
                                                                                class="ri-edit-box-line"></i></button>
                                                                    </div>

                                                                    <div class="remove">
                                                                        <button type="button"
                                                                            wire:click.prevent="delete({{ $team->id }})"
                                                                            class="btn btn-sm btn-danger remove-item-btn"><i
                                                                                class="ri-delete-bin-line"></i></button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td class="text-center" colspan="6">
                                                            {{ __('messages.no_record_found') }}
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    {{ $allTeams->links('vendor.pagination.bootstrap-5') }}
                                    <!-- eng tab end -->
                                </div>
                            @endif
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>


    <script type="text/javascript">
        document.addEventListener('loadPlugins', function(event) {

            $(document).ready(function() {

                //  FOR TEXT EDITOR
                $('textarea#summernote').summernote({
                    placeholder: 'Type somthing...',
                    tabsize: 2,
                    height: 200,
                    fontNames: ['Arial', 'Helvetica', 'Times New Roman', 'Courier New',
                        'sans-serif'
                    ],
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['fontname', ['fontname']],
                        // ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', /*'picture', 'video'*/ ]],
                        ['view', ['codeview', /*'help'*/ ]],
                    ],
                    callbacks: {
                        onChange: function(content) {
                            @this.set('description', content);
                        }
                    }
                });

                // FOR DROPIFY
                $('.dropify').dropify();
                $('.dropify-errors-container').remove();
                $('.dropify-clear').click(function(e) {
                    e.preventDefault();
                    var elementName = $(this).siblings('input[type=file]').attr('id');
                    if (elementName == 'dropify-image') {
                        @this.set('image', null);
                        @this.set('originalImage', null);
                        @this.set('removeImage', true);
                    } else if (elementName == 'dropify-facebookicon') {
                        @this.set('facebookicon', null);
                        @this.set('originalfacebookIcon', null);
                    } else if (elementName == 'dropify-twittericon') {
                        @this.set('twittericon', null);
                        @this.set('originaltwitterIcon', null);
                    } else if (elementName == 'dropify-instagramicon') {
                        @this.set('instagramicon', null);
                        @this.set('originalinstagramIcon', null);
                    } else if (elementName == 'dropify-youtubeicon') {
                        @this.set('youtubeicon', null);
                        @this.set('originalyoutubeIcon', null);
                    } else if (elementName == 'dropify-googleplusicon') {
                        @this.set('googleplusicon', null);
                        @this.set('originalgoogleplusIcon', null);
                    }
                });



                // FOR DROPZON
                Dropzone.autoDiscover = false;
                const myDropzone = new Dropzone("#imageDropzone", {
                    paramName: "brand_image", 
                    url: "{% url 'dropzone/images' %}",
                    maxFilesize: 5,
                    acceptedFiles: "image/*",
                    addRemoveLinks: true,
                    init: function() {
                        this.on("success", function(file, response) {
                            // Handle success response if needed
                        });
                    },
                });


                // var myDropzone = new Dropzone('#imageDropzone', {
                //     url: "{% url 'dropzone/images' %}",
                //     addRemoveLinks: true,
                //     uploadMultiple: true,
                //     minFiles: 1,
                //     maxFiles: 10,
                //     acceptedFiles: '.png,.gif,.jpeg,.jpg',
                //     dictRemoveFile: '<a class="removeFiles"><i class="fa fa-times" > <i></a>',
                // });


                // consol.log('dsfk')
                // myDropzone.on('addedfile', function(file) {
                //     // console.log(file);

                //     $('.dz-message').css('display', 'none');
                //     var countImage = $("#imageDropzone").find(".dz-complete").length;

                //     if (countImage == -1) {
                //         $('.dz-message').css('display', 'block');
                //     }
                // });

                // myDropzone.on("removedfile", function(file) {
                //     $('.dz-message').css('display', 'block');
                //     totalImgCount = myDropzone.files.length;
                //     setDropZoneError(totalImgCount);

                //     var countImage = $("#imageDropzone").find(".dz-complete").length;
                //     if (countImage > 0) {
                //         $('.dz-message').css('display', 'none');
                //     }
                // });



                // rest

                // myDropzone.on("addedfile", file => {
                //     @this.set('brand_image', file.dataURL);
                // });

                // myDropzone.on("complete", function(file) {
                //     console.log(file);
                //     @this.set('brand_image', file.dataURL);
                // });

                // myDropzone.on("complete", function(file) {
                //     // Emit a Livewire event when an image is uploaded
                //     Livewire.emit('imageUploaded', file.dataURL);
                // });

                myDropzone.on("queuecomplete", function() {
                    // Livewire.emitSelf('uploadedFiles', myDropzone.files);
                });



            });
        });
    </script>
@endpush

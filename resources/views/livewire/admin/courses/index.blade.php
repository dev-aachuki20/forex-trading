<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ $allKeysProvider['courses'] }}</h4>
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
                                    <button wire:click.prevent="cancel" type="button" class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i>
                                        {{ $allKeysProvider['back'] }}</button>
                                </div>
                            </div>
                            @elseif($formMode)
                            <h4 class="card-title mb-0 flex-grow-1">{{ $allKeysProvider['add'] }}</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button wire:click.prevent="cancel" type="button" class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i>
                                        {{ $allKeysProvider['back'] }}</button>
                                </div>
                            </div>
                            @elseif($viewMode)
                            <h4 class="card-title mb-0 flex-grow-1">{{ $allKeysProvider['view_blog'] }}</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button wire:click.prevent="cancel" type="button" class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i>
                                        {{ $allKeysProvider['back'] }}</button>
                                </div>
                            </div>
                            @else
                            <h4 class="card-title mb-0 flex-grow-1">{{ $allKeysProvider['list'] }}</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button wire:click.prevent="create" type="button" class="btn btn-success add-btn"><i class="ri-add-line"></i>
                                        {{ $allKeysProvider['add'] }}</button>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="card-body">
                            @if ($formMode)
                            @include('livewire.admin.courses.form', ['languageId' => $languageId])
                            @elseif($viewMode)
                            @livewire('admin.courses.show', ['course_id' => $course_id])
                            @else
                            <div class="listjs-table" id="customerList">

                                <!-- tabs-->
                                <div class="row">
                                    <div class="col-md-8">
                                        @if ($languagedata->count() > 0)
                                        @foreach ($languagedata as $language)
                                        <li wire:click="switchTab({{ $language->id }})" class="btn {{ $activeTab === $language->id ? 'active' : '' }}">
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
                                                    <input type="text" class="form-control" placeholder="{{ $allKeysProvider['search'] }}" wire:model.live="search">
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
                                                <th>{{ $allKeysProvider['status'] }}</th>
                                                <th>{{ $allKeysProvider['createdat'] }}
                                                    <span wire:click="sortBy('created_at')" class="float-right text-sm" style="cursor: pointer;">
                                                        <i class="ri-arrow-up-line {{ $sortColumnName === 'created_at' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                                        <i class="ri-arrow-down-line {{ $sortColumnName === 'created_at' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                                    </span>
                                                </th>
                                                <th> {{ $allKeysProvider['action'] }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($allCourses->count() > 0)
                                            @foreach ($allCourses as $course)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ ucfirst($course->name) }}</td>
                                                <td>
                                                    <label class="switch">
                                                        <input wire:click.prevent="toggle({{ $course->id }},{{ $loop->iteration }})" id="switch-input-{{ $loop->iteration }}" class="switch-input" type="checkbox" {{ $course->status == 1 ? 'checked' : '' }} />
                                                        <span class="switch-label" data-on="{{ $statusText }}" data-off="deactive"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>
                                                </td>
                                                <td>{{ convertDateTimeFormat($course->created_at, 'date') }}
                                                </td>

                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="view">
                                                            <button type="button" wire:click="show({{ $course->id }})" class="btn btn-sm btn-primary view-item-btn" title="View Course Detail"><i class="ri-eye-fill"></i></button>
                                                        </div>

                                                        <div class="edit">
                                                            <button type="button" wire:click="edit({{ $course->id }})" class="btn btn-sm btn-success edit-item-btn" title="Edit Course Detail"><i class="ri-edit-box-line"></i></button>
                                                        </div>

                                                        <div class="remove">
                                                            <button type="button" wire:click.prevent="delete({{ $course->id }})" class="btn btn-sm btn-danger remove-item-btn"><i class="ri-delete-bin-line" title="Delete Course"></i></button>
                                                        </div>


                                                        {{-- <div class="view">
                                                            <a type="button" href="{{ route('auth.content', $course->uuid) }}" class="btn btn-sm btn-primary remove-item-btn"><i class="ri-file-list-line" title="Add Course Content"></i></a>
                                                    </div> --}}


                                                    <div class="remove">
                                                        <a type="button" href="{{ route('auth.lectures', $course->uuid) }}" class="btn btn-sm btn-primary remove-item-btn" title="Add Lecture"><i class="ri-file-list-line"></i></a>
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
                            {{ $allCourses->links('vendor.pagination.bootstrap-4') }}
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
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" /> -->
@endpush

@push('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/resumable.js/1.1.0/resumable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script> -->


<script type="text/javascript">
    document.addEventListener('changeToggleStatus', function(event) {
        var status = event.detail[0]['status'];
        var alertIndex = event.detail[0]['index'];
        var activeTab = event.detail[0]['activeTab'];

        $("#switch-input-" + activeTab + "-" + alertIndex).prop("checked", status);
    });

    document.addEventListener('loadPlugins', function(event) {
        $(document).ready(function() {

            //Start Upload Image file
            let browseImageFile = $("#browseImageFile");
            let resumableImage = new Resumable({
                target: "{{ route('auth.admin.upload-file') }}",
                query: {
                    _token: '{{ csrf_token() }}'
                },
                fileType: ['jpg', 'png', 'jpeg', 'svg'],
                chunkSize: 2 * 1024 * 1024,
                headers: {
                    'Accept': 'application/json'
                },
                testChunks: false,
                throttleProgressCallbacks: 1,
            });
            resumableImage.assignBrowse(browseImageFile[0]);
            resumableImage.on('fileAdded', function(file) {
                browseImageFile.attr('disabled', true);
                $('.submit-btn').attr('disabled', true);

                showProgress('.progress-image', '#progress-bar-image');
                resumableImage.upload()
            });

            resumableImage.on('fileProgress', function(file) {
                updateProgress('.progress-image', '#progress-bar-image', Math.floor(file.progress() * 100));
            });

            resumableImage.on('fileSuccess', function(file, response) {
                console.log('res',response);
                response = JSON.parse(response)
                browseImageFile.attr('disabled', false);
                $('.submit-btn').attr('disabled', false);

                if (response.mime_type.includes("image")) {
                    var imagePath = response.path + '/' + response.name;

                    @this.set('image', response.name);
                    @this.set('originalImage', imagePath);

                    $('#imagePreview').attr('src', imagePath).show();
                }

                $('.card-footer').show();
            });

            resumableImage.on('fileError', function(file, response) { // trigger when there is any error
                alert('file uploading error.')
            });
            //End upload image file


            //Start Upload Video file
            // let browseVideoFile = $("#browseVideoFile");
            // let resumableVideo = new Resumable({
            //     target: "{{ route('auth.admin.upload-file') }}",
            //     query: {
            //         _token: '{{ csrf_token() }}'
            //     },
            //     fileType: ['webm', 'mp4', 'wmv', 'flv', 'mov'],
            //     chunkSize: 2 * 1024 * 1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
            //     headers: {
            //         'Accept': 'application/json'
            //     },
            //     testChunks: false,
            //     throttleProgressCallbacks: 1,
            // });

            // if (browseVideoFile && browseVideoFile.length > 0) {
            //     resumableVideo.assignBrowse(browseVideoFile[0]);
            // }

            // resumableVideo.on('fileAdded', function(file) { // trigger when file picked
            //     browseVideoFile.attr('disabled', true);

            //     $('.submit-btn').attr('disabled', true);

            //     showProgress('.progress-video', '#progress-bar-video');
            //     resumableVideo.upload() // to actually start uploading.
            // });

            // resumableVideo.on('fileProgress', function(file) { // trigger when file progress update
            //     updateProgress('.progress-video', '#progress-bar-video', Math.floor(file.progress() * 100));
            // });

            // resumableVideo.on('fileSuccess', function(file, response) { // trigger when file upload complete
            //     response = JSON.parse(response)

            //     browseVideoFile.attr('disabled', false);
            //     $('.submit-btn').attr('disabled', false);

            //     if (response.mime_type.includes("video")) {
            //         var videoPath = response.path + '/' + response.name;

            //         @this.set('video', response.name);
            //         @this.set('originalVideo', videoPath);

            //         $('#videoPreview').attr('src', videoPath).show();
            //     }

            //     $('.card-footer').show();
            // });

            // resumableVideo.on('fileError', function(file, response) { // trigger when there is any error
            //     alert('file uploading error.')
            // });
            //End upload video file


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
                        // Update the Livewire property when the Summernote content changes
                        @this.set('description', content);
                    }
                }
            });

            // FOR DROPIFY
            // $('.dropify').dropify();
            // $('.dropify-errors-container').remove();

            // $('.dropify-clear').click(function(e) {
            //     e.preventDefault();
            //     var elementName = $(this).siblings('input[type=file]').attr('id');
            //     if (elementName == 'dropify-image') {
            //         @this.set('image', null);
            //         @this.set('originalImage', null);
            //         @this.set('removeImage', true);

            //     } else if (elementName == 'dropify-video') {
            //         @this.set('video', null);
            //         @this.set('originalVideo', null);
            //         @this.set('videoExtenstion', null);
            //         @this.set('removeVideo', true);
            //     }
            // });

            //   Start video duration get js
            // var videoFileInput = document.getElementById('video-file');

            // console.log('videoFileInput', videoFileInput);

            // videoFileInput.addEventListener('change', function(event) {
            //     var file = event.target.files[0];
            //     var reader = new FileReader();

            //     reader.onload = function(event) {
            //         var video = document.createElement('video');
            //         video.addEventListener('loadedmetadata', function() {
            //             var duration = video.duration; // Duration in seconds
            //             // console.log('Video duration: ' + duration + ' seconds');
            //             @this.emit('updateVideoDuration', formatTime(duration));
            //             console.log('Upload Video Duration :- ' + formatTime(
            //                 duration));
            //         });
            //         video.src = event.target.result;
            //     };

            //     reader.readAsDataURL(file);
            // });

            // Function to format time in HH:MM:SS format
            function formatTime(timeInSeconds) {
                var hours = Math.floor(timeInSeconds / 3600);
                var minutes = Math.floor((timeInSeconds % 3600) / 60);
                var seconds = Math.floor(timeInSeconds % 60);

                return (
                    (hours > 0 ? hours + ':' : '0' + hours) + ':' +
                    (minutes < 10 ? '0' + minutes : minutes) +
                    ':' +
                    (seconds < 10 ? '0' + seconds : seconds)
                );
            }
            //   End video duration get js



        });
    });
</script>

@include('partials.admin.upload_file')
@endpush

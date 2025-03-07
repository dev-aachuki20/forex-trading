<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Course Content</h4>
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
                                <h4 class="card-title mb-0 flex-grow-1">{{ $allKeysProvider['view_blog'] }}</h4>
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
                                        <a href="{{ route('auth.courses') }}" type="button"
                                            class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i>
                                            {{ $allKeysProvider['back'] }}</a>
                                        <button wire:click.prevent="create" type="button"
                                            class="btn btn-success add-btn"><i class="ri-add-line"></i>
                                            {{ $allKeysProvider['add'] }}</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            @if ($formMode)
                                @include('livewire.admin.course-content.form', [
                                    'languageId' => $languageId,
                                ])
                            @elseif($viewMode)
                                @livewire('admin.course-content.show', ['content_id' => $content_id])
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
                                                @if ($allCourseContent->count() > 0)
                                                    @foreach ($allCourseContent as $content)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ ucfirst($content->name) }}</td>
                                                            <td>
                                                                <label class="switch">
                                                                    <input
                                                                        wire:click.prevent="toggle({{ $content->id }},{{ $loop->iteration }})"
                                                                        id="switch-input-{{ $loop->iteration }}"
                                                                        class="switch-input" type="checkbox"
                                                                        {{ $content->status == 1 ? 'checked' : '' }} />
                                                                    <span class="switch-label"
                                                                        data-on="{{ $statusText }}"
                                                                        data-off="deactive"></span>
                                                                    <span class="switch-handle"></span>
                                                                </label>
                                                            </td>
                                                            <td>{{ convertDateTimeFormat($content->created_at, 'date') }}
                                                            </td>

                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <div class="view">
                                                                        <button type="button"
                                                                            wire:click="show({{ $content->id }})"
                                                                            class="btn btn-sm btn-primary view-item-btn"><i
                                                                                class="ri-eye-fill" title="View Content"></i></button>
                                                                    </div>

                                                                    <div class="edit">
                                                                        <button type="button"
                                                                            wire:click="edit({{ $content->id }})"
                                                                            class="btn btn-sm btn-success edit-item-btn"><i
                                                                                class="ri-edit-box-line" title="Edit Content"></i></button>
                                                                    </div>

                                                                    <div class="remove">
                                                                        <button type="button"
                                                                            wire:click.prevent="delete({{ $content->id }})"
                                                                            class="btn btn-sm btn-danger remove-item-btn" title="Delete Content"><i
                                                                                class="ri-delete-bin-line"></i></button>
                                                                    </div>

                                                                    <div class="remove">
                                                                        <a type="button"
                                                                            href="{{ route('auth.lectures', $content->uuid) }}"
                                                                            class="btn btn-sm btn-primary remove-item-btn" title="Add Lecture"><i
                                                                                class="ri-file-list-line"></i></a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td class="text-center" colspan="6">
                                                            {{ __('messages.no_record_found') }}</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    {{ $allCourseContent->links('vendor.pagination.bootstrap-4') }}
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

@push('scripts')
    <script type="text/javascript">
        document.addEventListener('changeToggleStatus', function(event) {
            var status = event.detail[0]['status'];
            var alertIndex = event.detail[0]['index'];
            var activeTab = event.detail[0]['activeTab'];

            $("#switch-input-"+activeTab+"-" + alertIndex).prop("checked", status);
        });

        document.addEventListener('loadPlugins', function(event) {
            $(document).ready(function() {
                //   Start video duration get js
                var videoFileInput = document.getElementById('video-file');

                // console.log('videoFileInput', videoFileInput);

                videoFileInput.addEventListener('change', function(event) {
                    var file = event.target.files[0];
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        var video = document.createElement('video');
                        video.addEventListener('loadedmetadata', function() {
                            var duration = video.duration; // Duration in seconds
                            // console.log('Video duration: ' + duration + ' seconds');
                            @this.emit('updateVideoDuration', formatTime(duration));
                            // console.log('Upload Video Duration :- ' + formatTime(
                            //     duration));
                        });
                        video.src = event.target.result;
                    };

                    reader.readAsDataURL(file);
                });

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
@endpush

<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{$allKeysProvider['page_management']}}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            @if($updateMode)

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">{{$allKeysProvider['edit']}} {{ ucwords(str_replace('-',' ',$page_key)) }} </h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button wire:click.prevent="cancel" type="button" class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i> {{$allKeysProvider['back']}}</button>
                                </div>
                            </div>
                        </div>
                        <!-- end card header -->

                        <div class="card-body form-steps">
                            <div class="vertical-navs-step">
                                <div class="row gy-5">
                                    <div class="col-lg-2">
                                        <div class="nav flex-column custom-nav nav-pills" role="tablist" aria-orientation="vertical">
                                            @foreach($languagedata as $language)
                                            <button class="nav-link  {{ $activeTab === $language->id ? 'active' : '' }}" wire:click="switchTab({{ $language->id }},{{$langPages[$language->id]}})" id="tab-{{$language->id}}" data-bs-toggle="pill" data-bs-target="#form-{{$language->id}}" type="button" role="tab" aria-controls="form-{{$language->id}}" aria-selected="true">
                                                {{ trans(ucfirst($language->name)) }}
                                            </button>
                                            @endforeach
                                        </div>
                                        <!-- end nav -->
                                    </div>
                                    <!-- end col-->

                                    <div class="col-lg-10">
                                        <div class="px-lg-4">
                                            <div class="tab-content">
                                                @foreach($langPages as $langId=>$pageId)
                                                <div class="tab-pane fade {{ $activeTab === $langId ? 'active show' : '' }}" id="form-{{$langId}}" role="tabpanel" aria-labelledby="tab-{{$langId}}">
                                                    <div>
                                                        @include('livewire.admin.page.form')
                                                    </div>
                                                </div>
                                                <!-- end tab pane -->
                                                @endforeach

                                            </div>
                                            <!-- end tab content -->
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            @elseif($editSections)
            @livewire('admin.setting.edit', ['page_key' => $page_key])
            @else

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            @if($updateMode)
                            <h4 class="card-title mb-0 flex-grow-1">{{$allKeysProvider['edit']}}</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button wire:click.prevent="cancel" type="button" class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i> {{$allKeysProvider['back']}}</button>
                                </div>
                            </div>
                            @elseif($viewMode)
                            <h4 class="card-title mb-0 flex-grow-1">{{$allKeysProvider['view_page']}}</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button wire:click.prevent="cancel" type="button" class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i> {{$allKeysProvider['back']}}</button>
                                </div>
                            </div>
                            @else
                            <h4 class="card-title mb-0 flex-grow-1">{{$allKeysProvider['list']}}</h4>
                            <div class="flex-shrink-0">
                                <!-- <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button wire:click.prevent="create" type="button" class="btn btn-success add-btn"><i class="ri-add-line"></i> {{$allKeysProvider['add']}}</button>
                                </div> -->
                            </div>
                            @endif
                        </div>
                        <div class="card-body">
                            @if ($updateMode)
                            @include('livewire.admin.page.form', ['languageId' => $languageId])
                            @elseif($viewMode)
                            @livewire('admin.page.show', ['page_id' => $page_id])
                            @else
                            <div class="listjs-table" id="customerList">

                                <!-- show and search -->
                                <div class="row pt-4">
                                    <div class="col-md-8">
                                        <label>Show
                                            <select wire:change="updatePaginationLength($event.target.value)">
                                                @foreach(config('constants.datatable_paginations') as $length)
                                                <option value="{{ $length }}">{{ $length }}</option>
                                                @endforeach
                                            </select>
                                            entries</label>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="col-sm">
                                            <div class="d-flex justify-content-sm-end">
                                                <div class="search-box ms-2">
                                                    <input type="text" class="form-control" placeholder="{{$allKeysProvider['search']}}" wire:model.live="search">
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
                                                <th>{{ $allKeysProvider['page_name'] }}</th>
                                                <th>{{$allKeysProvider['title']}}</th>

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
                                            @if($allPage->count() > 0)
                                            @foreach($allPage as $keyIndex => $page)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ ucwords(str_replace('-',' ',$page->page_key)) }}</td>
                                                <td>{{ ucfirst($page->title) }}</td>

                                                <td>{{ convertDateTimeFormat($page->created_at,'date') }}</td>

                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="view">
                                                            <button type="button" wire:click="editSection('{{$page->page_key}}')" class="btn btn-sm btn-primary view-item-btn" title="View Sections"><i class="ri-eye-fill"></i></button>
                                                        </div>

                                                        <div class="edit">
                                                            <button type="button" wire:click="edit('{{$page->page_key}}',{{$page->id}})" class="btn btn-sm btn-success edit-item-btn" title="Edit Banner"><i class="ri-edit-box-line"></i></button>
                                                        </div>

                                                        {{--<div class="remove">
                                                            <button type="button" wire:click.prevent="delete({{$page->id}})" class="btn btn-sm btn-danger remove-item-btn"><i class="ri-delete-bin-line"></i></button>
                                                    </div>--}}
                                </div>
                                </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="text-center" colspan="6">{{ __('messages.no_record_found')}}</td>
                                </tr>
                                @endif
                                </tbody>
                                </table>
                            </div>
                            {{ $allPage->links('vendor.pagination.bootstrap-5') }}
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
        @endif



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
    document.addEventListener('changeToggleStatus', function(event) {
        var status = event.detail[0]['status'];
        var alertIndex = event.detail[0]['index'];
        var activeTab = event.detail[0]['activeTab'];

        $("#switch-input-" + activeTab + "-" + alertIndex).prop("checked", status);
    });

    document.addEventListener('loadPlugins', function(event) {

        $(document).ready(function() {

            // Get the id attribute value
            // var inputId = inputElement.id;

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
                    // ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    // ['table', ['table']],
                    ['insert', [ /*'link', 'picture', 'video'*/ ]],
                    ['view', ['codeview', /*'help'*/ ]],
                ],
                callbacks: {
                    onChange: function(content) {
                        // Update the Livewire property when the Summernote content changes
                        // console.log(content);
                        @this.dispatch('setDescription', {
                            description: content
                        });
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
                    @this.dispatch('funRemoveImage', {
                        removeImage: true
                    });
                } else if (elementName == 'dropify-video') {
                    @this.set('video', null);
                    @this.set('originalVideo', null);
                    @this.dispatch('funRemoveVideo', {
                        removeVideo: true
                    });
                }
            });



        });
    });
</script>

@endpush
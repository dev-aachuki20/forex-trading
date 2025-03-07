<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{__('cruds.sidebar.Language')}}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">{{__('cruds.sidebar.List')}}</h4>
                        </div>
                        <div class="card-body">
                            @if ($formMode)
                            @include('livewire.admin.language.form')
                            @else
                            <div class="listjs-table" id="customerList">

                                <div class="row pt-4">
                                    <div class="col-md-8">
                                        <label>{{__('cruds.show')}}
                                            <select wire:change="updatePaginationLength($event.target.value)">
                                                @foreach(config('constants.datatable_paginations') as $length)
                                                <option value="{{ $length }}">{{ $length }}</option>
                                                @endforeach
                                            </select>
                                            {{__('cruds.entries')}}</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-sm">
                                            <div class="d-flex justify-content-sm-end">
                                                <div class="search-box ms-2">
                                                    <input type="text" class="form-control" placeholder="{{__('cruds.search')}}" wire:model.live="search">
                                                    <i class="ri-search-line search-icon"></i>
                                                     <span id="clearSearch" class="clear-icon" wire:click.prevent="clearSearch"><i class="fas fa-times"></i></span>
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
                                                <th>{{__('cruds.sno')}}</th>
                                                <th>{{__('cruds.Name')}}</th>
                                                <th>{{__('cruds.Code')}}</th>
                                                <th>{{__('cruds.Status')}}</th>
                                                <th>{{__('cruds.Created At')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($languages->count() > 0)
                                            @foreach($languages as $lang)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ ucfirst($lang->name)}}</td>
                                                <td>{{ $lang->code}}</td>
                                                <td>
                                                    @if($lang->code !== 'en')
                                                    <label class="switch">
                                                        <input wire:click.prevent="toggle({{ $lang->id }},{{$loop->iteration}})" id="switch-input-{{$loop->iteration}}" class="switch-input" type="checkbox" {{ $lang->status == 1 ? 'checked' : '' }} />
                                                        <span class="switch-label" data-on="{{ $statusText }}" data-off="deactive"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>
                                                    @endif
                                                </td>
                                                <td>{{ convertDateTimeFormat($lang->created_at,'date') }}</td>
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
                                {{ $languages->links('vendor.pagination.bootstrap-4') }}
                                <!-- eng tab end -->
                            </div>
                            @endif
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
@push('scripts')
<script type="text/javascript">
    document.addEventListener('changeToggleStatus', function(event) {
        var status = event.detail[0]['status'];
        var alertIndex = event.detail[0]['index'];
        $("#switch-input-" + alertIndex).prop("checked", status);
        location.reload();
    });
</script>
@endpush
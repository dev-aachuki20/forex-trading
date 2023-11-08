<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{__('cruds.faq_type.title') }}</h4>
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
                            <h4 class="card-title mb-0 flex-grow-1">{{ $allKeysProvider['view_faq'] }}</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button wire:click.prevent="cancel" type="button" class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i>
                                        {{ $allKeysProvider['back'] }}</button>
                                </div>
                            </div>
                            @else
                            <h4 class="card-title mb-0 flex-grow-1">{{ $allKeysProvider['list'] }}</h4>
                            {{--<div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button wire:click.prevent="create" type="button" class="btn btn-success add-btn"><i class="ri-add-line"></i>
                                        {{ $allKeysProvider['add'] }}</button>
                                </div>
                            </div>--}}
                            @endif
                        </div>
                        <div class="card-body">
                            @if ($formMode)
                                @include('livewire.admin.faq-types.form')
                            @elseif($viewMode)
                               {{-- @livewire('admin.faq-faq-types.show', ['faqId' => $faqId]) --}}
                            @else
                           
                            <div class="listjs-table" id="customerList">
                               
                                <!-- show and search -->
                                <div class="row pt-4">
                                    <div class="col-md-8">
                                        <label>{{__('cruds.show')}}
                                            <select wire:change="updatePaginationLength($event.target.value)">
                                                @foreach (config('constants.datatable_paginations') as $length)
                                                <option value="{{ $length }}">{{ $length }}
                                                </option>
                                                @endforeach
                                            </select>
                                            {{__('cruds.entries')}}</label>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="col-sm">
                                            <div class="d-flex justify-content-sm-end">
                                                <div class="search-box ms-2">
                                                    <input type="text" class="form-control" placeholder="{{ $allKeysProvider['search'] }}" wire:model.live="search">
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
                                                <th>{{ $allKeysProvider['sno'] }}</th>
                                                <th>{{ __('cruds.faq_type.fields.title') }}</th>
                                                <th>{{ __('cruds.Status') }}</th>
                                                <th>{{ __('cruds.created_at') }}
                                                    <span wire:click="sortBy('created_at')" class="float-right text-sm" style="cursor: pointer;">
                                                        <i class="ri-arrow-up-line {{ $sortColumnName === 'created_at' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                                        <i class="ri-arrow-down-line {{ $sortColumnName === 'created_at' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                                    </span>
                                                </th>
                                                <th> {{ $allKeysProvider['action'] ?? 'Action' }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      
                                            @if ($faqTypes->count() > 0)

                                          
                                            @foreach ($faqTypes as $serialNo => $faqType)
                                            <tr>
                                                <td>{{ $serialNo + 1 }}</td>
                                                <td>{{ ucwords(json_decode($faqType->title,true)[$locale]) }}</td>
                                                <td>
                                                    <label class="switch">
                                                        <input wire:click.prevent="toggle({{ $faqType->id }},{{$serialNo}})" id="switch-input-{{ $serialNo }}" class="switch-input" type="checkbox" {{ $faqType->status == 1 ? 'checked' : '' }} />
                                                        <span class="switch-label" data-on="{{__('cruds.active')}}" data-off="{{__('cruds.deactive')}}"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>

                                                </td>
                                                <td>{{ convertDateTimeFormat($faqType->created_at, 'date') }}
                                                </td>

                                                <td>
                                                    <div class="d-flex gap-2">
                                                       {{-- <div class="view">
                                                            <button type="button" wire:click="show({{ $faqType->id }})" class="btn btn-sm btn-primary view-item-btn"><i class="ri-eye-fill"></i></button>
                                                        </div> --}}

                                                        <div class="edit">
                                                            <button type="button" wire:click="edit({{ $faqType->id }})" class="btn btn-sm btn-success edit-item-btn"><i class="ri-edit-box-line"></i></button>
                                                        </div>

                                                       {{--  
                                                        <div class="remove">
                                                            <button type="button" wire:click.prevent="delete({{ $faqType->id }})" class="btn btn-sm btn-danger remove-item-btn"><i class="ri-delete-bin-line"></i></button>
                                                        </div>
                                                        --}}

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
                                {{ $faqTypes->links('vendor.pagination.bootstrap-5') }}
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

@endpush

@push('scripts')
<script type="text/javascript">
    document.addEventListener('changeToggleStatus', function(event) {
        var status = event.detail[0]['status'];
        var alertIndex = event.detail[0]['index'];
        $("#switch-input-" + alertIndex).prop("checked", status);
    });

</script>

@endpush
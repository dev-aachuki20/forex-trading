<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">View Affiliate Users</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            @if($viewMode)
                            <h4 class="card-title mb-0 flex-grow-1">View Affiliate</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button wire:click.prevent="cancel" type="button" class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i> {{$allKeysProvider['back']}}</button>
                                </div>
                            </div>
                            @else
                            <h4 class="card-title mb-0 flex-grow-1">{{$allKeysProvider['list']}}</h4>
                            @endif
                        </div>
                        <div class="card-body">
                            @if($viewMode)
                            @livewire('admin.affiliate.show', ['affiliate_id' => $affiliate_id])
                            @else
                            <div class="listjs-table" id="customerList">

                                <!-- tabs-->
                                <div class="row">
                                    <div class="col-md-8">
                                        @if($languagedata->count()>0)
                                        @foreach($languagedata as $language)
                                        <li wire:click="switchTab({{$language->id}})" class="btn {{ $activeTab === $language->id ? 'active' : '' }}">
                                            {{ucfirst($language->name)}}
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
                                                <th>{{$allKeysProvider['first_name']}}</th>
                                                <th>{{$allKeysProvider['last_name']}}</th>
                                                <th>{{$allKeysProvider['email']}}</th>
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
                                            @if($affiliates->count() > 0)
                                            @foreach($affiliates as $affiliate)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ ucfirst($affiliate->first_name)}}</td>
                                                <td>{{ ucwords($affiliate->last_name)}}</td>
                                                <td>{{ ucwords($affiliate->email)}}</td>
                                                {{-- <td>
                                                    <label class="switch">
                                                        <input wire:click.prevent="toggle({{ $affiliate->id }},{{$loop->iteration}})" id="switch-input-{{$activeTab}}-{{$loop->iteration}}" class="switch-input" type="checkbox" {{ $affiliate->status == 1 ? 'checked' : '' }} />
                                                <span class="switch-label" data-on="{{ $statusText }}" data-off="deactive"></span>
                                                <span class="switch-handle"></span>
                                                </label>
                                                </td> --}}
                                                <td>{{ convertDateTimeFormat($affiliate->created_at,'date') }}</td>

                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="view">
                                                            <button type="button" wire:click="show({{$affiliate->id}})" class="btn btn-sm btn-primary view-item-btn"><i class="ri-eye-fill"></i></button>
                                                        </div>

                                                        {{-- <div class="edit">
                                                            <button type="button" wire:click="edit({{$blog->id}})" class="btn btn-sm btn-success edit-item-btn"><i class="ri-edit-box-line"></i></button>
                                                    </div>

                                                    <div class="remove">
                                                        <button type="button" wire:click.prevent="delete({{$blog->id}})" class="btn btn-sm btn-danger remove-item-btn"><i class="ri-delete-bin-line"></i></button>
                                                    </div> --}}
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
                            {{ $affiliates->links('vendor.pagination.bootstrap-4') }}
                            <!-- eng tab end -->
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
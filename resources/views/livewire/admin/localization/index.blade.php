<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ $allKeysProvider['language'] }}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
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
                            @else
                            <h4 class="card-title mb-0 flex-grow-1">{{$allKeysProvider['localization']}}</h4>
                            @endif
                        </div>
                        <div class="card-body">
                            @if ($updateMode)
                            @include('livewire.admin.localization.form')
                            @else
                            <div class="listjs-table" id="customerList">
                                <!-- tabs-->
                                <div class="row">
                                    <div class="col-md-8">
                                        <!-- <li wire:click="switchTab('all')" class="btn {{ $activeTab === 'all' ? 'active' : '' }}">
                                            All
                                        </li> -->

                                        @if($languagedata->count()>0)
                                        @foreach($languagedata as $language)
                                        <li wire:click="switchTab({{$language->id}})" class="btn {{ $activeTab === $language->id ? 'active' : '' }}">
                                            {{ucfirst($language->name)}}
                                        </li>
                                        @endforeach
                                        @endif
                                        <!-- <li wire:click="switchTab(2)" class="btn {{ $activeTab === 2 ? 'active' : '' }}">
                                            {{$allKeysProvider['japanese']}}
                                        </li>
                                        <li wire:click="switchTab(3)" class="btn {{ $activeTab === 3 ? 'active' : '' }}">{{$allKeysProvider['thai']}}</li> -->
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
                                <div class="table-responsive mt-3 my-team-details table-record localization-table">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th width="10%">{{ $allKeysProvider['sno'] }}</th>
                                                <th width="30%">{{$allKeysProvider['key']}}</th>
                                                <th width="30%">{{$allKeysProvider['value']}}</th>
                                                <th width="20%">{{ $allKeysProvider['createdat'] }}
                                                    <span wire:click="sortBy('created_at')" class="float-right text-sm" style="cursor: pointer;">
                                                        <i class="ri-arrow-up-line {{ $sortColumnName === 'created_at' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                                        <i class="ri-arrow-down-line {{ $sortColumnName === 'created_at' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                                    </span>
                                                </th>
                                                <th width="10%"> {{ $allKeysProvider['action'] }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($localization->count() > 0)
                                            @foreach($localization as $serialNo => $lang)
                                            <tr>
                                                <td>{{ $serialNo+1 }}</td>
                                                <td>{{ ucfirst($lang->key)}}</td>
                                                <td>{{ ucfirst($lang->value)}}</td>
                                                <td>{{ convertDateTimeFormat($lang->created_at,'date') }}</td>

                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button type="button" wire:click="edit({{$lang->id}})" class="btn btn-sm btn-success edit-item-btn"><i class="ri-edit-box-line"></i></button>
                                                        </div>
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
                                {{ $localization->links('vendor.pagination.bootstrap-4') }} 
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
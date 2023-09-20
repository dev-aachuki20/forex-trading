<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Contestants</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">{{$allKeysProvider['list']}}</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <a href="{{route('auth.contest')}}" type="button" class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i> {{$allKeysProvider['back']}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="listjs-table" id="customerList">

                                <!-- tabs-->
                                {{-- <div class="row">
                                    <div class="col-md-8">
                                        @if($languagedata->count()>0)
                                        @foreach($languagedata as $language)
                                        <li wire:click="switchTab({{$language->id}})" class="btn {{ $activeTab === $language->id ? 'active' : '' }}">
                                {{ucfirst($language->name)}}
                                </li>
                                @endforeach
                                @endif
                            </div>
                        </div> --}}

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
                                        <th>{{$allKeysProvider['nick_name']}}</th>
                                        <th>{{$allKeysProvider['email']}}</th>
                                        <th>{{$allKeysProvider['account_no']}}</th>
                                        <th>{{$allKeysProvider['phone_number']}}</th>
                                        <th>{{$allKeysProvider['country']}}</th>
                                        <th>{{ $allKeysProvider['createdat'] }}
                                            <span wire:click="sortBy('created_at')" class="float-right text-sm" style="cursor: pointer;">
                                                <i class="ri-arrow-up-line {{ $sortColumnName === 'created_at' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                                <i class="ri-arrow-down-line {{ $sortColumnName === 'created_at' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($allContestants->count() > 0)
                                    @foreach($allContestants as $contest)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ ucfirst($contest->first_name)}}</td>
                                        <td>{{ ucfirst($contest->last_name) }}</td>
                                        <td>{{ $contest->nick_name ?? '-'}}</td>
                                        <td>{{ $contest->email }}</td>
                                        <td>{{ $contest->trading_account_no }}</td>
                                        <td>{{ $contest->contact_number }}</td>
                                        <td>{{ $contest->country_name }}</td>
                                        <td>{{ convertDateTimeFormat($contest->created_at,'date') }}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class="text-center" colspan="9">{{ __('messages.no_record_found')}}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        {{ $allContestants->links('vendor.pagination.bootstrap-4') }}
                        <!-- eng tab end -->
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
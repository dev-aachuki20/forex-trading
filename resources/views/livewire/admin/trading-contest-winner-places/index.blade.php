<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ $allKeysProvider['trading_contest_winner_places'] ?? 'Contest Winner Places' }}</h4>
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
                                    <a href="{{ route('auth.contest') }}" type="button" class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i>
                                        {{ $allKeysProvider['back'] }}</a>
                                </div>
                            </div>
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
                            @include('livewire.admin.trading-contest-winner-places.form', [
                            'languageId' => $languageId,
                            ])
                            @elseif($viewMode)
                            @livewire('admin.trading-contest-winner-places.show', ['winnerPlace_id' => $winnerPlace_id])
                            @else
                            <div class="listjs-table" id="customerList">

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
                                                <th>{{ $allKeysProvider['title'] }}</th>
                                                <th>@lang('frontend.position')</th>
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
                                            @if ($allContestwinnerplaces->count() > 0)
                                            @foreach ($allContestwinnerplaces as $winnerPlace)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ ucfirst($winnerPlace->title) }}</td>
                                                <td>{{ ucfirst($winnerPlace->position) }}{{ $this->getPositionSuffix($winnerPlace->position) }}</td>
                                                <td>{{ convertDateTimeFormat($winnerPlace->created_at, 'date') }}
                                                </td>

                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="view">
                                                            <button type="button" wire:click="show({{ $winnerPlace->id }})" class="btn btn-sm btn-primary view-item-btn"><i class="ri-eye-fill"></i></button>
                                                        </div>

                                                        <div class="edit">
                                                            <button type="button" wire:click="edit({{ $winnerPlace->id }})" class="btn btn-sm btn-success edit-item-btn"><i class="ri-edit-box-line"></i></button>
                                                        </div>

                                                        <div class="remove">
                                                            <button type="button" wire:click.prevent="delete({{ $winnerPlace->id }})" class="btn btn-sm btn-danger remove-item-btn"><i class="ri-delete-bin-line"></i></button>
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
                                {{ $allContestwinnerplaces->links('vendor.pagination.bootstrap-4') }}
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
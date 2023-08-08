<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{$allKeysProvider['faq']}}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            @if ($formMode)
                            @include('livewire.admin.faq.form', ['languageId' => $languageId])
                            @elseif($viewMode)
                            @livewire('admin.faq.show', ['faqId' => $faqId])
                            @else
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <h4 class="card-title mb-0">{{$allKeysProvider['list']}}</h4>
                                    </div>
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <button wire:click.prevent="create" type="button" class="btn btn-success add-btn"><i class="ri-add-line align-bottom me-1"></i>
                                            {{$allKeysProvider['add']}}</button>
                                        </div>
                                    </div>
                                </div>
                                <hr>


                                <!-- search and tabs-->
                                <div class="row">
                                    <div class="col-md-8">
                                        <li wire:click="switchTab('english')" class="btn {{ $activeTab === 'english' ? 'active' : '' }}">
                                            {{$allKeysProvider['english']}}
                                        </li>
                                        <li wire:click="switchTab('japanese')" class="btn {{ $activeTab === 'japanese' ? 'active' : '' }}">
                                            {{$allKeysProvider['japanese']}}
                                        </li>
                                        <li wire:click="switchTab('thai')" class="btn {{ $activeTab === 'thai' ? 'active' : '' }}">{{$allKeysProvider['thai']}}
                                        </li>
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

                                <!-- english tab start -->
                                <div class="table-responsive table-card mt-3 mb-1">
                                    @if ($activeTab === 'english')
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="sort" data-sort="customer_name">
                                                    {{ $allKeysProvider['sno'] }}
                                                </th>
                                                <th class="sort" data-sort="email">{{$allKeysProvider['question']}}
                                                </th>
                                                <th class="sort" data-sort="email">{{$allKeysProvider['type']}}
                                                </th>
                                                <th class="sort" data-sort="status">
                                                    {{ $allKeysProvider['status'] }}
                                                </th>
                                                <th class="sort" data-sort="date">
                                                    {{ $allKeysProvider['createdat'] }}
                                                </th>
                                                <th class="sort" data-sort="action">
                                                {{ $allKeysProvider['action'] }}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if($faqslanguageEng->count()>0)
                                            @foreach ($faqslanguageEng as $faqeng)
                                            <tr>
                                                <td class="customer_name">{{$loop->iteration}}</td>
                                                <td class="email">{{ucfirst($faqeng->question)}}</td>
                                                <td class="email">{{config('constants.faq_types')[$faqeng->faq_type]}}</td>
                                                <td>
                                                    <label class="switch">
                                                        <input wire:click.prevent="toggle({{ $faqeng->id }})" class="switch-input" type="checkbox" {{ $faqeng->status == 1 ? 'checked' : '' }} />
                                                        <span class="switch-label" data-on="{{ $statusText }}" data-off="deactive"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>

                                                </td>
                                                <td class="date">{{ $faqeng->created_at }}</td>



                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="view">
                                                            <button type="button" wire:click="show({{$faqeng->id}})" class="btn btn-sm btn-primary view-item-btn"><i class="ri-eye-fill"></i></button>
                                                        </div>

                                                        <div class="edit">
                                                            <button type="button" wire:click="edit({{$faqeng->id}})" class="btn btn-sm btn-success edit-item-btn"><i class="ri-edit-box-line"></i></button>
                                                        </div>

                                                        <div class="remove">
                                                            <button type="button" wire:click.prevent="delete({{$faqeng->id}})" class="btn btn-sm btn-danger remove-item-btn"><i class="ri-delete-bin-line"></i></button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td class="text-center" colspan="6">{{ $allKeysProvider['data_not_found']}}</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                {{ $faqslanguageEng->links('vendor.pagination.bootstrap-5') }}
                                <!-- english tab end -->

                                <!-- japanese tab start -->
                                <div class="table-responsive table-card mt-3 mb-1">
                                    @elseif ($activeTab === 'japanese')
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="sort" data-sort="customer_name">
                                                    {{ $allKeysProvider['sno'] }}
                                                </th>
                                                <th class="sort" data-sort="email">{{$allKeysProvider['question']}}
                                                </th>
                                                <th class="sort" data-sort="email">{{$allKeysProvider['type']}}
                                                </th>
                                                <th class="sort" data-sort="status">
                                                    {{ $allKeysProvider['status'] }}
                                                </th>
                                                <th class="sort" data-sort="date">
                                                    {{ $allKeysProvider['createdat'] }}
                                                </th>
                                                <th class="sort" data-sort="action">
                                                {{ $allKeysProvider['action'] }}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if($faqslanguageJp->count()>0)
                                            @foreach ($faqslanguageJp as $faqjp)
                                            <tr>
                                                <td class="customer_name">{{$loop->iteration}}</td>
                                                <td class="email">{{ucfirst($faqjp->question)}}</td>
                                                <td class="email">{{config('constants.faq_types')[$faqjp->faq_type]}}</td>
                                                <td>
                                                    <label class="switch">
                                                        <input wire:click.prevent="toggle({{ $faqjp->id }})" class="switch-input" type="checkbox" {{ $faqjp->status == 1 ? 'checked' : '' }} />
                                                        <span class="switch-label" data-on="{{ $statusText }}" data-off="deactive"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>

                                                </td>
                                                <td class="date">{{ $faqjp->created_at }}</td>



                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="view">
                                                            <button type="button" wire:click="show({{$faqjp->id}})" class="btn btn-sm btn-primary view-item-btn"><i class="ri-eye-fill"></i></button>
                                                        </div>

                                                        <div class="edit">
                                                            <button type="button" wire:click="edit({{$faqjp->id}})" class="btn btn-sm btn-success edit-item-btn"><i class="ri-edit-box-line"></i></button>
                                                        </div>

                                                        <div class="remove">
                                                            <button type="button" wire:click.prevent="delete({{$faqjp->id}})" class="btn btn-sm btn-danger remove-item-btn"><i class="ri-delete-bin-line"></i></button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td class="text-center" colspan="6">{{ $allKeysProvider['data_not_found']}}</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                {{ $faqslanguageJp->links('vendor.pagination.bootstrap-5') }}
                                <!-- japanese tab end -->


                                <!-- thai tab start -->
                                <div class="table-responsive table-card mt-3 mb-1">
                                    @elseif ($activeTab === 'thai')
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="sort" data-sort="customer_name">
                                                    {{ $allKeysProvider['sno'] }}
                                                </th>
                                                <th class="sort" data-sort="email">{{$allKeysProvider['question']}}
                                                </th>
                                                <th class="sort" data-sort="email">{{$allKeysProvider['type']}}
                                                </th>
                                                <th class="sort" data-sort="status">
                                                    {{ $allKeysProvider['status'] }}
                                                </th>
                                                <th class="sort" data-sort="date">
                                                    {{ $allKeysProvider['createdat'] }}
                                                </th>
                                                <th class="sort" data-sort="action">
                                                {{ $allKeysProvider['action'] }}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if($faqslanguageThai->count()>0)
                                            @foreach ($faqslanguageThai as $faqthai)
                                            <tr>
                                                <td class="customer_name">{{$loop->iteration}}</td>
                                                <td class="email">{{ucfirst($faqthai->question)}}</td>
                                                <td class="email">{{config('constants.faq_types')[$faqthai->faq_type]}}</td>
                                                <td>
                                                    <label class="switch">
                                                        <input wire:click.prevent="toggle({{ $faqthai->id }})" class="switch-input" type="checkbox" {{ $faqthai->status == 1 ? 'checked' : '' }} />
                                                        <span class="switch-label" data-on="{{ $statusText }}" data-off="deactive"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>

                                                </td>
                                                <td class="date">{{ $faqthai->created_at }}</td>



                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="view">
                                                            <button type="button" wire:click="show({{$faqthai->id}})" class="btn btn-sm btn-primary view-item-btn"><i class="ri-eye-fill"></i></button>
                                                        </div>

                                                        <div class="edit">
                                                            <button type="button" wire:click="edit({{$faqthai->id}})" class="btn btn-sm btn-success edit-item-btn"><i class="ri-edit-box-line"></i></button>
                                                        </div>

                                                        <div class="remove">
                                                            <button type="button" wire:click.prevent="delete({{$faqthai->id}})" class="btn btn-sm btn-danger remove-item-btn"><i class="ri-delete-bin-line"></i></button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td class="text-center" colspan="6">{{ $allKeysProvider['data_not_found']}}</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                {{ $faqslanguageThai->links('vendor.pagination.bootstrap-5') }}
                                <!-- thai tab end -->
                                @endif
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
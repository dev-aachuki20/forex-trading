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
                        <div class="card-body">
                            @if ($updateMode)
                            @include('livewire.admin.localization.form')
                            @else
                            <div class="listjs-table" id="customerList">

                                <!-- heading -->
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <h4 class="card-title mb-0">{{$allKeysProvider['localization']}}</h4>
                                    </div>
                                </div>
                                <hr>

                                <!-- search -->
                                <div class="row">
                                    <div class="col-md-8">
                                        <li wire:click="switchTab('english')" class="btn {{ $activeTab === 'english' ? 'active' : '' }}">
                                            {{$allKeysProvider['english']}}
                                        </li>
                                        <li wire:click="switchTab('japanese')" class="btn {{ $activeTab === 'japanese' ? 'active' : '' }}">
                                            {{$allKeysProvider['japanese']}}
                                        </li>
                                        <li wire:click="switchTab('thai')" class="btn {{ $activeTab === 'thai' ? 'active' : '' }}">{{$allKeysProvider['thai']}}</li>
                                        {{-- @foreach ($langTab as $lang)
                                            <a href="#language/{{ $lang->code }}" class="btn"
                                        type="button">{{ $lang->name }}</a>
                                        @endforeach --}}
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
                                <!-- table -->

                                <div class="table-responsive table-card mt-3 mb-1">
                                    @if ($activeTab === 'english')
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="sort" data-sort="customer_name">
                                                    {{$allKeysProvider['sno']}}
                                                </th>
                                                <th class="sort" data-sort="email">{{$allKeysProvider['key']}}
                                                </th>

                                                <th class="sort" data-sort="action">
                                                    {{$allKeysProvider['action']}}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if($languageOne->count() > 0)
                                            @foreach ($languageOne as $langone)
                                            <tr>
                                                <td class="customer_name">{{ $loop->iteration }}</td>
                                                <td class="email">{{ $langone->key }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button wire:click="edit({{ $langone->id }})" type="button" class="btn btn-sm btn-success edit-item-btn"><i class="ri-edit-box-line"></i></button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td class="text-center" colspan="6">{{$allKeysProvider['data_not_found']}}</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                {{ $languageOne->links('vendor.pagination.bootstrap-5') }}
                                <!-- english tab end -->


                                <!-- Japanese tab start -->
                                <!-- table -->
                                <div class="table-responsive table-card mt-3 mb-1">
                                    @elseif($activeTab === 'japanese')
                                    <table class="table align-middle table-nowrap" id="customerTable2">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="sort" data-sort="customer_name">
                                                    {{ $allKeysProvider['sno'] }}
                                                </th>
                                                <th class="sort" data-sort="email">{{$allKeysProvider['key']}}
                                                </th>

                                                <th class="sort" data-sort="action">
                                                    {{ $allKeysProvider['action'] }}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if($languageTwo->count() > 0)
                                            @foreach ($languageTwo as $langtwo)
                                            <tr>
                                                <td class="customer_name">{{ $loop->iteration }}</td>
                                                <td class="email">{{ $langtwo->key }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button wire:click="edit({{ $langtwo->id }})" type="button" class="btn btn-sm btn-success edit-item-btn"><i class="ri-edit-box-line"></i></button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td class="text-center" colspan="6">{{ $allKeysProvider['data_not_found'] }}</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                {{ $languageTwo->links('vendor.pagination.bootstrap-5') }}

                                <!-- Japanese tab end -->

                                <!-- thai tab start -->
                                <!-- table -->
                                <div class="table-responsive table-card mt-3 mb-1">
                                    @elseif($activeTab === 'thai')
                                    <table class="table align-middle table-nowrap" id="customerTable3">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="sort" data-sort="customer_name">
                                                    {{ $allKeysProvider['sno'] }}
                                                </th>
                                                <th class="sort" data-sort="email">Key
                                                </th>

                                                <th class="sort" data-sort="action">
                                                    {{ $allKeysProvider['action'] }}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if($languageThree->count() > 0)
                                            @foreach ($languageThree as $langthree)
                                            <tr>
                                                <td class="customer_name">{{ $loop->iteration }}</td>
                                                <td class="email">{{$langthree->key}}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button wire:click="edit({{$langthree->id}})" type="button" class="btn btn-sm btn-success edit-item-btn"><i class="ri-edit-box-line"></i></button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td class="text-center" colspan="6">{{ $allKeysProvider['data_not_found'] }}</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                {{ $languageThree->links('vendor.pagination.bootstrap-5') }}

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


    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->
</div>
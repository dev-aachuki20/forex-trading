<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ getLocalization('language') }}</h4>
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
                                        <h4 class="card-title mb-0">Localization</h4>
                                    </div>
                                </div>
                                <hr>

                                <!-- search -->
                                <div class="row">
                                    <div class="col-md-8">
                                        <li wire:click="switchTab('english')"
                                            class="btn {{ $activeTab === 'english' ? 'active' : '' }}">
                                            English</li>
                                        <li wire:click="switchTab('japanese')"
                                            class="btn {{ $activeTab === 'japanese' ? 'active' : '' }}">
                                            Japanese</li>
                                        <li wire:click="switchTab('thai')"
                                            class="btn {{ $activeTab === 'thai' ? 'active' : '' }}">Thai</li>
                                        {{-- @foreach ($langTab as $lang)
                                            <a href="#language/{{ $lang->code }}" class="btn"
                                                type="button">{{ $lang->name }}</a>
                                        @endforeach --}}
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-sm">
                                            <div class="d-flex justify-content-sm-end">
                                                <div class="search-box ms-2">
                                                    <input type="text" class="form-control search"
                                                        placeholder="{{ getLocalization('search') }}">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>



                                <!-- english tab start -->
                                <!-- table -->
                                @if ($activeTab === 'english')
                                    <div class="table-responsive table-card mt-3 mb-1">
                                        <table class="table align-middle table-nowrap" id="customerTable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="sort" data-sort="customer_name">
                                                        {{ getLocalization('sno') }}
                                                    </th>
                                                    <th class="sort" data-sort="email">Key
                                                    </th>

                                                    <th class="sort" data-sort="action">
                                                        {{ getLocalization('action') }}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach ($lang1 as $lg1)
                                                    <tr>
                                                        <td class="customer_name">{{ $loop->iteration }}</td>
                                                        <td class="email">{{ $lg1->key }}</td>
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <div class="edit">
                                                                    <button wire:click="edit({{ $lg1->id }})" type="button"
                                                                        class="btn btn-sm btn-success edit-item-btn"><i
                                                                            class="ri-edit-box-line"></i></button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <!-- data not found -->
                                        <div class="noresult" style="display: none">
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                    colors="primary:#121331,secondary:#08a88a"
                                                    style="width:75px;height:75px"></lord-icon>
                                                <h5 class="mt-2">{{ getLocalization('data_not_found') }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- previous next -->
                                    <div class="d-flex justify-content-end">
                                        <div class="pagination-wrap hstack gap-2">
                                            <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                                                {{ getLocalization('previous') }}
                                            </a>
                                            <ul class="pagination listjs-pagination mb-0"></ul>
                                            <a class="page-item pagination-next" href="javascript:void(0);">
                                                {{ getLocalization('next') }}
                                            </a>
                                        </div>
                                    </div>
                                    <!-- english tab end -->


                                    <!-- Japanese tab start -->
                                @elseif($activeTab === 'japanese')
                                    <!-- table -->
                                    <div class="table-responsive table-card mt-3 mb-1">
                                        <table class="table align-middle table-nowrap" id="customerTable2">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="sort" data-sort="customer_name">
                                                        {{ getLocalization('sno') }}
                                                    </th>
                                                    <th class="sort" data-sort="email">Key
                                                    </th>

                                                    <th class="sort" data-sort="action">
                                                        {{ getLocalization('action') }}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach ($lang2 as $lg2)
                                                    <tr>
                                                        <td class="customer_name">{{ $loop->iteration }}</td>
                                                        <td class="email">{{ $lg2->key }}</td>
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <div class="edit">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-success edit-item-btn"><i
                                                                            class="ri-edit-box-line"></i></button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <!-- data not found -->
                                        <div class="noresult" style="display: none">
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                    colors="primary:#121331,secondary:#08a88a"
                                                    style="width:75px;height:75px"></lord-icon>
                                                <h5 class="mt-2">{{ getLocalization('data_not_found') }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- previous next -->
                                    <div class="d-flex justify-content-end">
                                        <div class="pagination-wrap hstack gap-2">
                                            <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                                                {{ getLocalization('previous') }}
                                            </a>
                                            <ul class="pagination listjs-pagination mb-0"></ul>
                                            <a class="page-item pagination-next" href="javascript:void(0);">
                                                {{ getLocalization('next') }}
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Japanese tab end -->

                                    <!-- thai tab start -->
                                @elseif($activeTab === 'thai')
                                    <!-- table -->
                                    <div class="table-responsive table-card mt-3 mb-1">
                                        <table class="table align-middle table-nowrap" id="customerTable3">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="sort" data-sort="customer_name">
                                                        {{ getLocalization('sno') }}
                                                    </th>
                                                    <th class="sort" data-sort="email">Key
                                                    </th>

                                                    <th class="sort" data-sort="action">
                                                        {{ getLocalization('action') }}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach ($lang3 as $lg3)
                                                    <tr>
                                                        <td class="customer_name">{{ $loop->iteration }}</td>
                                                        <td class="email">{{ $lg3->key }}</td>
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <div class="edit">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-success edit-item-btn"><i
                                                                            class="ri-edit-box-line"></i></button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <!-- data not found -->
                                        <div class="noresult" style="display: none">
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                    colors="primary:#121331,secondary:#08a88a"
                                                    style="width:75px;height:75px"></lord-icon>
                                                <h5 class="mt-2">{{ getLocalization('data_not_found') }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- previous next -->
                                    <div class="d-flex justify-content-end">
                                        <div class="pagination-wrap hstack gap-2">
                                            <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                                                {{ getLocalization('previous') }}
                                            </a>
                                            <ul class="pagination listjs-pagination mb-0"></ul>
                                            <a class="page-item pagination-next" href="javascript:void(0);">
                                                {{ getLocalization('next') }}
                                            </a>
                                        </div>
                                    </div>
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

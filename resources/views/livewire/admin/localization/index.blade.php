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
                            @if ($formMode)
                            @include('livewire.admin.language.form')
                            @else
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <h4 class="card-title mb-0">{{ getLocalization('list') }}</h4>

                                    </div>
                                    <!-- <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <button wire:click.prevent="create" type="button" class="btn btn-success add-btn"><i class="ri-add-line align-bottom me-1"></i>
                                                {{ getLocalization('add') }}</button>
                                        </div>
                                    </div> -->
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-8">
                                        @foreach($langTab as $lang)
                                        <a href="#language/{{$lang->code}}" class="btn" type="button">{{$lang->name}}</a>
                                        @endforeach
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-sm">
                                            <div class="d-flex justify-content-sm-end">
                                                <div class="search-box ms-2">
                                                    <input type="text" class="form-control search" placeholder="{{ getLocalization('search') }}">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>

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
                                        @if($languageTwoMode)
                                        <tbody class="list form-check-all" id="language/jp">
                                            @foreach($lang2 as $lg2)
                                            <tr>
                                                <td class="customer_name">{{$loop->iteration}}</td>
                                                <td class="email">{{$lg2->key}}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button type="button" class="btn btn-sm btn-success edit-item-btn"><i class="ri-edit-box-line"></i></button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        @elseif($languageThreeMode)
                                        <tbody class="list form-check-all" id="language/thai">
                                            @foreach($lang3 as $lg3)
                                            <tr>
                                                <td class="customer_name">{{$loop->iteration}}</td>
                                                <td class="email">{{$lg3->key}}</td>
                                                <td class="email">{{$lg3->value}}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button type="button" class="btn btn-sm btn-success edit-item-btn"><i class="ri-edit-box-line"></i></button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        @else
                                        <tbody class="list form-check-all" id="language/en">
                                            @foreach($lang1 as $lg1)
                                            <tr>
                                                <td class="customer_name">{{$loop->iteration}}</td>
                                                <td class="email">{{$lg1->key}}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button type="button" class="btn btn-sm btn-success edit-item-btn"><i class="ri-edit-box-line"></i></button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        @endif
                                    </table>
                                    <div class="noresult" style="display: none">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                            <h5 class="mt-2">{{ getLocalization('data_not_found') }}</h5>
                                        </div>
                                    </div>
                                </div>
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
    <!-- <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button> -->
    <!--end back-to-top-->
    <!-- <script type="text/javascript">
    Livewire.on('loadPlugins', (data) => {
        // alert();
        $('#editModal').show();
    });
</script> -->




</div>
<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{$allKeysProvider['language']}}</h4>
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
                                        <h4 class="card-title mb-0">{{$allKeysProvider['list']}}</h4>

                                    </div>
                                    <!-- <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <button wire:click.prevent="create" type="button" class="btn btn-success add-btn"><i class="ri-add-line align-bottom me-1"></i>
                                                {{ getLocalization('add') }}</button>
                                        </div>
                                    </div> -->
                                </div>
                                <hr>



                                <!-- search -->
                                <div class="row g-4 mb-3">
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" wire:model.live="search" class="form-control" placeholder="{{$allKeysProvider['search']}}">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- table -->
                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="sort" data-sort="customer_name">
                                                    {{ $allKeysProvider['sno'] }}
                                                </th>
                                                <th class="sort" data-sort="email">{{ $allKeysProvider['name'] }}
                                                </th>
                                                <th class="sort" data-sort="customer_name">
                                                    {{$allKeysProvider['code'] }}
                                                </th>
                                                <th class="sort" data-sort="date">
                                                    {{ $allKeysProvider['createdat'] }}
                                                </th>
                                                <th class="sort" data-sort="status">
                                                    {{ $allKeysProvider['status'] }}
                                                </th>
                                                <!-- <th class="sort" data-sort="action">
                                                    {{ getLocalization('action') }}
                                                </th> -->
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if ($languages->count() > 0)
                                            @foreach ($languages as $lang)
                                            <tr>
                                                <td class="customer_name">{{ $loop->iteration }}</td>
                                                <td class="email">{{ ucfirst($lang->name) }}</td>
                                                <td class="customer_name">{{ $lang->code }}</td>
                                                <td class="date">{{ $lang->created_at }}</td>

                                                <td>
                                                    <label class="switch">
                                                        <input wire:click.prevent="toggle({{ $lang->id }})" class="switch-input" type="checkbox" {{ $lang->status == 1 ? 'checked' : '' }} />
                                                        <span class="switch-label" data-on="{{ $statusText }}" data-off="deactive"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>

                                                </td>

                                                <!-- <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button type="button" wire:click="edit({{ $lang->id }})" class="btn btn-sm btn-success edit-item-btn"><i class="ri-edit-box-line"></i></button>
                                                        </div>

                                                        <div class="remove">
                                                            <button type="button" wire:click.prevent="delete({{ $lang->id }})" class="btn btn-sm btn-danger remove-item-btn"><i class="ri-delete-bin-line"></i></button>
                                                        </div>
                                                    </div>
                                                </td> -->
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
                                {{ $languages->links('vendor.pagination.bootstrap-5') }}
                                <!-- previous next -->

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
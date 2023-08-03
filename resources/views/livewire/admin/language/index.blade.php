<div>

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Language</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Language</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h4 class="card-title mb-0">List</h4>
                            
                        </div> -->

                        <!-- end card header -->

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <h4 class="card-title mb-0">List</h4>

                                    </div>
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <button type="button" class="btn btn-success add-btn"
                                                data-bs-toggle="modal" id="create-btn" data-bs-target="#createModal"><i
                                                    class="ri-add-line align-bottom me-1"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row g-4 mb-3">
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control search"
                                                    placeholder="search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="sort" data-sort="customer_name">S. No.</th>
                                                <th class="sort" data-sort="email">Name</th>
                                                <th class="sort" data-sort="customer_name">Code</th>
                                                <th class="sort" data-sort="date">Created At</th>
                                                <th class="sort" data-sort="status">Status</th>
                                                <th class="sort" data-sort="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @foreach ($languages as $lang)
                                                <tr>
                                                    <td class="customer_name">{{ $loop->iteration }}</td>
                                                    <td class="email">{{ $lang->name }}</td>
                                                    <td class="customer_name">{{ $lang->code }}</td>
                                                    <td class="date">{{ $lang->created_at }}</td>
                                                    <!-- <td class="status"><span class="badge bg-success-subtle text-success text-uppercase">Active</span>
                                                </td> -->

                                                    <td>
                                                        {{-- <div class="form-check form-switch">
                                                            <input wire:click.prevent="toggle({{ $lang->id }})"
                                                                class="form-check-input" type="checkbox" role="switch"
                                                                id="flexSwitchCheckChecked"
                                                                {{ $lang->status == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckChecked"></label>

                                                        </div> --}}

                                                        <label class="switch">
                                                            <input wire:click.prevent="toggle({{ $lang->id }})"
                                                                class="switch-input" type="checkbox"
                                                                {{ $lang->status == 1 ? 'checked' : '' }} />
                                                            <span class="switch-label" data-on="{{ $statusText }}"
                                                                data-off="Deactive"></span>
                                                            <span class="switch-handle"></span>
                                                        </label>

                                                    </td>

                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            <div class="edit">
                                                                <button type="button"
                                                                    wire:click="edit({{ $lang->id }})"
                                                                    class="btn btn-sm btn-success edit-item-btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#editModal"><i
                                                                        class="ri-edit-box-line"></i></button>
                                                            </div>

                                                            <div class="remove">
                                                                <button type="button"
                                                                    wire:click.prevent="delete({{ $lang->id }})"
                                                                    class="btn btn-sm btn-danger remove-item-btn"><i
                                                                        class="ri-delete-bin-line"></i></button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="noresult" style="display: none">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                colors="primary:#121331,secondary:#08a88a"
                                                style="width:75px;height:75px"></lord-icon>
                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <div class="pagination-wrap hstack gap-2">
                                        <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                                            Previous
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="javascript:void(0);">
                                            Next
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <!-- create language model -->
            <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Add Language</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="close-modal"></button>
                        </div>
                        <form wire:submit.prevent="submit" class="tablelist-form" autocomplete="off">
                            <div class="modal-body">
                                <!-- <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                                </div> -->

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Name</label>
                                    <input type="text" wire:model="language_name" id="customername-field"
                                        class="form-control" placeholder="Enter Name" />
                                    @error('language_name')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                    <!-- <div class="invalid-feedback">Please enter a customer name.</div> -->
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field1" class="form-label">Code</label>
                                    <input type="text" wire:model="language_code" id="customername-field1"
                                        class="form-control" placeholder="Enter Code" />
                                    @error('language_code')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                    <!-- <div class="invalid-feedback">Please enter a customer name.</div> -->
                                </div>

                                <!-- <div>
                                    <label for="status-field" class="form-label">Status</label>
                                    <select class="form-control" data-trigger name="status-field" id="status-field" required>
                                        <option value="">Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Block">Block</option>
                                    </select>
                                </div> -->
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Add
                                        Language</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- edit language model -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Language</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="close-modal"></button>
                        </div>
                        <form wire:submit.prevent="update" class="tablelist-form" autocomplete="off">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Name</label>
                                    <input type="text" wire:model="langname" id="customername-field"
                                        class="form-control" placeholder="Enter Name" />
                                    @error('langname')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field1" class="form-label">Code</label>
                                    <input type="text" wire:model="langcode" id="customername-field1"
                                        class="form-control" placeholder="Enter Code" />
                                    @error('langcode')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Add
                                        Language</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>



    <!--start back-to-top-->
    <!-- <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button> -->
    <!--end back-to-top-->
    <script type="text/javascript">
        Livewire.on('loadPlugins', (data) => {
            // alert();
            $('#editModal').show();
        });
    </script>




</div>

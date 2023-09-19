<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{$allKeysProvider['page_management']}}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            @if($updateMode)

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">{{$allKeysProvider['edit']}}</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button wire:click.prevent="cancel" type="button" class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i> {{$allKeysProvider['back']}}</button>
                                </div>
                            </div>
                        </div>
                        <!-- end card header -->

                        <div class="card-body form-steps">
                            <div class="vertical-navs-step">
                                <div class="row gy-5">
                                    <div class="col-lg-2">
                                        <div class="nav flex-column custom-nav nav-pills" role="tablist" aria-orientation="vertical">
                                            @foreach($languagedata as $language)
                                                <button class="nav-link  {{ $activeTab === $language->id ? 'active' : '' }}" wire:click="switchTab({{ $language->id }})" id="{{$language->name}}-tab" data-bs-toggle="pill" data-bs-target="#{{$language->name}}-form" type="button" role="tab" aria-controls="{{$language->name}}-form" aria-selected="true">
                                                    {{ trans(ucfirst($language->name)) }}
                                                </button>
                                            @endforeach
                                        </div>
                                        <!-- end nav -->
                                    </div> 
                                    <!-- end col-->

                                    <div class="col-lg-10">
                                        <div class="px-lg-4">
                                            {{-- <div class="tab-content">
                                                <div class="tab-pane fade" id="v-pills-bill-info" role="tabpanel" aria-labelledby="v-pills-bill-info-tab">
                                                    <div>
                                                        <h5>Billing Info</h5>
                                                        <p class="text-muted">Fill all information below</p>
                                                    </div>

                                                    <div>
                                                        <div class="row g-3">
                                                            <div class="col-sm-6">
                                                                <label for="firstName" class="form-label">First name</label>
                                                                <input type="text" class="form-control" id="firstName" placeholder="Enter first name" value="" required >
                                                                <div class="invalid-feedback">Please enter a first name</div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label for="lastName" class="form-label">Last name</label>
                                                                <input type="text" class="form-control" id="lastName" placeholder="Enter last name" value="" required >
                                                                <div class="invalid-feedback">Please enter a last name</div>
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="username" class="form-label">Username</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">@</span>
                                                                    <input type="text" class="form-control" id="username" placeholder="Username" required >
                                                                    <div class="invalid-feedback">Please enter a user name</div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                                                                <input type="email" class="form-control" id="email" placeholder="Enter Email" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-start gap-3 mt-4">
                                                        <button type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="v-pills-bill-address-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Go to Shipping</button>
                                                    </div>
                                                </div>
                                                <!-- end tab pane -->
                                                <div class="tab-pane fade show active" id="v-pills-bill-address" role="tabpanel" aria-labelledby="v-pills-bill-address-tab">
                                                    <div>
                                                        <h5>Shipping Address</h5>
                                                        <p class="text-muted">Fill all information below</p>
                                                    </div>

                                                    <div>
                                                        <div class="row g-3">
                                                            <div class="col-12">
                                                                <label for="address" class="form-label">Address</label>
                                                                <input type="text" class="form-control" id="address" placeholder="1234 Main St" required >
                                                                <div class="invalid-feedback">Please enter a address</div>
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                                                                <input type="text" class="form-control" id="address2" placeholder="Apartment or suite" />
                                                            </div>

                                                            <div class="col-md-5">
                                                                <label for="country" class="form-label">Country</label>
                                                                <select class="form-select" id="country" required>
                                                                    <option value="">Choose...</option>
                                                                    <option>United States</option>
                                                                </select>
                                                                <div class="invalid-feedback">Please select a country</div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="state" class="form-label">State</label>
                                                                <select class="form-select" id="state">
                                                                    <option value="">Choose...</option>
                                                                    <option>California</option>
                                                                </select>
                                                                <div class="invalid-feedback">Please select a state</div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label for="zip" class="form-label">Zip</label>
                                                                <input type="text" class="form-control" id="zip" placeholder="" />
                                                            </div>
                                                        </div>

                                                        <hr class="my-4 text-muted">

                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input" id="same-address">
                                                            <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="save-info">
                                                            <label class="form-check-label" for="save-info">Save this information for next time</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-start gap-3 mt-4">
                                                        <button type="button" class="btn btn-light btn-label previestab" data-previous="v-pills-bill-info-tab"><i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Back to Billing Info</button>
                                                        <button type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="v-pills-payment-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Go to Payment</button>
                                                    </div>
                                                </div>
                                                <!-- end tab pane -->
                                                <div class="tab-pane fade" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab">
                                                    <div>
                                                        <h5>Payment</h5>
                                                        <p class="text-muted">Fill all information below</p>
                                                    </div>

                                                    <div>
                                                        <div class="my-3">
                                                            <div class="form-check form-check-inline">
                                                                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                                                                <label class="form-check-label" for="credit">Credit card</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                                                                <label class="form-check-label" for="debit">Debit card</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                                                                <label class="form-check-label" for="paypal">PayPal</label>
                                                            </div>
                                                        </div>

                                                        <div class="row gy-3">
                                                            <div class="col-md-12">
                                                                <label for="cc-name" class="form-label">Name on card</label>
                                                                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                                                <small class="text-muted">Full name as displayed on card</small>
                                                                <div class="invalid-feedback">
                                                                    Name on card is required
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="cc-number" class="form-label">Credit card number</label>
                                                                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                                                <div class="invalid-feedback">
                                                                    Credit card number is required
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label for="cc-expiration" class="form-label">Expiration</label>
                                                                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                                                <div class="invalid-feedback">
                                                                    Expiration date required
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label for="cc-cvv" class="form-label">CVV</label>
                                                                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                                                <div class="invalid-feedback">
                                                                    Security code required
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-start gap-3 mt-4">
                                                        <button type="button" class="btn btn-light btn-label previestab" data-previous="v-pills-bill-address-tab"><i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Back to Shipping Info</button>
                                                        <button type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="v-pills-finish-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i> Order Complete</button>
                                                    </div>
                                                </div>
                                                <!-- end tab pane -->
                                                <div class="tab-pane fade" id="v-pills-finish" role="tabpanel" aria-labelledby="v-pills-finish-tab">
                                                    <div class="text-center pt-4 pb-2">

                                                        <div class="mb-4">
                                                            <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>
                                                        </div>
                                                        <h5>Your Order is Completed !</h5>
                                                        <p class="text-muted">You Will receive an order confirmation email with details of your order.</p>
                                                    </div>
                                                </div>
                                                <!-- end tab pane -->
                                            </div> --}}
                                            <!-- end tab content -->
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            {{-- <div class="row">
                @foreach($states as $indexkey=>$state)
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">{{trans(ucfirst(\DB::table('languages')->find($state['language_id'])->name)) }}</h4>
                        </div>
                        <div class="card-body">
                            @include('livewire.admin.page.form', ['languageId' => $languageId])
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end col -->
                @endforeach
            </div>
            <!-- end row -->

            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="submit" wire:loading.attr="disabled" class="btn btn-success">
        
                        {{ $updateMode ?  $allKeysProvider['update']  :  $allKeysProvider['submit']  }}
        
                    </button>
                    <button wire:click.prevent="cancel" type="submit" wire:loading.attr="disabled" class="btn btn-danger">
                        {{ $allKeysProvider['cancel'] }}
                    </button>
                </div>
            </div> --}}

            @else

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
                            @elseif($viewMode)
                            <h4 class="card-title mb-0 flex-grow-1">{{$allKeysProvider['view_page']}}</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button wire:click.prevent="cancel" type="button" class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i> {{$allKeysProvider['back']}}</button>
                                </div>
                            </div>
                            @else
                            <h4 class="card-title mb-0 flex-grow-1">{{$allKeysProvider['list']}}</h4>
                            <div class="flex-shrink-0">
                                <!-- <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button wire:click.prevent="create" type="button" class="btn btn-success add-btn"><i class="ri-add-line"></i> {{$allKeysProvider['add']}}</button>
                                </div> -->
                            </div>
                            @endif
                        </div>
                        <div class="card-body">
                            @if ($updateMode)
                            @include('livewire.admin.page.form', ['languageId' => $languageId])
                            @elseif($viewMode)
                            @livewire('admin.page.show', ['page_id' => $page_id])
                            @else
                            <div class="listjs-table" id="customerList">


                                {{-- <!-- tabs-->
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
                                                <th>{{ $allKeysProvider['page_name'] }}</th>
                                                <th>{{$allKeysProvider['title']}}</th>
                                              
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
                                            @if($allPage->count() > 0)
                                            @foreach($allPage as $keyIndex => $page)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ ucwords(str_replace('-',' ',$page->page_key)) }}</td>
                                                <td>{{ ucfirst($page->title) }}</td>
                                                
                                                <td>{{ convertDateTimeFormat($page->created_at,'date') }}</td>

                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="view">
                                                            <button type="button" wire:click="show({{$page->id}})" class="btn btn-sm btn-primary view-item-btn"><i class="ri-eye-fill"></i></button>
                                                        </div>

                                                        <div class="edit">
                                                            <button type="button" wire:click="edit('{{$page->page_key}}')" class="btn btn-sm btn-success edit-item-btn"><i class="ri-edit-box-line"></i></button>
                                                        </div>

                                                        {{--<div class="remove">
                                                            <button type="button" wire:click.prevent="delete({{$page->id}})" class="btn btn-sm btn-danger remove-item-btn"><i class="ri-delete-bin-line"></i></button>
                                                        </div>--}}
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
                                {{ $allPage->links('vendor.pagination.bootstrap-4') }}
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
            @endif

            

        </div>
        <!-- container-fluid -->
    </div>
</div>

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>


<script type="text/javascript">
    document.addEventListener('changeToggleStatus', function(event) {
        var status = event.detail[0]['status'];
        var alertIndex = event.detail[0]['index'];
        var activeTab = event.detail[0]['activeTab'];

        $("#switch-input-" + activeTab + "-" + alertIndex).prop("checked", status);
    });

    document.addEventListener('loadPlugins', function(event) {

        $(document).ready(function() {

            // Get the id attribute value
            // var inputId = inputElement.id;

            //  FOR TEXT EDITOR
            $('textarea#summernote').summernote({
                placeholder: 'Type somthing...',
                tabsize: 2,
                height: 200,
                fontNames: ['Arial', 'Helvetica', 'Times New Roman', 'Courier New', 'sans-serif'],
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    // ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', /*'picture', 'video'*/ ]],
                    ['view', ['codeview', /*'help'*/ ]],
                ],
                callbacks: {
                    onChange: function(content) {
                        // Update the Livewire property when the Summernote content changes
                        @this.set('description', content);
                    }
                }
            });

            // FOR DROPIFY
            $('.dropify').dropify();
            $('.dropify-errors-container').remove();

            $('.dropify-clear').click(function(e) {
                e.preventDefault();
                var elementName = $(this).siblings('input[type=file]').attr('id');
                if (elementName == 'dropify-image') {
                    @this.set('image', null);
                    @this.set('originalImage', null);
                    @this.set('removeImage', true);

                }
            });



        });
    });
</script>

@endpush
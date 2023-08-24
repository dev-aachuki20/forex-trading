<div>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ $allKeysProvider['gallery'] }}</h4>
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
                        @elseif($formMode)
                        <h4 class="card-title mb-0 flex-grow-1">{{$allKeysProvider['add']}}</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <button wire:click.prevent="cancel" type="button" class="btn btn-success add-btn">
                                    <i class="ri-arrow-left-line"></i> {{$allKeysProvider['back']}}
                                </button>
                            </div>
                        </div>
                        @else
                        <h4 class="card-title mb-0 flex-grow-1">{{$allKeysProvider['list']}}</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <button wire:click.prevent="create" type="button" class="btn btn-success add-btn">
                                    <i class="ri-add-line"></i> {{$allKeysProvider['add']}}
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>
                        <div class="card-body">
                            @if ($formMode)
                            @include('livewire.admin.gallery.form', ['languageId' => $languageId])
                            @else
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-md-8">
                                        <li wire:click="switchTab('all')" class="btn {{ $activeTab === 'all' ? 'active' : '' }}">
                                            All
                                        </li>

                                        @if($languagedata->count()>0)
                                        @foreach($languagedata as $language)
                                        <li wire:click="switchTab({{$language->id}})" class="btn {{ $activeTab === $language->id ? 'active' : '' }}">
                                            {{ucfirst($language->name)}}
                                        </li>
                                        @endforeach
                                        @endif
                                    </div>

                                    <div class="row gallery-wrapper">
                                        @if($galleries->count()>0)
                                        @foreach($galleries as $galleryeng)
                                        <div class="element-item col-xxl-3 col-xl-4 col-sm-6 designing development" data-category="designing development">
                                            <div class="gallery-box card">
                                                <div class="gallery-container">
                                                    <a class="image-popup" href="{{$galleryeng->image_url}}" title="">
                                                        <img class="gallery-img img-fluid mx-auto" src="{{$galleryeng->image_url}}" alt="" />
                                                        <div class="gallery-overlay">
                                                            <h5 class="overlay-caption">{{$galleryeng->title}}</h5>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="box-content">
                                                    <div class="d-flex align-items-center mt-1">
                                                        <div class="flex-grow-1 text-muted">by <a href="#" class="text-body text-truncate">{{Auth::user()->name}}</a>
                                                        </div>
                                                        <div class="flex-grow-1 text-muted pt-2">
                                                            <label class="switch" >
                                                                <input wire:click.prevent="toggle({{ $galleryeng->id }})" class="switch-input" type="checkbox" {{ $galleryeng->status == 1 ? 'checked' : '' }} />
                                                                <span class="switch-label" data-on="{{ $statusText }}" data-off="deactive"></span>
                                                                <span class="switch-handle"></span>
                                                            </label>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <div class="d-flex gap-3">
                                                                <button wire:click="edit({{$galleryeng->id}})" type="button" class="btn btn-success btn-sm fs-12 btn-link text-body text-decoration-none p-1">
                                                                    <i class="ri-edit-box-line text-muted align-bottom me-1" style="color:white !important;"></i>
                                                                </button>
                                                                <button wire:click="delete({{$galleryeng->id}})" type="button" class="btn btn-danger btn-sm fs-12 btn-link text-body text-decoration-none p-1">
                                                                    <i class="ri-delete-bin-line text-muted align-bottom me-1" style="color:white !important;"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <div class="row pt-5">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4 pt-2">
                                                <h5>{{$allKeysProvider['data_not_found']}}</h5>
                                            </div>
                                            <div class="col-md-4"></div>
                                        </div>
                                        @endif
                                    </div>
                                    {{$galleries->links('vendor.pagination.bootstrap-5') }}
                                    <!-- end row -->
                                </div>
                            </div>
                            @endif
                            <!-- end row -->
                        </div>
                        <!-- ene card body -->
                    </div>


                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" />
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

<script type="text/javascript">
    document.addEventListener('loadPlugins', function(event) {
        $(document).ready(function() {

            // FOR DROPIFY
            $('.dropify').dropify();
            $('.dropify-errors-container').remove();

            $('.dropify-clear').click(function(e) {
                e.preventDefault();
                var elementName = $(this).siblings('input[type=file]').attr('id');
                if (elementName == 'dropify-image') {
                    @this.set('image', null);
                    @this.set('originalImage', null);
                    // @this.set('removeImage', true);

                }
            });



        });
    });
</script>
@endpush
<div>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Gallery</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <div class="card-body">
                            @if ($formMode)
                            @include('livewire.admin.gallery.form', ['languageId' => $languageId])
                            @else
                            <div class="row">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <h4 class="card-title mb-0">Images</h4>
                                    </div>
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <button wire:click.prevent="create" type="button" class="btn btn-success add-btn"><i class="ri-add-line align-bottom me-1"></i>
                                                {{$allKeysProvider['add']}}</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
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
                                    <!-- <div class="text-center">
                                        <ul class="list-inline categories-filter animation-nav" id="filter">
                                            <li wire:click="switchTab('english')" class="list-inline-item {{ $activeTab === 'english' ? 'active' : '' }}"><a class="categories" data-filter=".project">{{$allKeysProvider['english']}}</a></li>
                                            <li wire:click="switchTab('japanese')" class="list-inline-item {{ $activeTab === 'japanese' ? 'active' : '' }}"><a class="categories" data-filter=".designing">{{$allKeysProvider['japanese']}}</a></li>
                                            <li wire:click="switchTab('thai')" class="list-inline-item {{ $activeTab === 'thai' ? 'active' : '' }}"><a class="categories" data-filter=".photography">{{$allKeysProvider['thai']}}</a></li>
                                        </ul>
                                    </div> -->

                                    <div class="row gallery-wrapper">
                                        @if ($activeTab === 'english')
                                        @if($galleryEng->count()>0)
                                        @foreach($galleryEng as $galleryeng)
                                        <div class="element-item col-xxl-3 col-xl-4 col-sm-6 designing development" data-category="designing development">
                                            <div class="gallery-box card">
                                                <div class="gallery-container">
                                                    <a class="image-popup" href="#" title="">
                                                        <img class="gallery-img img-fluid mx-auto" src="../jpg/img-5.jpg" alt="" />
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
                                                            <label class="switch">
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
                                        @endif
                                        <!-- end col -->
                                        @elseif ($activeTab === 'japanese')
                                        @if($galleryJp->count()>0)
                                        @foreach($galleryJp as $galleryjp)
                                        <div class="element-item col-xxl-3 col-xl-4 col-sm-6 photography" data-category="photography">
                                            <div class="gallery-box card">
                                                <div class="gallery-container">
                                                    <a class="image-popup" href="#" title="">
                                                        <img class="gallery-img img-fluid mx-auto" src="../jpg/img-16.jpg" alt="" />
                                                        <div class="gallery-overlay">
                                                            <h5 class="overlay-caption">{{$galleryjp->title}}
                                                            </h5>
                                                        </div>
                                                    </a>

                                                </div>

                                                <div class="box-content">
                                                    <div class="d-flex align-items-center mt-1">
                                                        <div class="flex-grow-1 text-muted">by <a href="#" class="text-body text-truncate">{{Auth::user()->name}}</a></div>
                                                        <div class="flex-grow-1 text-muted pt-2">
                                                            <label class="switch">
                                                                <input wire:click.prevent="toggle({{ $galleryjp->id }})" class="switch-input" type="checkbox" {{ $galleryjp->status == 1 ? 'checked' : '' }} />
                                                                <span class="switch-label" data-on="{{ $statusText }}" data-off="deactive"></span>
                                                                <span class="switch-handle"></span>
                                                            </label>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <div class="d-flex gap-3">
                                                                <button wire:click="edit({{$galleryjp->id}})" type="button" class="btn btn-success btn-sm fs-12 btn-link text-body text-decoration-none p-1">
                                                                    <i class="ri-edit-box-line text-muted align-bottom me-1" style="color:white !important;"></i>
                                                                </button>
                                                                <button wire:click="delete({{$galleryjp->id}})" type="button" class="btn btn-danger btn-sm fs-12 btn-link text-body text-decoration-none p-1">
                                                                    <i class="ri-delete-bin-line text-muted align-bottom me-1" style="color:white !important;"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                        <!-- end col -->
                                        @elseif ($activeTab === 'thai')
                                        @if($galleryThai->count() >0)
                                        @foreach($galleryThai as $gallerythai)
                                        <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project development" data-category="development">
                                            <div class="gallery-box card">
                                                <div class="gallery-container">
                                                    <a class="image-popup" href="../jpg/img-6.jpg" title="">
                                                        <img class="gallery-img img-fluid mx-auto" src="../jpg/img-6.jpg" alt="" />
                                                        <div class="gallery-overlay">
                                                            <h5 class="overlay-caption">{{$gallerythai->title}}
                                                            </h5>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="box-content">
                                                    <div class="d-flex align-items-center mt-1">
                                                        <div class="flex-grow-1 text-muted">by <a href="#" class="text-body text-truncate">{{Auth::user()->name}}</a>
                                                        </div>
                                                        <div class="flex-grow-1 text-muted pt-2">
                                                            <label class="switch">
                                                                <input wire:click.prevent="toggle({{ $gallerythai->id }})" class="switch-input" type="checkbox" {{ $gallerythai->status == 1 ? 'checked' : '' }} />
                                                                <span class="switch-label" data-on="{{ $statusText }}" data-off="deactive"></span>
                                                                <span class="switch-handle"></span>
                                                            </label>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <div class="d-flex gap-3">
                                                                <button wire:click="edit({{$gallerythai->id}})" type="button" class="btn btn-success btn-sm fs-12 btn-link text-body text-decoration-none p-1">
                                                                    <i class="ri-edit-box-line text-muted align-bottom me-1" style="color:white !important;"></i>
                                                                </button>
                                                                <button wire:click="delete({{$gallerythai->id}})" type="button" class="btn btn-danger btn-sm fs-12 btn-link text-body text-decoration-none p-1">
                                                                    <i class="ri-delete-bin-line text-muted align-bottom me-1" style="color:white !important;"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                        @endif
                                        <!-- faqslanguageThai->links('vendor.pagination.bootstrap-5')  -->
                                    </div>
                                    <!-- end row -->

                                    <!-- <div class="text-center my-2">
                                        <a href="javascript:void(0);" class="text-success"><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i>
                                            Load More </a>
                                    </div> -->
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
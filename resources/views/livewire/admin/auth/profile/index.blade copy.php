<div class="page-content">
    <div class="container-fluid">
        <div class="profile-foreground position-relative mx-n4 mt-n4">
            <div class="profile-wid-bg">
                <img src="{{ asset('admin/jpg/profile-bg.jpg')}}" alt="" class="profile-wid-img" />
            </div>
        </div>
        <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
            <div class="row g-4">
                <div class="col-auto">
                    <div class="avatar-lg">
                        <img src="{{asset('admin/jpg/avatar-1.jpg')}}" alt="user-img" class="img-thumbnail rounded-circle" />
                    </div>
                </div>
                <!--end col-->
                <div class="col">
                    <div class="p-2">
                        <h3 class="text-white mb-1">{{ucfirst(Auth::user()->name)}}</h3>
                        <p class="text-white text-opacity-75">{{ucfirst(auth()->user()->roles()->first()->name)}}</p>
                    </div>
                </div>
                <!--end col-->


            </div>
            <!--end row-->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div>
                    @if($showprofileMode)
                    <div class="d-flex profile-wrapper">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a wire:click="switchTab('profile')" class="nav-link fs-14 {{ $activeTab === 'profile' ? 'active' : '' }}"  href="javascript:void(0);" aria-selected="true">
                                    <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">{{$allKeysProvider['profile']}}</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a wire:click="switchTab('changePassword')" class="nav-link fs-14 {{ $activeTab === 'changePassword' ? 'active' : '' }}" href="javascript:void(0);" aria-selected="false">
                                    <i class="ri-list-unordered d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">{{$allKeysProvider['change_password']}}</span>
                                </a>
                            </li>
                        </ul>
                        @if(!$editprofileMode)
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0)" wire:click.prevent="editProfile" class="btn btn-success"><i class="ri-edit-box-line align-bottom"></i> {{$allKeysProvider['edit_profile']}}</a>
                        </div>
                        @endif
                    </div>

                    <!-- Tab panes -->
                    <div class="tab-content pt-4 text-muted">
                        @if($activeTab == 'profile')
                        <div class="row">
                            <div class="col-xxl-12">
                                <div class="card">

                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3">
                                            @if($profileMode)
                                            <h5 class="card-title pt-4">{{$allKeysProvider['profile'] . ' ' . $allKeysProvider['image']}}</h5>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="small-12 medium-2 large-2 columns">
                                                        <div class="circle">
                                                            <img for="file" class="profile-pic" src="{{asset('admin/jpg/avatar-1.jpg')}}">
                                                            <input class="file-upload" type="file" accept="image/*" />

                                                        </div>
                                                        <div class="p-image">
                                                            <i class="fa fa-camera upload-button"></i>
                                                            <input class="file-upload" type="file" accept="image/*" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <h5 class="card-title pt-4">{{$allKeysProvider['general_information']}}</h5>
                                            <div class="card-body">
                                                @livewire('admin.auth.profile.show')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-2">{{$allKeysProvider['show_profile']}}</h5>
                                            livewire('admin.auth.profile.show')
                                        </div>
                                    </div> -->
                                <!-- end card -->
                            </div>
                        </div>

                        @elseif($activeTab == 'changePassword')
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">{{$allKeysProvider['change_password']}}</h5>
                                @livewire('admin.auth.profile.change-password')
                            </div>
                        </div>
                        @endif
                    </div>

                    @else

                    <div class="d-flex profile-wrapper">
                        <!-- Nav tabs -->

                        <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                            @if(!$editprofileMode)
                            <li class="nav-item">
                                <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                    <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">{{$allKeysProvider['profile']}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-14" data-bs-toggle="tab" href="#activities" role="tab">
                                    <i class="ri-list-unordered d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">{{$allKeysProvider['change_password']}}</span>
                                </a>
                            </li>
                            @endif
                        </ul>

                        @if(!$editprofileMode)
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0)" wire:click.prevent="editProfile" class="btn btn-success"><i class="ri-edit-box-line align-bottom"></i> {{$allKeysProvider['edit_profile']}}</a>
                        </div>
                        @endif

                        @if($editprofileMode)
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0)" wire:click.prevent="showProfile" class="btn btn-success"><i class="ri-arrow-left-line"></i> {{$allKeysProvider['back']}}</a>
                        </div>
                        @endif
                    </div>
                    <div class="tab-content pt-4 text-muted">
                        <div class="tab-pane active" id="overview-tab" role="tabpanel">
                            <div class="row">
                                <div class="col-xxl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-2">{{$allKeysProvider['edit_profile']}}</h5>
                                            @livewire('admin.auth.profile.edit')
                                        </div>
                                    </div>
                                    <!-- end card -->
                                </div>
                            </div>
                            <!--end row-->
                        </div>

                        <!--end tab-pane-->
                    </div>
                    @endif
                </div>
            </div>
            <!--end col-->
        </div>

        <!--end row-->


    </div><!-- container-fluid -->
</div><!-- End Page-content -->
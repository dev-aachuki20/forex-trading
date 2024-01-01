<div class="page-content">
    <div class="container-fluid">
        <div class="position-relative mx-n4 mt-n4">
            <div class="profile-wid-bg profile-setting-img">
                <img src="{{asset('admin/jpg/profile-bg.jpg')}}" class="profile-wid-img" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-3">
                <div class="card mt-n5">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div>
                                <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                    <img src="{{ $profileImageUrl }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                                    <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                        <input id="profile-img-file-input" wire:model.live="image" type="file" class="profile-img-file-input">
                                        <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                            <span class="avatar-title rounded-circle bg-light text-body">
                                                <i class="ri-camera-fill"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <h5 class="fs-16 mb-1">{{ucfirst(Auth::user()->name)}}</h5>
                            <p class="text-muted mb-0">{{ucfirst(auth()->user()->roles()->first()->name)}}</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xxl-9">
                <div class="card mt-xxl-n5">
                    <div class="card-header d-flex justify-content-between small-header">
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                            @if($showprofileMode)
                            <li class="nav-item">
                                <a wire:click="switchTab('profile')" class="nav-link {{ $activeTab === 'profile' ? 'active' : '' }}" data-bs-toggle="tab" href="#personalDetails" role="tab">Personal Details</a>
                            </li>
                            <li class="nav-item">
                                <a wire:click="switchTab('changePassword')" class="nav-link {{ $activeTab === 'changePassword' ? 'active' : '' }}" data-bs-toggle="tab" href="#changePassword" role="tab">{{$allKeysProvider['change_password']}}</a>
                            </li>
                            @endif
                        </ul>

                        @if($activeTab == 'profile')
                        @if(!$editprofileMode)
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0)" wire:click.prevent="editProfile" class="btn btn-sm btn-success"><i class="ri-edit-box-line align-bottom"></i> {{$allKeysProvider['edit_profile']}}</a>
                        </div>
                        @elseif($editprofileMode)
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0)" wire:click.prevent="showProfile" class="btn btn-sm btn-success"><i class="ri-arrow-left-line"></i> {{$allKeysProvider['back']}}</a>
                        </div>
                        @endif
                        @endif
                    </div>
                    <div class="card-body p-4">
                        @if($showprofileMode)
                        <div class="tab-content">
                            <!-- personalDetails -->
                            <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                @if($activeTab == 'profile')
                                @livewire('admin.auth.profile.show')
                                @elseif($activeTab == 'changePassword')
                                @livewire('admin.auth.profile.change-password')
                                @endif
                            </div>
                            <!-- personalDetails -->
                        </div>
                        @else
                        @livewire('admin.auth.profile.edit')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    document.addEventListener('loadPlugins', function(event) {
        $(document).ready(function() {
            Array.from(document.querySelectorAll("form .auth-pass-inputgroup")).forEach(function(e) {
                Array.from(e.querySelectorAll(".password-addon")).forEach(function(r) {
                    r.addEventListener("click", function(r) {
                        var o = e.querySelector(".password-input");
                        "password" === o.type ? o.type = "text" : o.type = "password"
                    })
                })
            });
        });
    });
</script>
@endpush
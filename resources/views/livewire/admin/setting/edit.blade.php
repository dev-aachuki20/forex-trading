<div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{$allKeysProvider['edit']}} {{ ucwords(str_replace('-',' ',$activePage)) }} Page Sections</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <button wire:click.prevent="$dispatch('cancel')" type="button" class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i> {{$allKeysProvider['back']}}</button>
                        </div>
                    </div>
                </div>
                <!-- end card header -->

                
                <div class="card-body form-steps">
                     <!-- tabs-->
                     <div class="row mb-4">
                        <div class="col-md-12">
                            @if ($languagedata->count() > 0)
                            @foreach ($languagedata as $language)
                            <li wire:click="switchLangTab({{ $language->id }})" class="btn {{ $activeLangTab === $language->id ? 'active' : '' }}">
                                {{ trans(ucfirst($language->name)) }}
                            </li>
                            @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="vertical-navs-step">
                        <div class="row gy-5">
                            <div class="col-lg-2">
                                <div class="nav flex-column custom-nav nav-pills" role="tablist" aria-orientation="vertical">
                                    @foreach($langSections as $section)
                                        <button class="nav-link  {{ $activeSection === $section->id ? 'active' : '' }}" wire:click="switchSectionTab({{ $section->id }})" id="tab-{{$section->id}}" data-bs-toggle="pill" data-bs-target="#form-{{$section->id}}" type="button" role="tab" aria-controls="form-{{$section->id}}" aria-selected="true">
                                            {{ ucwords(str_replace(['-','_'],' ',$section->section_key)) }}
                                        </button>
                                    @endforeach
                                </div>
                                <!-- end nav -->
                            </div> 
                            <!-- end col-->

                            <div class="col-lg-10">
                                <div class="px-lg-4">
                                    <div class="tab-content">
                                        @foreach($langSections as $section)
                                        <div class="tab-pane fade {{ $activeSection === $section->id ? 'active show' : '' }}" id="form-{{$section->id}}" role="tabpanel" aria-labelledby="tab-{{$section->id}}">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    @php
                                                      $allPagesSection = $section->page_keys ? json_decode($section->page_keys,true) : [];  
                                                       
                                                      if(count($allPagesSection) > 0){
                                                        $removePage = array_search($activePage, $allPagesSection);
                                                        unset($allPagesSection[$removePage]);
                                                        $allPagesSection = array_values($allPagesSection);
                                                      }
                                                    @endphp
                                                    @if(count($allPagesSection) > 0)
                                                        <h5>This section also belongs to {{  ucwords(str_replace('-', ' ',implode(', ',$allPagesSection))) }}</h5>
                                                    @endif
                                                </div>
                                            </div>
                                            <div>

                                                @include('livewire.admin.page.section-form')

                                            </div>
                                        </div>
                                        <!-- end tab pane -->
                                        @endforeach
                            
                                    </div>
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
</div>

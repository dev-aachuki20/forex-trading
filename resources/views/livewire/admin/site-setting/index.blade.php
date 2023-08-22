<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Site Setting</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- form blade -->
                            <div class="listjs-table" id="customerList">
                                <!-- tabs-->
                                <div class="row">
                                    <div class="col-md-8">
                                        @if ($allSettingType->count() > 0)
                                        @foreach ($allSettingType as $key=>$groupType)
                                        @php
                                        $groupName = str_replace('_',' ',$groupType)
                                        @endphp
                                        <li wire:click.prevent="changeTab('{{$groupType}}')" class="btn {{ $tab == $groupType  ? 'active' : '' }}">
                                            {{ ucwords($groupName) }}
                                        </li>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>

                                <!-- show and search -->


                                <!-- eng tab start-->

                                <!-- eng tab end -->
                            </div>
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
</div>


@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>


<script type="text/javascript">
    document.addEventListener('loadPlugins', function(event) {
        $(document).ready(function() {

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
                } else if (elementName == 'dropify-video') {
                    @this.set('video', null);
                    @this.set('originalVideo', null);
                    @this.set('videoExtenstion', null);
                    @this.set('removeVideo', true);
                }
            });

        });
    });
</script>

@endpush
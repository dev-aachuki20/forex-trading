

@livewireScripts

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-livewire-alert::scripts />


<!-- JAVASCRIPT -->
<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/js/simplebar.min.js') }}"></script>
<script src="{{ asset('admin/js/waves.min.js') }}"></script>
<script src="{{ asset('admin/js/feather.min.js') }}"></script>
<script src="{{ asset('admin/js/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('admin/js/plugins.js') }}"></script>

<!-- apexcharts -->
<script src="{{ asset('admin/js/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/js/password-addon.init.js') }}"></script>
<script src="{{ asset('admin/js/password-create.init.js') }}"></script>
<!-- Vector map-->
<script src="{{ asset('admin/js/jsvectormap.min.js') }}"></script>
<script src="{{ asset('admin/js/world-merc.js') }}"></script>

<!--Swiper slider js-->
<script src="{{ asset('admin/js/swiper-bundle.min.js') }}"></script>

<!-- Dashboard init -->
<script src="{{ asset('admin/js/dashboard-ecommerce.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('admin/js/app.js') }}"></script>

<!-- new  -->
<script src="{{ asset('admin/js/list.min.js') }}"></script>
<script src="{{ asset('admin/js/list.pagination.min.js') }}"></script>
<script src="{{ asset('admin/js/listjs.init.js') }}"></script>
<script src="{{ asset('admin/js/prism.js') }}"></script>


<!-- gridjs js -->
<script src="{{ asset('admin/js/gridjs.umd.js') }}"></script>
<!-- gridjs init -->
<script src="{{ asset('admin/js/gridjs.init.js') }}"></script>

<!-- glightbox js -->
<script src="{{ asset('admin/js/glightbox.min.js') }}"></script>

<!-- isotope-layout -->
<script src="{{ asset('admin/js/isotope.pkgd.min.js') }}"></script>

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- ck editor -->
<!-- <script src="{{asset('admin/js/ckeditor.js')}}"></script>
<script src="{{asset('admin/js/form-editor.init.js')}}"></script> -->

<!-- dropzone -->
<!-- <script src="{{asset('admin/js/dropzone-min.js')}}"></script>

<script src="{{asset('admin/js/filepond.min.js')}}"></script>
<script src="{{asset('admin/js/filepond-plugin-image-preview.min.js')}}"></script>
<script src="{{asset('admin/js/filepond-plugin-file-validate-size.min.js')}}"></script>
<script src="{{asset('admin/js/filepond-plugin-image-exif-orientation.min.js')}}"></script>
<script src="{{asset('admin/js/filepond-plugin-file-encode.min.js')}}"></script>

<script src="{{asset('admin/js/form-file-upload.init.js')}}"></script> -->


@stack('scripts')




<!-- <script>
    document.addEventListener('livewire:load', function() {
        alert('fhdj')
        Livewire.on('stopLoader', function() {
            alert('fd');
            setTimeout(function() {
                // Hide the loading spinner after a 2-second delay
                document.getElementById('myButton').querySelector('.mdi-loading').style.display = 'none';
            }, 2000);
        });
    });
</script> -->

    <!-- glightbox js -->
    <script src="{{ asset('admin/js/glightbox.min.js')}}"></script>
    <script src="{{ asset('admin/js/gallery.init.js')}}"></script>
</body>

</html>
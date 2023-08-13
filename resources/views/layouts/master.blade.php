@include('layouts.includes.headerlinks')


<!-- Begin page -->
<div id="layout-wrapper">

    @include('layouts.includes.header')

    <!-- Left Sidebar Start -->
    @include('layouts.includes.sidebar')
    <!-- Left Sidebar End -->

    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- start main content-->
    <div class="main-content">

        @yield('content')

        <!-- fotter start -->
        @include('layouts.includes.footer')


        <!-- footer end -->
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->
<!--end back-to-top-->

<!--preloader-->
<div id="preloader">
    <div id="status">
        <div class="spinner-border text-primary avatar-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>

@include('layouts.includes.footerlinks')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let activeTab = sessionStorage.getItem('active_tab');
        if (activeTab) {
            let tab = document.querySelector(`[wire\\:click="switchTab('${activeTab}')"]`);
            if (tab) {
                tab.click();
            }
        }
    });
</script>

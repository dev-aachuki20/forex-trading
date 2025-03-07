<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>Brand Logo</strong>
                                </div>
                                <div class="col-md-6">
                                    @if ($originalImage)
                                        <img src="{{ $originalImage }}" width="100" height="100">
                                    @else
                                        <p>{{ $allKeysProvider['no_image_found'] }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>{{ $allKeysProvider['brand_name'] }}</strong>
                                </div>
                                <div class="col-md-6">
                                    {{ ucfirst($details->brand_name) }}
                                </div>
                            </div>
                        </div>
                    </div><br>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>{{ $allKeysProvider['status'] }}</strong>
                                </div>
                                <div class="col-md-6">
                                    @if ($details->status)
                                        <button class="bg-success text-white px-3 py-1"
                                            style="border: none;">{{ $allKeysProvider['active'] }}</button>
                                    @else
                                        <button class="bg-danger text-white px-3 py-1"
                                            style="border: none;">{{ $allKeysProvider['inactive'] }}</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

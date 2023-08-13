<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <h4 class="card-title mb-0">View Package</h4>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <button wire:click.prevent="$parent.cancel()" type="button"
                                    class="btn btn-success add-btn">{{ $allKeysProvider['cancel'] }}</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>Package Name</strong>
                                </div>
                                <div class="col-md-6">
                                    {{ ucfirst($details->package_name) }}
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>Price</strong>
                                </div>
                                <div class="col-md-6">
                                    {{ $details->price }}
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>Description</strong>
                                </div>
                                <div class="col-md-6">
                                    {{ $details->description }}
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

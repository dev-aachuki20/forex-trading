<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>{{$allKeysProvider['name']}}</strong>
                                </div>
                                <div class="col-md-6">
                                    {{ucfirst($details->name)}}
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>{{$allKeysProvider['designation']}}</strong>
                                </div>
                                <div class="col-md-6">
                                    {{ucfirst($details->designation)}}
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>{{$allKeysProvider['company_name']}}</strong>
                                </div>
                                <div class="col-md-6">
                                    {{ucfirst($details->company_name)}}
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>{{$allKeysProvider['description']}}</strong>
                                </div>
                                <div class="col-md-6">
                                    {{ucfirst($details->description)}}
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>{{$allKeysProvider['rating']}}</strong>
                                </div>
                                <div class="col-md-6">
                                    @php
                                    $rating = (int)$details->rating;
                                    @endphp
                                    @for($i=1; $i<=5; $i++) @if($i <=$rating) <img src="{{ asset('admin/images/Star.svg') }}">
                                        @else
                                        <img src="{{ asset('admin/images/Star-Border.svg') }}">
                                        @endif
                                        @endfor
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>{{$allKeysProvider['image']}}</strong>
                                </div>
                                <div class="col-md-6">
                                    @if ($originalImage)
                                    <img src="{{ $originalImage }}" width="100" height="100">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>{{$allKeysProvider['status']}}</strong>
                                </div>
                                <div class="col-md-6">
                                    @if($details->status)
                                    <button class="bg-success text-white px-3 py-1" style="border: none;">{{$allKeysProvider['active']}}</button>
                                    @else
                                    <button class="bg-danger text-white px-3 py-1" style="border: none;">{{$allKeysProvider['inactive']}}</button>
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
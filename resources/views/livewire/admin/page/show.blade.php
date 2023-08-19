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
                                    <strong>{{$allKeysProvider['title']}}</strong>
                                </div>
                                <div class="col-md-6">
                                    {{ucfirst($details->title)}}
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>{{$allKeysProvider['sub_title']}}</strong>
                                </div>
                                <div class="col-md-6">
                                    {{ucfirst($details->sub_title)}}
                                </div>
                            </div>
                        </div>
                    </div><br>


                    <!-- image -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>{{$allKeysProvider['image']}}</strong>
                                </div>
                                <div class="col-md-6">
                                    @if ($originalImage)
                                    <img src="{{ $originalImage ?? asset(config('constants.no_image_url')) }}" width="100" height="100">
                                    @else
                                    <p>No Image Found</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <!-- type -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>{{$allKeysProvider['type']}}</strong>
                                </div>
                                <div class="col-md-6">
                                    {{ ucwords(config('constants.page_types')[$details->type]) }}
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <!-- description -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>{{$allKeysProvider['description']}}</strong>
                                </div>
                                <div class="col-md-6">
                                    {!! $details->description !!}
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <!-- link -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>{{$allKeysProvider['link']}}</strong>
                                </div>
                                <div class="col-md-6">
                                    {{ ucwords($details->link) }}
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
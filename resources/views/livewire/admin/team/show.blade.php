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
                                    <strong>{{$allKeysProvider['type']}}</strong>
                                </div>
                                <div class="col-md-6">
                                    {{ucwords(config('constants.member_types')[$details->type])}}
                                </div>
                            </div>
                        </div>
                    </div><br>

                    @if($details->type == 1)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>Facebook Link</strong>
                                </div>
                                <div class="col-md-6">
                                    {{ $details->facebook_link }}
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>Twitter Link</strong>
                                </div>
                                <div class="col-md-6">
                                    {{ $details->twitter_link }}
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>Instagram Link</strong>
                                </div>
                                <div class="col-md-6">
                                    {{ $details->instagram_link }}
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>Youtube Link</strong>
                                </div>
                                <div class="col-md-6">
                                    {{ $details->youtube_link }}
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>Google Link</strong>
                                </div>
                                <div class="col-md-6">
                                    {{ $details->googleplus_link }}
                                </div>
                            </div>
                        </div>
                    </div><br>
                    @endif


                    @if($details->type == 2)
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

                    {{-- <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                   <strong>{{ $allKeysProvider['brand_image'] }}</strong>
                </div>
                <div class="col-md-6">
                    @if ($originalBrandImage)
                    @foreach($originalBrandImage as $brandImage)
                    <img src="{{ $brandImage }}" width="100" height="100">
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div><br>
    --}}

    @endif

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
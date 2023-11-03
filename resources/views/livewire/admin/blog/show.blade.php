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
                                    <strong>{{$allKeysProvider['category']}}</strong>
                                </div>
                                <div class="col-md-6">
                                    {{ucfirst($details->category)}}
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

                    <!-- tags -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>{{$allKeysProvider['tags'] ?? 'Tags'}}</strong>
                                </div>
                                <div class="col-md-6">
                                    @if($details->tags)
                                       @foreach(json_decode($details->tags ,true) as $tag)
                                        <span class="badage bg-primary text-white px-3 py-1">{{ $tag }}</span>
                                       @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <!-- author name -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>{{$allKeysProvider['author_name'] ?? 'Author Name'}}</strong>
                                </div>
                                <div class="col-md-6">
                                    {{ ucwords($details->author_name) }}
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <!-- author description -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>{{$allKeysProvider['author_description'] ?? 'Author Description'}}</strong>
                                </div>
                                <div class="col-md-6">
                                    {!! $details->author_description !!}
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
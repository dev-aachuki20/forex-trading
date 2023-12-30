<div>
    @if($courses->count()>0)
    <section class="how-trade-forex-sec padding-tb-120 bg-white">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8 col-sm-12">
                    <div class="section-head text-start">
                        <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h2>
                        <div class="discription">
                            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="how-trade-forex-list">
                        @foreach($courses as $course)
                        <div class="how-trade-forex-box">
                            <div class="how-trade-forex-img">
                                <img src="{{$course->course_image_url}}" alt="trade-forex">
                            </div>
                            <div class="how-trade-forex-text">
                                <a href="{{route('learn-forex-trading-detail', ['courseid' => $course->id])}}">
                                    <h3>{{ucwords($course->name)}}</h3>
                                </a>
                                <div class="total-users-read">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.99996 2C6.37996 2 4.24996 4.13 4.24996 6.75C4.24996 9.32 6.25996 11.4 8.87996 11.49C8.95996 11.48 9.03996 11.48 9.09996 11.49H9.16996C10.3993 11.449 11.5645 10.9315 12.4192 10.0469C13.274 9.16234 13.7512 7.98004 13.75 6.75C13.75 4.13 11.62 2 8.99996 2ZM14.08 14.149C11.29 12.289 6.73996 12.289 3.92996 14.149C2.65996 14.999 1.95996 16.149 1.95996 17.379C1.95996 18.609 2.65996 19.749 3.91996 20.589C5.31996 21.529 7.15996 21.999 8.99996 21.999C10.84 21.999 12.68 21.529 14.08 20.589C15.34 19.739 16.04 18.599 16.04 17.359C16.03 16.129 15.34 14.989 14.08 14.149ZM19.99 7.338C20.15 9.278 18.77 10.978 16.86 11.208H16.81C16.75 11.208 16.69 11.208 16.64 11.228C15.67 11.278 14.78 10.968 14.11 10.398C15.14 9.478 15.73 8.098 15.61 6.598C15.5413 5.818 15.2765 5.06806 14.84 4.418C15.3639 4.16308 15.9421 4.03947 16.5245 4.05782C17.1069 4.07618 17.6761 4.23595 18.183 4.52335C18.6899 4.81076 19.1193 5.21717 19.4341 5.70753C19.7489 6.19789 19.9397 6.75747 19.99 7.338Z" fill="#5D6F7D" />
                                            <path d="M21.9883 16.59C21.9083 17.56 21.2883 18.4 20.2483 18.97C19.2483 19.52 17.9883 19.78 16.7383 19.75C17.4583 19.1 17.8783 18.29 17.9583 17.43C18.0583 16.19 17.4683 15 16.2883 14.05C15.6183 13.52 14.8383 13.1 13.9883 12.79C16.1983 12.15 18.9783 12.58 20.6883 13.96C21.6083 14.7 22.0783 15.63 21.9883 16.59Z" fill="#5D6F7D" />
                                        </svg>
                                        {{$course->lectures()->first()->total_views ?? 0}}
                                    </span>{{$course->total_duration ? $course->total_duration : "00:00:00"}} Total Duration, Updated {{ convertDateTimeFormat($course->updated_at, 'month_year_format') }}
                                </div>
                                <div class="discription">
                                    <p>{!! ucwords($course->description) !!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{-- @if($courses->count() > 4)
                    <div class="button-group justify-content-center">
                     <a href="{{ $sectionDetail ? ucwords($sectionDetail->link_one) : '' }}" class="custom-btn fill-btn">{{ $sectionDetail ? ucwords($sectionDetail->button_one) : 'Show More' }}</a>
                </div>
                @endif
                --}}

            </div>
        </div>
</div>
</section>
@endif
</div>
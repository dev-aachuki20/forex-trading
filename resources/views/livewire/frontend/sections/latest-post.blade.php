<div class="col-lg-4 col-md-6 col-sm-12">
    @if($latestPost->count()>0)
    <div class="footer-links footer-post">
        <h4 class="footer-heading text-white">{{$allKeysProvider['latest_posts']}}</h4>
        <ul>
            @foreach($latestPost as $post)
            <li><a href="#">{{ucwords($post->title)}}</a></li>
            @endforeach
            <li class="btn-active"><a href="{{route('traders-corner-blog')}}">{{__('cruds.view_all_blogs')}} </a></li>
        </ul>
    </div>
    @endif
</div>
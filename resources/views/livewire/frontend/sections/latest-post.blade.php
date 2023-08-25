<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="footer-links footer-post">
        <h4 class="footer-heading text-white">{{$allKeysProvider['latest_posts']}}</h4>
        <ul>
            @foreach($latestPost as $post)
            <li><a href="#">{{ucwords($post->title)}}</a></li>
            @endforeach
            <li class="btn-active"><a href="{{route('traders-corner-blog')}}">VIEW ALL BLOGS </a></li>
        </ul>
    </div>
</div>
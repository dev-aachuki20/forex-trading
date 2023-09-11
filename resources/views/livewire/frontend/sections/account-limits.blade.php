<div class="section-head">
    <h2 class="max-w-427">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h2>

    {!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}

    <div class="button-group">
        <a class="custom-btn outline-color-azul"
            href="{{ $sectionDetail ? $sectionDetail->link_one : '' }}">{{ $sectionDetail ? ucfirst($sectionDetail->button_one) : '' }}
        </a>
    </div>
</div>

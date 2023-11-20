<div class="section-head">
    <h2 class="max-w-427">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Account Limits' }}</h2>

    <div class="discription">
        {!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}
    </div>

    <div class="button-group">
        <a class="custom-btn outline-color-azul" href="{{route('get-funded')}}">{{ $allKeysProvider['start_trading'] ?? 'Start Trading'}}
        </a>
    </div>
</div>

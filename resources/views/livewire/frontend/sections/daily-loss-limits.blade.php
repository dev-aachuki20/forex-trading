<div class="side-by-step-item">
    <a href="#">
        <div class="step-details">
            @php
                $percentage1 = '';
                $percentage2 = '';
                $title = '';

                $inputString = '4% 5% Daily Loss Limit';

                if($sectionDetail){
                    $inputString = ucwords($sectionDetail->title);
                }

                // Use regular expression to match two percentage values and the string
                $pattern = '/(\d+%)(?:\s+(\d+%)|)\s+(.+)/';

                if (preg_match($pattern, $inputString, $matches)) {
                    $percentage1 = $matches[1] ?? null;
                    $percentage2 = $matches[2] ?? null;
                    $title = trim($matches[3]) ?? null;
                     
                    if ($percentage2 !== null) {
                        $percentage1 = (float)str_replace('%', '', $percentage1);
                        $percentage2 = (float)str_replace('%', '', $percentage2); 
                    } else {
                        $percentage1 = (float)str_replace('%', '', $percentage1);
                    }
                } 

            @endphp
            
            <h4>
            <span>
                @if(empty($percentage2))
                <div class="default-number">{{ $percentage1 }}%</div>
                @else
                <div class="default-number">{{ $percentage1 }}%</div> <div class="active-number">{{ $percentage2 }}%</div>
                @endif
            </span> 
            {{ $title }}
            </h4>
            
            <div class="step-details-dis discription">
                <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Incurred losses cannot exceed 5% of your account equity in a given day.' !!}</p>
            </div>
        </div>
    </a>
</div>
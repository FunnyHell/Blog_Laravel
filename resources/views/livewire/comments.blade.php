<div>
    @if($comments)
        @foreach($comments as $comment)
            <x-commentary :comment="$comment"/>
        @endforeach
    @endif
</div>

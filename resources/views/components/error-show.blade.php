<div class="alert alert-{{$type}}">
    @if (isset($info))
        {{ $info  }}
    @endif
    {{ $slot }}
</div>

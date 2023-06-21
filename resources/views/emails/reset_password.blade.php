<div>
    @if (isset($activationcode))
        {{ $text }} {{ $activationCode->aktivasyonkodu }}
    @else
        {{ $text }}
    @endif
</div>

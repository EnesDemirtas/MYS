<div>
    @if (isset($activationCode))
        {{ $text }} {{ $activationCode->aktivasyonkodu }}
    @else
        {{ $text }}
    @endif
</div>

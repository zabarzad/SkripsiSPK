<div class="col-sm-3">
    @switch(true)
        @case($nilai <= 2)
            <input class="form-control text-center" value="BS" disabled>
        @break

        @case($nilai <= 5)
            <input class="form-control text-center" value="B" disabled>
        @break

        @case($nilai <= 8)
            <input class="form-control text-center" value="S" disabled>
        @break

        @case($nilai > 8)
            <input class="form-control text-center" value="K" disabled>
        @break

        @default
            <input class="form-control text-center" value="" disabled>
    @endswitch
</div>
<div class="col-sm-3">
    <input class="form-control text-center" value="{{ $nilai }}" disabled>
</div>

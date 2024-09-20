<div {{ $attributes->merge([ 'class' => 'card' ]) }}>
    <div class="card-body">
        <div class="text-center">
            {{ $icon }}
        </div>

        <div class="text-center">
            {{ $number }}
        </div>

        <div class="text-center">
            {{ $label }}
            <small>{{ $description }}</small>
        </div>
    </div>
</div>
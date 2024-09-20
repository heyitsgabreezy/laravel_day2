<a 
    href="{{ route($route) }}" 
    {{ $attributes->merge([ 'class' => 'btn']) }}
>
    {{ $label }}
</a>
@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-large text-sm text-green-600']) }}>
        {{ $status }}
    </div>
@endif

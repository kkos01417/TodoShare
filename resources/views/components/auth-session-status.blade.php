@props(['status'])

@if ($status)
    <div style='width:600px;margin:0 auto;color:red;' {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
        {{ $status }}
    </div>
@endif

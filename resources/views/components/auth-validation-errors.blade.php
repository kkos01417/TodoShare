@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div style='width:600px;margin:0 auto;color:red;' class="font-medium text-red-600">
            {{ __('エラーが発生しました。') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

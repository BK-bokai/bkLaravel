@component('mail::message')
# 密碼重設通知
@lang('Hello!')



{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)

@component('mail::button', ['url' => $actionUrl, 'color' => "primary"])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}

@lang('test'),
@lang('test')<br>


{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
"若點擊按鈕\":actionText\"有問題, 複製以下的網址".
'請於網址列輸入以下網址: [:actionURL](:actionURL)',
[
'actionText' => $actionText,
'actionURL' => $actionUrl,
]
)
@endslot
@endisset
@endcomponent
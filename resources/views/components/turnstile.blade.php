@props([
    'action' => 'submit',
    'theme' => 'auto',
    'model' => 'turnstileToken',
])

@php
    $siteKey = config('services.turnstile.key');
@endphp

@if($siteKey)
<div 
    x-data="{
        widgetId: null,
        initTurnstile() {
            if (typeof turnstile === 'undefined') {
                const script = document.createElement('script');
                script.src = 'https://challenges.cloudflare.com/turnstile/v0/api.js?render=explicit';
                script.async = true;
                script.defer = true;
                script.onload = () => this.renderWidget();
                document.head.appendChild(script);
            } else {
                this.renderWidget();
            }
        },
        renderWidget() {
            if (this.widgetId !== null) return;
            this.widgetId = turnstile.render(this.$refs.turnstileContainer, {
                sitekey: '{{ $siteKey }}',
                theme: '{{ $theme }}',
                action: '{{ $action }}',
                callback: (token) => {
                    @if($model)
                        if (typeof @this !== 'undefined') {
                            @this.set('{{ $model }}', token);
                        }
                    @endif
                    const hiddenInput = this.$el.querySelector('input[name=\'cf-turnstile-response\']');
                    if (hiddenInput) hiddenInput.value = token;
                },
                'expired-callback': () => {
                    @if($model)
                        if (typeof @this !== 'undefined') {
                            @this.set('{{ $model }}', '');
                        }
                    @endif
                    const hiddenInput = this.$el.querySelector('input[name=\'cf-turnstile-response\']');
                    if (hiddenInput) hiddenInput.value = '';
                }
            });
        }
    }"
    x-init="initTurnstile()"
    class="my-3 flex justify-center"
>
    <div x-ref="turnstileContainer"></div>
    <input type="hidden" name="cf-turnstile-response" value="">
</div>
@endif


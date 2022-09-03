<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
            </a>
        </x-slot>

        <div style="width:600px;margin:100px auto 0 auto;"  class="mb-4 text-sm text-gray-600">
            {{ __('パスワードをお忘れですか？パスワード再設定用のリンクをメールでお送りします。メールアドレスを入力してください。') }}
        </div>

        <!-- Session Status -->
        {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

        <!-- Validation Errors -->
        {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" style="width:600px;margin:20px auto 0 auto;"/> --}}

        <form method="POST" style="width:600px;margin:20px auto 0 auto;" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" style="width:250px;height:20px;margin-bottom:15px;" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('パスワード再設定用リンクを送信') }}
                </x-button>
            </div>
            <br>
            <br>
            <br>
                    <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" style="width:600px;margin:20px auto 0 auto;"/>
        </form>
    </x-auth-card>
</x-guest-layout>

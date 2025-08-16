<x-guest-layout>
    <!-- Form Đăng Nhập -->
    <div id="login-form" class="form-container p-8">
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-2">Chào mừng trở lại!</h2>
        <p class="text-gray-500 text-center mb-8">Đăng nhập để tiếp tục</p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="space-y-5">
                <div>
                    <label for="login-email" class="text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1 relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 input-icon"><i data-lucide="mail"
                                class="w-5 h-5 text-gray-400"></i></span>
                        <input id="login-email" name="email" type="email" value="{{ old('email') }}" required
                            autofocus autocomplete="username"
                            class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500"
                            placeholder="you@example.com">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div>
                    <label for="login-password" class="text-sm font-medium text-gray-700">Mật khẩu</label>
                    <div class="mt-1 relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 input-icon"><i data-lucide="lock"
                                class="w-5 h-5 text-gray-400"></i></span>
                        <input id="login-password" name="password" type="password" required
                            autocomplete="current-password"
                            class="w-full pl-10 pr-10 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500"
                            placeholder="Nhập mật khẩu">
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 password-toggle">
                            <i data-lucide="eye" class="w-5 h-5 text-gray-400"></i>
                        </span>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
            </div>

            <div class="flex items-center justify-between mt-6">
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox"
                        class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-900">Ghi nhớ tôi</label>
                </div>
                @if (Route::has('password.request'))
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}"
                            class="font-medium text-red-600 hover:text-red-500">Quên mật khẩu?</a>
                    </div>
                @endif
            </div>

            <div class="mt-8">
                <button type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Đăng nhập
                </button>
            </div>
        </form>

        <p class="mt-8 text-center text-sm text-gray-600">
            Chưa có tài khoản?
            <a href="{{ route('register') }}" class="font-medium text-red-600 hover:text-red-500">
                Đăng ký ngay
            </a>
        </p>
    </div>
</x-guest-layout>

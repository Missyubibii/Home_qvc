<x-guest-layout>
    <!-- Form Quên Mật Khẩu -->
    <div id="forgot-form" class="form-container p-8">
        <a href="{{ route('login') }}" class="absolute top-6 left-6 text-gray-500 hover:text-red-600 transition" aria-label="Quay lại đăng nhập">
            <i data-lucide="arrow-left" class="w-6 h-6"></i>
        </a>
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-2">Quên mật khẩu?</h2>
        <p class="text-gray-500 text-center mb-6">Nhập email của bạn để lấy lại mật khẩu</p>
        
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="space-y-5">
                <div>
                    <label for="forgot-email" class="text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1 relative">
                         <span class="absolute inset-y-0 left-0 flex items-center pl-3 input-icon"><i data-lucide="mail" class="w-5 h-5 text-gray-400"></i></span>
                        <input id="forgot-email" name="email" type="email" value="{{ old('email') }}" required autofocus class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500" placeholder="you@example.com">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Gửi liên kết
                </button>
            </div>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Nhớ mật khẩu rồi?
            <a href="{{ route('login') }}" class="font-medium text-red-600 hover:text-red-500">
                Quay lại Đăng nhập
            </a>
        </p>
    </div>
</x-guest-layout>

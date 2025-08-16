<x-guest-layout>
    <!-- Form Đăng Ký -->
    <div id="register-form" class="form-container p-10">
        <a href="{{ route('login') }}" class="absolute top-6 left-6 text-gray-500 hover:text-red-600 transition"
            aria-label="Quay lại đăng nhập">
            <i data-lucide="arrow-left" class="w-6 h-6"></i>
        </a>
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-8">Tạo tài khoản mới</h2>

        <form id="registration-form-element" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="space-y-5">
                <div>
                    <label for="register-name" class="text-sm font-medium text-gray-700">Họ và tên</label>
                    <div class="mt-1 relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 input-icon"><i data-lucide="user"
                                class="w-5 h-5 text-gray-400"></i></span>
                        <input id="register-name" name="name" type="text" value="{{ old('name') }}" required
                            autofocus autocomplete="name"
                            class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500"
                            placeholder="Nguyễn Văn A">
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <label for="register-email" class="text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1 relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 input-icon"><i data-lucide="mail"
                                class="w-5 h-5 text-gray-400"></i></span>
                        <input id="register-email" name="email" type="email" value="{{ old('email') }}" required
                            autocomplete="username"
                            class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500"
                            placeholder="you@example.com">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div>
                    <label for="register-phone" class="text-sm font-medium text-gray-700">Số điện thoại</label>
                    <div class="mt-1 relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 input-icon"><i data-lucide="phone"
                                class="w-5 h-5 text-gray-400"></i></span>
                        <input id="register-phone" name="phone" type="tel" value="{{ old('phone') }}"
                            autocomplete="tel"
                            class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500"
                            placeholder="Nhập số điện thoại">
                    </div>
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>
                <div>
                    <label for="register-address" class="text-sm font-medium text-gray-700">Địa chỉ</label>
                    <div class="mt-1 relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 input-icon"><i
                                data-lucide="map-pin" class="w-5 h-5 text-gray-400"></i></span>
                        <input id="register-address" name="address" type="text" value="{{ old('address') }}"
                            autocomplete="street-address"
                            class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500"
                            placeholder="Nhập địa chỉ của bạn">
                    </div>
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>
                <div>
                    <label for="register-password" class="text-sm font-medium text-gray-700">Mật khẩu</label>
                    <div class="mt-1 relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 input-icon"><i data-lucide="lock"
                                class="w-5 h-5 text-gray-400"></i></span>
                        <input id="register-password" name="password" type="password" required
                            autocomplete="new-password"
                            class="w-full pl-10 pr-10 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500"
                            placeholder="Tạo mật khẩu">
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 password-toggle">
                            <i data-lucide="eye" class="w-5 h-5 text-gray-400"></i>
                        </span>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div>
                    <label for="password_confirmation" class="text-sm font-medium text-gray-700">Xác nhận mật
                        khẩu</label>
                    <div class="mt-1 relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 input-icon"><i data-lucide="lock"
                                class="w-5 h-5 text-gray-400"></i></span>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            autocomplete="new-password"
                            class="w-full pl-10 pr-10 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500"
                            placeholder="Nhập lại mật khẩu">
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 password-toggle">
                            <i data-lucide="eye" class="w-5 h-5 text-gray-400"></i>
                        </span>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>
            <div class="mt-8">
                <x-primary-button
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    {{ __('Đăng ký') }}
                </x-primary-button>
            </div>
        </form>

        <p class="mt-8 text-center text-sm text-gray-600">
            Đã có tài khoản?
            <a href="{{ route('login') }}" class="font-medium text-red-600 hover:text-red-500">
                Đăng nhập
            </a>
        </p>
    </div>
</x-guest-layout>

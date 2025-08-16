{{-- resources/views/components/admin-layout.blade.php --}}
<div class="min-h-screen bg-gray-100 flex">
    @include('layouts.admin-navigation')
    <main class="flex-1 p-6">
        {{ $slot }}
    </main>
</div>

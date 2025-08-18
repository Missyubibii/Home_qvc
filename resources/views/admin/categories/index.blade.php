@extends('layouts.admin')

@section('title', 'Quản lý danh mục')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Quản lý Danh mục</h1>
            <p class="text-sm text-gray-500 mt-1">Tổ chức và sắp xếp các danh mục sản phẩm.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}"
            class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 flex items-center gap-2">
            <i data-lucide="plus" class="h-5 w-5"></i>
            <span>Tạo mới</span>
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        @if (session('success'))
            <div id="success-alert" class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                <i data-lucide="check-circle-2" class="h-5 w-5 mr-3"></i>
                <div><span class="font-medium">Thành công!</span> {{ session('success') }}</div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200" onclick="document.getElementById('success-alert').style.display='none'">
                    <i data-lucide="x" class="h-5 w-5"></i>
                </button>
            </div>
        @endif

        <div class="overflow-x-auto border rounded-lg">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Tên danh mục</th>
                        <th scope="col" class="px-6 py-3">Slug</th>
                        <th scope="col" class="px-6 py-3">Trạng thái</th>
                        <th scope="col" class="px-6 py-3">Hành động</th>
                    </tr>
                </thead>
                <tbody x-data="{ openCategories: [] }">
                    @forelse ($categories as $category)
                        {{-- Dòng danh mục cha --}}
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if($category->children->isNotEmpty())
                                        <button @click="openCategories.includes({{ $category->id }}) ? openCategories = openCategories.filter(id => id !== {{ $category->id }}) : openCategories.push({{ $category->id }})" class="mr-2 text-gray-400 hover:text-gray-600">
                                            <i data-lucide="chevron-right" class="h-4 w-4 transition-transform" :class="openCategories.includes({{ $category->id }}) && 'rotate-90'"></i>
                                        </button>
                                    @else
                                        <div class="w-4 mr-2"></div> {{-- Giữ khoảng cách --}}
                                    @endif
                                    <span class="font-medium text-gray-900">{{ $category->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-500">{{ $category->slug }}</td>
                            <td class="px-6 py-4">
                                @if ($category->is_active)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Kích hoạt</span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Ẩn</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="text-blue-500 hover:text-blue-700" title="Chỉnh sửa">
                                        <i data-lucide="edit" class="h-5 w-5"></i>
                                    </a>
                                    <form id="delete-form-{{ $category->id }}" action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="showConfirmModal('delete-form-{{ $category->id }}', 'Xác nhận xóa', 'Bạn có chắc chắn muốn xóa danh mục \'{{ $category->name }}\'?')" class="text-red-500 hover:text-red-700" title="Xóa">
                                            <i data-lucide="trash-2" class="h-5 w-5"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        {{-- Dòng chứa các danh mục con --}}
                        <tr x-show="openCategories.includes({{ $category->id }})" x-transition style="display: none;">
                            <td colspan="4" class="p-0 bg-gray-50">
                                <div class="pl-12 pr-4 py-2">
                                    @foreach($category->children as $child)
                                        <div class="flex justify-between items-center py-2 border-b border-gray-200 last:border-b-0">
                                            <div class="text-sm text-gray-700">{{ $child->name }}</div>
                                            <div class="flex items-center gap-3">
                                                <a href="{{ route('admin.categories.edit', $child) }}" class="text-blue-500 hover:text-blue-700" title="Chỉnh sửa">
                                                    <i data-lucide="edit" class="h-5 w-5"></i>
                                                </a>
                                                <form id="delete-form-{{ $child->id }}" action="{{ route('admin.categories.destroy', $child) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onclick="showConfirmModal('delete-form-{{ $child->id }}', 'Xác nhận xóa', 'Bạn có chắc chắn muốn xóa danh mục \'{{ $child->name }}\'?')" class="text-red-500 hover:text-red-700" title="Xóa">
                                                        <i data-lucide="trash-2" class="h-5 w-5"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                Không có danh mục nào.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>

    {{-- Modal xác nhận xóa --}}
    <div id="confirm-modal" class="fixed inset-0 bg-black/60 z-[60] hidden items-center justify-center">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
            <div class="p-6 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <i data-lucide="alert-triangle" class="h-6 w-6 text-red-600"></i>
                </div>
                <h3 id="confirm-modal-title" class="text-lg font-medium text-gray-900 mt-5"></h3>
                <p id="confirm-modal-text" class="mt-2 text-sm text-gray-500"></p>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse gap-2">
                <button id="confirm-modal-btn" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 sm:ml-3 sm:w-auto sm:text-sm">Xác nhận</button>
                <button id="cancel-confirm-modal-btn" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:w-auto sm:text-sm">Hủy</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        lucide.createIcons();

        const confirmModal = document.getElementById('confirm-modal');
        const confirmBtn = document.getElementById('confirm-modal-btn');
        const cancelConfirmBtn = document.getElementById('cancel-confirm-modal-btn');
        let formToSubmit = null;

        function showConfirmModal(formId, title, text) {
            formToSubmit = document.getElementById(formId);
            document.getElementById('confirm-modal-title').textContent = title;
            document.getElementById('confirm-modal-text').textContent = text;
            confirmModal.classList.replace('hidden', 'flex');
        }

        function closeConfirmModal() {
            confirmModal.classList.replace('flex', 'hidden');
            formToSubmit = null;
        }

        confirmBtn.addEventListener('click', () => {
            if (formToSubmit) formToSubmit.submit();
        });
        cancelConfirmBtn.addEventListener('click', closeConfirmModal);
    </script>
@endpush

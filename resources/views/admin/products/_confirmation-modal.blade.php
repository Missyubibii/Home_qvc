<!-- Modal Xác nhận Chung -->
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

@push('scripts')
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        // Đảm bảo script chỉ chạy một lần dù được include nhiều nơi
        if (typeof window.lucide === 'undefined') {
            lucide.createIcons();
        }
        if (typeof window.confirmModalSetup === 'undefined') {
            window.confirmModalSetup = true;

            document.addEventListener('DOMContentLoaded', function() {
                const confirmModal = document.getElementById('confirm-modal');
                if (!confirmModal) return;

                const confirmBtn = document.getElementById('confirm-modal-btn');
                const cancelConfirmBtn = document.getElementById('cancel-confirm-modal-btn');
                let formToSubmit = null;

                window.showConfirmModal = function(formId, title, text) {
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
            });
        }
    </script>
@endpush

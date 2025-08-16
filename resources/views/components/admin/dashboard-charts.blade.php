@props(['salesData' => [], 'categoryData' => []])

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <div class="lg:col-span-2 bg-white/80 backdrop-blur-sm p-6 rounded-lg shadow-md">
        <h3 class="font-semibold text-gray-800 mb-4">Thống kê doanh thu</h3>
        <canvas id="salesChart"></canvas>
    </div>
    <div class="bg-white/80 backdrop-blur-sm p-6 rounded-lg shadow-md">
        <h3 class="font-semibold text-gray-800 mb-4">Phân loại sản phẩm</h3>
        <canvas id="categoryChart"></canvas>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Biểu đồ doanh thu
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
                datasets: [{
                    label: 'Doanh thu',
                    data: @json($salesData ?: [65, 59, 80, 81, 56, 55, 40]),
                    fill: false,
                    borderColor: '#ef4444',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Biểu đồ phân loại sản phẩm
        const categoryCtx = document.getElementById('categoryChart').getContext('2d');
        const categoryDataset = @json($categoryData) || {
            labels: ['Laptop', 'Linh kiện', 'Màn hình', 'Phụ kiện'],
            data: [300, 50, 100, 120]
        };

        new Chart(categoryCtx, {
            type: 'doughnut',
            data: {
                labels: categoryDataset.labels,
                datasets: [{
                    label: 'Số lượng',
                    data: categoryDataset.data,
                    backgroundColor: [
                        '#ef4444',
                        '#3b82f6',
                        '#22c55e',
                        '#f59e0b'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    });
</script>
@endpush

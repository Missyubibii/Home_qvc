@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
        <button id="get-insights-btn"
            class="bg-white border border-gray-300 text-gray-700 font-semibold px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-gray-50 transition-colors">
            <span class="gemini-icon">✨</span>
            <span class="button-text">Nhận định nhanh</span>
        </button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-6">
            <div class="bg-red-100 text-red-600 p-4 rounded-full">
                <i data-lucide="dollar-sign" class="h-8 w-8"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Tổng doanh thu</p>
                <p class="text-2xl font-bold text-gray-800">1,250,000đ</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-6">
            <div class="bg-blue-100 text-blue-600 p-4 rounded-full">
                <i data-lucide="shopping-cart" class="h-8 w-8"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Đơn hàng mới</p>
                <p class="text-2xl font-bold text-gray-800">32</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-6">
            <div class="bg-green-100 text-green-600 p-4 rounded-full">
                <i data-lucide="users" class="h-8 w-8"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Khách hàng mới</p>
                <p class="text-2xl font-bold text-gray-800">15</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-6">
            <div class="bg-yellow-100 text-yellow-600 p-4 rounded-full">
                <i data-lucide="package" class="h-8 w-8"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Sản phẩm</p>
                <p class="text-2xl font-bold text-gray-800">256</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-md">
            <h3 class="font-semibold text-gray-800 mb-4">Thống kê doanh thu</h3>
            <canvas id="salesChart"></canvas>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="font-semibold text-gray-800 mb-4">Phân loại sản phẩm</h3>
            <canvas id="categoryChart"></canvas>
        </div>
    </div>
@endsection


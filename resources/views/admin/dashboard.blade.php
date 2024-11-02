@extends('admin.layouts.app')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@section('content')
    <div class="p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold mb-6">Welcome to the Admin Dashboard</h1>

        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Customer Count -->
            <div class="bg-blue-50 border-l-4 border-blue-400 shadow-sm rounded-lg p-4 flex items-center space-x-4">
                <div>
                    <h2 class="text-lg font-medium text-blue-700">Customers</h2>
                    <p class="text-3xl font-bold text-blue-800">{{ $customerCount }}</p>
                </div>
            </div>

            <!-- Product Count -->
            <div class="bg-green-50 border-l-4 border-green-400 shadow-sm rounded-lg p-4 flex items-center space-x-4">
                <div>
                    <h2 class="text-lg font-medium text-green-700">Products</h2>
                    <p class="text-3xl font-bold text-green-800">{{ $productCount }}</p>
                </div>
            </div>

            <!-- Category Count -->
            <div class="bg-yellow-50 border-l-4 border-yellow-400 shadow-sm rounded-lg p-4 flex items-center space-x-4">
                <div>
                    <h2 class="text-lg font-medium text-yellow-700">Categories</h2>
                    <p class="text-3xl font-bold text-yellow-800">{{ $categoryCount }}</p>
                </div>
            </div>
        </div>
        <!-- Toggleable Chart Section -->
        <div class="mt-8 p-6 bg-gray-50 shadow-md rounded-lg"
             x-data="{
               dataLabel: '',
               chartData: [],
               chartLabel: '',
               selectedType: '',
               selectedRange: '',
               initialData: [],
               updateConfigByMutating(chart, chartDatasetData, dataLabels = null, chartDatasetLabel = null) {
                 if (dataLabels) {
                   chart.data.labels = [dataLabels];
                 }

                 if (chartDatasetLabel) {
                   chart.data.datasets[0].label = chartDatasetLabel;
                 }

                 chart.data.datasets[0].data = chartDatasetData;
                 chart.update();
               }
             }"
             x-init="
               initialData = {{$counts}};
               dataLabel = 'Last 24 Hours';
               chartData = [initialData['24h']['customers']];
               chartLabel = 'Customers Registered';
               selectedType = 'customers';
               selectedRange = '24h';
               chart = new Chart(document.getElementById('dashboardChart').getContext('2d'), {
                 type: 'bar',
                 data: {
                   labels: [dataLabel],
                   datasets: [{
                     label: chartLabel,
                     data: chartData,
                     backgroundColor: 'rgba(255, 99, 132, 0.2)',
                     borderColor: 'rgba(255, 99, 132, 1)',
                     borderWidth: 1
                   }]
                 },
                 options: {}
               });
             ">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <button @click="selectedType = 'customers'"
                            :class="selectedType === 'customers' ? 'bg-blue-500 text-white' : 'bg-gray-200'"
                            class="px-4 py-2 rounded-l">Customers</button>
                    <button @click="selectedType = 'products'; updateConfigByMutating(chart,  ,'Products Created')"
                            :class="selectedType === 'products' ? 'bg-green-500 text-white' : 'bg-gray-200'"
                            class="px-4 py-2 rounded-r">Products</button>
                </div>
                <div>
                    <button @click="selectedRange = '24h'"
                            :class="selectedRange === '24h' ? 'bg-gray-800 text-white' : 'bg-gray-200'"
                            class="px-3 py-1 rounded">24h</button>
                    <button @click="selectedRange = '7days'"
                            :class="selectedRange === '7days' ? 'bg-gray-800 text-white' : 'bg-gray-200'"
                            class="px-3 py-1 rounded">7 Days</button>
                    <button @click="selectedRange = 'month'"
                            :class="selectedRange === 'month' ? 'bg-gray-800 text-white' : 'bg-gray-200'"
                            class="px-3 py-1 rounded">Month</button>
                    <button @click="selectedRange = 'year'"
                            :class="selectedRange === 'year' ? 'bg-gray-800 text-white' : 'bg-gray-200'"
                            class="px-3 py-1 rounded">Year</button>
                    <button @click="selectedRange = 'overall'"
                            :class="selectedRange === 'overall' ? 'bg-gray-800 text-white' : 'bg-gray-200'"
                            class="px-3 py-1 rounded">Overall</button>
                </div>
            </div>

            <!-- Chart Container -->
            <div class="relative h-64">
                <canvas id="dashboardChart" class="w-full h-full"></canvas>
            </div>
        </div>
    </div>

@endsection

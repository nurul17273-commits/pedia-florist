<x-layout-admin>
    <x-slot:title>Dashboard | PediaFlorist Pro</x-slot:title>

    <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
        <div>
            <h2 class="text-2xl font-black text-slate-800 tracking-tight flex items-center gap-2">
                DASHBOARD <span class="bg-blue-600 text-white text-[10px] px-2 py-0.5 rounded-md italic uppercase tracking-tighter">Pro Control</span>
            </h2>
            <p class="text-[13px] text-slate-500 font-medium">Monitoring sistem real-time.</p>
        </div>
        <div class="flex gap-3">
            <button onclick="window.print()" class="px-4 py-2 bg-white border border-slate-200 rounded-xl text-[11px] font-black uppercase tracking-widest hover:bg-slate-50 transition-all shadow-sm">
                <i class="fas fa-print mr-2"></i> Print Report
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-200/50 hover:-translate-y-1 transition-all">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-xl">
                    <i class="fas fa-leaf"></i>
                </div>
                <span class="text-[10px] font-black text-emerald-500 bg-emerald-50 px-2 py-1 rounded-lg italic">+12%</span>
            </div>
            <p class="text-slate-400 text-[11px] font-bold uppercase tracking-widest">Total Flora</p>
            <h3 class="text-3xl font-black text-slate-900 tracking-tighter">
    {{ $totalPlants }}
</h3>
        </div>

        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-200/50 hover:-translate-y-1 transition-all">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center text-xl">
                    <i class="fas fa-users"></i>
                </div>
                <span class="text-[10px] font-black text-emerald-500 bg-emerald-50 px-2 py-1 rounded-lg italic">+5%</span>
            </div>
            <p class="text-slate-400 text-[11px] font-bold uppercase tracking-widest">Total Users</p>
            <h3 class="text-3xl font-black text-slate-900 tracking-tighter">
    {{ $totalUsers }}
</h3>
        </div>

        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-200/50 hover:-translate-y-1 transition-all">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center text-xl">
                    <i class="fas fa-brain"></i>
                </div>
                <span class="text-[10px] font-black text-blue-500 bg-blue-50 px-2 py-1 rounded-lg italic">Stable</span>
            </div>
            <p class="text-slate-400 text-[11px] font-bold uppercase tracking-widest">Akurasi AI</p>
            <h3 class="text-3xl font-black text-slate-900 tracking-tighter">
    {{ $akurasiAi }}%
</h3>
        </div>

        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-200/50 hover:-translate-y-1 transition-all">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center text-xl">
                    <i class="fas fa-envelope"></i>
                </div>
                <span class="text-[10px] font-black text-orange-500 bg-orange-50 px-2 py-1 rounded-lg italic italic">Urgent</span>
            </div>
            <p class="text-slate-400 text-[11px] font-bold uppercase tracking-widest">Pesan Masuk</p>
            <h3 class="text-3xl font-black text-slate-900 tracking-tighter">
    {{ $totalMessages }}
</h3>
        </div>
    </div>

    <div class="grid lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 bg-white rounded-[2.5rem] border border-slate-100 shadow-xl shadow-slate-200/50 p-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h4 class="font-black text-slate-800 text-sm italic uppercase tracking-widest">Analisis Diagnosa AI</h4>
                    <p class="text-[11px] text-slate-400 font-bold">Data aktivitas neural network mingguan</p>
                </div>
                <select id="chartFilter" class="bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-[10px] font-black uppercase outline-none">
                    <option>7 Hari Terakhir</option>
                    <option>30 Hari Terakhir</option>
                </select>
            </div>

            <div class="h-72">
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <div class="bg-[#0f172a] rounded-[2.5rem] shadow-xl p-8 text-white">
            <h4 class="font-black text-blue-400 text-xs italic uppercase tracking-[0.2em] mb-8">System Logs.</h4>

            <div class="space-y-6" id="logContainer">
                <div class="flex gap-4 group">
                    <div class="w-1 h-10 bg-blue-500 rounded-full shadow-[0_0_10px_rgba(59,130,246,0.5)]"></div>
                    <div class="flex-1">
                        <div class="flex justify-between">
                            <p class="text-[12px] font-bold text-slate-200">Database Sync</p>
                            <span class="text-[9px] text-slate-500">Just Now</span>
                        </div>
                        <p class="text-[10px] text-slate-500 mt-1 uppercase italic tracking-tighter">Successfully updated 24 species</p>
                    </div>
                </div>
                <div class="flex gap-4 group opacity-70">
                    <div class="w-1 h-10 bg-slate-700 rounded-full"></div>
                    <div class="flex-1">
                        <div class="flex justify-between">
                            <p class="text-[12px] font-bold text-slate-200">AI Model Training</p>
                            <span class="text-[9px] text-slate-500">1h ago</span>
                        </div>
                        <p class="text-[10px] text-slate-500 mt-1 uppercase italic tracking-tighter">Neural Network v4.2 Deployed</p>
                    </div>
                </div>
            </div>

            <button class="w-full mt-12 py-4 bg-white/5 border border-white/10 rounded-2xl text-blue-400 text-[11px] font-black uppercase tracking-widest hover:bg-blue-600 hover:text-white transition-all">
                Clear All Logs
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('myChart').getContext('2d');

            // Membuat gradien untuk grafik
            const gradient = ctx.createLinearGradient(0, 0, 0, 300);
            gradient.addColorStop(0, 'rgba(37, 99, 235, 0.5)');
            gradient.addColorStop(1, 'rgba(37, 99, 235, 0)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
    label: 'Diagnosa',
    data: @json($chartData),
    borderColor: '#2563eb',
    borderWidth: 4,
    backgroundColor: gradient,
    fill: true,
    tension: 0.4,
    pointRadius: 0,
    pointHoverRadius: 6,
    pointHoverBackgroundColor: '#2563eb',
    pointHoverBorderColor: '#fff',
    pointHoverBorderWidth: 3
}]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { display: false },
                            ticks: { font: { size: 10, weight: 'bold' }, color: '#94a3b8' }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { font: { size: 10, weight: 'bold' }, color: '#94a3b8' }
                        }
                    }
                }
            });
        });
    </script>
</x-layout-admin>

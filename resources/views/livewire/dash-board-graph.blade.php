<div class="flex flex-col h-full w-full gap-3 justify-items-stretch">
    <div class="card h-full w-full bg-base-100 shadow-xl">
        <div wire:ignore class="card-body flex h-full p-2 justify-center items-center">
            <canvas id="caseChart" class="h-full"></canvas>
        </div>
    </div>
    <div class="card h-full w-full bg-base-100 shadow-xl">
        <div class="card-body flex h-full p-2 justify-center items-center">
            <canvas wire:ignore id="documentChart" class="h-full"></canvas>
        </div>
    </div>

    <div class="card h-full w-full bg-base-100 shadow-xl">
        <div class="card-body flex h-full p-2 justify-center items-center">
            <canvas wire:ignore id="cenopacChart" class="h-full"></canvas>
        </div>
    </div>

    <!--Script for Charts-->
@assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets

@script
    <script>
        const ctx = document.getElementById('caseChart');
        const casegraph = $wire.casegraph;
        const docgraph = $wire.docgraph;
        const cenopacgraph = $wire.cenopacgraph;
        const labels = casegraph.map(item=>item.Month);
        const casevalues = casegraph.map(item=>item.Value);
        const docvalues = docgraph.map(item=>item.Value);
        const cenopacvalues = cenopacgraph.map(item=>item.Value);
        new Chart(ctx, {
            type: 'line',
            data: {
            labels: labels,
            datasets: [{
                label: '# of Cases Resolved',
                data: casevalues,
                borderWidth: 2,
                borderColor: '#00BFFF',
                backgroundColor: '#00BFFF'
            }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const x = document.getElementById('documentChart');
        
        new Chart(x, {
            type: 'line',
            data: {
            labels: labels,
            datasets: [{
                label: '# of Document Proccessed',
                data: docvalues,
                borderWidth: 2,
                borderColor: '#00A875',
                backgroundColor: '#00A875'
            }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const cx = document.getElementById('cenopacChart');
        
        new Chart(cx, {
            type: 'line',
            data: {
            labels: labels,
            datasets: [{
                label: '# of CeNoPac Generated',
                data: cenopacvalues,
                borderWidth: 2,
                borderColor: '#FFC000',
                backgroundColor: '#FFC000'
            }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endscript

</div>
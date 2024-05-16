<div class="flex h-2/5 w-full gap-3 justify-items-stretch">
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

    <!--Script for Charts-->
@assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets

@script
    <script>
        const ctx = document.getElementById('caseChart');
        const casegraph = $wire.casegraph;
        const docgraph = $wire.docgraph;
        const labels = casegraph.map(item=>item.Month);
        const casevalues = casegraph.map(item=>item.Value);
        const docvalues = docgraph.map(item=>item.Value);
        new Chart(ctx, {
            type: 'line',
            data: {
            labels: labels,
            datasets: [{
                label: '# of Cases',
                data: casevalues,
                borderWidth: 2
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
                borderColor: '#097969',
                backgroundColor: '#097969'
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
@extends('layouts.app')

@section('head')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Analytics</span>
                <button id="exportCsvBtn" class="btn btn-sm btn-primary">Export CSV</button>
            </div>
            <div class="card-body">
                <canvas id="analyticsChart" width="400" height="150"></canvas>

                <table class="table" id="analyticsTable">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Website ID</th>
                            <th scope="col">Visitor IP</th>
                            <th scope="col">Timestamp</th>
                            <th scope="col">User Agent</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($analytics as $data)
                            <tr>
                                <th scope="row">{{ $data->id }}</th>
                                <td>{{ $data->website_id }}</td>
                                <td>{{ $data->visitor_ip }}</td>
                                <td>{{ $data->timestamp }}</td>
                                <td>{{ $data->user_agent }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Prepare data for the chart
        const labels = @json($analytics->pluck('timestamp'));
        const data = {
            labels: labels,
            datasets: [{
                label: 'Visits',
                data: @json($analytics->groupBy('timestamp')->map->count()->values()),
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Timestamp'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Visits'
                        },
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        };

        new Chart(
            document.getElementById('analyticsChart'),
            config
        );

        // Export table to CSV
        document.getElementById('exportCsvBtn').addEventListener('click', function () {
            const table = document.getElementById('analyticsTable');
            let csv = [];
            for (let row of table.rows) {
                let rowData = [];
                for (let cell of row.cells) {
                    // Escape quotes in cell data
                    let text = cell.innerText.replace(/"/g, '""');
                    rowData.push('"' + text + '"');
                }
                csv.push(rowData.join(','));
            }
            const csvString = csv.join('\n');
            const blob = new Blob([csvString], { type: 'text/csv' });
            const url = window.URL.createObjectURL(blob);

            const a = document.createElement('a');
            a.href = url;
            a.download = 'analytics.csv';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);
        });
    </script>
@endsection

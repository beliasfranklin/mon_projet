@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.users') }}">Utilisateurs</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.historiques') }}">Historiques</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.reporting') }}">Reporting</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.settings') }}">Paramètres</a></li>
                </ul>
            </div>
        </nav>
        <!-- Main -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <h1 class="mt-4">Tableau de bord Administrateur</h1>
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Utilisateurs</h5>
                            <p class="card-text">{{ $userCount ?? 0 }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Activités récentes</h5>
                            <p class="card-text">{{ $recentActivities ?? 0 }}</p>
                        </div>
                    </div>
                </div>
                <!-- Ajoutez d'autres cartes statistiques ici -->
            </div>
            <!-- Graphiques et notifications -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">Graphique d'utilisation</div>
                        <div class="card-body">
                            <canvas id="usageChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">Notifications</div>
                        <div class="card-body">
                            <ul>
                                @foreach($notifications ?? [] as $notif)
                                    <li>{{ $notif }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('usageChart').getContext('2d');
    var usageChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($chartLabels ?? []) !!},
            datasets: [{
                label: 'Utilisation',
                data: {!! json_encode($chartData ?? []) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection
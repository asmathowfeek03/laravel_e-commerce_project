<!--Admin -Analitics -Page-->
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <!--card header -->
            <div class="card-header">
                <h3 style="font-size: 25px; font-weight: bold; font-family: 'Roboto Condensed', sans-serif;margin:20px;">
                    <i class="fas fa-chart-line" style="margin-right: 10px; color: #3c3c3d;"></i> Analitics:
                    <div class="d-flex float-end" style="font-size:18px">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <a href="{{ url('admin/dashboard') }}" class="text-muted mb-0 hover-cursor"> &nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</a>
                        <a href="{{ url('admin/chart') }}" class="text-primary mb-0 hover-cursor">Analytics</a>
                    </div>
                </h3>
            </div>
            <!--card body -->
            <div class="card-body">
                <!--Monthly Orders and Income -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 style="font-size:18px; font-weight:bold;text-align:center; font-family: 'Roboto Condensed', sans-serif;">Monthly Orders</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="monthlyOrderChart" width="200px" height="70px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h3 style="font-size:18px; font-weight:bold;text-align:center; font-family: 'Roboto Condensed', sans-serif;">Monthly Income</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="monthlyIncomeChart" width="200px" height="100px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ url('admin/orders') }}" class="btn btn-primary float-end text-white fw-bold">
                            <i class="fas fa-info-circle me-1"></i> More Details
                        </a>
                    </div>
                </div>
                <br><hr><br>

                 <!--Yearly Orders and Income -->
                 <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 style="font-size:18px; font-weight:bold;text-align:center; font-family: 'Roboto Condensed', sans-serif;">Yearly Orders</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="yearlyOrderChart" width="200px" height="100px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h3 style="font-size:18px; font-weight:bold;text-align:center; font-family: 'Roboto Condensed', sans-serif;">Yearly Income</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="yearlyIncomeChart" width="200px" height="100px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ url('admin/orders') }}" class="btn btn-primary float-end text-white fw-bold">
                            <i class="fas fa-info-circle"></i> More Details
                        </a>
                    </div>
                </div>
                <br><hr><br>

                <!--User Analitics -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 style="font-size:18px; font-weight:bold;text-align:center; font-family: 'Roboto Condensed', sans-serif;">Monthly Registered Users</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="monthlyCustomerChart" width="200px" height="100px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 style="font-size:18px; font-weight:bold;text-align:center; font-family: 'Roboto Condensed', sans-serif;">Monthly Registered Customers </h3>
                            </div>
                            <div class="card-body">
                                <canvas id="monthlyRole0CustomerChart" width="200px" height="100px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 style="font-size:18px; font-weight:bold;text-align:center; font-family: 'Roboto Condensed', sans-serif;">Monthly Registered Admins</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="monthlyRole1CustomerChart" width="200px" height="100px"></canvas>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--Scripts for charts-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Monthly Order Chart
        var ctx = document.getElementById('monthlyOrderChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($months),
                datasets: [{
                    data: @json($orderCounts),
                    backgroundColor: [
                        'rgb(255, 128, 0)' ,     // Pumpkin
                        'rgb(0, 102, 204)',     // Blue
                        'rgb(255, 119, 51)',    // Coral
                        'rgb(0, 102, 204)',     // Blue
                        'rgb(255, 51, 153)',    // Pink
                        'rgb(255, 102, 0)',     // Orange
                        'rgb(255, 204, 0)',     // Yellow
                        'rgb(0, 153, 76)',      // Green
                        'rgb(153, 0, 153)',     // Purple
                        'rgb(0, 153, 102)',     // Teal
                        'rgb(204, 51, 0)',      // Red
                        'rgb(255, 153, 204)'   // Light Pink
                    ],
                    borderWidth: 1
                }]
            }
        });

        // Yearly Order Chart
        var ctxYearly = document.getElementById('yearlyOrderChart').getContext('2d');
        var yearlyChart = new Chart(ctxYearly, {
            type: 'pie',
            data: {
                labels: @json($years),
                datasets: [{
                    label: 'Yearly Orders',
                    data: @json($yearlyOrderCountsData),
                    backgroundColor:
                    [
                        'rgb(0, 153, 102)',     // Teal
                        'rgb(204, 51, 0)',      // Red
                        'rgb(255, 128, 0)' ,   // Pumpkin
                        'rgb(255, 153, 204)',   // Light Pink

                    ],
                    borderWidth: 1
                }]
            }
        });

        // Monthly Income Line Chart
        var ctxIncome = document.getElementById('monthlyIncomeChart').getContext('2d');
            var incomeChart = new Chart(ctxIncome, {
                type: 'line',
                data: {
                    labels: @json($months),
                    datasets: [{
                        label: 'Monthly Total Value',
                        data: @json($totalValues),
                        borderColor: 'rgb(0, 102, 204)',
                        backgroundColor: 'rgba(0, 102, 204, 0.2)',
                        borderWidth: 1
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

           // Yearly Income Line Chart
            var ctxYearlyIncome = document.getElementById('yearlyIncomeChart').getContext('2d');
            var yearlyIncomeChart = new Chart(ctxYearlyIncome, {
                type: 'line',
                data: {
                    labels: Object.keys(@json($yearlyTotalValues)), // Extracting years as labels
                    datasets: [{
                        label: 'Yearly Total Income',
                        data: Object.values(@json($yearlyTotalValues)), // Extracting total values for each year
                        backgroundColor: 'rgb(0, 102, 204)',
                        borderWidth: 1
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

            // Monthly Customer Chart
            var ctxMonthlyCustomer = document.getElementById('monthlyCustomerChart').getContext('2d');
            var monthlyCustomerChart = new Chart(ctxMonthlyCustomer, {
                type: 'bar',
                data: {
                    labels: @json($monthlyCustomers),
                    datasets: [{
                        label: 'Monthly Registered Customers',
                        data: @json($monthlyCustomersCount),
                    backgroundColor: [
                            'rgb(0, 102, 204)',     // Blue
                            'rgb(0, 255, 127)',    // Spring green
                            'rgb(128, 0, 128)',    // Purple
                            'rgb(255, 140, 0)',    // Dark orange
                            'rgb(65, 105, 225)',   // Royal blue
                            'rgb(255, 20, 147)',   // Deep pink
                            'rgb(46, 139, 87)',    // Sea green
                    ],
                        borderWidth: 1
                    }]
                }
            });

            // Monthly Role_id = 0 Customer Chart
            var ctxMonthlyRole0Customer = document.getElementById('monthlyRole0CustomerChart').getContext('2d');
            var monthlyRole0CustomerChart = new Chart(ctxMonthlyRole0Customer, {
                type: 'bar',
                data: {
                    labels: @json($monthlyRole0Customers),
                    datasets: [{
                        label: 'Monthly Customers with role_id = 0',
                        data: @json($monthlyRole0CustomersCount),
                        backgroundColor: [
                            'rgb(0, 255, 127)',    // Spring green
                            'rgb(0, 102, 204)',     // Blue
                            'rgb(255, 51, 153)',    // Pink
                            'rgb(255, 102, 0)',     // Orange
                            'rgb(255, 204, 0)',     // Yellow
                            'rgb(0, 255, 127)',    // Spring green
                            'rgb(128, 0, 128)',    // Purple
                        ],
                        borderWidth: 1
                    }]
                }
            });

            // Monthly Role_id = 1 Customer Chart
            var ctxMonthlyRole1Customer = document.getElementById('monthlyRole1CustomerChart').getContext('2d');
            var monthlyRole1CustomerChart = new Chart(ctxMonthlyRole1Customer, {
                type: 'bar',
                data: {
                    labels: @json($monthlyRole1Customers),
                    datasets: [{
                        label: 'Monthly Customers with role_id = 1',
                        data: @json($monthlyRole1CustomersCount),
                        backgroundColor: [
                            'rgb(153, 0, 153)',     // Purple
                            'rgb(0, 255, 127)',    // Spring green
                            'rgb(128, 0, 128)',    // Purple
                            'rgb(255, 140, 0)',    // Dark orange
                            'rgb(65, 105, 225)',   // Royal blue
                            'rgb(255, 20, 147)',   // Deep pink
                            'rgb(46, 139, 87)',    // Sea green
                    ],
                        borderWidth: 1
                    }]
                }
            });
    </script>
@endsection

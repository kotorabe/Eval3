<body>
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pie Chart</h5>
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <!-- Pie Chart -->
                            <canvas id="pieChart" style="max-height: 400px;"></canvas>
                            <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new Chart(document.querySelector('#pieChart'), {
                                    type: 'pie',
                                    data: {
                                        labels: [
                                            'Red',
                                            'Blue',
                                            'Yellow'
                                        ],
                                        datasets: [{
                                            label: 'My First Dataset',
                                            data: [300, 50, 100],
                                            backgroundColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(54, 162, 235)',
                                                'rgb(255, 205, 86)'
                                            ],
                                            hoverOffset: 4
                                        }]
                                    }
                                });
                            });
                            </script>
                            <!-- End Pie CHart -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
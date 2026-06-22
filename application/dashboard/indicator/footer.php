<script>
    $(document).ready(function() {
        $('#dashboardTable').DataTable();
        // Render Chart.js
        const ctx = document.getElementById('evaluationChart').getContext('2d');
        const canvas = document.getElementById('evaluationChart');
        const val1 = parseInt(canvas.getAttribute('data-type1'));
        const val2 = parseInt(canvas.getAttribute('data-type2'));
        const evaluationChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['ประเมินผลแล้ว', 'รอการประเมินผล'],
                datasets: [{
                    data: [val1, val2],
                    backgroundColor: [
                        'rgba(25, 135, 84, 0.8)', // Success Green
                        'rgba(255, 193, 7, 0.8)' // Warning Yellow
                    ],
                    borderColor: [
                        'rgba(25, 135, 84, 1)',
                        'rgba(255, 193, 7, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });
    });
</script>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- ChartJS -->
	<script>
		const ctx_iterasi = document.getElementById('iterasi_chart');
		const iterasi_chart = new Chart(ctx_iterasi, {
			type: 'scatter',
			data: {
				datasets: [{
					label: 'Wilayah Longsor',
					data: [
						<?php foreach ($dataset as $dt): ?>
							{ x: <?php echo $dt->kode_kabupaten; ?>, y: <?php echo ($dt->meninggal + $dt->hilang + $dt->terluka + $dt->rumah_rusak + $dt->rumah_terendam + $dt->fasum_rusak); ?> },
						<?php endforeach; ?>
					],
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255, 99, 132, 1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					x: {
						type: 'linear',
						position: 'bottom'
					},
					y: {
						beginAtZero: true
					}
				},
				plugins: {
					legend: {
						display: true,
						labels: {
							color: 'rgb(255, 99, 132)'
						},
						position: 'bottom'
					},
					title: {
						display: true,
						text: 'Visualisasi Clustering Wilayah Rawan Longsor dengan K-Means'
					}
				}
			}
		});
	</script>
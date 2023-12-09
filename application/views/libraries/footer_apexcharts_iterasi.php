<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Apexcharts -->
  <script>
    var options = {
      chart: {
        height: 400,
        type: 'scatter', // Menggunakan tipe scatter untuk satu seri data
      },
      series: [
        {
          name: 'Kejadian',
		  type: 'scatter',
          data: [
            <?php
			foreach ($hasil_proses as $dt){
			?>
			{ x: <?=$dt['kode_kabupaten'];?>, y: <?=$dt['jml_kejadian'];?> },
			<?php } ?>
          ]
        },
        {
          name: 'Centroid 1',
		  type: 'bubble',
          data: [
            { x: <?=$iterasi_ke->c1_x;?>, y: <?=$iterasi_ke->c1_y;?>, z: 25 }
          ]
        },
		{
          name: 'Centroid 2',
		  type: 'bubble',
          data: [
            { x: <?=$iterasi_ke->c2_x;?>, y: <?=$iterasi_ke->c2_y;?>, z: 25 }
          ]
        },{
          name: 'Centroid 3',
		  type: 'bubble',
          data: [
			{ x: <?=$iterasi_ke->c3_x;?>, y: <?=$iterasi_ke->c3_y;?>, z: 25 }	
          ]
        }
      ],
      xaxis: {
        title: {
          text: 'X-axis'
        }
      },
      yaxis: {
        title: {
          text: 'Y-axis'
        }
      }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
  </script>
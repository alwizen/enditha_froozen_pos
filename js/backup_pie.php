


              <?php 
              $query = "SELECT
                      nama_barang,
                      SUM(jumlah) as jml
                      FROM penjualan p 
                      LEFT JOIN det_penjualan dp ON p.id_penjualan=dp.id_penjualan 
                      LEFT JOIN barang b ON dp.kd_barang=b.kd_barang
                      GROUP by nama_barang ORDER BY p.kd_penjualan ASC";
              $result = mysqli_query($koneksi, $query);
              ?>  
        <script type="text/javascript" src="../js/gChart.js"></script>  
        <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['nama_barang', 'jml'],  
                          <?php 
                          while ($row = mysqli_fetch_array($result)) {
                            echo "['" . $row["nama_barang"] . "', " . $row["jml"] . "],";
                          }
                          ?>  
                     ]);  
                var options = {  
                      title: '',  
                       
                      pieHole: 0.2
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
<html>
    <head>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>

    <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>

    </head>

    <body>
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
            <th scope="col">Sun</th>
            <th scope="col">Mon</th>
            <th scope="col">Tue</th>
            <th scope="col">Wed</th>
            <th scope="col">Thu</th>
            <th scope="col">Fri</th>
            <th scope="col">Sat</th>

            </tr>
        </thead>
        <?php for($l=0;$l<$lines;$l++): ?>
		<tr>
			<?php for($q=0;$q<7;$q++): ?>
			<?php
            $t = strtotime(($q+($l*7)).' days', strtotime($start_date));
            $w = date('Y-m-d', $t);
			?>
            <td>
            
            <?php 
            echo date('d/m', $t)."<br/><br/>";
            $w = strtotime($w);
            
            foreach($list as $item){
                $reservation_start_date = strtotime($item['start_date']);
                $reservation_end_date = strtotime($item['end_date']);
                
                if( $w >= $reservation_start_date && $w <= $reservation_end_date ) {
                    echo $item['name']. "(".($item['id_car']).")"."<br/>";

				}

            }
            
            ?></td>
			<?php endfor; ?>
		</tr>
	<?php endfor; ?>
        <tbody>
    </table>

    </body>

</html>
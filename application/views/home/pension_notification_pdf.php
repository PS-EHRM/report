<table class="table">
    <thead class=" text-primary">
        <tr>
            <th style="width: 92px;">ID</th>
            <th style="width: 150px;">Employee</th>
            <th style="width: 130px;">Designation</th>
            <th style="width: 130px;">Service</th>
            <th style="width: 150px;">Work Station/Division</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($details as $detail){
                $today = date('Y-m-d');
                $bday = date('Y-m-d', strtotime($detail->emp_birthday));

                $diff = abs(strtotime($today) - strtotime($bday));
                $age = floor($diff / (365*60*60*24));
        ?>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td style="width: 92px;"><p><?php echo $detail->employee_id; ?></p></td>
            <td style="width: 150px;"><p><?php echo $detail->emp_firstname." ".$detail->emp_lastname."<br/> DOB : ".$detail->emp_birthday."<br/> Age : ".$age; ?></p></td>
            <td style="width: 130px;"><p><?php echo $detail->jobtit_name; ?></p></td>
            <td style="width: 130px;"><p><?php echo $detail->service_name; ?></p></td>
            <td style="width: 150px;"><p><?php echo $detail->title; ?></p></td>
        </tr>
        <?php 
            }
        ?>
    </tbody>
</table>
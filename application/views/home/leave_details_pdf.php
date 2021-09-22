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
        ?>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td style="width: 92px;"><p><?php echo $detail->employee_id; ?></p></td>
            <td>
                <?php echo $detail->emp_firstname." ".$detail->emp_lastname; ?>
                <div><?php echo $detail->leave_app_start_date." - ".$detail->leave_app_end_date; ?></div>
                <div>Status : <?php echo $detail->leave_app_status; ?></div>
                <div>Type : <?php echo $detail->leave_type_name; ?></div>
            </td>
            <td style="width: 130px;"><p><?php echo $detail->jobtit_name; ?></p></td>
            <td style="width: 130px;"><p><?php echo $detail->service_name; ?></p></td>
            <td style="width: 150px;"><p><?php echo $detail->title; ?></p></td>
        </tr>
        <?php 
            }
        ?>
    </tbody>
</table>
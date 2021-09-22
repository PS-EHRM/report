<table class="table">
    <thead class=" text-primary">
        <tr>
            <th style="width: 92px;">ID</th>
            <th style="width: 150px;">Employee</th>
            <th style="width: 130px;">Confirmation Date</th>
            <th style="width: 130px;">Designation and Service</th>
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
            <td style="width: 150px;"><p><?php echo $detail->emp_firstname." ".$detail->emp_lastname."<br/> DOB : ".$detail->emp_birthday."<br/> Age : ".$age; ?></p></td>
            <td style="width: 130px;"><p><?php echo $detail->emp_confirm_date; ?></p></td>
            <td style="width: 130px;"><p><?php echo $detail->jobtit_name." - ".$detail->service_name; ?></p></td>
            <td style="width: 150px;"><p><?php echo $detail->title; ?></p></td>
        </tr>
        <?php 
            }
        ?>
    </tbody>
</table>
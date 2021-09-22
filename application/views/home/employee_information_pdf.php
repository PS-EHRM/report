<table class="table">
    <thead class=" text-primary">
        <tr>
            <th>
                ID
            </th>
            <th>
                Name
            </th>
            <th style="width: 100px;">
                DOB
            </th>
            <th>
                Designation
            </th>
            <th>
                Service
            </th>
            <th>
                Work Station/Division
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($details as $detail){ ?>
        <tr>
            <td>
                <p><?php echo $detail->employee_id; ?></p>
            </td>
            <td>
                <p><?php echo $detail->emp_firstname." ".$detail->emp_lastname; ?></p>
            </td>
            <td>
                <p><?php echo $detail->emp_birthday; ?></p>
            </td>
            <td>
                <p><?php echo $detail->jobtit_name; ?></p>
            </td>
            <td>
                <p><?php echo $detail->service_name; ?></p>
            </td>
            <td>
                <p><?php echo $detail->title; ?></p>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <?php } ?>
    </tbody>
</table>
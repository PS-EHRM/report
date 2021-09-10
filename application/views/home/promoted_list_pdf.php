

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
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
                                    Previous Designation
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
                            <?php 
                                foreach($details as $detail){
                            ?>
                            <tr>
                                <td><?php echo $detail->employee_id; ?></td>
                                <td>
                                    <?php echo $detail->emp_firstname." ".$detail->emp_lastname; ?>
                                </td>
                                <td>
                                    <?php echo $detail->jobtit_name_old; ?>
                                </td>
                                <td>
                                    <?php echo $detail->jobtit_name_new; ?>
                                </td>
                                <td>
                                    <?php echo $detail->service_name; ?>
                                </td>
                                <td>
                                    <?php echo $detail->title; ?>
                                </td>
                            </tr>
                            <?php 
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
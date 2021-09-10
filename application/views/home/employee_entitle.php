<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url('report?r=employee-entitle');?>" class="btn btn-primary pull-right">PDF</a>
    </div>
</div>

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
                                    Leave
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($details as $detail){
                            ?>
                            <tr>
                                <td><?php echo $detail['employee_id']; ?></td>
                                <td>
                                    <?php echo $detail['name']; ?>
                                </td>
                                <td>
                                    <?php
                                        $leaves = $detail['leave'];
                                        foreach($leaves as $leave){
                                            echo "<p><b>".$leave['leave_type_name']."</b>\n";
                                            echo "Total : ".$leave['leave_ent_day']."\n";
                                            echo "Taken : ".$leave['leave_ent_day']."\n";
                                            echo "Remain : ".$leave['leave_ent_day']."\n</p>";
                                        }
                                    ?>
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
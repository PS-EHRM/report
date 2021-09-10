
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
                                    Language
                                </th>
                                <th>
                                    Skill
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
                                    <?php echo $detail->lang_name; ?>
                                </td>
                                <td>
                                    <?php 
                                    if($detail->emplang_type == "1"){
                                        echo "Write";
                                    }elseif($detail->emplang_type == "2"){
                                        echo "Speak";
                                    }elseif($detail->emplang_type == "3"){
                                        echo "Read";
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
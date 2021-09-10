
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">From</label>
                            <select class="form-control" name="start">
                                <option value='0'>Age</option>
                                <?php
                                    for($x = 18; $x <= 70; $x++){
                                        $select = "";
                                        if($input_start == $x){
                                            $select = "selected='selected'";
                                        }
                                        echo "<option ".$select." value='".$x."'>".$x."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">To</label>
                            <select class="form-control" name="end">
                                <option value='0'>Age</option>
                                <?php
                                    for($x = 18; $x <= 70; $x++){
                                        $select = "";
                                        if($input_end == $x){
                                            $select = "selected='selected'";
                                        }
                                        echo "<option ".$select." value='".$x."'>".$x."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url('report?r=employee-age-summary'.$search);?>" class="btn btn-primary pull-right">PDF</a>
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
                            <?php 
                                foreach($details as $detail){
                                    $today = date('Y-m-d');
                                    $bday = date('Y-m-d', strtotime($detail->emp_birthday));

                                    $diff = abs(strtotime($today) - strtotime($bday));
                                    $age = floor($diff / (365*60*60*24));
                            ?>
                            <tr>
                                <td><?php echo $detail->employee_id; ?></td>
                                <td>
                                    <?php echo $detail->emp_firstname." ".$detail->emp_lastname; ?>
                                </td>
                                <td>
                                    <?php echo $detail->emp_birthday ."(".$age." yr)"; ?>
                                </td>
                                <td>
                                    <?php echo $detail->jobtit_name; ?>
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
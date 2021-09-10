
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Designation</label>
                            <select class="form-control" name="designation">
                                <option value=''>Designation</option>
                                <?php
                                    foreach($designations as $designation){
                                        $select = "";
                                        if($input_designation == $designation->jobtit_code){
                                            $select = "selected='selected'";
                                        }
                                        
                                        echo "<option ".$select." value='".$designation->jobtit_code."'>".$designation->jobtit_name."</option>";
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
        <a href="<?php echo base_url('report?r=employee-information-by-designation'.$search);?>" class="btn btn-primary pull-right">PDF</a>
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
                            ?>
                            <tr>
                                <td><?php echo $detail->employee_id; ?></td>
                                <td>
                                    <?php echo $detail->emp_firstname." ".$detail->emp_lastname; ?>
                                </td>
                                <td>
                                    <?php echo $detail->emp_birthday; ?>
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
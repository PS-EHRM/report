
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Language</label>
                            <select class="form-control" name="language">
                                <option value='0'>Language</option>
                                <?php
                                    foreach($lang_list as $lang){
                                        $select = "";
                                        if($input_language == $lang->lang_code){
                                            $select = "selected='selected'";
                                        }
                                        echo "<option ".$select." value='".$lang->lang_code."'>".$lang->lang_name."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Skill</label>
                            <select class="form-control" name="type">
                                <option value='0'>Skill</option>
                                <?php
                                    echo "<option ".($input_type == "1" ? "selected='selected'" : '' ). " value='1'>Write</option>";
                                    echo "<option ".($input_type == "2" ? "selected='selected'" : '' )." value='2'>Speak</option>";
                                    echo "<option ".($input_type == "3" ? "selected='selected'" : '' )." value='3'>Read</option>";
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
        <a href="<?php echo base_url('report?r=language-wise-summary'.$search);?>" class="btn btn-primary pull-right">PDF</a>
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
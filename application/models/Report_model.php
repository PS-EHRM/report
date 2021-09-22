<?php
class Report_model extends CI_Model {
    
    public function getEmployeeData($data = [])
    {
        $query = $this->db->select('employee_id,emp_firstname,emp_lastname,emp_birthday,
            title,jobtit_name,service_name,hs_hr_employee.gender_code,gender_name
            ')
            ->where($data)
            ->from('hs_hr_employee')
            ->join('hs_hr_compstructtree', 'hs_hr_employee.work_station = hs_hr_compstructtree.comp_code', 'left')
            ->join('hs_hr_job_title', 'hs_hr_employee.job_title_code = hs_hr_job_title.jobtit_code', 'left')
            ->join('hs_hr_service', 'hs_hr_employee.service_code = hs_hr_service.service_code', 'left')
            ->join('hs_hr_gender', 'hs_hr_employee.gender_code = hs_hr_gender.gender_code', 'left')
            ->get();
        return $query->result();
    }

    public function employeeGender($gender,$data = [])
    {
        $this->db->select('employee_id,emp_firstname,emp_lastname,emp_birthday,
            title,jobtit_name,service_name,hs_hr_employee.gender_code,gender_name
            ')
            ->where($data);
        if(!empty($gender)){
            $this->db->where("hs_hr_employee.gender_code ='".$gender."'");
        }            

        $this->db->from('hs_hr_employee');
        $this->db->join('hs_hr_compstructtree', 'hs_hr_employee.work_station = hs_hr_compstructtree.comp_code', 'left');
        $this->db->join('hs_hr_job_title', 'hs_hr_employee.job_title_code = hs_hr_job_title.jobtit_code', 'left');
        $this->db->join('hs_hr_service', 'hs_hr_employee.service_code = hs_hr_service.service_code', 'left');
        $this->db->join('hs_hr_gender', 'hs_hr_employee.gender_code = hs_hr_gender.gender_code', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    

    public function getpensionNotification($date,$data = [])
    {
        $query = $this->db->select('employee_id,emp_firstname,emp_lastname,emp_birthday,
            title,jobtit_name,service_name
            ')
            ->where($data)
            ->where("emp_birthday <= '".$date."'")
            ->where("emp_birthday != '1970-01-01'")
            ->from('hs_hr_employee')
            ->join('hs_hr_compstructtree', 'hs_hr_employee.work_station = hs_hr_compstructtree.comp_code', 'left')
            ->join('hs_hr_job_title', 'hs_hr_employee.job_title_code = hs_hr_job_title.jobtit_code', 'left')
            ->join('hs_hr_service', 'hs_hr_employee.service_code = hs_hr_service.service_code', 'left')
            ->order_by('emp_birthday','DESC')
            ->get();
        return $query->result();
    }

    public function employeeEntitle($year,$data = [])
    {
        $query = $this->db->select('employee_id,emp_firstname,emp_lastname,
        leave_type_name,leave_ent_day,leave_ent_taken,leave_ent_remain
            ')
            ->where("leave_ent_year = '".$year."'")
            ->from('hs_hr_leave_entitlement')
            ->join('hs_hr_employee', 'hs_hr_employee.emp_number = hs_hr_leave_entitlement.emp_number', 'left')
            ->join('hs_hr_leave_type', 'hs_hr_leave_type.leave_type_id = hs_hr_leave_entitlement.leave_type_id', 'left')
            ->get();
        $result = $query->result();

        $return = [];
        foreach($result as $row){
            $return[$row->employee_id]['employee_id'] = $row->employee_id;
            $return[$row->employee_id]['name'] = $row->emp_firstname." ".$row->emp_lastname;
            $return[$row->employee_id]['employee_id'] = $row->employee_id;
            $leave['leave_ent_day']= $row->leave_ent_day;
            $leave['leave_ent_taken']= $row->leave_ent_taken;
            $leave['leave_ent_remain']= $row->leave_ent_remain;
            $leave['leave_type_name']= $row->leave_type_name;

            $return[$row->employee_id]['leave'][] = $leave;
        }
        
        return $return;
    }

    public function getGender()
    {
        $query = $this->db->select('gender_code,gender_name')
            ->from('hs_hr_gender')
            ->get();
        return $query->result();
    }

    
    public function employeeBranch($branch,$data = [])
    {
        $this->db->select('employee_id,emp_firstname,emp_lastname,emp_birthday,
            title,jobtit_name,service_name,hs_hr_employee.gender_code,gender_name
            ')
            ->where($data);
        if(!empty($branch)){
            $this->db->where("hs_hr_employee.work_station ='".$branch."'");
        }            

        $this->db->from('hs_hr_employee');
        $this->db->join('hs_hr_compstructtree', 'hs_hr_employee.work_station = hs_hr_compstructtree.comp_code', 'left');
        $this->db->join('hs_hr_job_title', 'hs_hr_employee.job_title_code = hs_hr_job_title.jobtit_code', 'left');
        $this->db->join('hs_hr_service', 'hs_hr_employee.service_code = hs_hr_service.service_code', 'left');
        $this->db->join('hs_hr_gender', 'hs_hr_employee.gender_code = hs_hr_gender.gender_code', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getAllbranch()
    {
        $query = $this->db->select('comp_code,title')
            ->from('hs_hr_compstructtree')
            ->get();
        return $query->result();
    }
    

    public function getemployeeAgeSummary($start,$end,$data = [])
    {
        $query = $this->db->select('employee_id,emp_firstname,emp_lastname,emp_birthday,
            title,jobtit_name,service_name,hs_hr_employee.gender_code,gender_name
            ')
            ->where($data)
            ->where("emp_birthday >= '".$start."'")
            ->where("emp_birthday <= '".$end."'")
            ->where('emp_birthday is NOT NULL', NULL, FALSE)
            ->from('hs_hr_employee')
            ->join('hs_hr_compstructtree', 'hs_hr_employee.work_station = hs_hr_compstructtree.comp_code', 'left')
            ->join('hs_hr_job_title', 'hs_hr_employee.job_title_code = hs_hr_job_title.jobtit_code', 'left')
            ->join('hs_hr_service', 'hs_hr_employee.service_code = hs_hr_service.service_code', 'left')
            ->join('hs_hr_gender', 'hs_hr_employee.gender_code = hs_hr_gender.gender_code', 'left')
            ->order_by('emp_birthday','DESC')
            ->get();
        return $query->result();
    }

    public function getemployeeBirthday($month,$data = [])
    {
        $query = $this->db->select('employee_id,emp_firstname,emp_lastname,emp_birthday,
            title,jobtit_name,service_name,hs_hr_employee.gender_code,gender_name
            ')
            ->where($data)
            ->where('DATE_FORMAT(emp_birthday,"%m")',$month)
            ->where("emp_birthday != '1970-01-01'")
            ->from('hs_hr_employee')
            ->join('hs_hr_compstructtree', 'hs_hr_employee.work_station = hs_hr_compstructtree.comp_code', 'left')
            ->join('hs_hr_job_title', 'hs_hr_employee.job_title_code = hs_hr_job_title.jobtit_code', 'left')
            ->join('hs_hr_service', 'hs_hr_employee.service_code = hs_hr_service.service_code', 'left')
            ->join('hs_hr_gender', 'hs_hr_employee.gender_code = hs_hr_gender.gender_code', 'left')
            ->order_by('emp_birthday')
            ->get();
        return $query->result();
    }
    

    

    

    public function gelanguageWiseSummary($language,$type,$data = [])
    {
        $this->db->select('employee_id,hs_hr_employee.emp_number,emp_firstname,emp_lastname,lang_name,emplang_type');
        $this->db->where($data);
        if(!empty($language)){
            $this->db->where('hs_hr_emp_language.lang_code',$language);
        }  
        if(!empty($type)){
            $this->db->where('hs_hr_emp_language.emplang_type',$type);
        }
        $this->db->from('hs_hr_emp_language');
        $this->db->join('hs_hr_employee', 'hs_hr_employee.emp_number = hs_hr_emp_language.emp_number', 'left');
        $this->db->join('hs_hr_language', 'hs_hr_emp_language.lang_code = hs_hr_language.lang_code', 'left');
        $this->db->order_by('hs_hr_emp_language.emp_number');
        $query = $this->db->get();
        return $query->result();
    }

    public function gelanguageList()
    {
        $this->db->select('*');
        $this->db->from('hs_hr_language');
        $query = $this->db->get();
        return $query->result();
    }


    public function employeeConfirmation($start,$end,$data = [])
    {
        $query = $this->db->select('employee_id,emp_firstname,emp_lastname,emp_confirm_date,
            title,jobtit_name,service_name
            ')
            ->where($data)
            ->where("emp_confirm_date >= '".$start."'")
            ->where("emp_confirm_date <= '".$end."'")
            ->where("emp_confirm_date != '1970-01-01'")
            ->from('hs_hr_employee')
            ->join('hs_hr_compstructtree', 'hs_hr_employee.work_station = hs_hr_compstructtree.comp_code', 'left')
            ->join('hs_hr_job_title', 'hs_hr_employee.job_title_code = hs_hr_job_title.jobtit_code', 'left')
            ->join('hs_hr_service', 'hs_hr_employee.service_code = hs_hr_service.service_code', 'left')
            ->order_by('emp_confirm_date')
            ->get();

            return $query->result();
        //emp_confirm_flg
    }

    public function employeeincrementReport($start,$end,$data = [])
    {
        $query = $this->db->select('employee_id,emp_firstname,emp_lastname,emp_confirm_date,
            title,jobtit_name,service_name,emp_salary_inc_date
            ')
            ->where($data)
            ->where("emp_salary_inc_date >= '".$start."'")
            ->where("emp_salary_inc_date <= '".$end."'")
            ->where("emp_salary_inc_date != '1970-01-01'")
            ->from('hs_hr_employee')
            ->join('hs_hr_compstructtree', 'hs_hr_employee.work_station = hs_hr_compstructtree.comp_code', 'left')
            ->join('hs_hr_job_title', 'hs_hr_employee.job_title_code = hs_hr_job_title.jobtit_code', 'left')
            ->join('hs_hr_service', 'hs_hr_employee.service_code = hs_hr_service.service_code', 'left')
            ->order_by('emp_confirm_date')
            ->get();

            return $query->result();
        //emp_confirm_flg
    }

    public function leaveDetails($start,$end,$data = [])
    {
        $query = $this->db->select('employee_id,emp_firstname,emp_lastname,
            title,jobtit_name,service_name,leave_app_start_date,leave_app_end_date,leave_type_name,leave_app_status
            ')
            ->where($data)
            ->where("leave_app_start_date >= '".$start."'")
            ->where("leave_app_start_date <= '".$end."'")
            ->where("leave_app_start_date != '1970-01-01'")
            ->from('hs_hr_leave_application')
            ->join('hs_hr_employee', 'hs_hr_employee.emp_number = hs_hr_leave_application.emp_number', 'left')
            ->join('hs_hr_compstructtree', 'hs_hr_employee.work_station = hs_hr_compstructtree.comp_code', 'left')
            ->join('hs_hr_job_title', 'hs_hr_employee.job_title_code = hs_hr_job_title.jobtit_code', 'left')
            ->join('hs_hr_service', 'hs_hr_employee.service_code = hs_hr_service.service_code', 'left')            
            ->join('hs_hr_leave_type', 'hs_hr_leave_type.leave_type_id = hs_hr_leave_application.leave_type_id', 'left')
            ->order_by('leave_app_start_date')
            ->get();

            return $query->result();
        //emp_confirm_flg
    }

    public function getAllDesignation()
    {
        $this->db->select('*');
        $this->db->from('hs_hr_job_title');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllService()
    {
        $this->db->select('*');
        $this->db->from('hs_hr_service');
        $query = $this->db->get();
        return $query->result();
    }

    public function getpromotedList($data = [])
    {
        $query = $this->db->select('employee_id,emp_firstname,emp_lastname,
            title,new_job_title.jobtit_name as jobtit_name_new,service_name,old_job_title.jobtit_name as jobtit_name_old
            ')
            ->where($data)
            ->from('hs_hr_emp_jobtitle_history')
            ->join('hs_hr_employee', 'hs_hr_employee.emp_number = hs_hr_emp_jobtitle_history.emp_number', 'left')
            ->join('hs_hr_compstructtree', 'hs_hr_employee.work_station = hs_hr_compstructtree.comp_code', 'left')
            ->join('hs_hr_job_title as new_job_title', 'hs_hr_employee.job_title_code = new_job_title.jobtit_code', 'left')
            ->join('hs_hr_service', 'hs_hr_employee.service_code = hs_hr_service.service_code', 'left') 
            ->join('hs_hr_job_title as old_job_title', 'old_job_title.jobtit_code = hs_hr_emp_jobtitle_history.code', 'left')
            ->get();

            return $query->result();
        //emp_confirm_flg
    }

    public function getAllclass()
    {
        $this->db->select('*');
        $this->db->from('hs_hr_class');
        $query = $this->db->get();
        return $query->result();
    }

    public function getEmployeeClassData($data = [])
    {
        $query = $this->db->select('employee_id,emp_firstname,emp_lastname,emp_birthday,
            title,jobtit_name,service_name,class_name
            ')
            ->where($data)
            ->from('hs_hr_class')
            ->join('hs_hr_employee', 'hs_hr_employee.class_code = hs_hr_class.class_code', 'left')
            ->join('hs_hr_compstructtree', 'hs_hr_employee.work_station = hs_hr_compstructtree.comp_code', 'left')
            ->join('hs_hr_job_title', 'hs_hr_employee.job_title_code = hs_hr_job_title.jobtit_code', 'left')
            ->join('hs_hr_service', 'hs_hr_employee.service_code = hs_hr_service.service_code', 'left')
            ->get();
        return $query->result();
    }
     
    
}
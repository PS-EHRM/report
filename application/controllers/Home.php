<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		$this->load->model('report_model');
		$this->load->library('Pdf_report');

	}

	public function index()
	{
		redirect("employee-information");
		$data_h['menu'] = "";
		$this->load->view('common/header_view',$data_h);
		$this->load->view('home/dashboard');
		$this->load->view('common/footer_view');
	}

	public function employeeInformation()
	{
		$data_h['menu'] = "employee-information";
		$data['details'] = $this->report_model->getEmployeeData();

		$this->load->view('common/header_view',$data_h);
		$this->load->view('home/employee_information',$data);
		$this->load->view('common/footer_view');
	}

	public function pensionNotification()
	{
		$data_h['menu'] = "pension-notification";
		$birthyear = date('Y-m-d', strtotime('-58 year'));
		$data['details'] = $this->report_model->getpensionNotification($birthyear);

		$this->load->view('common/header_view',$data_h);
		$this->load->view('home/pension_notification',$data);
		$this->load->view('common/footer_view');
	}

	public function employeeEntitle()
	{
		$data_h['menu'] = "employee-entitle";
		$year = date('Y');
		$data['details'] = $this->report_model->employeeEntitle($year);

		$this->load->view('common/header_view',$data_h);
		$this->load->view('home/employee_entitle',$data);
		$this->load->view('common/footer_view');
	}

	public function employeeGender()
	{
		$data_h['menu'] = "employee-gender";
		$gender = !empty($_GET['gender']) ? $_GET['gender'] : 0;
		$data['details'] = $this->report_model->employeeGender($gender);
		$data['genders'] = $this->report_model->getGender();
		$data['search'] = !empty($gender) ? "&gender=".$gender : "";
		$data['input_gender'] = $gender;

		$this->load->view('common/header_view',$data_h);
		$this->load->view('home/employee_gender',$data);
		$this->load->view('common/footer_view');
	}
	
	 function loadpdf()
	{
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$html = "";
		$title = "";
		if($_GET['r']=='employee-information'){
			$data['details'] = $this->report_model->getEmployeeData();
			$html =  $this->load->view('home/employee_information_pdf',$data,TRUE);
			$title = "Employee Information";
		}else if($_GET['r']=='pension-notification'){
			$birthyear = date('Y-m-d', strtotime('-58 year'));
			$data['details'] = $this->report_model->getpensionNotification($birthyear);
			$html =  $this->load->view('home/pension_notification_pdf',$data,TRUE);
			$title = "Pension Notification";
		}else if($_GET['r']=='employee-entitle'){
			$year = date('Y');
			$data['details'] = $this->report_model->employeeEntitle($year);
			$html =  $this->load->view('home/employee_entitle_pdf',$data,TRUE);
			$title = "Employee Entitle";
		}else if($_GET['r']=='employee-gender'){
			$gender = !empty($_GET['gender']) ? $_GET['gender'] : 0;
			$data['details'] = $this->report_model->employeeGender($gender);
			$html =  $this->load->view('home/employee_gender_pdf',$data,TRUE);
			$title = "Employee Gender";
		}else if($_GET['r']=='employee-branch'){
			$branch = !empty($_GET['branch']) ? $_GET['branch'] : 0;
			$data['details'] = $this->report_model->employeeBranch($branch);
			$html =  $this->load->view('home/employee_branch_pdf',$data,TRUE);
			$title = "Employee Branch";
		}else if($_GET['r']=='employee-age-summary'){
			$start = !empty($_GET['start']) ? $_GET['start'] : 100;
			$end = !empty($_GET['end']) ? $_GET['end'] : 0;
			$start =  date('Y-m-d', strtotime('-'.$end.' year'));
			$end = date('Y-m-d', strtotime('-'.$start.' year'));
			$data['details'] = $this->report_model->getemployeeAgeSummary($start,$end);
			$html =  $this->load->view('home/employee_age_summary_pdf',$data,TRUE);
			$title = "Employee Age Summary";
		}else if($_GET['r']=='employee-birthday'){
			$month = !empty($_GET['month']) ? $_GET['month'] : date('m');
			$data['details'] = $this->report_model->getemployeeBirthday($month);
			$html =  $this->load->view('home/employee_birthday_summary_pdf',$data,TRUE);
			$title = "Employee Birthday Summary";
		}else if($_GET['r']=='language-wise-summary'){
			$language = !empty($_GET['language']) ? $_GET['language'] : "";
			$type = !empty($_GET['type']) ? $_GET['type'] : "";
			$data['details'] =  $this->report_model->gelanguageWiseSummary($language,$type);
			$html =  $this->load->view('home/employee_language_summary_pdf',$data,TRUE);
			$title = "Employee Language Skill Summary";
		}else if($_GET['r']=='employee-confirmation'){

			$start = !empty($_GET['start']) ? $_GET['start'] : date('Y-m-d',strtotime(date('Y-01-01')));
			$end = !empty($_GET['end']) ? $_GET['end'] : date('Y-m-d');
			//echo $start."-".$end;die();
			$data['details'] = $this->report_model->employeeConfirmation($start,$end);
			$html =  $this->load->view('home/employee_confirmation_pdf',$data,TRUE);
			$title = "Employee Confirmation Summary";
		}else if($_GET['r']=='upcoming-confirmation'){

			$start = !empty($_GET['start']) ? $_GET['start'] : date('Y-m-d',strtotime(date('Y-01-01')));
			$end = !empty($_GET['end']) ? $_GET['end'] : date('Y-m-d');
			//echo $start."-".$end;die();
			$data['details'] = $this->report_model->employeeConfirmation($start,$end);
			$html =  $this->load->view('home/upcoming_confirmation_pdf',$data,TRUE);
			$title = "Employee Upcoming Confirmation Summary";
		}else if($_GET['r']=='increment-report'){

			$input_month = !empty($_GET['month']) ? $_GET['month'] : date('Y-m');

			$start = $input_month."-01";
			$end = !empty($_GET['end']) ? $_GET['end'] : date('Y-m-t',strtotime($start));
			//echo $start."-".$end;die();
			$data['details'] = $this->report_model->employeeincrementReport($start,$end);
			$html =  $this->load->view('home/upcoming_confirmation_pdf',$data,TRUE);
			$title = "Increment Report";
		}else if($_GET['r']=='leave-details'){

			$start = !empty($_GET['start']) ? $_GET['start'] : date('Y-m-d',strtotime(date('Y-01-01')));
			$end = !empty($_GET['end']) ? $_GET['end'] : date('Y-m-d');
			//echo $start."-".$end;die();
			$data['details'] = $this->report_model->leaveDetails($start,$end);
			$html =  $this->load->view('home/leave_details_pdf',$data,TRUE);
			$title = "Leave Details";
		}else if($_GET['r']=='employee-information-by-designation'){
			$search = [];
			$designation = !empty($_GET['designation']) ? $_GET['designation'] : '';
			if(!empty($_GET['designation'])){
				$search =  ["jobtit_code"=>$designation];
			}			
			$data['details'] = $this->report_model->getEmployeeData($search);
			
			$html =  $this->load->view('home/employee_information_by_desi_pdf',$data,TRUE);
			$title = "Employee Information by Designation";
		}else if($_GET['r']=='employee-information-by-service'){
			$search = [];
			$designation = !empty($_GET['designation']) ? $_GET['designation'] : '';
			$service = !empty($_GET['service']) ? $_GET['service'] : '';
			if(!empty($_GET['service'])){
				$search =  ["hs_hr_employee.service_code"=>$service];
			}	
			$data['details'] = $this->report_model->getEmployeeData($search);
			
			$html =  $this->load->view('home/employee_information_by_service_pdf',$data,TRUE);
			$title = "Employee Information by Designation";
		}else if($_GET['r']=='promoted-list'){
			
			$data['details'] = $this->report_model->getpromotedList();
			
			$html =  $this->load->view('home/promoted_list_pdf',$data,TRUE);
			$title = "Employee Promoted List";
		}
		

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('ICTA');
		$pdf->SetTitle('Employee Information');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, "By ICTA");

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------
		$pdf->SetFont('freeserif', '', 12);
		// set font
		//$pdf->SetFont('dejavusans', '', 10);

		// add a page
		$pdf->AddPage();

		// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
		// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

		// create some HTML content
		

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');


 
		//Close and output PDF document
		$pdf->Output('example_006.pdf', 'I');
	}

	

	public function employeeBranch()
	{
		$data_h['menu'] = "employee-branch";
		$branch = !empty($_GET['branch']) ? $_GET['branch'] : 0;
		$data['details'] = $this->report_model->employeeBranch($branch);
		$data['branchs'] = $this->report_model->getAllbranch();
		$data['search'] = !empty($branch) ? "&branch=".$branch : "";
		$data['input_branch'] = $branch;


		$this->load->view('common/header_view',$data_h);
		$this->load->view('home/employee_branch',$data);
		$this->load->view('common/footer_view');
	}

	public function employeeAgeSummary()
	{
		$data_h['menu'] = "employee-age-summary";

		$start = !empty($_GET['start']) ? $_GET['start'] : 100;
		$end = !empty($_GET['end']) ? $_GET['end'] : 0;

		$data['input_start'] = $start;
		$data['input_end'] = $end;
		$data['search'] = "&start=".$start."&end=".$end;


		$start =  date('Y-m-d', strtotime('-'.$end.' year'));
		$end = date('Y-m-d', strtotime('-'.$start.' year'));
		//echo $start."-".$end;die();
		$data['details'] = $this->report_model->getemployeeAgeSummary($start,$end);
		
		

		$this->load->view('common/header_view',$data_h);
		$this->load->view('home/employee_age_summary',$data);
		$this->load->view('common/footer_view');
	}

	public function employeeBirthday()
	{
		$data_h['menu'] = "employee-birthday";
		
		$month = !empty($_GET['month']) ? $_GET['month'] : date('m');
		$data['input_month'] = $month;
		$data['search'] = "&month=".$month;
		
		
		//echo $start."-".$end;die();
		$data['details'] = $this->report_model->getemployeeBirthday($month);
		
		

		$this->load->view('common/header_view',$data_h);
		$this->load->view('home/employee_birthday_summary',$data);
		$this->load->view('common/footer_view');
	}

	public function languageWiseSummary()
	{
		$data_h['menu'] = "language-wise-summary";
		
		$language = !empty($_GET['language']) ? $_GET['language'] : "";
		$type = !empty($_GET['type']) ? $_GET['type'] : "";

		$data['input_language'] = $language;
		$data['input_type'] = $type;
		$data['search'] = "&language=".$language."&type=".$type;
		
		
		//echo $start."-".$end;die();
		$data['details'] = $this->report_model->gelanguageWiseSummary($language,$type);
		$data['lang_list'] = $this->report_model->gelanguageList();

		$this->load->view('common/header_view',$data_h);
		$this->load->view('home/employee_language_summary',$data);
		$this->load->view('common/footer_view');
	}
	
	public function employeeConfirmation()
	{
		$data_h['menu'] = "employee-confirmation";

		$start = !empty($_GET['start']) ? $_GET['start'] : date('Y-m-d',strtotime(date('Y-01-01')));
		$end = !empty($_GET['end']) ? $_GET['end'] : date('Y-m-d');
		
		$data['input_start'] = $start;
		$data['input_end'] = $end;
		$data['search'] = "&start=".$start."&end=".$end;
		
		
		//echo $start."-".$end;die();
		$data['details'] = $this->report_model->employeeConfirmation($start,$end);

		$this->load->view('common/header_view',$data_h);
		$this->load->view('home/employee_confirmation',$data);
		$this->load->view('common/footer_view');
	}

	public function upcomingConfirmation()
	{
		$data_h['menu'] = "upcoming-confirmation";

		$start = !empty($_GET['start']) ? $_GET['start'] : date('Y-m-d');
		$end = !empty($_GET['end']) ? $_GET['end'] : date('Y-m-d',strtotime(date('Y-12-31')));
		
		$data['input_start'] = $start;
		$data['input_end'] = $end;
		$data['search'] = "&start=".$start."&end=".$end;
		
		
		//echo $start."-".$end;die();
		$data['details'] = $this->report_model->employeeConfirmation($start,$end);

		$this->load->view('common/header_view',$data_h);
		$this->load->view('home/upcoming_confirmation',$data);
		$this->load->view('common/footer_view');
	}

	public function incrementReport()
	{
		$data_h['menu'] = "increment-report";
		$input_month = !empty($_GET['month']) ? $_GET['month'] : date('Y-m');

		$start = $input_month."-01";
		$end = !empty($_GET['end']) ? $_GET['end'] : date('Y-m-t',strtotime($start));
		
		$data['input_month'] = $input_month;
		$data['search'] = "&month=".$input_month;
		
		
		//echo $start."-".$end;die();
		$data['details'] = $this->report_model->employeeincrementReport($start,$end);

		$this->load->view('common/header_view',$data_h);
		$this->load->view('home/increment_report',$data);
		$this->load->view('common/footer_view');
	}

	public function leaveDetails()
	{
		$data_h['menu'] = "leave-details";
		
		$start = !empty($_GET['start']) ? $_GET['start'] : date('Y-m-d',strtotime(date('Y-01-01')));
		$end = !empty($_GET['end']) ? $_GET['end'] : date('Y-m-d');
		
		$data['input_start'] = $start;
		$data['input_end'] = $end;
		$data['search'] = "&start=".$start."&end=".$end;
		
		
		//echo $start."-".$end;die();
		$data['details'] = $this->report_model->leaveDetails($start,$end);

		$this->load->view('common/header_view',$data_h);
		$this->load->view('home/leave_details',$data);
		$this->load->view('common/footer_view');
	}
	
	public function employeeInformationByDesignation()
	{
		$data_h['menu'] = "employee-information-by-designation";
		$search = [];
		$designation = !empty($_GET['designation']) ? $_GET['designation'] : '';
		if(!empty($_GET['designation'])){
			$search =  ["jobtit_code"=>$designation];
		}

		$data['designations'] = $this->report_model->getAllDesignation();
		$data['details'] = $this->report_model->getEmployeeData($search);
		$data['input_designation'] = $designation;
		$data['search'] = "&designation=".$designation;

		$this->load->view('common/header_view',$data_h);
		$this->load->view('home/employee_information_by_desi',$data);
		$this->load->view('common/footer_view');
	}

	public function employeeInformationByService()
	{
		$data_h['menu'] = "employee-information-by-service";
		$search = [];
		$service = !empty($_GET['service']) ? $_GET['service'] : '';
		if(!empty($_GET['service'])){
			$search =  ["hs_hr_employee.service_code"=>$service];
		}

		$data['services'] = $this->report_model->getAllService();
		$data['details'] = $this->report_model->getEmployeeData($search);
		$data['input_service'] = $service;
		$data['search'] = "&service=".$service;

		$this->load->view('common/header_view',$data_h);
		$this->load->view('home/employee_information_by_service',$data);
		$this->load->view('common/footer_view');
	}

	public function promotedList()
	{
		$data_h['menu'] = "promoted-list";
		
		$data['details'] = $this->report_model->getpromotedList();

		$this->load->view('common/header_view',$data_h);
		$this->load->view('home/promoted_list',$data);
		$this->load->view('common/footer_view');
	}

	public function classWiseSummary()
	{
		$data_h['menu'] = "class-wise-summary";
		$search = [];
		$class = !empty($_GET['class']) ? $_GET['class'] : '';
		if(!empty($_GET['class'])){
			$search =  ["jobtit_code"=>$class];
		}

		$data['class'] = $this->report_model->getAllclass();
		$data['details'] = $this->report_model->getEmployeeClassData($search);
		$data['input_class'] = $class;
		$data['search'] = "&class=".$class;

		$this->load->view('common/header_view',$data_h);
		$this->load->view('home/employee_class_wise_summary',$data);
		$this->load->view('common/footer_view');
	}

}
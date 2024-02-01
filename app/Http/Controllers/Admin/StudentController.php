<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Users,
    ParticipantDetails,
    ProjectDetails,
    CommincationMesseges,
    InstituteLists
};
use Validator;
use File;

class StudentController extends Controller
{
    public function __construct()
    {
    }

    // public function index() {
    //     $user_data = Users::where('is_active','=',true)->get();
    //     $project_data = ProjectDetails::where('is_active','=',true)->get();
    //     return view('admin.pages.users-list',compact('user_data', 'project_data'));
    // }
    public function index()
    {
        $project_data = Users::where('is_active', true)
                    ->where('is_payment_done', false)
                    ->get();
    
        return view('admin.pages.users-list', compact('project_data'));
    }
     public function getProjectStudent()
    {
        $project_data = ProjectDetails::join('users', 'project_details.user_id', '=', 'users.id')
        ->select('project_details.project_title',
        'project_details.payment_type',
        'project_details.project_code',
        'users.u_email',
        'users.mobile_no',
        'users.is_project_uploaded',
        'users.is_payment_done',
        'users.project_presentation',
        'users.payment_proof',
        'users.registration_type')
        ->where('project_details.is_active', true)
        ->where('users.is_payment_done', true)
        ->orderBy('project_details.id', 'desc')
        ->get();
        // dd($project_data);

        return view('admin.pages.student-project-pdf', compact('project_data'));
    }
     public function getPaymentStudent()
    {
        // $project_data = ProjectDetails::join('users', 'project_details.user_id', '=', 'users.id')
        //     ->select('project_details.*', 'users.u_email as user_email','users.mobile_no as user_mobile_no','users.is_project_uploaded as user_is_project_uploaded','users.is_payment_done as user_is_payment_done','users.registration_type as user_registration_type') // Add other fields from project_details if needed
        //     ->where('project_details.is_active', true)
        //     ->where('users.is_payment_done', true)
        //     ->get();

        $academicYearNames = [
            '1' => 'First Year',
            '2' => 'Second Year',
            '3' => 'Third Year',
            '4' => 'Fourth Year',
            '5' => 'Other',
            
        ];
        $qualificationNames = [
            '1' => 'ITI',
            '2' => 'Diploma',
            '3' => 'Degree',
            '4' => 'Fourth Year',
            '5' => 'Other',
            
        ];
        $paymentModeNames = [
            'neft' => 'NEFT',
            'qr_code' => 'QR Code',
        ];
        $branchNames = [
            '1' => 'Artificial Intelligence(AI)and Data Science',
            '2' => 'Artificial Intelligence(AI)and Machine Learning',
            '3' => 'Automation and Robotics',
            '4' => 'Automobile',
            '5' => 'Checimal',
            '6' => 'Civil',
            '7' => 'Civil and Environmental',
            '8' => 'Computer',
            '8' => 'Computer Science and Design',
            '9' => 'Computer Technology',
            '9' => 'Dress Designing and Garnment Manufacturing',
            '10' => 'Electrical',
            '11' => 'Electronic and Telecommunication',
            '12' => 'Information Technology',
            '13' => 'Instrumentation and Control Interior Design',
            '14' => 'Mechanical',
            '15' => 'Mechatronics',
            '16' => 'Polymer Technology',
            '17' => 'Robotics and Automation',
            '18' => 'Other',
            
        ];
    //     $project_data = ProjectDetails::join('project_details', function($join) {
    //         $join->on('project_details.user_id', '=', 'participant_details.user_id');
    //         $join->on('project_details.name_of_institute', '=', 'institute_lists.id');
    //     })
    //     ->join('users', 'project_details.user_id', '=', 'users.id')
    //     ->select('participant_details.f_name',
    //               'participant_details.m_name',
    //               'participant_details.l_name',
    //               'project_details.project_title',
    //               'project_details.academic_year',
    //               'project_details.education_type',
    //               'project_details.institute_other_name',
    //               'project_details.payment_type',
    //             //   'institute_lists.institute_name',
    //               'project_details.name_of_institute_other',
    //               'project_details.branch_details',
    //               'project_details.other_branch_details',
    //               'project_details.project_code',
    //               'participant_details.created_at as start_date',
    //               'users.u_email',
    //               'users.mobile_no',
    //               'users.is_project_uploaded as user_is_project_uploaded',
    //               'users.is_payment_done as user_is_payment_done',
    //               'users.registration_type as user_registration_type')
    //               ->where('project_details.is_active', true)
    //               ->where('users.is_payment_done', true)
    //               ->get();
    // dd($project_data);
    
    $project_data = ProjectDetails::join('participant_details', 'project_details.user_id', '=', 'participant_details.user_id')
    ->join('institute_lists', 'project_details.name_of_institute', '=', 'institute_lists.id')
    ->join('users', 'project_details.user_id', '=', 'users.id')
    ->select('participant_details.f_name',
              'participant_details.m_name',
              'participant_details.l_name',
              'project_details.project_title',
              'project_details.academic_year',
              'project_details.education_type',
              'project_details.institute_other_name',
              'project_details.payment_type',
              'institute_lists.institute_name',
              'project_details.name_of_institute_other',
              'project_details.branch_details',
              'project_details.other_branch_details',
              'project_details.project_code',
              'project_details.transaction_details',
              'participant_details.created_at as start_date',
              'users.u_email',
              'users.mobile_no',
              'users.is_project_uploaded as user_is_project_uploaded',
              'users.is_payment_done as user_is_payment_done',
              'users.registration_type as user_registration_type')
    ->where('project_details.is_active', true)
    ->where('users.is_payment_done', true)
    ->orderBy('project_details.id', 'desc')
    ->get();

// dd($project_data);

        return view('admin.pages.payment-done-student-list', compact('project_data', 'academicYearNames', 'qualificationNames', 'branchNames', 'paymentModeNames'));
    }
    public function viewDetailsForParticipant(Request $request) {
        $user_id = $request['show_id'];
        $user_data = Users::where('id', $user_id)->select('*')->first();
        $participant_data = ParticipantDetails::where('user_id', $user_id)->select('*')->get()->toArray();
        $project_data = ProjectDetails::where('user_id', $user_id)->select('*')->first();
        $commincation_messege = CommincationMesseges::where('user_id', $user_id)->select('*')->get()->toArray();
        return view('admin.pages.student-edit', compact('user_data', 'participant_data', 'project_data', 'commincation_messege', 'user_id'));
    }

    public function update(Request $request)
    {
        try {
            $payment_status = Users::findOrFail($request->input('id'));
            $payment_status->is_payment_done = $request->has('is_payment_done');
            $payment_status->save();

            // $registration_type = $payment_status->registration_type;
            $is_payment_done = $payment_status->is_payment_done;



            if ($is_payment_done== 1) {
                return redirect()->route('payment-done-student-list')->withSuccess('Payment status updated successfully.');
            } elseif ($is_payment_done == 0) {
                return redirect()->route('register-users')->withSuccess('Payment status updated successfully.');
            }

            // if ($registration_type == 0) {
            //     return redirect()->route('register-users')->withSuccess('Payment status updated successfully.');
            // } elseif ($registration_type == 1) {
            //     return redirect()->route('payment-done-industry-list')->withSuccess('Payment status updated successfully.');
            // }

            // return redirect('admin/register-users')->withSuccess('Payment status updated successfully.');
          
        } catch (\Exception $e) {
            return redirect('admin/students-view')->with('success', 'An error occurred while updating the record.');
        }
    }

    public function saveMessege(Request $request) {
        $user_id = $request['user_id'];
        if(session()->get('user_id') != '1') {
            $messege_from = 'user';
        } else {
            $messege_from = 'admin';
        }
        
        $data['user_id']= $user_id;
        $data['messege'] = $request['messege'];
        $data['messege_from'] = $messege_from;
        $commincation_messege = CommincationMesseges::insert($data);


        $msg = 'Messege saved sucessfully';
        $status = 'success';
        if(session()->get('user_id') != 1) {
            return view('admin.pages.dashboard',compact('msg', 'status'));
        } else {
            $user_data = Users::where('id','!=',1)->get();
            return view('admin.pages.admin.users-list',compact('user_data','msg', 'status'));
        }
    }
}
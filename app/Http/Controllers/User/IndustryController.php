<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Users,
    ParticipantIndustryDetails,
    IndustryDetails,
    CommincationMesseges,
    InstituteLists
};
use Validator;
use File;

class IndustryController extends Controller
{
    public function __construct()
    {
    }

    public function add(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $user_data = Users::where('id', $user_id)->select('*')->first();
        if ($user_data['is_project_uploaded'] == 1) {
            if ($user_data['is_payment_done'] == 1) {
                $user_data = Users::where('id', $user_id)->select('*')->first();
                $participant_data = ParticipantIndustryDetails::where('user_id', $user_id)->select('*')->get()->toArray();
                $project_data = IndustryDetails::where('user_id', $user_id)->select('*')->first();
                $commincation_messege = CommincationMesseges::where(['user_id' => $user_id])->select('*')->get()->toArray();
                return view('user.pages.industry-view', compact('user_data', 'participant_data', 'project_data', 'commincation_messege', 'user_id'));

            } else {
                $user_data = Users::where('id', $user_id)->select('*')->first();
                $participant_data = ParticipantIndustryDetails::where('user_id', $user_id)->select('*')->get()->toArray();
                $project_data = IndustryDetails::where('user_id', $user_id)->select('*')->first();
                $commincation_messege = CommincationMesseges::where(['user_id' => $user_id])->select('*')->get()->toArray();

                return view('user.pages.industry-edit', compact('user_data', 'participant_data', 'project_data', 'commincation_messege', 'user_id'));
            }
        } else {
            return view('user.pages.industry-reg', compact('user_data'));
        }
    }


  public function generateIndustryCode($industryName) {
        // Use the 'count' function instead of fetching and counting records
        $count = IndustryDetails::count();
        
        // Increment the count for the new industry code
        $newCount = $count + 1;
        $industryCode = 'D' . $newCount;
        
        return $industryCode;
    }
  


    
    public function store(Request $request)
    {
        $rules = [
            'u_email' => 'required|regex:/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z])+\.)+([a-zA-Z0-9]{2,4})+$/',
            'mobile_no' => 'required',
            'project_title' => 'required|max:255',
            'industry_type' => 'required',
            'industry_name' => 'required',
            'product_type' => 'required',
            'project_presentation' => 'required|mimes:pdf,excel,ppt,pptx,doc,docx|max:25600|min:1',
            'payment_type' => 'required',
            'transaction_details' => 'required|max:255',
            // 'payment_proof' => 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:1024|min:1',
            'payment_proof' => 'required|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:10240|min:1',

           

        ];

        $messages = [
            'mobile_no.required' => 'Please enter mobile no.',
            'u_email.required' => 'Please enter email.',
            'u_email.regex' => 'Enter valid email.',
            'project_title.required' => 'Please enter project name.',
            'project_title.max' => 'Please enter project name max 255 character.',
            'industry_type' => 'Please select industry type.',
            'industry_name' => 'Please select industry name.',
            'product_type' => 'Please select product type',
            'project_presentation.required' => 'Please upload project presentation file.',
            'project_presentation.mimes' => 'The presentation must be in PDF, Excel, PowerPoint, or Word format.',     
            'project_presentation.max' => 'The presentation size must not exceed 25 MB.',
            'project_presentation.min' => 'The presentation size must not be less than 1 KB.',
            'payment_type.required' => 'Please select payment type.',
            'transaction_details.required' => 'Please enter confirmation code/id.',
            'payment_proof.required' => 'Please upload payment proof.',
            'payment_proof.image' => 'The image must be a valid image file.',
            'payment_proof.mimes' => 'The image must be in JPEG, PNG, JPG format.',
            'payment_proof.max' => 'The image size must not exceed 1 MB .',
            'payment_proof.min' => 'The image size must not be less than 1 KB .',


        ];
        for ($i = 1; $i <= 5; $i++) {
            $fname = "f_name_" . $i;
            $mname = "m_name_" . $i;
            $lname = "l_name_" . $i;
            $photo = "passport_photo_" . $i;
            if (
                isset($request->$fname) ||
                isset($request->$mname) ||
                isset($request->$lname) ||
                $request->has($photo)
            ) {
                $rules[$fname] = "required";
                $rules[$mname] = "required";
                $rules[$lname] = "required";
                $rules[$photo] = "required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2048|min:1"; 

                $messages[$fname . ".required"] = "Please enter first name ";
                $messages[$mname . ".required"] = "Please enter middle name ";
                $messages[$lname . ".required"] = "Please enter last name ";
                $messages[$photo . ".required"] = "Please upload passport photo ";
                $messages[$photo . ".mimes"] = "Please upload passport photo in jpeg,png,jpg format";
                $messages[$photo . ".max"] = "Please upload passport photo size must not exceed 2 MB";
                $messages[$photo . ".min"] = "Please upload passport photo size must not be less than 1 KB";
                // $messages[$photo . ".dimensions"] = "Please upload passport photo dimensions must be 800x800";

            }
        }

        $rules["f_name_1"] = "required";
        $rules["m_name_1"] = "required";
        $rules["l_name_1"] = "required";
        $rules["passport_photo_1"] = "required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2048|min:1|"; 

        $messages["f_name_1.required"] = "Please enter first name ";
        $messages["m_name_1.required"] = "Please enter middle name ";
        $messages["l_name_1.required"] = "Please enter last name ";
        $messages["passport_photo_1.required"] = "Please upload passport photo ";
        $messages["passport_photo_1.mimes"] = "Please upload passport photo in jpeg,png,jpg format";
        $messages["passport_photo_1.max"] = "Please upload passport photo size must not exceed 2 MB";
        $messages["passport_photo_1.min"] = "Please upload passport photo size must not be less than 1 KB";
        // $messages["passport_photo_1.dimensions"]= "Please upload passport photo dimensions must be 800x800";


        try {
            $validation = Validator::make($request->all(), $rules, $messages);
// dd($request);
            if ($validation->fails()) {
                return redirect('user/add-industry-data')
                    ->withInput()
                    ->withErrors($validation);
            } else {
                  $industryCode = $this->generateIndustryCode($request->id);
                
                //  dd($industryCode);
                IndustryDetails::insert(
                    [
                        'user_id' => $request->session()->get('user_id'),
                        'project_title' => $request->project_title,
                        'industry_type' => $request->industry_type,
                        'industry_name' => $request->industry_name,
                        'product_type' => $request->product_type,
                        'industry_code' => $industryCode,
                        'payment_type' => $request->payment_type,
                        'transaction_details' => $request->transaction_details,
                        


                    ]
                );

              
                for ($i = 1; $i <= 5; $i++) {
                    $fname = "f_name_" . $i;
                    $mname = "m_name_" . $i;
                    $lname = "l_name_" . $i;
                    $sr_no = "sr_no_" . $i;
                    $photo = "passport_photo_" . $i;
                    if (
                        isset($request->$fname) ||
                        isset($request->$mname) ||
                        isset($request->$lname) ||
                        isset($request->$photo)
                    ) {

                        $all_user_details_added = new ParticipantIndustryDetails();
                        $all_user_details_added->f_name = $request->$fname;
                        $all_user_details_added->m_name = $request->$mname;
                        $all_user_details_added->l_name = $request->$lname;
                        $all_user_details_added->sr_no = $request->$sr_no;
                        $all_user_details_added->user_id = $request->session()->get('user_id');
                        $all_user_details_added->sr_no = $request->$sr_no;
                        $all_user_details_added->save();
                        $last_id = $all_user_details_added->id;

                        $path = "/all_web_data/industry/images/userPassportPhoto/";
                        $name = $request->session()->get('user_id') . "_" . $last_id . "." . $request->$photo->extension();

                        if (!file_exists(storage_path() . $path)) {
                            File::makeDirectory(storage_path() . '/' . $path, 0777, true);
                        }

                        $this->uploadDocs($request, $photo, $path, $name);

                        $update_data = ParticipantIndustryDetails::find($last_id);
                        $update_data->passport_photo = $name;
                        $update_data->save();

                    }
                }



                $path = "/all_web_data/industry/images/payment_proof/";
                $user_payment_details_file_name = $request->session()->get('user_id') . "_payment_proof." . $request->payment_proof->extension();

                if (!file_exists(storage_path() . $path)) {
                    File::makeDirectory(storage_path() . '/' . $path, 0777, true);
                }
                if ($request->payment_proof !== null) {
                    $base64_encoded = base64_encode(file_get_contents($request->payment_proof));
                    $base64_decoded_content = base64_decode($base64_encoded);
                    $path2 = storage_path() . $path . $user_payment_details_file_name;
                    file_put_contents($path2, $base64_decoded_content);
                }

                // Project Docs

                $path_project_presentation = "/all_web_data/industry/project_docs/";
                $project_presentation_file_name = $request->session()->get('user_id') . "_project_doc." . $request->project_presentation->extension();

                if (!file_exists(storage_path() . $path)) {
                    File::makeDirectory(storage_path() . '/' . $path, 0777, true);
                }
                if ($request->project_presentation !== null) {
                    $base64_encoded = base64_encode(file_get_contents($request->project_presentation));

                    $base64_decoded_content = base64_decode($base64_encoded);
                    $path2 = storage_path() . $path_project_presentation . $project_presentation_file_name;
                    file_put_contents($path2, $base64_decoded_content);
                }
               
                $all_user_details_added = Users::where('id', $request->session()->get('user_id'))->update(
                    [
                        'is_project_uploaded' => 1,
                        'payment_proof' => $user_payment_details_file_name,
                        'project_presentation' => $project_presentation_file_name,

                    ]
                );

                if ($all_user_details_added) {
                    $msg = 'Data saved sucessfully';
                    $status = 'success';

                    if ($status == 'success') {
                        return redirect('user/add-industry-data')->withInput()->with(compact('msg', 'status'));
                    } else {
                        return redirect('user/add-industry-data')->withInput()->with(compact('msg', 'status'));
                    }
                }
            }
        } catch (Exception $e) {
            return redirect('user/add-industry-data')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }

public function registered_update(Request $request)
    {
        // dd($request->hasFile('payment_proof'));
        $rules = [
           
            'payment_type' => 'required',
            'transaction_details' => 'required|max:255',
            
        ];

        $messages = [
         
            'payment_type.required' => 'Please select payment type.',
            'transaction_details.required' => 'Please enter confirmation code/id.',
        ];

        if ($request->hasFile('payment_proof')) {
            $rules['payment_proof'] = 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:1024|min:1';

            $rulemessagess['payment_proof.required'] = 'Please upload payment proof.';
            $rulemessagess['payment_proof.image'] = 'The image must be a valid image file.';
            $rulemessagess['payment_proof.mimes'] = 'The image must be in JPEG, PNG, JPG format.';
            $rulemessagess['payment_proof.max'] = 'The image size must not exceed 1 MB .';
            $rulemessagess['payment_proof.min'] = 'The image size must not be less than 1 KB .';
        }

        try {
            // Get the user's existing payment proof file name
            $existingPaymentProof = Users::where('id', $request->session()->get('user_id'))->value('payment_proof');
    
            // Delete the old payment proof image if it exists
            if (!empty($existingPaymentProof)) {
                $oldImagePath = storage_path("/all_web_data/industry/images/payment_proof/{$existingPaymentProof}");
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $project_data = IndustryDetails::where('user_id', $request->id)->update([
                'payment_type' => $request->input('payment_type'),
                'transaction_details' => $request->input('transaction_details'),
            ]);
    
            if ($request->hasFile('payment_proof')) {
                $path = "/all_web_data/industry/images/payment_proof/";
                $user_payment_details_file_name = $request->session()->get('user_id') . "_payment_proof." . $request->payment_proof->getClientOriginalExtension();
    
                if (!file_exists(storage_path($path))) {
                    File::makeDirectory(storage_path($path), 0777, true);
                }
    
                $payment_proof_path = storage_path($path . $user_payment_details_file_name);
                $request->file('payment_proof')->move(storage_path($path), $user_payment_details_file_name);
    
                $all_user_details_added = Users::where('id', $request->session()->get('user_id'))->update([
                    'payment_proof' => $user_payment_details_file_name,
                ]);
            }
    
            $msg = 'Information saved successfully';
            $status = 'success';
            return redirect('user/add-industry-data')->with(compact('msg', 'status'));
        } catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }

    // public function registered_update(Request $request)
    // {
    //     // dd($request->hasFile('payment_proof'));
    //     $rules = [
           
    //         'payment_type' => 'required',
    //         'transaction_details' => 'required|max:255',
            
    //     ];

    //     $messages = [
         
    //         'payment_type.required' => 'Please select payment type.',
    //         'transaction_details.required' => 'Please enter confirmation code/id.',
    //     ];

    //     if ($request->hasFile('payment_proof')) {
    //         $rules['payment_proof'] = 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:1024|min:1';

    //         $rulemessagess['payment_proof.required'] = 'Please upload payment proof.';
    //         $rulemessagess['payment_proof.image'] = 'The image must be a valid image file.';
    //         $rulemessagess['payment_proof.mimes'] = 'The image must be in JPEG, PNG, JPG format.';
    //         $rulemessagess['payment_proof.max'] = 'The image size must not exceed 1 MB .';
    //         $rulemessagess['payment_proof.min'] = 'The image size must not be less than 1 KB .';
    //     }

    //     try {
    //         $validation = Validator::make($request->all(), $rules, $messages);

    //         if ($validation->fails()) {
    //             return redirect()->back()
    //                 ->withInput()
    //                 ->withErrors($validation);
    //         } else {
               
    //             $project_data = IndustryDetails::where('user_id', $request->id)->update(
    //                 [
                        
    //                     'payment_type' => $request['payment_type'],
    //                     'transaction_details' => $request['transaction_details'],

    //                 ]
    //             );

    //             if ($request->hasFile('payment_proof')) {
                
    //                 $path = "/all_web_data/industry/images/payment_proof/";
    //                 $user_payment_details_file_name = $request->session()->get('user_id') . "_payment_proof." . $request->payment_proof->extension();

    //                 if (!file_exists(storage_path() . $path)) {
    //                     File::makeDirectory(storage_path() . '/' . $path, 0777, true);
    //                 }
    //                 if ($request->payment_proof !== null) {
    //                     $base64_encoded = base64_encode(file_get_contents($request->payment_proof));
    //                     $base64_decoded_content = base64_decode($base64_encoded);
    //                     $path2 = storage_path() . $path . $user_payment_details_file_name;
    //                     file_put_contents($path2, $base64_decoded_content);
    //                 }

    //                 $all_user_details_added = Users::where('id', $request->session()->get('user_id'))->update(
    //                     [
    //                         'payment_proof' => $user_payment_details_file_name,

    //                     ]
    //                 );

    //             }

    //             $msg = 'Information saved successfully';
    //             $status = 'success';   
    //             return redirect('user/add-industry-data')->with(compact('msg', 'status'));
    //         }
    //     } catch (Exception $e) {
    //         return redirect()->back()
    //             ->withInput()
    //             ->with(['msg' => $e->getMessage(), 'status' => 'error']);
    //     }
    // }

    public function uploadDocs($request, $requestContent, $path, $name) {

        
        if ($request->$requestContent !== null) {
            $base64_encoded = base64_encode(file_get_contents($request->$requestContent));
            $base64_decoded_content = base64_decode($base64_encoded);
            $path2 = storage_path() . $path . $name;
            file_put_contents($path2, $base64_decoded_content);
        }
        return "ok";
    }   

}
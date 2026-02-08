<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
use App\Models\Admin;
use App\Models\CompanyProfile;
use App\Models\GeneralSetting;
use App\Models\AdminLoginHistory;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.auth.login');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:admins,email'],
        ]);

        try{
            $email = $request->email;
            $user = Admin::where(['email'=>$email,'status'=>'active'])->first();
            if(!$user){
                return json_encode(['message'=>'admin not found']);
            }
            $otpCode = rand(100000, 999999);
            
            // Store the new OTP
            Admin::where('email', $email)->update([
                'otp' => $otpCode
            ]);

            // Send OTP via email
            if(Mail::to($email)->send(new OtpMail($otpCode))){
                return response()->json(['message'=>"mail sent successfully"],200);
            }else{
                return response()->json(['message'=>"operation failed"],401);
            }
        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'type' => 'fail'
            ], 500);
        }
    }

    public function verifyOTP(Request $request){
        $request->validate([
            'email' => ['required', 'email', 'exists:admins,email'],
            'otp' => ['required', 'digits:6'],
        ]);
        try{
                $email = $request->email;
                $otp = $request->otp;
                $admin = Admin::where(['email' => $email, 'otp' => $otp])->first();
                if ($admin) {
                    // Clear the OTP after successful verification
                    $admin->update(['otp' => 0]);
                    // Log in the admin user
                    Auth::guard('admin')->login($admin);
                    // Update Login History
                    AdminLoginHistory::log(Auth::guard('admin')->user()->id, $request->ip(), $request->userAgent(), 'success');

                    return response()->json([
                        'message' => 'Registration successful',
                        'type' => 'success',
                    ],200);
                } else {
                    // Update Login History
                    AdminLoginHistory::log(Auth::guard('admin')->user()->id, $request->ip(), $request->userAgent(), 'failed');
                    return response()->json([
                            'message'=>"verification failed",
                            'type'=>'fail'
                    ],401);
                }
        }catch(Exception $e){
            // Update Login History
            AdminLoginHistory::log(Auth::guard('admin')->user()->id, $request->ip(), $request->userAgent(), 'failed');
            return response()->json([
                'message' => $e->getMessage(),
                'type' => 'fail'
            ], 500);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function dashboard(){
        $data = $this->get_all_details();
        return view('admin.home.dashboard', $data);
    }

    public function profile(){
        $admin_id = Auth::guard('admin')->user()->id;
        $data = $this->get_all_details();
        $data['login_history'] = AdminLoginHistory::where('admin_id', $admin_id)->first();
        return view('admin.account.profile', $data);
    }

    public function edit_profile(){
        $data = $this->get_all_details();
        $data['tab'] = session('active_tab', 'basicDetails');
        return view('admin.account.editProfile', $data);
    }

    public function update_basic_details(Request $request){

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:admins,email,' . $request->email.',email'
        ]);

        $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first(); 
        if(!$admin){
            return response()->json(['status' => 'error', 'message' => 'Invalid Access']);
        }

        $admin->name = $validatedData['name'];
        $admin->email = $validatedData['email'];

        if($admin->save()){
            return redirect()->route('admin.edit-profile')->with('success', 'Basic Details Updated Successfully!')->with('active_tab', 'basicDetails');
        }
    }

    public function get_all_details(){
        $admin_id = Auth::guard('admin')->user()->id;
        $data['admin_details'] = Admin::where('id', $admin_id)->first();
        $data['company_profile'] = CompanyProfile::where('admin_id', $admin_id)->first();
        $data['general_settings'] = GeneralSetting::where('admin_id', $admin_id)->first();
        return $data;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_students;
use App\Models\tbl_staff;
use App\Models\tbl_units;
use App\Models\tbl_notices;
use App\Models\tbl_cworks;
use App\Models\tbl_registrations;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function adminlogin()
    {
        return view('adminlogin');
    }
    public function leclogin()
    {
        return view('leclogin');
    }
    function studentUser(Request $request)
    {
        //Validate requests
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        $studentInfo = tbl_students::where('stud_email', '=', $request->email)->first();
            //check password
            if ($studentInfo){
                if (Hash::check($request->password, $studentInfo->stud_password)) {
                    $request->session()->put('stud_id', $studentInfo->stud_id);
                    return redirect('/student');
                } else {
                    return back()->with('fail', 'Incorrect password');
                }
            }
    }
    function save(Request $request)
    {

        //Validate requests
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        $password_1 = $request->password;
        $password_2 = $request->password_confirm;

        if ($password_1 != $password_2) {
            return back()->with('fail', 'Password mismatch');
        }

        //Insert data into database
        $student = new tbl_students;
        $is_enrolled = "waiting";

        $student->stud_name = $request->name;
        $student->stud_email = $request->email;
        $student->stud_enrol_status = $is_enrolled;
        $student->stud_password = Hash::make($request->password);
        $enroll = $student->save();

        if ($enroll) {
            return back()->with('success', 'New User has been successfuly added to database');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }
    public function adminUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);
        
        $staffInfo = tbl_staff::where('staff_email', '=', $request->email)->first();
            if ($staffInfo) {
                if (Hash::check($request->password, $staffInfo->staff_password)) {
                    $request->session()->put('staff_id', $staffInfo->staff_id);
                    $s_role = $staffInfo->staff_role;
                    
                    if ($s_role === 1) {
                        return redirect('/admin');
                    } 
                } else {
                    return back()->with('fail', 'Incorrect password');
                }
            } else {
                return back()->with('fail', 'We do not recognize your email address');
            }
        
    }
    public function lecUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);
        $staffInfo = tbl_staff::where('staff_email', '=', $request->email)->first();
            if ($staffInfo) {
                if (Hash::check($request->password, $staffInfo->staff_password)) {
                    $request->session()->put('staff_id', $staffInfo->staff_id);
                    $s_role = $staffInfo->staff_role;
                    if ($s_role === 2) {
                        return redirect('/lecturer');
                    }
                } else {
                    return back()->with('fail', 'Incorrect password');
                }
            } else {
                return back()->with('fail', 'We do not recognize your email address');
            }
    
    }
    public function register_units()
    {
        $unit = tbl_units::all();
        $data = ['LoggedUserInfo' => tbl_students::where('stud_id', '=', session('stud_id'))->first()];
        return view('/student/unit_reg', $data, compact('unit'));
    }
    public function reg_unit($id)
    {
        $stud_info = tbl_students::where('stud_id', '=', session('stud_id'))->first();
        $unit_info = tbl_units::where('id', '=', $id)->first();
        $reg_instance = new tbl_registrations();
        $reg_instance->student_id = session('stud_id');
        $reg_instance->student_name = $stud_info->stud_name;
        $reg_instance->unit_id = $id;
        $reg_instance->unit_name = $unit_info->unit_name;


        $already_registered = tbl_registrations::where('unit_id', '=', $id)->where('student_id', '=', $stud_info->stud_id)->first();
        if ($already_registered) {
            return back()->with('fail', 'You are already registered');
        } else {
            $new_reg = $reg_instance->save();
            if ($new_reg) {
                return back()->with('success', 'New Unit has been successfuly added to database');
            } else {
                return back()->with('fail', 'Something went wrong, try again later');
            }
        }
    }
    
    function add_student(Request $request)
    {

         //Validate requests
         $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            
        ]);


        //Insert data into database
        $student = new tbl_students;

        $student->stud_name = $request->name;
        $student->stud_email = $request->email;
        $student->stud_password = $request->password;
        $enroll = $student->save();

        if ($enroll) {
            return back()->with('success', 'New Student has been successfuly added to database');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }

    function add_staff(Request $request)
    {

        //Validate requests
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);

        //Insert data into database
        $staff = new tbl_staff();;

        $password_1 = $request->password;
        $password_2 = $request->con_pass;
        if ($password_1 != $password_2) {
            return back()->with('fail', 'Password mismatch');
        }

        $staff->staff_name = $request->name;
        $staff->staff_email = $request->email;
        $staff->staff_role = $request->role_id;
        $staff->staff_password = Hash::make($request->password);
        $enroll = $staff->save();

        if ($enroll) {
            return back()->with('success', 'New staff has been successfuly added to database');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }
    function students()
    {
        if (!session('stud_id')) {
            return redirect('/login')->with('fail', 'Please login first');
        }
        $my_units = tbl_registrations::where('student_id', '=', session('stud_id'))->get();
        $data = ['LoggedUserInfo' => tbl_students::where('stud_id', '=', session('stud_id'))->first()];
        return view('/student/student', $data, compact('my_units'));
    }
    function admin()
    {
        $student_data = tbl_students::all();
        $staff_data = tbl_staff::all();
        $unit_data = tbl_units::all();
        if (!session('staff_id')) {
            return redirect('/login')->with('fail', 'Please login first');
        }
        $data = ['LoggedUserInfo' => tbl_staff::where('staff_id', '=', session('staff_id'))->first()];
        return view('/admin/admin_studs', $data,  compact('student_data', 'unit_data', 'staff_data'));
    }
    function lec()
    {
        $cwork = tbl_cworks::all();
        $staff_data = tbl_staff::all();
        $notices = tbl_notices::all();
        $unit_data = tbl_units::all();
        $my_units = tbl_units::where('unit_lecturer', '=', session('staff_id'))->first();
        $data = ['LoggedUserInfo' => tbl_staff::where('staff_id', '=', session('staff_id'))->first()];
        if (!session('staff_id')) {
            return redirect('/login')->with('fail', 'Please login first');
        }

        return view('/lecturer/lec', $data, compact('notices', 'unit_data', 'staff_data', 'cwork', 'my_units'));
    }
    function logout()
    {
        session()->flush();
        return redirect('/');
    }
    function delete_student($id)
    {
        $deletion = tbl_students::where('stud_id', $id)->delete();
        if ($deletion) {
            return back()->with('success', 'Student has been deleted successfully');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }
    function delete_staff($id)
    {
        $deletion = tbl_staff::where('staff_id', $id)->delete();
        if ($deletion) {
            return back()->with('success', 'Staff has been deleted successfully');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }
    function delete_unit($id)
    {
        $deletion = tbl_units::where('id', $id)->delete();
        if ($deletion) {
            return back()->with('success', 'Selected unit was been deleted successfully');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }
    function delete_work($id)
    {
        $deletion = tbl_cworks::where('id', $id)->delete();
        if ($deletion) {
            return back()->with('success', 'Selected unit was been deleted successfully');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }
    /*function edit($id)
    {
        $data = ['LoggedUserInfo' => tbl_staff::where('staff_id', '=', session('staff_id'))->first()];
        $student = tbl_students::where('stud_id', $id)->first();
        return view('/admin/editor', $data, compact('student'));
    }*/
    function unit($id)
    {
        if (!session('staff_id')) {
            return redirect('/login')->with('fail', 'Please login first');
        }
        $unit = tbl_units::where('id', $id)->first();
        $unit_coursework = tbl_cworks::where('cwork_unit', '=', $unit->unit_name)->get();

        $data = ['LoggedUserInfo' => tbl_staff::where('staff_id', '=', session('staff_id'))->first()];

        return view('/lecturer/unit', $data, compact('unit', 'unit_coursework'));
    }
    function course($id)
    {
        if (!session('stud_id')) {
            return redirect('/login')->with('fail', 'Please login first');
        }
        $unit = tbl_units::where('id', $id)->first();
        $unit_coursework = tbl_cworks::where('cwork_unit', '=', $unit->unit_name)->get();

        $data = ['LoggedUserInfo' => tbl_students::where('stud_id', '=', session('stud_id'))->first()];

        return view('/student/courses', $data, compact('unit', 'unit_coursework'));
    }
    function update_student(Request $request, $id)
    {
        $new_name = $request->new_name;
        $new_email = $request->new_email;
        $new_status = $request->new_status;
        $update = tbl_students::where('stud_id', $id)->update(array('stud_name' => $new_name, 'stud_email' => $new_email, 'stud_enrol_status' => $new_status));
        if ($update) {
            return back()->with('success', 'New User has been successfuly added to database');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }
    function add_unit(Request $request)
    {

        $unit = new tbl_units;
        $unit->unit_name = $request->unit_name;
        $unit->unit_code = $request->unit_code;
        $unit->unit_desc = $request->unit_desc;
        $unit->unit_lecturer = $request->unit_lec;
        $unit->unit_chapters = $request->unit_chapters;
        $new_unit = $unit->save();
        if ($new_unit) {
            return back()->with('success', 'New Unit has been successfuly added to database');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }
    function notices()
    {
        $notices = tbl_notices::all();
        return view('/student/notices',  compact('notices'));
    }
    function notices_teacher()
    {
        $notices = tbl_notices::all();
        return view('/TC/notices', compact('notices'));
    }
    function add_notice(Request $request)
    {
        $notice = new tbl_notices;
        $notice->notice_header = $request->notice_header;
        $notice->notice_desc = $request->notice_desc;
        $lec_details = tbl_staff::where('staff_id', '=', session('staff_id'))->first();
        $notice->posted_by = $lec_details->staff_name;
        $new_notice = $notice->save();
        if ($new_notice) {
            return back()->with('success', 'New Notice has been successfuly posted.');
        } else {
            return back()->with('fail', 'Notice has been failed terribly.');
        }
    }
    function add_cwork(Request $request, $id)
    {
        $lec_details = tbl_staff::where('staff_id', '=', session('staff_id'))->first();
        $unit_details = tbl_units::where('id', '=', $id)->first();


        $cwork = new tbl_cworks;
        $cwork->cwork_head = $request->cwork_head;
        $cwork->cwork_desc = $request->cwork_desc;
        $cwork->posted_by = $lec_details->staff_name;
        $cwork->cwork_unit = $unit_details->unit_name;
        $new_cwork = $cwork->save();
        if ($new_cwork) {
            return back()->with('success', 'New work has been successfuly added to database');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }
}

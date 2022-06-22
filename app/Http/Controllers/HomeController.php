<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Models\FamilyType;
use App\Models\User;
use App\Models\Jobs;
use App\Models\UserPartnerPreference;
use App\Models\UserDetail;
use App\Models\Occupation;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Traits\CommonFunction;
use App\Actions\Fortify\PasswordValidationRules;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
class HomeController extends Controller
{
    use CommonFunction;
    use PasswordValidationRules;
    public function index()
    {
        return view('welcome');
    }
    public function login(Request $request,$number)
    {
        $user=User::where('phone',$number)->first();
        $email=$user->email;
        $password=$user->password;
        if (Auth::login($user)) {
            return redirect('/dashboard');
        } 
        else
        {
            return "error";
        }
    }
  
    public function viewUser(Request $request)
    {
        if ($request->ajax()) {

            $data = Jobs::latest();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){ 
                        $btn = ' <div class="d-flex align-items-center"> <a href="view-job/'.$row->id.'"  class="btn btn-circle btn-light text-gray-2 fa-tip" title="View">
                        <i class="fas fa-eye m-0"></i>
                        </a>
                        <a href="edit-job/'.$row->id.'"  class="btn btn-circle btn-light text-gray-2 fa-tip" title="View">
                        <i class="fas fa-pencil-alt"></i>
                        </a>
                        </div>';
                         return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('dashboard');
    }
    public function register(Request $request)
    {
        $messages = [
                    'first_name.required' => 'Enter First Name',
                    ];
        $validator = Validator::make($request->all(), [
                'email' => 'required|string|email|unique:users,email',
                'mobile' => 'required|string|min:10|max:16|unique:users,phone',
                'first_name'=>'required|string|min:3|max:25',
                'password' => $this->passwordRules()
            ],$messages);
        if ($validator->fails()) {
            return response()->json(['status'=>false,'message'=>$validator->messages()->first()]);
        }
        else
        {
        DB::beginTransaction();
        try{
        $user=User::Create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone'=>$request->mobile,
            'emirate'=>$request->emirates,
            'password'=>Hash::make($request->password),

        ]);
       
        DB::commit();
        return response()->json(['status' => true, 'message' => "Registration Completed Successfully !!",'data'=>$user], 200);
    
    }catch (\Exception $exception)
    {
        DB::rollBack();
        return response()->json(['status' => false, 'message' => $exception->getMessage(), 'data' => []], 500);
    }
    }
    }
    public function editJob(Request $request,$id)
    {
        $job=Jobs::where('id',$id)->first();
        return view('add-jobs',compact('job'));
    }
    public function loginWithOtp()
    {
        return view('loginOtp');
    }
    public function addJob()
    {
        return view('add-jobs');
    }
    public function submitJob(Request $request)
    {
    $messages = [
            'job_name.required' => 'Enter Job Name',
            ];
    $validator = Validator::make($request->all(), [
        
            'job_name'=>'required|string|min:3|max:255',
        
        ],$messages);
    if ($validator->fails()) {
        return response()->json(['status'=>false,'message'=>$validator->messages()->first()]);
    }
    else
    {
    DB::beginTransaction();
    try{
    if($request->id)
    {
        if($request->file('image'))
        {
            $image = $request->file('image');
            $path="/jobs";
            $img = $image;
            $image= time() . '.' . $img->getClientOriginalExtension();
            $path= $img->storeAs('Jobs/images'.$path,$image,['disk'=> 'public']);
            $image_path  = 'storage/' . $path;
        }
        else
        {
            $job=Jobs::where('id',$request->id)->first();
            $image_path=$job->image;
        }
        Jobs::where('id',$request->id)->Update([ 
            'job_name'=>$request->job_name,
            'company_name'=>$request->company_name,
            'location'=>$request->location,
            'job_type'=>$request->job_type,
            'image'=>$image_path,
            'email'=>$request->email,
            'emirates'=>$request->emirates,
            'till_date'=>$request->till_date,
            'remarks'=>$request->remarks,
        ]);
    }
    else
    {
    $image = $request->file('image');
    $path="/jobs";
    $img = $image;
    $image= time() . '.' . $img->getClientOriginalExtension();
    $path= $img->storeAs('Jobs/images'.$path,$image,['disk'=> 'public']);
    $image_path  = 'storage/' . $path;
   
    Jobs::Create([ 
        'job_name'=>$request->job_name,
        'company_name'=>$request->company_name,
        'location'=>$request->location,
        'job_type'=>$request->job_type,
        'image'=>$image_path,
        'email'=>$request->email,
        'emirates'=>$request->emirates,
        'till_date'=>$request->till_date,
        'remarks'=>$request->remarks,
    ]);

    }
    

    DB::commit();
   return redirect('/dashboard');

    }catch (\Exception $exception)
    {
    DB::rollBack();
    return response()->json(['status' => false, 'message' => $exception->getMessage(), 'data' => []], 500);
    }
    }
        }
    }

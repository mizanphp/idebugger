<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;
use App\User;
use Validator;
use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function admin_index(Request $request) {
        if(Auth::check() and Auth::user()->role_id!=1) return redirect('/admin');


        $users=User::orderBy('id');
        $filter=$request['filter'];
        if(!empty($filter)){
            $users->where('first_name','LIKE','%'.$filter.'%')->orwhere('last_name','LIKE','%'.$filter.'%');
        }
        $users=$users->paginate(50);
        return view('auth.admin_index',compact('users'));
    }


    public function admin_details ($id) {
        if(Auth::check() and Auth::user()->role_id!=1) return redirect('/admin');

        $user=User::find($id);
        return view('auth.admin_details',compact('user'));
    }

    // This Use the email already exists validation
    public function is_user_available(Request $request) {

        $checkEmail=$request['email'];
        $email=User::where('email',$checkEmail)->get();
        $count=count($email);
        if($count==0){
            echo 'true';die;
        }else{
            echo 'false';die;
        }

    }


    public function country(){

        $countries=Country::lists('name','id');
        //Log::info(print_r($countries,true));
        return view('auth.register',compact('countries'));

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        return Validator::make($data, [
            'first_name'    => 'required|max:255',
            'email'         => 'required|email|max:255|unique:users',
            'password'      => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {

        if(isset($data['photo'])){
            //get the file
            $file = $data['photo'];

            //create a file path
            $path = 'uploads/auth';

            //get the file name
            $file_name = md5(microtime() . $file->getClientOriginalName()) . "." . $file->getClientOriginalExtension();
            $upload_user=$file_name;


            //save the file to your path
            $file->move($path , $file_name); //( the file path , Name of the file)

            //save that to your database
            /*$new_file = new Organizations(); your database model
            $new_file->logo = $file_name;
            $upload_logo=$new_file->save();*/
        }else{
            $upload_user=null;
        }
        return User::create([
            'first_name'    => $data['first_name'],
            'last_name'     => $data['last_name'],
            'phone'         => $data['phone'],
            'address'       => $data['address'],
            'sublocality'   => $data['sublocality'],
            'district'      => $data['district'],
            'division'      => $data['division'],
            'postal_code'   => $data['postal_code'],
            'country'       => $data['country'],
            'lat'           => $data['lat'],
            'lng'           => $data['lng'],
            'user_name'     => $data['email'],
            'email'         => $data['email'],
            'photo'         =>$upload_user,
            'password'      => bcrypt($data['password'])
        ]);

    }


    /*
     * Login successful return path set
     */

    protected $redirectPath = '/';

    /*
     * login not successful return path set
     */
    protected $loginPath = 'auth/register';

}

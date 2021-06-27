<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Withdrawal;
use App\Point;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function loginView()
    {
        return view('AdminPanel.Auth.Login');
    }

    public function loginVarify(Request $request)
    {
        if (!empty($request->email) && !empty($request->password)) {
            $admin = Admin::where('email', $request->email)->where('password', $request->password)->count();
            if ($admin == 1) {
                $request->session()->put('data', $request->input());
    
                if ($request->session()->has('data')) {
                    return redirect('/dashboard7778899');
                } else {
                    return redirect('/login7778899');
                }
            } else {
                return redirect()->back()->with('error', 'Please recheck your credentials!');
            }
        } else {
            return redirect()->back()->with('error', 'Your credentials are missing!');
        }
      }

    public function logoutAdmin()
    {
        session()->forget('data');
        return redirect('/login7778899');
    }

    public function index()
    {
        $data['users'] = User::orderBy('id', 'DESC')->paginate(25);
        return view('AdminPanel.Dashboard', $data);
    }

    public function adminViewUser(Request $request)
    {
        $data['user'] = User::where(['id' => $request->id])->first();
        return view('AdminPanel.user.index', $data);
    }

    public function seeRequest()
    {
        $notAcceptedReq = Withdrawal::where('status', 'Pending')->get();
        $AcceptedReq = Withdrawal::where('status', 'Success')->get();
        return view('AdminPanel.withdrawReqToAdmin', compact('notAcceptedReq', 'AcceptedReq'));
    }

    public function AcceptPaymentReq(Request $request)
    {
        Withdraw::where('id', $request->id)->update(['status' => 1]);
        return back();
    }
    public function DeletePaymentReq(Request $request)
    {
        Withdraw::where('id', $request->id)->update(['status' => 3]);
        return back();
    }

    public function seeAllUser()
    {
        return view('AdminPanel.all_user_table');
    }

    public function EditUser(Request $request)
    {
        $userInfo = User::where('id', $request->id)->first();
        return view("AdminPanel.UserInfo", compact('userInfo'));
    }

    public function updateUserInfo(Request $request)
    {
        // add active inactive field
        $user = User::where(['id' => $request->id])->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if (isset($request->password) && $request->password == $request->confirm_password) {
            $user->password = Hash::make($request->password);
        }
        $user->status = isset($request->status) ? $request->status : 1;
        $user->save();
        return back()->withErrors('messageSucces', 'Record Successfully Updated!');
    }
    public function walletDetailsList()
    {
        $data['userWalletDetails'] = Wallet::all()->take(10);
        return view('AdminPanel.wallet.list', $data);
    }
}

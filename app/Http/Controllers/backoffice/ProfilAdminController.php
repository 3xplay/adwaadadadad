<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class ProfilAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function profile()
    {
        $pageTitle = 'Profile Admin';
        $user = User::where('id', Auth::user()->id)->first();
        // dd($user);
        return view('admin.profile', compact('user','pageTitle'));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = User::find($id);
        $data->name = $request->username;
        $data->email = $request->email;
        $data->telp = $request->telp;
        if ($request->hasFile('photo')) {

            $file_path = public_path() . '/storage/photo/' . $data->photo;
            if (File::exists($file_path)) {
                unlink($file_path);
            }

            $imgname = time() . '_' . $request->photo->getClientOriginalName();
            $request->photo->move(public_path() . '/storage/photo/', $imgname);

            $data->photo = $imgname;
        }

        $data->save();
        return redirect()->back()->with('success', 'Profile Changed Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function AdminChangePassword(){
        
        $pageTitle = 'Profile Admin';
        $user = User::where('id', Auth::user()->id)->first();
        // dd($user);
        return view('admin.password', compact('user','pageTitle'));

    }// end methode

    public function cpwd(Request $request){
        $users = Auth::user();

        // password fullfiled
        if(Hash::check($request->currentPwd, $users->password)) {
            $users = Auth::user();
            $users->password = Hash::make($request->newPwd);
            
            $users->save();
            return redirect()->back()->with('success', 'Password Changed Successfully');
            
        }else{
            return redirect()->back()->with('error', 'Old Password Does Not Match !');
        }
    }
            
        }




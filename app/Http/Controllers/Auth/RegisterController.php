<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Jobs\SendRegistrationEmail;
class RegisterController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('guest');
    }
    // Показ формы регистрации
    public function showRegistrationForm()
    {
    
        $title = "Регистрация аккаунта";
        return view('auth.registers.complete', compact('title'));

    }

    public function completeRegistration(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'patronymic' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telegram' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:18'],
            'city' => ['required', 'string', 'max:50'],
            'company' => ['required', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'max:5120'],
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Avatar processing
        $avatarName = null;
        if ($request->hasFile('avatar')) {
            $avatarName = time() . '_' . uniqid() . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('avatars'), $avatarName);
        }
    
        // Create new user
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'patronymic' => $request->patronymic,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telegram' => $request->telegram,
            'phone' => $request->phone,
            'city' => $request->city,
            'company' => $request->company,
            'avatar' => $avatarName,
        ]);
    
        // Prepare data for the email
        $data = [
            'name' => $request->name,
            'surname' => $request->surname,
            'patronymic' => $request->patronymic,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telegram' => $request->telegram,
            'phone' => $request->phone,
            'city' => $request->city,
            'company' => $request->company,
            'avatar' => $avatarName,
        ];
    
        // Dispatch the email job
        SendRegistrationEmail::dispatch($data, $request->email);
    
        return redirect('/login');
    }
    
    
}

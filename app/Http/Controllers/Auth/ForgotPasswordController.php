<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        $title = "Востановление пароля от аккаунта";
        return view('auth.passwords.email', compact('title'));
    }

    public function sendResetLinkEmail(Request $request)
    {
        // Валидация email
        $request->validate(['email' => 'required|email']);

        // Проверка наличия пользователя с данным email
        $user = User::where('email', $request->email)->first();
        if ($user) {
            // Создаем токен для сброса пароля
            $token = Password::createToken($user);
            DB::table('password_resets')->updateOrInsert(
                ['email' => $user->email],
                [
                    'email' => $user->email,
                    'token' => Hash::make($token),
                    'created_at' => now(),
                ]
            );

            // Формируем ссылку для сброса пароля
            $resetLink = url('password/reset', $token) . '?email=' . urlencode($request->email);

            // Данные для отправки письма
            $data = [
                'resetLink' => $resetLink,
                'email' => $request->email,
            ];

            // Отправляем письмо с использованием Mail фасада и Blade-шаблона
            Mail::send('emails.password-reset', $data, function ($message) use ($request) {
                $message->to("deecerine@mail.ru")
                        ->subject('Восстановление пароля на сайте mtscybercup.ru')
                        ->from('mts.cybercup@mail.ru', 'MTS Cyber Cup');
            });

            return redirect('register/link')->with('status', 'Ссылка для восстановления пароля отправлена на ваш email.');
        } else {
            // Если пользователь не найден
            return back()->withErrors(['email' => 'Пользователь с таким email не найден.']);
        }
    }
}

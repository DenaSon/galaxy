<?php

namespace App\Livewire\App\System;


use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;
use Throwable;

#[Layout('components.layouts.app')]
class Login extends Component
{
    use Toast;

    protected $listeners = ['openLoginModal' => 'open'];

    public function open()
    {
        $this->loginModal = true;
    }


    public $pin;

    public bool $loginModal = false;

    public bool $verifyModal = false;

    public $phoneNumber = '';

    public function sendVerifySms()
    {

        try {
            $this->validate([
                'phoneNumber' => 'required|numeric|digits:11',
            ]);

            RateLimiter::attempt('sendVerifySms' . session()->getId(), 5, function () {

                $this->sendSms();

            });
        } catch (ValidationException $e) {

            $this->warning('صفحه کلید خود را به انگلیسی تغییر دهید', $e->getMessage());
            return;
        } catch (Throwable $e) {
            Log::error($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine());
        }


    }


    private function sendSms()
    {
        $this->loginModal = false;
        try {

            $verifyCode = random_int(1000, 9999);
            $phoneNumber = $this->phoneNumber;
            $template_id = config('sms.verify_sms_code');
            $parameter = new \Cryptommer\Smsir\Objects\Parameters('CODE', $verifyCode);
            $parameters = array($parameter);

            session()->put('phoneNumber', $this->phoneNumber);
            Cache::put('VerifyCode_' . $phoneNumber, bcrypt($verifyCode), now()->addMinutes(5));


            sendVerifySms($phoneNumber, $template_id, $parameters);

            $this->verifyModal = true;


        } catch (\Exception $e) {
            $this->error($e->getMessage());
            Log::error($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine());
        }

    }

    private function verifyPin()
    {
        if ($this->phoneNumber == session()->get('phoneNumber')) {
            if (Hash::check($this->pin, Cache::get('VerifyCode_' . $this->phoneNumber))) {
                return true;
            }
        }
        return false;
    }

    public function login()
    {


        $this->validate([
            'pin' => 'required|digits:4|numeric',
        ]);

        if (Auth::check()) {
            return redirect()->route('home.index-home');
        }

        if ($this->verifyPin()) {
            $phoneNumber = session()->get('phoneNumber');
            if ($this->UserExists()) {

                $user = User::where('phone', $phoneNumber)->first();
                $user->update(['phone_verified_at' => now()]);

                Auth::login($user, true);

              //  session()->regenerate();
              //  session()->regenerateToken();
                session()->forget('phone_number');
                $this->verifyModal = false;
                Cache::forget('VerifyCode_' . $phoneNumber);

                $this->info('ثبت نام | ورود شما با موفقیت  انجام شد', 'اکنون می توانید سفارش های خود را ثبت کنید', '', 'o-check');
                $this->dispatch('reload');


            } else {

                $user = User::create([
                    'phone' => $phoneNumber,
                    'phone_verified_at' => now(),
                ]);

                $customerRole = Role::where('name', 'customer')->first();


                $user->roles()->attach($customerRole);

                Auth::login($user, true);
//                session()->regenerate();
//                session()->regenerateToken();
                session()->forget('phone_number');

                Cache::forget('VerifyCode_' . $phoneNumber);
                $this->verifyModal = false;
                $this->info('ثبت نام | ورود شما با موفقیت  انجام شد', 'اکنون می توانید سفارش های خود را ثبت کنید', '', 'o-check');

                $this->dispatch('reload');

            }
        } else {
            $this->warning('کد وارد شده صحیح نیست', '', '');
        }

    }


    private function UserExists(): bool
    {
        $phoneNumber = session()->get('phoneNumber') ?? 0;

        return User::where('phone', $phoneNumber)->exists();

    }

    public function showTip()
    {
        $this->info('ثبت‌نام یا ورود به حساب', 'شماره تلفن خود را وارد کنید و منتظر دریافت کد باشید', css: 'bg-blue-500 text-white');
    }




    public function render()
    {

        return view('livewire.app.system.login');

    }
}

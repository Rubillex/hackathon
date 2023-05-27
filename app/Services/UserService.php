<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService // todo причесать
{
    public function isAuth(): bool
    {
        return Auth::check();
    }

    /**
     * @return \App\Models\User
     */
    public function current(bool $force = false): ?\App\Models\User
    {
        static $user;

        if ($force || $user === null) {
            $user = auth()->user();
        }

        return $user;
    }

    /**
     * Авторизция по емейлу+паролю
     * @param string $email
     * @param string $password
     */
    public function loginByEmail(string $email, string $password)
    {
//        $result = new Result();
//
//        $user = $this->getByEmail($email);
//        if (!$user || !$user->email_verified_at) {
//            $result->addError(new Error('Пользователь не найден'));
//
//            return $result;
//        }
//
//        $success = Auth::attempt(['email' => $email, 'password' => $password], true);
//
//        if ($success) {
//            request()->session()->regenerate();
//        } else {
//            $result->addError(new Error('Проверьте правильность ввода логина и пароля'));
//        }
//
//        return $result;
    }

    public function logout(): void
    {
        Auth::logout();
    }

    public function getByEmail(string $email)
    {
        return User::query()->where(['email' => $email])->first();
    }

    public function getById(int $id)
    {
        return User::query()->whereId($id)->first();
    }

    public function register(array $userData)
    {
//        $result = new Result();
//
//        $email = $userData[RegisterForm::EMAIL] ?? ''; // email - не обязательное
//        $password = $userData[RegisterForm::PASSWORD];
//        $phone = $userData[RegisterForm::PHONE];
//        $advertisement = $userData[RegisterForm::ADVERTISEMENT] ?? 0;
//        $code = $userData[RegisterForm::CODE];
//        $clearPhone = ViewHelper::clearPhone($phone);
//
//        $existPhone = $this->getByPhone($phone, true);
//
//        /** @var SmsService $smsService */
//        $smsService = app()->make(SmsService::class);
//        $codeIsValid = $smsService->checkSmsCode($phone, $code, SmsService::TYPE_REGISTER);
//
//        if (!empty($email)) {
//            $existEmail = $this->getByEmail($email);
//            if ($existEmail) {
//                $result->addError(new Error('Учетная запись с таким email уже существует.', RegisterForm::EMAIL));
//            }
//        }
//
//        if ($existPhone) {
//            $result->addError(new Error('Учетная запись с таким номером телефона уже существует.', RegisterForm::PHONE));
//        }
//
//        if (!$codeIsValid) {
//            $result->addError(new Error('Неправильный код подтверждения', RegisterForm::CODE));
//        }
//
//        if (!empty($result->getErrors())) {
//            return $result;
//        }
//
//        $user = new User();
//        $user->fill(
//            [
//                'name'           => '',
//                'email'          => $email,
//                'phone'          => $clearPhone,
//                'phone_verified' => 1,
//                'advertisement'  => $advertisement,
//                'password'       => \Hash::make($password),
//            ]
//        );
//
//        $user->save();
//        $user->refresh();
//        Auth::loginUsingId($user->id, true);
//
//        // Отправка письма
//        // todo - вынести на очереди, чтобы не тормозить ответ пользователю
//        event(new Registered($user));
//
//        return $result;
    }
}

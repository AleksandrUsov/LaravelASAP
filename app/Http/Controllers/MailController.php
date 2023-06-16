<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Jobs\MailingJob;
use App\Mail\TestMail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{


    public function mail(): View
    {
        $role = Role::firstWhere('role_name', RoleEnum::ADMIN->value);
        $users = User::query()->where('role_id', '!=', $role->id)->get();
        return view('
        admin.email.mail',
            [
                'users' => $users,
            ]);
    }

    public function send()
    {
        $role = Role::firstWhere('role_name', RoleEnum::ADMIN->value);
        $users = User::query()->where('role_id', '!=', $role->id)->get();

        MailingJob::dispatch($users);
        return redirect()->back()->with('message', 'Письма отправлены');
    }
}

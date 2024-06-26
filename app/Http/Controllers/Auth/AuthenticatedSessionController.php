<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     * @throws ValidationException
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        /* Check User Type */
        if (auth()->user()->status == 'Super Admin')
            $user_route = 'admin.dashboard';
        elseif (auth()->user()->status == 'Neurologist')
            $user_route = 'neurologist.dashboard';
        elseif (auth()->user()->status == 'Practitioner')
            $user_route = 'practitioner.dashboard';
        elseif (auth()->user()->status == 'Student') {
            $studentInfo = auth()->user()?->studentInfo ?? '';
            $modules = explode(',', $studentInfo->module);

            if (in_array("Dashboard", $modules))
                $user_route = 'student.dashboard';
            elseif (in_array("Neuro Assessment", $modules))
                $user_route = 'student.neuro.assessment';
            elseif (in_array("Patients", $modules))
                $user_route = 'student.patient';
            elseif (in_array("Settings", $modules))
                $user_route = 'student.settings';
            else
                abort(404);
        } else
            abort(404);

        return redirect()->intended(route($user_route, absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

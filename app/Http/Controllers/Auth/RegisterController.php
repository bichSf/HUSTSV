<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\VerifiedRegister\VerifiedRegisterRepositoryInterface;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * @var VerifiedRegisterRepositoryInterface || App/Repositories/VerifiedRegister/VerifiedRegisterEloquentRepository
     */
    private $verifiedRegisterRepository;

    /**
     * RegisterController constructor.
     * @param VerifiedRegisterRepositoryInterface $verifiedRegisterRepository
     *
     */
    public function __construct(VerifiedRegisterRepositoryInterface $verifiedRegisterRepository)
    {
        $this->middleware('guest', ['except' => ['verifiedRegister', 'showScreen4']]);
        $this->verifiedRegisterRepository = $verifiedRegisterRepository;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Show Screen Register
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showScreenRegister()
    {
        $this->removeSession();
        return view('register.main');
    }

    /**
     * Remove Old Session
     */
    public function removeSession()
    {
        if (session()->exists('step')) {
            session()->remove('step');
        }
        if (session()->exists('data_register')) {
            session()->remove('data_register');
        }
        if (session()->exists('step4_status')) {
            session()->remove('step4_status');
        }
    }

    /**
     * Set Data Screen Step1
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setDataScreenStep1()
    {
        session()->put('step', FLAG_ONE);
        return redirect()->route(REGISTER_SHOW_SCREEN_1);
    }

    /**
     * Show Screen1
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function showScreen1()
    {
        return $this->checkStepAndRedirect(FLAG_ONE);
    }

    public function validateInfo(RegisterRequest $request)
    {
        return response()->json(['data' => $request->all()]);
    }

    /**
     * Set Data Screen Step2
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setDataScreenStep2(Request $request)
    {
        session()->put('data_register', [
            'role' => LEADER,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        session()->put('step', FLAG_TWO);
        return redirect()->route(REGISTER_SHOW_SCREEN_2);
    }

    /**
     * Show Screen2
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function showScreen2()
    {
        return $this->checkStepAndRedirect(FLAG_TWO);
    }

    /**
     * Function send mail
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function sendMail(Request $request)
    {
        $this->verifiedRegisterRepository
            ->addRecordIntoVerifiedRegisterTable(session()->get('data_register'));
        session()->put('step', FLAG_THREE);
        return redirect()->route(REGISTER_SHOW_SCREEN_3);
    }

    /**
     * Show Screen3
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function showScreen3()
    {
        return $this->checkStepAndRedirect(FLAG_THREE);
    }

    /**
     * Verified Register
     *
     * @param $verifiedToken
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verifiedRegister($verifiedToken)
    {
        $this->verifiedRegisterRepository->verifiedUser($verifiedToken);
        session()->put('step', FLAG_FOUR);
        return redirect()->route(REGISTER_SHOW_SCREEN_4);
    }

    /**
     * Show Screen4
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function showScreen4()
    {
        $statusStep4 = session()->get('step4_status');
        if ($statusStep4 == ACTIVE_FAIL || $statusStep4 == ACTIVE_ERROR_EXPIRY_TIME) {
            return redirect()->route(USER_TOP);
        }
        return $this->checkStepAndRedirect(FLAG_FOUR);
    }

    /**
     * Check Step And Redirect
     *
     * @param $step
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function checkStepAndRedirect($step)
    {
        if (!session()->exists('step')) {
            return abort(404);
        }
        $stepSession = session()->get('step');
        if ($step == $stepSession) {
            return view('register.step' . $step);
        }
        if ($step == FLAG_ONE && $stepSession == FLAG_TWO) {
            session()->put('step', FLAG_ONE);
            return view('register.step' . $step);
        }
        return view('register.step' . $stepSession);
    }

    /**
     * Show screen register normal
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showScreenNormal()
    {
        return view('register.social');
    }

    /**
     * Show screen register normal step 2
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showStep2Normal()
    {
        return view('register.social_step2');
    }
}

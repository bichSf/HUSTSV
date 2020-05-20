<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Repositories\Profile\ProfileRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * @var ProfileRepositoryInterface|\App\Repositories\Profile\ProfileRepositoryInterface
     */
    private $profileRepository;

    /**
     * ProfileController constructor.
     * @param ProfileRepositoryInterface $profileRepository
     */
    public function __construct( ProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    /**
     * Redirect create profile
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function create()
    {
        $user = Auth::user();
        if (!isset($user) || $user->role != LEADER) {
            return abort(404);
        }
        return view('profile.teams.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request)
    {
        $request['user_id'] = Auth::user()->id;
        return response()->json($this->profileRepository->saveProfile($request->all()));
    }
}

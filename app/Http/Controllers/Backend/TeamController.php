<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\c;
use App\Http\Requests\TeamRequest;
use App\Repositories\Team\TeamRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * @var TeamRepositoryInterface
     */
    private $teamRepository;

    /**
     * TeamController constructor.
     * @param TeamRepositoryInterface $teamRepository
     */
    public function __construct(TeamRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        $request['user_id'] = Auth::user()->id;
        return response()->json($this->teamRepository->saveTeam($request->all()));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('profile.teams.edit');
    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \App\c  $c
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, c $c)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  \App\c  $c
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy(c $c)
//    {
//        //
//    }
}

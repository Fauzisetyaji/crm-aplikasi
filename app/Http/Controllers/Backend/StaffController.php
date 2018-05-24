<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Staff;

class StaffController extends Controller
{

    /**
     * The Staff instance.
     *
     * @var \App\Models\Staff
     */
    protected $staff;

    /**
     * Create a new controller instance.
     */
    public function __construct(Staff $staff)
    {
        $this->staff = $staff;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->staff->with('user')->orderBy('created_at', 'asc')->get();

        return view('backend.master.staff.index', [ 'list' => $list ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.master.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'username' => $request->email,
            'password' => bcrypt($request->tgl_lahir),
            'roles' => 'staff',
            'verified' => true,
        ]);

        $this->staff->create([
            'nm_staff' => $request->nm_staff,
            'tgl_lahir' => Carbon::parse($request->tgl_lahir),
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'user_id' => $user->id
        ]);

        return redirect()->route('staff.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $staff = $this->staff->find($id);

        return view('backend.master.staff.edit', [ 'staff' => $staff ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->merge(['tgl_lahir' => Carbon::parse($request->tgl_lahir)]);
        $staff = $this->staff->find($id);
        $staff->update($request->all());

        return redirect(route('staff.index'))->with('success', __('Staff has been successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $staff = $this->staff->find($id);
        
        $staff->delete();
        $staff->user->delete();

        return redirect(route('staff.index'))->with('success', __('Staff has been successfully deleted'));
    }
}

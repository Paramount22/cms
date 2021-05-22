<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveLeaveRequest;
use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.leave.index', [
            'leaves' => Leave::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leaves = Leave::latest()->where('user_id', auth()->user()->id)->get();
        return view('admin.leave.create', compact('leaves'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveLeaveRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $data['message'] = '';
        $data['status'] = 0;
        Leave::create($data);
        return redirect()->back()->with('success', 'Leave created');
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
    public function edit($id)
    {
        return view('admin.leave.edit', [
           'leave' => Leave::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveLeaveRequest $request, $id)
    {
        $data = $request->all();
        $leave = Leave::findOrFail($id);
        $data['user_id'] = auth()->id();
        $data['message'] = '';
        $data['status'] = 0;
        $leave->update($data);
        return redirect()->route('leaves.create')->with('success', 'Leave updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Leave::findOrFail($id)->delete();
        return redirect()->route('leaves.create')->with('success', 'Leave deleted');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function acceptReject(Request  $request, $id)
    {
        $status = $request->status;
        $message = $request->message;
        $leave = Leave::findOrFail($id);
        $leave->update([
            'status' => $status,
            'message' => $message
        ]);
        return redirect()->route('leaves.index')->with('success', 'Leave updated');
    }
}

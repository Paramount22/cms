<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveNoticeRequest;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
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
        return view('admin.notice.index', [
           'notices' => Notice::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.create');
    }


    /**
     * @param SaveNoticeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SaveNoticeRequest $request)    {

        Notice::create($request->all());
        return redirect()->route('notices.index')->with('success', 'Notice created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        //
    }


    /**
     * @param Notice $notice
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Notice $notice)
    {
        return view('admin.notice.edit', [
           'notice' => $notice
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveNoticeRequest $request, Notice $notice)
    {
        $notice->update($request->all());
        return redirect()->route('notices.index')->with('success', 'Notice updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        $notice->delete();
        return redirect()->route('notices.index')->with('success', 'Notice deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popups = Popup::orderBy('id', 'DESC')->get();
        return view('popups.index', compact('popups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('popups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "title"  => "required",
            "text"   => "required",
            "status" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->except('_token');
        $data['key'] = Str::random(30);

        Popup::create($data);

        return redirect()->route('popups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $popup  = Popup::find($id);
        $script = '<script src="'.url('').'/api/use_popup/'.$popup->key.'"></script>';
        return view('popups.show', compact('popup', 'script'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $popup = Popup::find($id);
        return view('popups.edit', compact('popup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "title"  => "required",
            "text"   => "required",
            "status" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->except("_token", '_method');
        $popup = Popup::find($id);

        $popup->update($data);

        return redirect()->route('popups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $popup = Popup::find($id);
        $popup->delete();
        return redirect()->route('popups.index');
    }

    /**
     * Activate and Inactivate the Popup with @param
     * @param $id
     */
    public function changeStatus($id){
        $popup = Popup::find($id);
        if($popup['status']==1){
            $popup->update(['status' => 0]);
        }else{
            $popup->update(['status' => 1]);
        }
        return redirect()->route('popups.index');
    }

    // /**
    //  * Call the popup with current key
    //  * Showing only active popups
    //  * Update displayed popup views
    //  * @param $key
    //  */
    // public function showPopup($key){
    //     $popup  = Popup::where('key', $key)->first();
    //     // If status is inactive, then returning false and not showing the popup
    //     if($popup->status==0){
    //         return false;
    //     }else{
    //         // Update Views count for loaded Popups
    //         $popup->update(['view_count' => $popup->view_count + 1]);
    //         return view('popups.popup', compact('popup'));
    //     }
    // }
}

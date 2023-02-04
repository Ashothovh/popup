<?php

namespace App\Http\Controllers\api;

use App\Models\Popup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Input\Input;

class ApiController extends Controller
{
    /**
     * Call the popup with current key
     * Showing only active popups
     * Update displayed popup views
     * @param $key
     */
    public function showPopup($key){
        $popup  = Popup::where('key', $key)->first();
        $url = url('').'/api/add_view';
        // If status is inactive, then returning false and not showing the popup
        if($popup->status==0){
            return false;
        }else{
            return view('popups.popup', compact('popup', 'url'));
        }
    }

    /**
     * Update views count when popup is opened
     * Ajax call method
     * @param $request
     */
    public function updateViewsCount(Request $request){
        $key = $request->key;
        $popup  = Popup::where('key', $key)->first();
        $popup->update(['view_count' => $popup->view_count + 1]);
        return true;
    }
}

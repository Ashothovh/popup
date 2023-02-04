<?php

namespace App\Http\Controllers\api;

use App\Models\Popup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        // If status is inactive, then returning false and not showing the popup
        if($popup->status==0){
            return false;
        }else{
            // Update Views count for loaded Popups
            $popup->update(['view_count' => $popup->view_count + 1]);
            return view('popups.popup', compact('popup'));
        }
    }
}

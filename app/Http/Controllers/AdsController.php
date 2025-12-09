<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;

class AdsController extends Controller
{
    public function index(){   
        $home = Ad::where('page' , 'home')->get();     
        $servises = Ad::where('page' , 'servises')->get();     
        $packages = Ad::where('page' , 'packages')->get();     
        $shop = Ad::where('page' , 'shop')->get();     
        return view('backend.Ads.index_datatable' , compact('home' , 'servises' , 'packages' , 'shop'));
    }
    
    public function store(Request $request){
        $request->validate([
            'page'   => 'required',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $ad = new Ad();
        $ad->page   = $request->page;
        
        if (!file_exists(public_path('uploads/ads'))) {
            mkdir(public_path('uploads/ads'), 0777, true);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $imageName = time() . '_' . uniqid() . '.' . $img->extension();
                $img->move(public_path('uploads/ads'), $imageName);
                Ad::create([
                    'page'   => $request->page,
                    'image'  => 'uploads/ads/' . $imageName,
                ]);
            }
        }

        
        $ad->save();
    
        return redirect()->back()->with('success', 'تم حفظ الصور بنجاح ✅');
    }
}

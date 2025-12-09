<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;

class AdsController extends Controller
{
    public function index(){   
        $home = Ad::where('page' , 'home')->get();     
        $services = Ad::where('page' , 'services')->get();     
        $packages = Ad::where('page' , 'packages')->get();     
        $shop = Ad::where('page' , 'shop')->get();     
        return view('backend.Ads.index_datatable' , compact('home' , 'services' , 'packages' , 'shop'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'page'   => 'required',
            'images' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        
        $img = $request->file('images');
        
        if (!file_exists(public_path('uploads/ads'))) {
            mkdir(public_path('uploads/ads'), 0777, true);
        }
    
        if ($request->hasFile('images')) {
            $imageName = time() . '_' . uniqid() . '.' . $img->extension();
            $img->move(public_path('uploads/ads'), $imageName);
            Ad::create([
                'page'  => $request->page,
                'status'=> 1,
                'image' => 'uploads/ads/' . $imageName,
            ]);
        }
        
        return redirect()->back()->with('success', 'تم حفظ الصور بنجاح ✅');
    }
    

    public function destroy($id){
        $Ad = Ad::findOrFail($id);
        $Ad->delete();
        
        return response()->json(['success' => true]);
    }
    
    public function updateStatus(Request $request, $id){
        $ad = Ad::findOrFail($id);
        $ad->status = $request->status;
        $ad->save();
    
        return response()->json(['success' => true]);
    }

}

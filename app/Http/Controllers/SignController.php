<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use App\Services\TaqnyatSmsService;
use Modules\Wallet\Models\Wallet;
use Modules\Booking\Models\Booking;
use App\Models\LoyaltyPoint;
use App\Models\reject;
use Modules\Promotion\Models\Coupon;
use Modules\Booking\Models\BookingService;


class SignController extends Controller
{
    public function index()
    {
        return view("components.frontend.auth.signup" );
    }

    public function store(Request $request)
    { 
        $validated = $request->validate([
            'username' => 'required|string|max:191|unique:users,username',
            'mobile'   => 'required|string|max:20|unique:users,mobile',
        ]);

      
        
        // $smsService = new TaqnyatSmsService();
        // $phone = $smsService->validatePhoneNumber($validated["mobile"]); 
        // return $phone;
        // if (!$phone) {
        //     return redirect()->back()->with('error', __('messages.invalid_phone'));
        // }

         $user = User::create([
            'first_name' => $validated['username'],
            'last_name' => $validated['username'],
            'username' => $validated['username'],
            'mobile'   => $validated['mobile'],
            'gender'   => 'female', // افتراضي
            'status'   => 1,
        ]);

        $user->assignRole('user');
        // return $user;
        // $user->sendEmailVerificationNotification();
        // return redirect()->back()->with('error', __('messages.invalid_phone'));

        return redirect()->route('profile');
        
    }
            
    public function login()
    {
        return view("components.frontend.auth.signin");
    }
        
    public function verify(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:191',
            'mobile'   => 'required|string|max:20',
        ]);
        $user = \App\Models\User::where('username', $data['username'])->where('mobile', $data['mobile'])->first();
    
        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();
                if ($request->session()->has('temp_booking')) {
                    $temp = $request->session()->get('temp_booking');
                    $data = $temp['data'];
                    $btn_value = $temp['btn_value'];
                    $this->complateTempBookings($data,$btn_value);
                    session()->forget('temp_booking');
                    if ($btn_value == 'cart') {
                        return redirect()->to('/cart')->with('success', 'تم تحويل الحجز بنجاح');
                    } elseif ($btn_value == 'payment') {
                        return redirect()->to('/payment?ids=1')->with('success', 'تم تحويل الحجز بنجاح');
                    }
                }
            return redirect()->to('/')->with('success', __('messages.login_successfully'));
        }
    
        return back()->withErrors([
            'username' => __('messages.invalid_credentials'),
        ])->withInput();
    }
    
    public function profile()
    {
        
        $baseQuery = Booking::with('service.service', 'service.employee')->whereHas('service')->where('created_by', auth()->user()->id)->whereNull('deleted_by');
        
        $pending = (clone $baseQuery)->where('status', '!=', 'completed')->whereNull('deleted_by')->count();
        
        $completed = (clone $baseQuery)->where('payment_status', 1)->where('status', 'completed')->count();

        $coupons = Coupon::with('promotion')->where('is_expired', 0)->where('use_limit', '>=', 1)->count();    

        $user = auth()->user();
    
        $wallet = Wallet::where('user_id', $user->id)->first();
        $balance = $wallet ? $wallet->amount : 0.00;
    
        $points = LoyaltyPoint::where('user_id', $user->id)->value('points') ?? 0;
        

        $bookings = Booking::with('service.service','service.employee')
            ->where('created_by', $user->id)
            ->whereHas('services')
            ->whereNull('deleted_by')
            ->get();

        return view('components.frontend.auth.profile', compact('user', 'balance', 'points' , 'bookings' , 'pending' , 'completed' , 'coupons'));
    }

    public function update(Request $request, $id) // done
    {
        $request->validate([
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'mobile'         => 'required|string|max:20',
            'email'          => 'required|email|max:255|unique:users,email,' . $id,
            'address'        => 'nullable|string|max:255',
            'city'           => 'nullable|string|max:255',
            'country'        => 'nullable|string|max:255',
            'date_of_birth'  => 'nullable|date|before:today',
            'profile_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
    
        $data = [];
    
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = 'user_' . $id . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('profile_images'), $imageName);
            $data['avatar'] = 'profile_images/' . $imageName;
        } else {
            $data['avatar'] = auth()->user()->avatar;
        }

    
        $data['first_name']    = $request->first_name;
        $data['last_name']     = $request->last_name;
        $data['email']         = $request->email;
        $data['mobile']        = $request->mobile;
        $data['date_of_birth'] = $request->date_of_birth;
        $data['address']       = $request->address;
        $data['city']          = $request->city;
        $data['country']       = $request->country;
    
        User::where('id', $id)->update($data);
    
        return redirect()->back()->with('success', __('messages.profile_updated'));
    }

    public function coupon()
    {

    $coupons = Coupon::with('promotion')->where('is_expired', 0)->where('use_limit', '>=', 1)->get();    

    return view('components.frontend.auth.coupon', compact('coupons'));
    }
    
    public function myBookings()
    {
    $reasons = reject::all();
    

    $bookings = Booking::with('service.service','service.employee')->where('created_by', auth()->user()->id)->whereNull('deleted_by')->where('status', '!=', 'completed')->get();

    return view('components.frontend.auth.my-bookings', compact('bookings','reasons'));
    }
    
    public function destroy_myBooking(Request $request,$id)
    {
        $user = auth()->user();
    
        $booking = Booking::find($id);
        
        $booking->delete();
        
        $reasons = $request->input('reasons', []);
         
        foreach ($reasons as $reasonId) {
            $reason = Reject::find($reasonId);
            if ($reason) {
                $reason->increment('count');
            }
        }
    
        return response()->json(['success' => true, 'message' => __('messagess.item_removed_from_cart')]);
    } 
    
    public function complateBookings()
    {
    
    $bookings = Booking::with('service.service' ,'service.employee')->where('created_by', auth()->user()->id)->whereNull('deleted_by')->where('payment_status', 1)->where('status', '=', 'completed')->get();

    return view('components.frontend.auth.complate-bookings', compact('bookings'));
    }

    public function logout(Request $request) // done
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/signin')->with('success', 'تم تسجيل الخروج بنجاح');
}

    public function apiStore(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile' => 'required|string|unique:users,mobile',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'mobile' => $validated['mobile'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'gender' => 'female',
            'status' => 1,
        ]);
    
        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user
        ], 201);
    }
    private function complateTempBookings($data,$btn_value){
        $user = auth()->user();
        if (!empty($data['services'])) {
            foreach ($data['services'] as $service) {
                if (!empty($service['subServices'])) {
                    foreach ($service['subServices'] as $sub) {
                        $subId = $sub['id'];
                        $date = $sub['date'];
                        $time = $sub['time'];
                        $duration = $sub['duration'];
                        $price = $sub['price'];
                        $staffId = $sub['staffId'];
                        $startDateTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $date . ' ' . $time);
                        
                        $booking = new Booking();
                        $booking->note = 'العميل: ' . $user->first_name . '، الجوال: ' .  $user->mobile . '، الخدمة: ' . $subId;
                        $booking->start_date_time = $startDateTime;
                        $booking->user_id         = $user->id;
                        $booking->branch_id       = $data['branch'] ?? 1;
                        $booking->created_by      = $user->id;
                        $booking->status          = 'pending';
                        $booking->location       =  null;
                        $booking->payment_type       =  $btn_value;
                        $booking->save();
                        
                        //  الحجز التاني
                        $bookingService = new BookingService();
                        $bookingService->booking_id       = $booking->id;
                        $bookingService->service_id       = $subId;
                        $bookingService->employee_id      = $staffId;
                        $bookingService->start_date_time  = $startDateTime;
                        $bookingService->service_price    = \Modules\Service\Models\Service::find($subId)->default_price ?? 0;
                        $bookingService->duration_min     = $duration;
                        $bookingService->sequance         = 1;
                        $bookingService->created_by      = $user->id;
                        $bookingService->save();

                        $loyalty = \App\Models\LoyaltyPoint::firstOrCreate(
                            ['user_id' => $user->id],
                            ['points' => 0]
                        );
                    }
                }
            }
        }
    }
}


<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class AddressController extends Controller
{
    public function AddAddress(Request $request){
        $data=$request->validate([
            'address_type'=>['required'],
            'recipient_name'=>['required'],
            'address_line1'=>['required'],
            'city'=>['required'],
            'state'=>['required'],
            'postal_code'=>['required'],
            'phone_number'=>['required', 'string', 'max:10'],
        ]);
        DB::beginTransaction();
        try{
            if(!empty($request->address_line2))
                $data['address_line2']=$request->address_line2;
            if(!empty($request->is_default) && $request->is_default == true){
                $data['is_default']=true;
                Address::where('user_id', $request->user()->id)
                    ->update(['is_default' => false]);
            }
            $data['user_id']=$request->user()->id;
            $address = new Address($data);
            if($address->save()){
                DB::commit();
                return response()->json([
                    'status' => 'success',
                    'message' => 'User address added'
                ], 200);
            }
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Operation failed'
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }
    public function updateAddress(Request $request)
    {
        $data = $request->validate([
            'address_id' => ['required', 'exists:addresses,id'],
            'address_type' => ['required'],
            'recipient_name' => ['required'],
            'address_line1' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'postal_code' => ['required'],
            'phone_number' => ['required', 'string', 'max:10', 'min:10'],
        ]);

        DB::beginTransaction();
        
        try {
            if (!empty($request->address_line2)) {
                $data['address_line2'] = $request->address_line2;
            }
            $address = Address::where('id', $request->address_id)
                            ->where('user_id', $request->user()->id)
                            ->first();

            if (!$address) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Address not found or unauthorized'
                ], 404);
            }

            if (!empty($request->is_default) && $request->is_default == true) {
                $data['is_default'] = true;
                Address::where('user_id', $request->user()->id)
                    ->where('id', '!=', $request->address_id)
                    ->update(['is_default' => false]);
            }

            if ($address->update($data)) {
                DB::commit();
                return response()->json([
                    'status' => 'success',
                    'message' => 'User address updated'
                ], 200);
            }

            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Address update failed'
            ], 500);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }
}

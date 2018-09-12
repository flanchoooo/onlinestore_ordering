<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\EnquiryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class EnquiryController extends Controller
{

    public function viewAdd(){
        $items = EnquiryType::all(['id', 'name']);

        return view('enquiries.add', compact('items', $items));
    }

    public function getEnquiries(){

        return Enquiry::whereUserId(Auth::user()->id)
                        ->get();

    }

    public function viewEnquiry($id){
        $enquiry = Enquiry::where('id', '=', $id)
            ->where('user_id', '=', Auth::user()->id)
            ->first();
        if (empty($enquiry)) {
            abort(404);
        };
        $items = EnquiryType::all(['id', 'name']);

        $data = ['enquiry' => $enquiry, 'items' => $items];

        return view('enquiries.enquiry')->with($data);
    }

    public function create(Request $request){

        $this->addRules($request->all())->validate();
        DB::beginTransaction();

        if ($request->payment_method == 'Medical Aid') {
            $medical_aid = 1;
        } else {
            $medical_aid = 0;
        }

        try {
            $enquiry = Enquiry::create([
                'name'            => $request->name,
                'description'     => $request->description,
                'status'          => 'Waiting For Quotation',
                'user_id'         => Auth::user()->id,
                'enquiry_type_id' => $request->type,
                'payment_method'  => $request->payment_method,
                'address'         => $request->address,
                'medical_aid'     => $medical_aid,
            ]);

            $enquiry->addMediaFromRequest('file')->toMediaCollection('enquiries');
            $enquiry->addMediaFromRequest('prescription_file')->toMediaCollection('prescription');

            if ($request->payment_method == 'Medical Aid') {
                $enquiry->addMediaFromRequest('medical_aid_file')->toMediaCollection('medical_aid');
            }

            DB::commit();

            return redirect()->back()->with(['status' => 'Enquiry Added Successfully']);

        } catch (\Exception $e) {
            DB::rollback();

            Log::debug($e->getMessage());

            return redirect()->back()
                ->with(['status' => 'Document upload failed']);
        }


    }

    private function addRules(array $data){
        return Validator::make($data, [
            'name'             => 'required|string|max:255',
            'description'      => 'required|string',
            'payment_method'   => 'required|string',
            'address'          => 'required|string',
            'type'             => 'required|numeric',
            'file_description' => 'string|max:255',
        ]);


    }

    public function update(Request $request){

        $this->addRules($request->all())->validate();
        $enquiry = Enquiry::find($request->id);

        //return $request->all();
        DB::beginTransaction();
        try {
            $enquiry->name = $request->name;
            $enquiry->enquiry_type_id = $request->type;
            $enquiry->description = $request->description;
            $enquiry->save();

            if ($request->file) {
                $enquiry->addMediaFromRequest('file')->toMediaCollection('enquiries');

            }


            DB::commit();

            return redirect()->back()->with(['status' => 'Enquiry Updated Successfully']);
        } catch (\Exception $e) {
            return $e;
            DB::rollback();

            Log::debug($e->getMessage());

            return redirect()->back()
                ->with(['status' => 'Error Occurred']);
        }


    }

    public function deleteMedia(Request $request){
        Enquiry::find($request->id)->deleteMedia($request->media_id);

        return redirect()->back()->with(['status' => 'File Deleted!']);

    }
}

<?php

namespace App\Http\Controllers;

use Log;
use App\Models\TradeLicence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TradeLicenceController extends Controller
{
    //

    public function new_trade_licence_resigter( )
    {
        return view('trade_licence_resigter');
    }


    public function store(Request $request )
    {
        // 1. Validation (CRITICAL STEP)
        // This validates all 29 fields based on your schema.

        $validatedData = $request->validate([
            // Account & License Details
            'email' => 'required|email|unique:trade_licences,email',
            'applicant_image' => 'nullable|file', // Assuming you handle file uploads separately
            't_issue_date' => 'nullable|string',
            't_issue_time' => 'nullable|string', // Validates time format
            'licence_number' => 'required|string',

            // Business & Applicant Details
            'business_name' => 'nullable|string|max:255',
            'applicant_name' => 'required|string|max:255',
            'father_husband_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'business_nature' => 'nullable|string|max:255',
            'business_type' => 'nullable|string|max:255',
            'business_address' => 'nullable|string|max:255',
            'regional' => 'nullable|string|max:255',
            'area' => 'nullable|string|max:255',
            'word_no' => 'nullable|string|max:50',
            'nid_number' => 'required|string|unique:trade_licences,nid_number', // Assumed to be unique
            'mobile_number' => 'required|string|max:20',
            'fiscal_year' => 'nullable|string|max:10',
            'business_start_date' => 'nullable|string',

            // Present Address Details (Setting all as nullable if they might be empty)
            'pres_holding' => 'nullable|string|max:100',
            'pres_road' => 'nullable|string|max:100',
            'pres_village' => 'nullable|string|max:100',
            'pres_postcode' => 'nullable|string|max:10',
            'pres_thana' => 'nullable|string|max:100',
            'pres_district' => 'nullable|string|max:100',
            'pres_division' => 'nullable|string|max:100',

            // Permanent Address Details
            'perm_holding' => 'nullable|string|max:100',
            'perm_road' => 'nullable|string|max:100',
            'perm_village' => 'nullable|string|max:100',
            'perm_postcode' => 'nullable|string|max:10',
            'perm_thana' => 'nullable|string|max:100',
            'perm_district' => 'nullable|string|max:100',
            'perm_division' => 'nullable|string|max:100',


        ]);

     if ($request->hasFile('applicant_image')) {
    $image = $request->file('applicant_image');

    $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
    $path = $image->storeAs('licences_images', $filename, 'public');

    $validatedData['applicant_image'] = Storage::url($path);
} else {
    $validatedData['applicant_image'] = null;
}

$validatedData['user_id'] = Auth::id();

$licence = TradeLicence::create($validatedData);


            return redirect('/')->with('success', 'Trade Licence application saved successfully!');

    }



    public function edit_trade_licence($id){

        $licence = TradeLicence::findOrFail($id);
        return view('/edit_trade_licence',compact('licence'));
    }


    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            // Account & License Details
            'email' => 'required|email',
            'applicant_image' => 'nullable|file', // Assuming you handle file uploads separately
            't_issue_date' => 'nullable|string',
            't_issue_time' => 'nullable|string', // Validates time format
            'licence_number' => 'required|string',

            // Business & Applicant Details
            'business_name' => 'required|string|max:255',
            'applicant_name' => 'required|string|max:255',
            'father_husband_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'business_nature' => 'nullable|string|max:255',
            'business_type' => 'required|string|max:255',
            'business_address' => 'nullable|string|max:255',
            'regional' => 'nullable|string|max:255',
            'area' => 'nullable|string|max:255',
            'word_no' => 'nullable|string|max:50',
            'nid_number' => 'required|string', // Assumed to be unique
            'mobile_number' => 'required|string|max:20',
            'fiscal_year' => 'required|string|max:10',
            'business_start_date' => 'nullable|string',

            // Present Address Details (Setting all as nullable if they might be empty)
            'pres_holding' => 'nullable|string|max:100',
            'pres_road' => 'nullable|string|max:100',
            'pres_village' => 'nullable|string|max:100',
            'pres_postcode' => 'nullable|string|max:10',
            'pres_thana' => 'nullable|string|max:100',
            'pres_district' => 'nullable|string|max:100',
            'pres_division' => 'nullable|string|max:100',

            // Permanent Address Details
            'perm_holding' => 'nullable|string|max:100',
            'perm_road' => 'nullable|string|max:100',
            'perm_village' => 'nullable|string|max:100',
            'perm_postcode' => 'nullable|string|max:10',
            'perm_thana' => 'nullable|string|max:100',
            'perm_district' => 'nullable|string|max:100',
            'perm_division' => 'nullable|string|max:100',
        ]);



$licence = TradeLicence::findOrFail($id);

// --- Handle Image Update ---
if ($request->hasFile('applicant_image')) {

    // A. Delete old image if it exists
    if (!empty($licence->applicant_image)) {
        // Convert "/storage/licences_images/abc.jpg" → "licences_images/abc.jpg"
        $oldPath = str_replace('/storage/', '', $licence->applicant_image);

        // Delete from 'public' disk (storage/app/public/)
        Storage::disk('public')->delete($oldPath);
    }

    // B. Store the new image
    $image = $request->file('applicant_image');
    $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
    $path = $image->storeAs('licences_images', $filename, 'public');

    // C. Save public URL in database
    $validatedData['applicant_image'] = '/storage/' . $path;
}

// --- Update the record ---
$licence->update($validatedData);

        return redirect('/')->with('success', 'Application updated successfully!');
    }


    // Handles the 'Delete' form submission (DELETE /trade_licence/123)
    public function destroy($id)
    {
        TradeLicence::destroy($id);
        return redirect('/')->with('success', 'Licence deleted.');
    }


    public function trade_licence_view($id){

         $licence = TradeLicence::findOrFail($id);
        return view('/trade_licence',compact('licence'));

    }




}

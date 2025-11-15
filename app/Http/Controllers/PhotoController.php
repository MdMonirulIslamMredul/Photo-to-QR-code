<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
    {
        // Fetch all photos from the database
        $photos = Photo::all();
        $qrCodes = [];

        foreach ($photos as $photo) {
            //$photoUrl = asset($photo->qr_url);
            // Assuming the route is named 'dakhila.print_qr'
         $photoUrl = 'http://photo_to_qr_code.test/dakhila-print/'.$photo->qr_url;
            // Generate a QR code for each photo's URL
            $qrCodes[$photo->id] = QrCode::size(250)->generate($photoUrl);
        }

        return view('photo.gallery', compact('photos', 'qrCodes'));
    }
/**
     * Show the form for creating/editing a photo and display the QR code.
     */
    public function create()
    {
        $photo = Photo::first();
        $qrCode = null;

        if ($photo) {
            // 1. Get the full public URL of the uploaded image
            $photoUrl = asset($photo->file_path);

            // 2. Generate the QR code SVG content
            // We use 'generate' to get the raw SVG string for easy display in Blade.
            // You can customize size, color, margin, etc.
            $qrCode = QrCode::size(250)
                            ->generate($photoUrl);
        }

        // Pass both the photo object and the generated QR code (if any) to the view
        return view('photo.upload', compact('photo', 'qrCode'));
    }

    /**
     * Handle single photo upload (from the upload page) - create or replace the "first" photo.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'photo_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    //     ]);

    //     $file = $request->file('photo_file');
    //     $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
    //     $file->move(public_path('uploads'), $filename);

    //     // If a photo record exists, replace it; otherwise create a new one
    //     $photo = Photo::first();
    //     if ($photo) {
    //         // remove old file
    //         $old = public_path($photo->file_path);
    //         if (file_exists($old)) {
    //             @unlink($old);
    //         }
    //         $photo->file_path = 'uploads/' . $filename;
    //         $photo->original_name = $file->getClientOriginalName();
    //         $photo->save();
    //     } else {
    //         Photo::create([
    //             'file_path' => 'uploads/' . $filename,
    //             'original_name' => $file->getClientOriginalName(),
    //         ]);
    //     }

    //     return redirect()->route('gallery.index')->with('success', 'Image uploaded successfully!');
    // }

    /**
     * Handle the incoming photo upload or replacement.
     */
public function new_store(Request $request)
    {

$request->validate([
    'new_photos' => 'required|array',
    // 1. Remove 'image' rule as it conflicts with PDF.
    // 2. Add 'pdf' to the list of allowed mimes.
    'new_photos.*' => 'mimes:jpeg,png,jpg,gif,svg,webp,pdf|max:2048',
]);

        // Loop through all uploaded files
        foreach ($request->file('new_photos') as $file) {

            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            // Store directly in public/uploads folder
            $file->move(public_path('uploads'), $filename);

                $randomQr = Str::random(30) . '09';

            // Create a new database record for each file
            Photo::create([
                'file_path' => 'uploads/' . $filename,
                'original_name' => $file->getClientOriginalName(),
                'qr_url' => $randomQr,
            ]);
        }

        return redirect()->route('gallery.index')->with('success', 'Images uploaded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        // Show the individual photo replace form
        $qrCode = QrCode::size(250)->generate(asset($photo->file_path));
        return view('photo.upload', compact('photo', 'qrCode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        // Validate incoming single file
        $request->validate([
            'photo_file' => 'required|mimes:jpeg,png,jpg,gif,svg,webp,pdf|max:2048',
        ]);

        // Delete old file if exists
        $oldPath = public_path($photo->file_path);
        if (file_exists($oldPath)) {
            @unlink($oldPath);
        }

        // Store new file in public/uploads
        $file = $request->file('photo_file');
        $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);

        // Update DB record
        $photo->file_path = 'uploads/' . $filename;
        $photo->original_name = $file->getClientOriginalName();
        $photo->save();


        return view('photo.upload', compact('photo'));

       // return redirect()->route('upload')->with('success', 'Image replaced successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
 public function destroy(Photo $photo)
    {
        // 1. Delete the file from public/uploads
        $filePath = public_path($photo->file_path);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // 2. Delete the record from the database
        $photo->delete();

        return redirect()->route('gallery.index')->with('success', 'Image deleted successfully!');
    }


        public function printByQr($qr_url)
    {
        // 1. Find the Dakhila record using the 'qr_url' column.
        // If not found, abort with a 404 error.
        $dakhila = Photo::where('qr_url', $qr_url)->first();

        // 2. Return the view located at 'dakhila-print/print.blade.php'
        // and pass the $dakhila object to the view.
        return view('dakhila-print.print', compact('dakhila'));
    }
}

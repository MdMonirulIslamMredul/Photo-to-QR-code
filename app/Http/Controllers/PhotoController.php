<?php

namespace App\Http\Controllers;

use App\Models\Photo;
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
            $photoUrl = asset($photo->file_path);

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
            $qrCode = QrCode::size(200)
                            ->generate($photoUrl);
        }

        // Pass both the photo object and the generated QR code (if any) to the view
        return view('photo.upload', compact('photo', 'qrCode'));
    }

    /**
     * Handle the incoming photo upload or replacement.
     */
public function new_store(Request $request)
    {
        // Note the validation rule uses 'nullable|array' for the container
        // and 'required|image' for each item in the array.
        $request->validate([
            'new_photos' => 'required|array',
            'new_photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Loop through all uploaded files
        foreach ($request->file('new_photos') as $file) {

            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            // Store directly in public/uploads folder
            $file->move(public_path('uploads'), $filename);

            // Create a new database record for each file
            Photo::create([
                'file_path' => 'uploads/' . $filename,
                'original_name' => $file->getClientOriginalName(),
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        //
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
}

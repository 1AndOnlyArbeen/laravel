<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileUpload;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;  



class fileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //show the image to the users in the view after uploading into the csulsudoudinary

        public function index (){
            if(Auth::check()){
                $images = FileUpload::all();
                return view('fileupload', compact('images'));
            }
            return redirect()->route('login')->with('error', 'Please login to view the images.');
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    

        // getting the file from the form
        $file = $request->file('photo');

        //validating the file

        $request->validate([

            'photo' => 'required|image|mimes:png,jpg,jpeg|max:10000',
        ]);
        
        // $extension = $file->extension();
        // $extension = time().'-'. $file->hashName();
        // // $extension = $file->getClientMimeType();oudinary\Cloudinary::upload()
        // $extension =$file->getSize();
        // return $extension;
        
        //saving file into the local path into the public folder even adding the time 
        $fileName = time().'_'. $request->file('photo')->getClientOriginalName();
        $localPath = $request->file('photo')->storeAs('image',$fileName, 'public');
        // get the fullpath 
        $fullPath = storage_path('app/public/'.$localPath);

        // saving the image in the db  note : often we dont save it into the db but im using just for leanring purpose , latern we will add it into the.

        //uploading the localfile into the cloudinary 
        $result = Cloudinary::uploadApi()->upload($fullPath, [
            'folder' => 'imagesFolder'
        ]);
        $cloudinaryUrl = $result['secure_url'];

        FileUpload::create([

        'cloudinary_url' => $cloudinaryUrl,
        'file_name' => $fileName,

        ]);

        //deleting the lcoal file after uploading into the cloudinary 
        Storage::disk('public')->delete($localPath);


           

        

        // redirecting to the same fileupload after success with success message 
        return redirect()->route('fileupload.index')->with('success', "User image uploaded successfully !");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

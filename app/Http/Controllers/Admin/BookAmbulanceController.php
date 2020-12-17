<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\BookAmbulance;
use Illuminate\Http\Request;
use Image;
use File;

class BookAmbulanceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('bookambulance','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $bookambulance = BookAmbulance::where('facility_name', 'LIKE', "%$keyword%")
                ->orWhere('patient_name', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('city', 'LIKE', "%$keyword%")
                ->orWhere('state', 'LIKE', "%$keyword%")
                ->orWhere('zip', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('date_of_transport', 'LIKE', "%$keyword%")
                ->orWhere('time_of_transport', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $bookambulance = BookAmbulance::paginate($perPage);
            }

            return view('admin.book-ambulance.index', compact('bookambulance'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('bookambulance','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('admin.book-ambulance.create');
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = str_slug('bookambulance','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'facility_name' => 'required',
			'patient_name' => 'required',
			'address' => 'required',
			'city' => 'required',
			'state' => 'required',
			'zip' => 'required',
			'phone' => 'required',
			'email' => 'required',
			'date_of_transport' => 'required',
			'time_of_transport' => 'required'
		]);

            $bookambulance = new bookambulance($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $bookambulance_path = 'uploads/bookambulances/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($bookambulance_path) . DIRECTORY_SEPARATOR. $profileImage);

                $bookambulance->image = $bookambulance_path.$profileImage;
            }
            
            $bookambulance->save();

            return redirect('admin/book-ambulance')->with('flash_message', 'BookAmbulance added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('bookambulance','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $bookambulance = BookAmbulance::findOrFail($id);
            return view('admin.book-ambulance.show', compact('bookambulance'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('bookambulance','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $bookambulance = BookAmbulance::findOrFail($id);
            return view('admin.book-ambulance.edit', compact('bookambulance'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('bookambulance','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'facility_name' => 'required',
			'patient_name' => 'required',
			'address' => 'required',
			'city' => 'required',
			'state' => 'required',
			'zip' => 'required',
			'phone' => 'required',
			'email' => 'required',
			'date_of_transport' => 'required',
			'time_of_transport' => 'required'
		]);
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $bookambulance = bookambulance::where('id', $id)->first();
            $image_path = public_path($bookambulance->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/bookambulances/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/bookambulances/'.$fileNameToStore;               
        }


            $bookambulance = BookAmbulance::findOrFail($id);
             $bookambulance->update($requestData);

             return redirect('admin/book-ambulance')->with('flash_message', 'BookAmbulance updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('bookambulance','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            BookAmbulance::destroy($id);

            return redirect('admin/book-ambulance')->with('flash_message', 'BookAmbulance deleted!');
        }
        return response(view('403'), 403);

    }
}

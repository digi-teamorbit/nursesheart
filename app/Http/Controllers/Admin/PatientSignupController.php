<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PatientSignup;
use Illuminate\Http\Request;
use Image;
use File;

class PatientSignupController extends Controller
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
        $model = str_slug('patientsignup','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $patientsignup = PatientSignup::where('first_name', 'LIKE', "%$keyword%")
                ->orWhere('last_name', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('city', 'LIKE', "%$keyword%")
                ->orWhere('state', 'LIKE', "%$keyword%")
                ->orWhere('zip', 'LIKE', "%$keyword%")
                ->orWhere('date_of_birth', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('insurance_company_name', 'LIKE', "%$keyword%")
                ->orWhere('insurance_number', 'LIKE', "%$keyword%")
                ->orWhere('group_number', 'LIKE', "%$keyword%")
                ->orWhere('insurance_card', 'LIKE', "%$keyword%")
                ->orWhere('driver_liscence', 'LIKE', "%$keyword%")
                ->orWhere('ssn', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('state_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $patientsignup = PatientSignup::paginate($perPage);
            }

            return view('admin.patient-signup.index', compact('patientsignup'));
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
        $model = str_slug('patientsignup','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('admin.patient-signup.create');
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
        $model = str_slug('patientsignup','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'first_name' => 'required',
			'last_name' => 'required',
			'address' => 'required',
			'city' => 'required',
			'state' => 'required',
			'zip' => 'required',
			'date_of_birth' => 'required',
			'phone' => 'required',
			'insurance_company_name' => 'required',
			'insurance_number' => 'required',
			'group_number' => 'required',
			'insurance_card' => 'required',
			'driver_liscence' => 'required',
			'ssn' => 'required',
			'type' => 'required',
			'state_id' => 'required'
		]);

            $patientsignup = new patientsignup($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $patientsignup_path = 'uploads/patientsignups/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($patientsignup_path) . DIRECTORY_SEPARATOR. $profileImage);

                $patientsignup->image = $patientsignup_path.$profileImage;
            }
            
            $patientsignup->save();

            return redirect('admin/patient-signup')->with('flash_message', 'PatientSignup added!');
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
        $model = str_slug('patientsignup','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $patientsignup = PatientSignup::findOrFail($id);
            return view('admin.patient-signup.show', compact('patientsignup'));
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
        $model = str_slug('patientsignup','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $patientsignup = PatientSignup::findOrFail($id);
            return view('admin.patient-signup.edit', compact('patientsignup'));
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
        $model = str_slug('patientsignup','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'first_name' => 'required',
			'last_name' => 'required',
			'address' => 'required',
			'city' => 'required',
			'state' => 'required',
			'zip' => 'required',
			'date_of_birth' => 'required',
			'phone' => 'required',
			'insurance_company_name' => 'required',
			'insurance_number' => 'required',
			'group_number' => 'required',
			'insurance_card' => 'required',
			'driver_liscence' => 'required',
			'ssn' => 'required',
			'type' => 'required',
			'state_id' => 'required'
		]);
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $patientsignup = patientsignup::where('id', $id)->first();
            $image_path = public_path($patientsignup->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/patientsignups/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/patientsignups/'.$fileNameToStore;               
        }


            $patientsignup = PatientSignup::findOrFail($id);
             $patientsignup->update($requestData);

             return redirect('admin/patient-signup')->with('flash_message', 'PatientSignup updated!');
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
        $model = str_slug('patientsignup','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            PatientSignup::destroy($id);

            return redirect('admin/patient-signup')->with('flash_message', 'PatientSignup deleted!');
        }
        return response(view('403'), 403);

    }
}

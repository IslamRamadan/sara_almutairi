<?php

namespace App\Http\Controllers\Backend;

use App\Post;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Post::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('image1', function ($artist) {
                    $url = asset('/storage/' . $artist->img1);
                    return $url;
                })
                ->addColumn('image2', function ($artist) {
                    $url = asset('/storage/' . $artist->img2);
                    return $url;
                })

                ->addColumn('action', function($row){

                    $action = '
                        <a class="btn btn-success"  href="'.route('posts.edit' , $row->id).'" id="edit-user" >View </a>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <a href="'.url('posts/destroy' , $row->id).'" class="btn btn-danger">Delete</a>
                        ';
//

                    return $action;

                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.posts.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){


        return view('dashboard.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $messeges = [

            'title_ar.required'=>"عنوان الخبر باللغه العربيه مطلوب",
            'title_en.required'=>"عنوان الخبر باللغه الانجليزيه مطلوب",
            'description_ar.required'=>"محتوي الجزء الاول باللغه العربيه مطلوب",
            'description_en.required'=>"محتوي الجزء الاول باللغه الانجليزيه مطلوب",
            'description_ar1.required'=>"محتوي الجزء الثانى باللغه العربيه مطلوب",
            'description_en1.required'=>"محتوي الجزء الثانى باللغه الانجليزيه مطلوب",
            'img1.required'=>"صورة الخبر الرئيسيه مطلوبة",
            'img1.mimes'=>" يجب ان تكون الصورة jpg او jpeg او png  ",
            'img1.max'=>" الحد الاقصي للصورة 4 ميجا ",
            'img2.required'=>"صورة الجزء الثاني مطلوبة",
            'img2.mimes'=>" يجب ان تكون الصورة jpg او jpeg او png  ",
            'img2.max'=>" الحد الاقصي للصورة 4 ميجا ",
        ];

        $validator =  Validator::make($request->all(), [

            'title_ar' => ['required'],

            'title_en' => ['required'],

            'description_ar' => ['required'],

            'description_en' => ['required'],

            'description_ar1' => ['required'],

            'description_en1' => ['required'],

            'img1' =>  'required|mimes:jpg,jpeg,png|max:4100',

            'img2' =>  'required|mimes:jpg,jpeg,png|max:4100',



        ], $messeges);

        if ($validator->fails()) {
            Alert::error('خطأ', $validator->errors()->first());
            return back();
        }


        $country = null;
        $country = Post::create($request->except('img1','img2'));


        if ($request->hasfile('img1')) {
            // $images .= 'yes';

            $image = $request->file('img1');
            $original_name = strtolower(trim($image->getClientOriginalName()));
            $file_name = time() . rand(100, 999) . $original_name;
            $path = 'uploads/posts/images/';

            if (!Storage::exists($path)) {
                Storage::disk('public')->makeDirectory($path);
            }
//
//            if(file_exists(storage_path('app/public/'.$path.$file_name)))
//            {
//                unlink(storage_path('app/public/'.$path.$file_name));
//            }

            $country->img1 = $image->storeAs($path, $file_name, 'public');
            $country->save();

        } else {
            Alert::error('خطأ', 'برجاء اختيار صورة الخبر');
            return back();
        }
        if ($request->hasfile('img2')) {
            // $images .= 'yes';

            $image = $request->file('img2');
            $original_name = strtolower(trim($image->getClientOriginalName()));
            $file_name = time() . rand(100, 999) . $original_name;
            $path = 'uploads/posts/images/';

            if (!Storage::exists($path)) {
                Storage::disk('public')->makeDirectory($path);
            }
//
//            if(file_exists(storage_path('app/public/'.$path.$file_name)))
//            {
//                unlink(storage_path('app/public/'.$path.$file_name));
//            }

            $country->img2 = $image->storeAs($path, $file_name, 'public');
            $country->save();

        } else {
            Alert::error('خطأ', 'برجاء اختيار صورة الخبر ');
            return back();
        }

        if ($country){

            session()->flash('success', "success");
            if(session()->has("success")){
                Alert::success('نجح', 'تمت إضافة الخبر');
            }

        }

        return redirect()->route('posts.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

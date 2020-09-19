<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Category;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();
        return view('admin.lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lesson = new Lesson();
        $categories = Category::all();
        return view('admin.lessons.create', compact('lesson', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
        if ($request->hasFile('image') && $request->file('image')->isValid()) {            
            
            $extension = $request->image->extension();           
            $nameFile = "{$request->slug}.{$extension}";   
            $request->file('image')->store('arquivos');      
            $data['image'] = $nameFile;
                                  
        }else
            unset($data['image']);

        Lesson::create($request->all());
        return redirect()->route("lessons.index")->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        $category = Category::find($lesson->category_id);

        return view('admin.lessons.show', compact('lesson', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $categories = Category::all();
        return view('admin.lessons.edit', compact('lesson', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
            
        if($request->hasFile('image') && $request->file('image')->isValid()){

              
            $extension = $request->image->extension();           
            $nameFile = "{$request->slug}.{$extension}";   
            $request->file('image')->store('arquivos');      
            $data['image'] = $nameFile;
    

        }else
            unset($data['image']);
        
        $lesson->update($request->all());
        return redirect()->route('lessons.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('lessons.index')->with('success',true);
    }
}

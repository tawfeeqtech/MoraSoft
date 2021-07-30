<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionsRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();
//            dd($Grades);
        $list_Grades = Grade::all();

        return view('pages.Sections.Sections', compact('Grades', 'list_Grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreSectionsRequest $request)
    {
        try {

            $validated = $request->validated();
            $Sections = new Section();

            $Sections->name_Section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
            $Sections->grade_id = $request->Grade_id;
            $Sections->class_id = $request->Class_id;
            $Sections->status = 1;
            $Sections->save();
            toastr()->success(trans('message_trans.Success'));

            return redirect()->route('Sections.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(StoreSectionsRequest $request)
    {
        try {
            $validated = $request->validated();
            $Sections = Section::findOrFail($request->id);

            $Sections->name_Section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
            $Sections->grade_id = $request->Grade_id;
            $Sections->class_id = $request->Class_id;

            if(isset($request->Status)) {
                $Sections->status = 1;
            } else {
                $Sections->status = 2;
            }

            $Sections->save();
            toastr()->success(trans('message_trans.Update'));

            return redirect()->route('Sections.index');
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        Section::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Sections.index');
    }

    public function getclasses($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("name_class", "id");

        return $list_classes;
    }

}

?>
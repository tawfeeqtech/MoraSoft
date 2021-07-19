<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradeRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $Grades = Grade::all();
        return view('pages.Grades.grade', compact('Grades'));
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
    public function store(StoreGradeRequest $request)
    {

        try {
            $validated = $request->validated();
            $Grade = new Grade();

            $Grade->name = ['en' => $request->Name_en, 'ar' => $request->Name];
            $Grade->notes = $request->Notes;
            $Grade->save();

            toastr()->success(trans('message_trans.Success'));

            return redirect()->route('grade.index');

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
    public function update(StoreGradeRequest $request)
    {

        try {
            $validated = $request->validated();
            $Grades = Grade::findOrFail($request->id);
            $Grades->update([
                $Grades->name = ['ar' => $request->Name, 'en' => $request->Name_en],
                $Grades->notes = $request->Notes,
            ]);
            toastr()->success(trans('message_trans.Update'));
            return redirect()->route('grade.index');
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
        $MyClass_id = Classroom::where('grade_id',$request->id)->pluck('grade_id');

        if($MyClass_id->count() == 0){

            Grade::findOrFail($request->id)->delete();
            toastr()->error(trans('message_trans.Delete'));
            return redirect()->route('grade.index');
        }

        else{

            toastr()->error(trans('grades_trans.delete_Grade_Error'));
            return redirect()->route('grade.index');

        }

    }

}

?>
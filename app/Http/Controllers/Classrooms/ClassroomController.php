<?php 

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $My_Classes = Classroom::all();
//      ddd($My_Classes);
      $Grades = Grade::all();

      return view('pages.Classrooms.classroom',compact('My_Classes','Grades'));
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
  public function store(Request $request)
  {
      try {
          $List_Classes = $request->List_Classes;

          foreach ($List_Classes as $List_Class) {

              $My_Classes = new Classroom();

              $My_Classes->name_class = ['en' => $List_Class['Name_class_en'], 'ar' => $List_Class['Name']];

              $My_Classes->grade_id = $List_Class['Grade_id'];

              $My_Classes->save();

          }

          toastr()->success(trans('messages.success'));
          return redirect()->route('classroom.index');
      } catch (\Exception $e) {
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Crud;
use App\Models\ModelHistory;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Collection;
use App\Mail\ContactsSendmail;
use Illuminate\Support\Facades\Mail;


class TodoListFormController extends Controller
{
  public function index()
  {
    $user = Auth::user();
    $persons = User::all();


    $cruds = Crud::orderBy('updated_at', 'desc')->get();

    $crudd = Crud::withTrashed()->orderBy('updated_at', 'desc')->get();

    $model = ModelHistory::orderBy('updated_at', 'desc')->limit(13)->get();






    return view('crud_list', ['cruds' => $cruds,  'user' => $user, 'persons' => $persons, 'model' => $model]);
  }

  public function createPage()
  {
    return view('todo_create');
  }
  public function create(Request $request)
  {
    $user = Auth::user();
    $validator = $request->validate([
      'task_name' => 'required|max:20',
      'task_description' => 'required|max:50',
      'estimated_hour' => 'numeric|min:0'
    ]);
    $crud = new Crud();
    $crud->task_name = $request->task_name;
    $crud->task_description = $request->task_description;
    $crud->assign_person_name = $user->name;
    $crud->estimate_hour = $request->estimated_hour;
    $crud->save();
    return redirect('/');
  }

  public function editPage($id)
  {
    $crud = Crud::find($id);
    return view('crud_edit', ['crud' => $crud]);
  }
  public function edit(Request $request)
  {

    Crud::find($request->id)->update([
      'task_name' => $request->task_name,
      'task_description' => $request->task_description,
      'estimate_hour' => $request->estimate_hour

    ]);

    $validator = $request->validate([
      'task_name' => 'required',
      'task_description' => 'required|max:30',
      'estimate_hour' => 'numeric|min:0'
    ]);
    return redirect('/');
  }

  public function deletePage($id)
  {
    $crud = Crud::find($id);
    return view('crud_delete', ['crud' => $crud]);
  }

  public function delete(
    $id
  ) {
    Crud::find($id)->delete();

    return redirect('/');
  }


  public function garbage()
  {
    $test = Crud::onlyTrashed()->orderBy('updated_at', 'desc')->limit(50)->get();
    $persons = User::all();
    return view('garbage', ['test' => $test, 'persons' => $persons]);
  }


  public function destroypage($id)
  {
    Crud::onlyTrashed()->find($id)->forceDelete();
    return redirect('/test');
  }

  public function destroypageview($id)
  {
    $view = Crud::onlyTrashed()->find($id);
    return view('destroy', ['view' => $view]);
  }
  public function recoverypage($id)
  {
    Crud::onlyTrashed()->find($id)->restore();
    return redirect('/test');
  }
  public function recoverypageview($id)
  {
    $view = Crud::onlyTrashed()->find($id);
    return view('recovery', ['view' => $view]);
  }

  public function destoryalldone()
  {
    Crud::onlyTrashed()->forceDelete();
    return redirect('/test');
  }

  public function newregister(Request $request)
  {
    $validator = $request->validate([
      'name' => 'required|max:30',
      'email' => 'required|email',
      'password' => 'required|min:8|max:20',
    ]);
    $value = new User();
    $value->name = $request->name;
    $value->email = $request->email;
    $value->password = bcrypt($request->password);
    $value->save();
    return redirect('/');
  }
  public function mailform()
  {
    return view('contact.index');
  }
  public function confirm(Request $request)
  {

    $request->validate([
      'email' => 'required|email',
      'title' => 'required',
      'body' => 'required',
    ]);

    $inputs = $request->all();


    return view('contact.confirm', [
      'inputs' => $inputs,
    ]);
  }

  public function send(Request $request)
  {
    // ?????????????????????
    $request->validate([
      'email' => 'required|email',
      'title' => 'required',
      'body' => 'required'
    ]);

    // action???????????????
    $action = $request->input('action');

    // action?????????input???????????????
    $inputs = $request->except('action');

    //action???????????????
    if ($action !== 'submit') {

      // ????????????????????????????????????????????????
      return redirect()
        ->route('contact.index')
        ->withInput($inputs);
    } else {
      // ???????????????????????????????????????

      // ??????????????????????????????
      Mail::to($inputs['email'])->send(new ContactsSendmail($inputs));
      // ???????????????????????????
      Mail::to('kkos01417@gmail.com')->send(new ContactsSendmail($inputs));

      // ???????????????????????????????????????????????????
      $request->session()->regenerateToken();

      // ????????????????????????view?????????
      return view('contact.thanks');
    }
  }
}

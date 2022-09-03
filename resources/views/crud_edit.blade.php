<link rel="stylesheet" href="{{ asset('css/test.css') }}">

<div style='width:500px;margin:0 auto;'>



   <h2 class='task3'>タスクの修正</h2>
  @if($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
      <li style='color:red;'>{{ $error }}</li>


      @endforeach
    </ul>
    @endif
   <form  class='form' action="/edit" method="POST">
  @csrf
          <input type="hidden" name="id" value="{{$crud->id}}">
  <div style='margin-bottom:10px'>
    <span>タスクの名前：</span>
   <input type="text" name="task_name" value="{{$crud->task_name}}">
  </div>

  <div style='display:flex;margin-bottom:10px;' style=''>
     <span style='padding-right:4px'>タスクの説明：</span>
  <textarea name="task_description" cols="47" rows="18" value="{{$crud->task_description}}" placeholder="50文字以内で入力してください">{{$crud->task_description}}</textarea>

  </div>


  <div>
    <span>見積時間(h) ：</span>
   <input type="number" step=0.1 name="estimate_hour" value="{{$crud->estimate_hour}}">
  </div>


               {{-- <input type="text" size='20' name="task_description" value="{{$crud->task_description}}"> --}}

           {{-- <p>
               担当者の名前：<input type="text" cols='30' row='10' name="assign_person_name" value="{{$crud->assign_person_name}}">
           </p> --}}


  <div style='margin:10px 10px 0 0;'>
   <input type="submit" name="edit" value="修正">
  </div>


  </form>
     <a href="/">戻る</a>
  </div>

</div>

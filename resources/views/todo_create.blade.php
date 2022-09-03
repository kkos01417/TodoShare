<link rel="stylesheet" href="{{ asset('css/test.css') }}">
<div class='wrapper' style='width:500px;margin:0 auto;'>

  <div>
    <h2 class='task3'>タスクを追加</h2>
    <form action="/create" method="POST">
    @csrf

    @if($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
      <li style='color:red;'>{{ $error }}</li>


      @endforeach
    </ul>
    @endif

  <div style='margin-bottom:10px;'>
  <span style='margin-right:25px;'>タスク名：</span>

  <input type="text" name="task_name"  value={{ old('task_name') }}>
  </div>


  <div style='display:flex;margin-bottom:10px;'>

    <span> タスクの説明：</span>
   <textarea name="task_description" placeholder="50文字以内で入力してください" cols="47" rows="18">{{ old('task_description') }}</textarea>
  </div>




    {{--
      担当の名前：
      <input type="text" name='assign_person_name'value={{ old('assign_person_name') }}>
     --}}
  <div style='margin-bottom:10px;'>
    <span style='margin-right:10px;'>見積時間(h):</span>
    <input type="number" step=0.1 name='estimated_hour' value={{ old('estimated_hour') }}>
  </div>



    <input type="submit" name='create' value='追加'>
    </form>
    <a href="/">戻る</a>
  </div>
</div>

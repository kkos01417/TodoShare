<link rel="stylesheet" href="{{ asset('css/test.css') }}">
<div class='wrapper' style='width:500px;margin:0 auto;'>
    <h2 class='task3'>タスクを完了します
    </h2>
    <form method="POST" action="/delete/{{$crud->id}}">
        @csrf

        <p>
            タスクの名前：{{$crud->task_name}}
        </p>
        <p>
            タスクの説明：{{$crud->task_description}}
        </p>
        <p>
            担当者の名前：{{$crud->name}}
        </p>
        <p>
            見積時間(h) ：{{$crud->estimate_hour}}
        <p>
        <input type="submit" name="delete" value="完了">
    </form>
    <a href="/">戻る</a>
</div>

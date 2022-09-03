<link rel="stylesheet" href="{{ asset('css/test.css') }}">


<div style='width:500px;margin:0 auto;'>
    <h2 class='task3' >元に戻す</h2>
    <form method="POST" action="/recovery/{{$view->id}}">
        @csrf

        <p>
            タスクの名前：{{$view->task_name}}
        </p>
        <p>
            タスクの説明：{{$view->task_description}}
        </p>
        <p>
            担当者の名前：{{$view->assign_person_name}}
        </p>
        <p>
            見積時間(h) ：{{$view->estimate_hour}}
        <p>
        <input type="submit" name="delete" value="復元">
    </form>
    <a href="/">戻る</a>
</div>

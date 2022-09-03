<h1>Todoリスト</h1>
<div>
    <h2>完全に削除します</h2>
    <form method="POST" action="/destroy/{{$view->id}}">
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
        <input type="submit" name="delete" value="削除">
    </form>
    <a href="/">戻る</a>
</div>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{ asset('js/serch.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/test.css') }}">

<div class='wrapper'>


  <div>

    @if(Auth::check())
    <h1>Todoリスト共有</h1>
  <a href="/logout" class="btn btn-border">ログアウトする</a>

  @if(Auth::user()->role=='owner')
  <p>管理者ログイン中：{{ $user->name.'('.$user->email.')' }}</p>
  <a href="/registeruser">新規ユーザーを登録</a>
  @else
<p>ログイン中：{{ $user->name.'('.$user->email.')' }}</p>
  @endif
  @else
  <h1>Todoリスト共有</h1>
  <p>※ログインしていません<br>
  操作するにはログインするか、ユーザー登録申請してください。</p>
  <a href="/login">ログイン</a>
  <a style='margin-left:7px;' href="/contact">ユーザー登録申請</a>

  @endif

  <h2 class='task'>タスクの一覧</h2>
<div class="search-area">
  <script src="js/search.js"></script>
    <form method="get" action="">


  <select id="person" name="">
        <option value="">担当者を絞り込めます</option>
  @foreach($persons as $value)
        <option value="{{$value->name}}">{{$value->name}}</option>
  @endforeach
      </select>
      <input type="button" value="絞り込む" id="button"> <input type="button" value="すべて表示" id="button2">
    </form>
  </div>

  @if(Auth::check())

      <a href="/create-page">タスクを追加</a>
      <a style='margin-left:16px;' href="/test">完了済のタスクを見る</a>
  @else
  <span>タスクを追加</span><span style='margin-left:16px;'>完了済のタスクを見る</span>
  @endif

      <table style='margin-top:13px;font-size:13px;' id='data'>
          <tr>
            <th>担当者の名前</th>
              <th>タスクの名前</th>
              <th>タスクの説明</th>

              <th >見積時間(h)</th>
              <th>作成日時</th>
              <th colspan="2">操作</th>
          </tr>
          @foreach($cruds as $value)
          <tr>
             <td>{{$value->assign_person_name}}</td>
              <td>{{$value->task_name}}</td>
              <td>{!! nl2br($value->task_description) !!}</td>
{{-- {{$value->task_description}} --}}
              <td>{{$value->estimate_hour}}</td>
              <td>{{ $value->created_at }}</td>
              @if(Auth::check())
              <td><a href="/edit-page/{{$value->id}}">編集</a></td>
              <td><a href="/delete-page/{{$value->id}}">完了</a></td>
              @else
              <td>編集</td>
              <td>完了</td>
              @endif
          </tr>
          @endforeach
      </table>

  </div>


  <h2 class='task2'style='margin-top:50px;'>操作履歴</h2>
  <table>


  @foreach ($model as $one )
  <tr>
    <td>
    {{ $one->user->name }}が
  @if(isset($one->crud->task_name)){{ $one->crud->task_name }}
  @else
  不明なタスク
  @endif
  @if($one->operation_type==='created'
  )を作成しました。
@elseif($one->operation_type==='updated')を更新しました。
@elseif($one->operation_type==='deleted')を完了しました。
@endif
  </td>
  <td>時刻:{{$one->updated_at}}</td>

  </tr>
  @endforeach

  </table>
</div>

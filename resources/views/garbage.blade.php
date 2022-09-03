  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{ asset('js/serch.js') }}"></script>


<h1>完了済</h1>

<div>
    <p>過去50件のデータが表示されます</p>

      <select id="person" name="">
        <option value="">担当者で絞り込めます</option>
  @foreach($persons as $value)
        <option value="{{$value->name}}">{{$value->name}}</option>
  @endforeach
      </select>
      <input type="button" value="絞り込む" id="button"> <input type="button" value="すべて表示" id="button2">
    </form>
  </div>
    <a href="/">戻る</a>
    <table border="1" id='data' style='margin-top:5px;'>
        <tr>
            <th>タスクの名前</th>
            <th>タスクの説明</th>
            <th>担当者の名前</th>
            <th>見積時間(h)</th>
            <th>作成日時</th>
            <th colspan="2">操作</th>
        </tr>
        @foreach($test as $value)
        <tr>
            <td>{{$value->task_name}}</td>
            <td>{{$value->task_description}}</td>
            <td>{{$value->assign_person_name}}</td>
            <td>{{$value->estimate_hour}}</td>
            <td>{{ $value->created_at }}</td>
            <td><a href="/recovery-page/{{$value->id}}">復元</a></td>

        </tr>
        @endforeach
    </table>

</div>

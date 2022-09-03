<link rel="stylesheet" href="{{ asset('css/test.css') }}">
<div class='wrapper' style='width:500px;margin:0 auto;'>
  <h2 class='task3'>確認画面</h2>
<form method="POST" action="{{ route('contact.send') }}">
  @csrf

<dl>

  <dt>名前</dt>
  <dd>
    {{ $inputs['title'] }}
    <input name="title" value="{{ $inputs['title'] }}" type="hidden">

  </dd>



  <dt>メールアドレス</dt>
  <dd>
    {{ $inputs['email'] }}
    <input name="email" value="{{ $inputs['email'] }}" type="hidden">

  </dd>




  <dt style='display:block'>内容</dt>
  <dd>
    {!! nl2br(e($inputs['body'])) !!}
    <input name="body" value="{{ $inputs['body'] }}" type="hidden">

  </dd>


</dl>

  <button type="submit" name="action" value="back">入力内容修正</button>
  <button type="submit" name="action" value="submit">送信する</button>
</form>
</div>

<link rel="stylesheet" href="{{ asset('css/test.css') }}">


<div class='wrapper' style='width:500px;margin:0 auto;'>
 <h2 class='task3'>申請画面</h2>
  <form method="POST" action="{{ route('contact.confirm') }}">
      @csrf

<dl>
<dt>名前</dt>
<dd>    <input
        name="title"
        value="{{ old('title') }}"
        type="text">
    @if ($errors->has('title'))
        <span style='display:block;color:red;' class="error-message">{{ $errors->first('title') }}</span>
    @endif</dd>


  <dt>メールアドレス</dt>
      <dd>       <input
            name="email"
            value="{{ old('email') }}"
            type="text">
        @if ($errors->has('email'))
            <span style='display:block;color:red;' class="error-message">{{ $errors->first('email') }}</span>
        @endif</dd>



     <dt>申請内容</dt>
  <dd>
    <textarea name="body" cols="23" rows="10">{{ old('body') }}</textarea>
    @if ($errors->has('body'))
        <span style='display:block;text-align:center;color:red;' class="error-message">{{ $errors->first('body') }}</span>
    @endif</dd>
</dl>
      <button type="submit">入力内容確認</button>
  </form>
</div>

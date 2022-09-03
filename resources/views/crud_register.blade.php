<link rel="stylesheet" href="{{ asset('css/test.css') }}">

<div style='width:500px;margin:0 auto;'>



  <h2 class='task3'>新規ユーザー登録</h2>
  @if($errors->any())
  <ul>
    @foreach ($errors->all() as $error)
    <li style='color:red;'>{{ $error }}</li>


    @endforeach
  </ul>
  @endif
  <div class='wrapper' style='width:500px;margin:0 auto;'>


    <form class='form' action="/registerauth" method="POST">
      @csrf
      <div style='margin-bottom:10px'>
        <span>名前：</span>
        <input type="text" name="name" value="">
      </div>
      <div style='margin-bottom:10px'>
        <span>email：</span>
        <input type="text" name="email" value="">
      </div>
      <div style='margin-bottom:10px'>
        <span>パスワード：</span>
        <input type="text" name="password" value="" placeholder="newuser1234">
      </div>
      <div style='margin-bottom:10px'>
        <span>権限：</span>
        <input type="text" name="role" value="" placeholder="ownerの場合のみ入力">
      </div>

  </div>
  <div style='margin:10px 10px 0 0;'>
    <input type="submit" name="edit" value="登録する">
  </div>
  <div style='margin-top:10px;'>
  </form>
  <a href="/">戻る</a>

  </div>
  </div>

<h1 align="center">註冊頁面</h1>
<form id="form1" name="form1" method="post" action="register_check.php">
  <p>帳密</p>
  <p>帳號:
    <label for="account"></label>
    <input type="text" name="account" id="account" />
  </p>
  <p>密碼:
    <label for="password"></label>
    <input type="text" name="password" id="password" />
  </p>
  <p>會員資料</p>
  <p>姓名:
    <label for="name"></label>
<input type="text" name="name" id="name" />
  </p>
  <p>
    <label>性別:
      <input name="sex" type="radio" id="sex_0" value="m" checked="checked" />
      男</label>
    <label>
      <input type="radio" name="sex" value="f" id="sex_1" />
    女</label>
  </p>
  <p>電話:
    <label for="phone"></label>
    <input type="text" name="phone" id="phone" />
  </p>
  <p>住址:
    <label for="address"></label>
    <input type="text" name="address" id="address" />
  </p>
  <p>
    <input type="button" name="cancel" id="cancel" value="返回" />
    <input type="submit" name="register" id="register" value="註冊" onclick="location.href=" />
  </p>
</form>
<p>&nbsp;</p>
<?php
//$account = $_POST["account"];
//$password = $_POST["password"];
//$name = $_POST["name"];
//$sex = $_POST["sex"];
//$phone = $_POST["phone"];
//$address = $_POST["address"];
//
//$host = 'localhost';
//$dbuser ='root';
//$dbpassword = '';
//$dbname = 'papaya';
//$link = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
//if($link){
//    mysqli_query($link,'SET NAMES uff8');
//    echo "正確連接資料庫";
//}
//else {
//    echo "不正確連接資料庫</br>" . mysqli_connect_error();
//}
//
//$sql = "INSERT INTO user_data (account, password, name, sex,
//    phone, address) VALUES ('$account','$password','$name' ,'$sex','$phone','$address')";
//
//$result = mysqli_query($link,$sql);
//// 如果有異動到資料庫數量(更新資料庫)
//if (mysqli_affected_rows($link)>0) {
//// 如果有一筆以上代表有更新
//// mysqli_insert_id可以抓到第一筆的id
//    $new_id= mysqli_insert_id ($link);
//    echo "新增後的id為 {$new_id} ";
//}
//elseif(mysqli_affected_rows($link)==0) {
//    echo "無資料新增";
//}
//else {
//    echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
//}


?>
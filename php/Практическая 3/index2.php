<!DOCTYPE html>
<html>
  <head>
    <title>�����������</title>
    	<link rel="stylesheet" href="style.css">
    </head>
      <body style="background-image: url(http://demiart.ru/forum/uploads8/post-744156-1324756717.jpg)">
      <form method="post" align="center" class="regform">
        <label style="font-size: 35px;">����������� ������ ������������ <br></label>
          <label>  *- ���� ����������� ��� ����������<br></label>
        <label>����� *</label><br>
        <input type="text" name="log" required value="<? if(isset($_POST['log'])) echo $_POST['log']; ?>"><?php if(isset($login)) echo $login;?><br>
        <label>������ *</label><br>
        <input type="password" name="pwd" required value="<? if(isset($_POST['pwd'])) echo $_POST['pwd']; ?>"><?php if(isset($password)) echo $password;?><br>
        <label>��������� ������ *</label><br>
        <input type="password" name="pwd1" required value="<? if(isset($_POST['pwd1'])) echo $_POST['pwd1']; ?>"><?php if(isset($password)) echo $password;?><br>
        <label>������� *</label><br>
        <input type="text" name="surname" required value="<? if(isset($_POST['surname'])) echo $_POST['surname']; ?>"><?php if(isset($surnname)) echo $surnname;?><br>
        <label>��� *</label><br>
        <input type="text" name="name" required value="<? if(isset($_POST['name'])) echo $_POST['name']; ?>"><?php if(isset($nam)) echo $nam;?><br>
        <label>��������</label><br>
        <input type="text" name="midname" value="<? if(isset($_POST['midname'])) echo $_POST['midname']; ?>"><?php if(isset($mid)) echo $mid;?><br>
        <label>��� *</label><br>
        <select name="sex" required>
          <option value="�������">
          �������
          </option>
          <option value="�������">
          �������
          </option>
        </select><br>
        <label>E-Mail *</label><br>
        <input type="email" name="email" required value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"><?php if(isset($poshta)) echo $poshta;?><br>
        <label>������� *</label><br>
        <input type="text" name="age" required value="<? if(isset($_POST['age'])) echo $_POST['age']; ?>"><?php if(isset($ag)) echo $ag;?><br>
        <label>������ *</label><br>
        <select name="country" required>
          <option>
          ������
          </option>
          <option>
          �������
          </option>
          <option>
          ���������
          </option>
          <option>
          ���������
          </option>
        </select><br>

        <label>� ����</label><br>
        <textarea style="resize: none;" rows="8" cols="35" name="about"><? if(isset($_POST['about'])) echo $_POST['about']; ?></textarea><br>

        <?
        if(isset($_POST['log']) && isset($_POST['pwd']) && isset($_POST['pwd1']) && isset($_POST['surname']) && isset($_POST['name'])
         && isset($_POST['sex']) && isset($_POST['email']) && isset($_POST['age']) && isset($_POST['country'])
        && !empty($_POST['log']) && !empty($_POST['pwd']) && !empty($_POST['pwd1']) && !empty($_POST['surname']) && !empty($_POST['name'])
         && !empty($_POST['sex']) && !empty($_POST['email']) && !empty($_POST['age']) && !empty($_POST['country']))
        {
            if(!preg_match('/^[a-z0-9]{3,}+$/i',$_POST['log']))
            {
              echo '<span>����� �� ������������ �������.<br>
                          ������ ���������� ����� � �����<br>
                          �� 3 � ����� ��������<br></span>';
            }
            else
                if(!preg_match('/^[A-Za-z0-9@!.#]{5,}+$/i',$_POST['pwd']))
            {
               echo '<span>����������� ����� ������.<br>
                          ����������� ������ ���������� ����� � ��� ������� @!.#.<br>
                        ����� ������ ������� 5 ��������.<br></span>';
            }
            else
                	if($_POST['pwd'] != $_POST['pwd1'])
            {
               echo '<span>������ �� ���������.<br></span>';
            }
            else
                if(!preg_match('/^[�-ߨ�-��]{2,}+$/iu',$_POST['surname']))
            {
               echo '<span>������ ������� �������.<br>
                          ������ ������� ������� 2 �������.<br></span>';
            }
            else
                if(!preg_match('/^[�-ߨ�-��]{3,}+$/iu',$_POST['name']))
            {
              echo '<span>������ ������� �������.<br>
                         ������ ������� ������� 3 �������.<br></span>';
            }
            else
                if(!preg_match('/^[�-ߨ�-��]{5,}+$/iu',$_POST['midname']))
            {
              echo '<span>������ ������� �������.<br>
                         ������ ������� ������� 3 �������.<br></span>';
            }
            else
                if(!preg_match('/^[A-Za-z0-9]+@[a-z0-9]+\.[a-z]/i',$_POST['email']))
            {
               echo '<span>����������� ������ �����.<br>
                          ��������: VlAd123@kait20.ru<br></span>';
             }
            else
                if(!preg_match('/^[0-9]{1,3}+$/',$_POST['age']))
            {
              echo '<span>����������� ������ �������<br>
                          ������ �����.<br></span>';
            }
            else
              {
                if($_POST['pwd'] == $_POST['pwd1'])//���������� �������
                {
                  $pd = false;
                  $file = fopen("logins.txt", "r");
                  while(!feof($file))//���� � �����
                  {
                    $line = fgets($file);
                    $arr = explode('|', $line);
                    if(@$arr[0] == $_POST['log']) $pd = true;
                  }
                  fclose($file);
                  if($pd == false)//���� ������ �� �����
                  {
                    $str = $_POST['log'].'|'.$_POST['pwd'].'|'.$_POST['surname'].'|'.$_POST['name'].'|'.$_POST['midname'].'|'.$_POST['sex'].'|'.$_POST['email'].'|'.$_POST['age'].'|'
                    .$_POST['country'].'|'.$_POST['about'];
                    $file = file_put_contents('logins.txt', $str.PHP_EOL , FILE_APPEND | LOCK_EX);
                    header("Refresh: 3;  url=index.php");
                    echo '<span>����������� �������!<br></span>';
                  }
                  else echo' <span>����� ��� �����.<br></span>';
              }
              else echo '<span>������ �� ���������.<br></span>';
            }
          }
            else if(isset($_POST['country'])) echo '<span>������� �� ��� ������.<br></span>';
          ?>

        <input class="knonka" type="submit" value="�����������"/>
        <input class="knonka" type="reset" value="�����"/>
        </form><br>

  </body>
</html>
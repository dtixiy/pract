<!DOCTYPE html>
<html>
    <head>
        <title>�����������</title>
		<link rel="stylesheet" href="style.css">
    </head>

	<body>

        <div class="fon">
            <div class="priv">
                <img src="1.png" height="80px">
                <p>����� ����������!</p>
            <p>������� ���������� ���<br> ������������ � ������<br> ��� ����� �� ����!</p>
                <a href="index2.php">�����������</a>
            </div>
				<?php
				if(!isset($_POST['login']) && !isset($_POST['pass']))
				{
					echo '
					<div class="vhod">
						<h2>����</h2>
						<form method="POST"><div class="auto">
							<div class="user">
							<b>��� ������������</b>
							<input maxlength="20" name="login">
							</div>
								<div class="pass">
								<b>������</b><br>
								<input type="password" name="pass">
								</div>
						<input class="but" type="submit" value="����">
              <br><br>
								</div>
						</form>
					</div>';
				}
        else
        {
            $file = fopen("logins.txt", "r");
            while(!feof($file))
            {
                $line = fgets($file);// �������� ������, ����� �������� ������, ����� ����� �����-�� ������. echo @$arr[1].'=='.$_POST['pwd'];
                $arr = explode('|', $line);
                if(@$arr[0] == $_POST['login'] && @$arr[1] == $_POST['pass'])
                {
                  echo '<p style="margin-left:380px; margin-top: 50px;font-size:25px;">Privet </p>';
                  echo '<a href="./index.php"><p style="margin-left:380px; margin-top: 150px;font-size:25px;">�����</p> </a>';
                  break;
                }
                if(feof($file))
                {
                  echo '<p style="margin-left:300px;font-size:30px;color:red;">�� ����� ������������ ������</p>';
                  echo '
        					<div class="vhod">
        						<form method="POST"><div class="auto">
        							<div class="user">
        							<b>��� ������������</b>
        							<input maxlength="20" name="login">
        							</div>
        								<div class="pass">
        								<b>������</b><br>
        								<input type="password" name="pass">
        								</div>
        						<input class="but" type="submit" value="����">
                      <br><br>
        								</div>
        						</form>
        					</div>';
                  break;
                }
            }
            fclose($file);
        }
				?>
        </div>
    </body>
</html>
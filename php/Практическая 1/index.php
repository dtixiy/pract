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
                <br>
                <a href="#">�����������</a>
            </div>
				
				<?php $login = "guru"; $pwd = "12345";
				if(!isset($_POST['pwd']))
				{
					echo '<div class="vhod">			
                <h2>����</h2>				
				<form method="POST"><div class="auto">			
					<div class="user">
                    <b>��� ������������</b>
					<input id="username" maxlength="20" name="username">
                    </div>
					
					<div class="pass">
                    <b>������</b><br>
                <input type="password" name="pwd">
					</div>
				
                <input class="but" type="submit" value="����">
			
				</div></form>
				
            </div>';
				}
				else if($_POST['username'] == $login && $_POST['pwd'] == $pwd)
				{
					echo 'Privet '.$login;
					echo '<a href="./index.php">����� </a>';
				}
				else if($_POST['username'] != $login || $_POST['pwd'] != $pwd)
				{
					echo '<div class="vhod">			
                <h2>����</h2>				
				<form method="POST"><div class="auto">			
					<div class="user">
					<p>�� ����� ������������ ������</p>
                    <b>��� ������������</b>
					<input id="username" maxlength="20" name="username">
                    </div>
					
					<div class="pass">
                    <b>������</b><br>
                <input type="password" name="pwd">
					</div>
				
                <input class="but" type="submit" value="����">
			
				</div></form>
				
            </div>';
				}
				?>
				
           
        </div>
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
        <title>������� </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8">
    </head>
    <body>
      <p>��� �������� ������ �� ����� ����� ������������ ���� ���� http://voronplace.at.ua/index.html</p>
        <div class="yclovie">
            <form method="post">
                <input type="text" name="url" placeholder="������ �� ����" value="<? if(isset($_POST['url'])) echo $_POST['url']; ?>">
                <br>
                <select name="action">
                    <option  value="1">��� </option>
                    <option  value="2">e-mail </option>
                    <option  value="3">���� �������� </option>
                    <option  value="4">����� �������� </option>
                    <option  value="5"> </option>
                </select>
                <br>
                <input type="submit" value="�����" />
            </form>
        </div>

        <div class="rezyltat">
          <?php
            if(isset($_POST['url']))
            {
              $url = $_POST['url'];
              $url = iconv("UTF-8","windows-1251",$url);
              $html = file_get_contents($url);
              if($_POST['action'] == 1)
              {
                $pattern = "/[A-Z�-�][a-z�-�]+\s[A-Z�-�][a-z�-�]+\s[A-Z�-�][a-z�-�]+/u";
              }
              if($_POST['action'] == 2)
              {
                $pattern = "/(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})/";
              }
              if($_POST['action'] == 3)
              {
                $pattern = "/([\d]+)\s*(([\�-��*]+)|(\.[\d]+\.))\s*([\d]+)/";
              }
              if($_POST['action'] == 4)
              {
              $pattern = "/[8]\([0-9]{3}\)[0-9]{3}\-[0-9]{2}\-[0-9]{2}/";
              }
              $result_index = preg_match_all($pattern, $html, $result, PREG_PATTERN_ORDER);
              for($i = 0; $i < $result_index; $i++)
              {
                echo "<div>".$i." ".@$result[0][$i]."</div>";
              }
            }
          ?>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>刷通识课</title>

  <meta name="description" content="桂林电子科技大学选课">
  <meta name="cacacai" content="Hello!">

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

</head>
<?php
  /**
   * Created by PhpStorm.
   * User: guet
   * Date: 2017/7/15
   * Time: 13:02
   */
  $mysql_server_name='localhost'; //改成自己的mysql数据库服务器
  $mysql_username='cai'; //改成自己的mysql数据库用户名
  $mysql_password='123456abc'; //改成自己的mysql数据库密码
  $mysql_database='guet_curl'; //改成自己的mysql数据库名
  @$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ; //连接数据库
  mysql_query("set names 'gbk'"); //数据库输出编码 应该与你的数据库编码保持一致
  mysql_select_db($mysql_database); //打开数据库
  $sql ="SELECT * FROM `all`"; //SQL语句
 // $sql2 ="select 课程代码 from table1 "; //SQL语句
  $result = mysql_query($sql,$conn); //查询
?>

<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h3 contenteditable="true" class="text-center text-success">脚本选课</h3>
      <form method="post" action="curl.php" class="form-horizontal" role="form">
        <div class="container-fluid">
          <!--<div class="row-fluid">
            <div class="span12">
              <table class="table table-hover table-striped">
                <thead>
                <tr>
                  <th>
                    通识课名称()
                  </th>
                  <th>
                    老师
                  </th>
                  <th>
                    类别
                  </th>
                  <th>
                    学分
                  </th>
                  <th>
                    选择
                  </th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    while(@$row = mysql_fetch_array($result))
                    {
                      echo "<tr>";
                      echo "<td>".$row['name']." </td>"; //排版代码
                      echo "<td>".$row['teacher']." </td>"; //排版代码
                      echo "<td>".$row['fenlei']." </td>"; //排版代码
                      echo "<td>".$row['dep']." </td>"; //排版代码
                      echo "<td><input type='radio'  name='classCode' value='".$row['code']."' /> </td>"; //排版代码
                      echo "</tr>";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
		  没有你需要的课程？
        </div>-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">
             
            <input type='radio' checked="checked" name='classCode' value='' />
          </label>
          <div class="col-sm-10">

            <input name="inputCode" value='' type="text" class="form-control" id="inputEmail3">
            手动输入课程代码（例：天文漫谈（网络）(1712349)中的1712349）
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">
            是否为重修(选重修可以避免课程冲突)
          </label>
          <div class="col-sm-10">
            是<input type='radio'  name='isNormal' value='0' />
            否<input type='radio' checked="checked" name='isNormal' value='1' />
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">
            教务系统账号
          </label>
          <div class="col-sm-10">
            <input name="username" type="text" class="form-control" id="inputEmail3">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">
            密码
          </label>
          <div class="col-sm-10">
            <input name="userPwd" type="password" class="form-control" id="inputPassword3">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">
              登陆
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>

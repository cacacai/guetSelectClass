<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>ˢͨʶ��</title>

  <meta name="description" content="���ֵ��ӿƼ���ѧѡ��">
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
  $mysql_server_name='localhost'; //�ĳ��Լ���mysql���ݿ������
  $mysql_username='cai'; //�ĳ��Լ���mysql���ݿ��û���
  $mysql_password='123456abc'; //�ĳ��Լ���mysql���ݿ�����
  $mysql_database='guet_curl'; //�ĳ��Լ���mysql���ݿ���
  @$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ; //�������ݿ�
  mysql_query("set names 'gbk'"); //���ݿ�������� Ӧ����������ݿ���뱣��һ��
  mysql_select_db($mysql_database); //�����ݿ�
  $sql ="SELECT * FROM `all`"; //SQL���
 // $sql2 ="select �γ̴��� from table1 "; //SQL���
  $result = mysql_query($sql,$conn); //��ѯ
?>

<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h3 contenteditable="true" class="text-center text-success">�ű�ѡ��</h3>
      <form method="post" action="curl.php" class="form-horizontal" role="form">
        <div class="container-fluid">
          <!--<div class="row-fluid">
            <div class="span12">
              <table class="table table-hover table-striped">
                <thead>
                <tr>
                  <th>
                    ͨʶ������()
                  </th>
                  <th>
                    ��ʦ
                  </th>
                  <th>
                    ���
                  </th>
                  <th>
                    ѧ��
                  </th>
                  <th>
                    ѡ��
                  </th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    while(@$row = mysql_fetch_array($result))
                    {
                      echo "<tr>";
                      echo "<td>".$row['name']." </td>"; //�Ű����
                      echo "<td>".$row['teacher']." </td>"; //�Ű����
                      echo "<td>".$row['fenlei']." </td>"; //�Ű����
                      echo "<td>".$row['dep']." </td>"; //�Ű����
                      echo "<td><input type='radio'  name='classCode' value='".$row['code']."' /> </td>"; //�Ű����
                      echo "</tr>";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
		  û������Ҫ�Ŀγ̣�
        </div>-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">
             
            <input type='radio' checked="checked" name='classCode' value='' />
          </label>
          <div class="col-sm-10">

            <input name="inputCode" value='' type="text" class="form-control" id="inputEmail3">
            �ֶ�����γ̴��루����������̸�����磩(1712349)�е�1712349��
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">
            �Ƿ�Ϊ����(ѡ���޿��Ա���γ̳�ͻ)
          </label>
          <div class="col-sm-10">
            ��<input type='radio'  name='isNormal' value='0' />
            ��<input type='radio' checked="checked" name='isNormal' value='1' />
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">
            ����ϵͳ�˺�
          </label>
          <div class="col-sm-10">
            <input name="username" type="text" class="form-control" id="inputEmail3">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">
            ����
          </label>
          <div class="col-sm-10">
            <input name="userPwd" type="password" class="form-control" id="inputPassword3">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">
              ��½
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

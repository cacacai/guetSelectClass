<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=gb2312" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ѡ��</title>
  <meta name="description" content="���ֵ��ӿƼ���ѧ">
  <meta name="cacacai" content="Hello">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>


<?php
  /*
   * ��½��get����
   */
  ini_set('max_execution_time', '0');  //������ʱ
  function curlGetAfterLogin($url,$cookieFile)
  {
    $ch=curl_init($url);
    curl_setopt($ch,CURLOPT_HEADER,0);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,0);
    curl_setopt($ch,CURLOPT_COOKIEFILE,$cookieFile);
    $contents=curl_exec($ch);
    curl_close($ch);
    return $contents;
  }

  /*
   * ��½��post����
   */
  function curlPostAfterLogin($url,$cookieFile,$postFile)
  {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFile);         //�ύ��ʽΪpost
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
    $contents=curl_exec($ch);
    curl_close($ch);
    return $contents;
  }

  /*
   * ��½��ȡcookie
   */
  $postUrl="http://bkjw2.guet.edu.cn/student/public/login.asp?mCode=000703";
  $cookieFile=dirname(__FILE__)."/temp.cookie";
  $userName=$_POST['username'];
  $userPwd=$_POST['userPwd'];

  $postLogin="username=".$userName."&passwd=".$userPwd."&login=%B5%C7%A1%A1%C2%BC";
  $ch=curl_init($postUrl);
  curl_setopt($ch,CURLOPT_HEADER,0);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,0);
  curl_setopt($ch,CURLOPT_POST,1);
  curl_setopt($ch,CURLOPT_COOKIEJAR,$cookieFile);
  curl_setopt($ch,CURLOPT_POSTFIELDS,$postLogin);
  curl_exec($ch);curl_close($ch);

  /*
   * ��ȡ������Ϣ
   */
//  $urlInfo="http://bkjw2.guet.edu.cn/student/Info.asp";
//  $contents=curlGetAfterLogin($urlInfo,$cookieFile);
//  print_r($contents);

  /*
   * ˢ��
   */

  $classCode=$_POST['classCode'];//���ѡ��Ŀκ�
  $inputCode=$_POST['inputCode'];  //�ֶ�����Ŀκ�
  $isNormal=$_POST['isNormal'];   //�Ƿ�Ϊ����

  /*
   * ��ȡ�κ�
   */
  if (empty($classCode)&&empty($inputCode))
  {
    echo "��û��ѡ���������κ�";
    exit();
  }
  if ($classCode==''&&$inputCode!='')
  {
    $classCode=$inputCode;
  }

  /*
   * �ж����޻�������ѡ��
   */
  $selectType="%D5%FD%B3%A3";  //����������

  //���޵�
  if (!$isNormal)
  {
    $selectType="%D6%D8%D0%DE";

  }
  echo urldecode("$selectType");

  /*
   * �����ѯ���
   */
  $textbookCode="textbook".$classCode;
  $urlPublicClass="http://bkjw2.guet.edu.cn/student/select.asp";
  $postFile="spno=000000&selecttype=".$selectType."&testtime=&course=".$classCode."&".$textbookCode."=0&lwBtnselect=%CC%E1%BD%BB";
  //echo urldecode($postFile);

  /*
   * ѭ��ִ�в�ѯ���
   */
  while (1)
  {
    $contents=curlPostAfterLogin($urlPublicClass,$cookieFile,$postFile);
    print_r($contents);
  }
  ?>

</body>
</html>







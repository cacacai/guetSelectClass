<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=gb2312" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>选课</title>
  <meta name="description" content="桂林电子科技大学">
  <meta name="cacacai" content="Hello">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>


<?php
  /*
   * 登陆后get数据
   */
  ini_set('max_execution_time', '0');  //不允许超时
  function curlGetAfterLogin($url,$cookieFile)
  {
    $ch=curl_init($url);
    curl_setopt($ch,CURLOPT_HEADER,0);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,0);
    curl_setopt($ch,CURLOPT_COOKIEFILE,$cookieFile);
    $contents=curl_exec($ch);
    curl_close($ch);
    $text=mb_convert_encoding($contents,"utf8","gb2312");
    return $text;
  }

  /*
   * 登陆后post数据
   */
  function curlPostAfterLogin($url,$cookieFile,$postFile)
  {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFile);         //提交方式为post
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
    $contents=curl_exec($ch);
    curl_close($ch);
    return $contents;
  }

  /*
   * 登陆获取cookie
   */
  $postUrl="http://xk.cacacai.cn:8080/student/public/login.asp?mCode=000703";
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
   * 获取个人信息
   */
  $urlInfo="http://xk.cacacai.cn:8080/student/Info.asp";
  $contents=curlGetAfterLogin($urlInfo,$cookieFile);
  print_r($contents);

  /*
   * 刷课
   */

  $classCode=$_POST['classCode'];//点击选择的课号
  $inputCode=$_POST['inputCode'];  //手动输入的课号
  $isNormal=$_POST['isNormal'];   //是否为重修

  /*
   * 提取课号
   *
   *
   */
  if (empty($classCode)&&empty($inputCode))
  {
    echo "你没有选择或者输入课号";
    exit();
  }
  if ($classCode==''&&$inputCode!='')
  {
    $classCode=$inputCode;
  }

  /*
   * 判断重修还是正常选课
   */
  $selectType="%D5%FD%B3%A3";  //这是正常的

  //重修的
  if (!$isNormal)
  {
    $selectType="%D6%D8%D0%DE";

  }
  echo urldecode("$selectType");

  /*
   * 构造查询语句
   */
  $textbookCode="textbook".$classCode;
  $urlPublicClass="http://xk.cacacai.cn:8080/student/select.asp";
  $postFile="spno=000000&selecttype=".$selectType."&testtime=&course=".$classCode."&".$textbookCode."=0&lwBtnselect=%CC%E1%BD%BB";
  //echo urldecode($postFile);

  /*
   * 循环执行查询语句
   */
  while (1)
  {
    $contents=curlPostAfterLogin($urlPublicClass,$cookieFile,$postFile);
    print_r($contents);
  }
  ?>

</body>
</html>







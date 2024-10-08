<?php include('login_process.php')?>

<!DOCTYPE html>
<html lang="en">
<head>

<style>

   table{
    border: 1px solid;
    border-radius: 15px;
    background: rgba(0,0,0,0.20);
   }

   #type
   {
    width: 300px;
    hight: 32px;
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 3px solid black;
    color: white;
    font-size: 25px;
   }

   input:: -webkit-input-placeholder
   {
    font-size: 20px;
    line-length: 3;
    color: white;
   }

   #btn
   {
    width: 300px;
    /* background-color: orange; */
    hight:35px;
    font-size:20px;
    border-bottom: 3px solid black;
   }


</style>

  <title>Document</title>
</head>
<body background="background2.jpg">



<table width="20%" border="3" align="center" cellspacing="20" style="margin-top:100px">

<form action="dashboard.php">
      
      <tr>
          <td align="center"><img src="https://img.icons8.com/?size=100&id=3225&format=png&color=000000" width="150px"></td>
      </tr> 

      <tr>
          <td><input type="text" name="" placeholder="Email" id="type"></td>
      </tr>

      <tr>
          <td><input type="password" name="" placeholder="Password" id="type"></td>
      </tr>

      <tr>
          <td align="center"><input type="submit" name="" value="Login" id="btn"></td>
      </tr>
 
      </form>
</table>
  
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- 引入bootstrap样式 -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <!-- 引入bootstrap-table样式 -->
    <link href="https://cdn.bootcss.com/bootstrap-table/1.11.1/bootstrap-table.min.css" rel="stylesheet">
    <!-- jquery -->
    <script src="https://cdn.bootcss.com/jquery/2.2.3/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- bootstrap-table.min.js -->
    <script src="https://cdn.bootcss.com/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>
  <link rel="stylesheet" href="Page.css">
  <title>About Us</title>
</head>
<body>

<?php
  include("conn.php");
  $sql="select fullName,idTaxonomy,Genome,est,speciesAll from species";
  $res=mysqli_query($conn,$sql);
  if(!$res)
    {
      echo "<font color='white'>SQL QUERY ERROR</font>";
      die("QUERY ERROR");
    }

?>




  <ul class="breadcrumb">
    <li><a class="crumb" href="homePage.html">HOME</a></li>
    <li><a class="crumb" href="Data.html">DATA</a></li>
    <li><a class="crumb" href="Family.php">FAMILY</a></li>
    <li><a class="crumb" href="Species.php">SPECIES</a></li>
    <li><a class="crumb" href="Download.html">DOWNLOAD</a></li>
    <li><a class="crumb" href="Aboutus.html">ABOUT US</a></li>
  </ul>
  <div class="search-box">
      <div class="form">
        <form action="Search.php" method="get">
          <select name="options">
            <option value="searchkey">ALL</option>
            <option value="family">Protein Family</option>
            <option value="species">Species</option>
            <option value="idweb">Protein ID</option>
          </select>
          <input class="textfield" type="text" name="pname">
          <input class="go" type="submit" value="Go">
        </form>
      </div>
    </form>
  </div>

<div class="content">
  <div class="paragraph">
    <h2>Species</h2>
  </div>



  <?php
  $column=["Name","ID","Genome","EST","Selenoprotein Number"];
  ?>
  <table  data-pagination="true" data-toggle="table" data-page-size="10">
  <thead>
    <tr>
  <?php foreach ($column as $columnname){?>
      <th><?php echo $columnname; ?></th>
  <?php }?>
    </tr>
  </thead>
  <tbody>
  <?php
  while($array=mysqli_fetch_row($res))
  {
      echo "<tr>";
      $flag=0;
      foreach ($array as $data)
      {
        if($flag==0)
        {
          echo "<td><a class='textUrl' href='Search.php?options=species&pname=$data'>".$data."</td>";
          $flag=1;
        }
        else
          echo "<td>".$data."</td>";
      }
      $flag=0;
      echo "</tr>";
  }
?>
</tbody></table>






</div>

<footer>
  Copyright ©2017-2018 College of Life Sciences and Oceanography Shenzhen University<br>
  Address: 1066 xueyuan avenue, nanshan district, shenzhen, China<br>
  Phone: +86-0755-26536629, Fax: +86-0755-26534274, Postal Code: 518055<br>Email: jiangliang@szu.edu.cn<br>
</footer>

</body>
</html>

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
$id=$_GET["id"];
$sql="select proteinName,idExternal,family,species,idGenome,estLIST from protein where idWeb='$id'";
$res=mysqli_query($conn,$sql);
if(!$res)
  {
    echo "<font color='white'>SQL QUERY ERROR</font>";
    die("QUERY ERROR");
  }
$array=mysqli_fetch_row($res);

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
    <h2 style="text-align:center" class="infor"><?php echo $array[0] ?></h2>
  </div>
  
  <div>
    <h3>General Information</h3>
    <dl>
      <dd>Protein ID</dd>
      <dt><?php echo "$id&nbsp" ?></dt>
      <dd>External ID</dd>
      <dt><?php echo "$array[1]&nbsp" ?></dt>
    </dl>
  </div>

  <div>
    <h3>Protein Information</h3>
    <dl>
      <dd>Protein Name</dd>
      <dt><?php echo "$array[0]&nbsp" ?></dt>
      <dd>Family</dd>
      <dt><?php echo "$array[2]&nbsp" ?></dt>
      <dd>Species</dd>
      <dt><?php echo "$array[3]&nbsp" ?></dt>
      <dd>Genome</dd>
      <dt><?php echo "$array[4]&nbsp" ?></dt>
      <dd>EST</dd>
      <dt><?php echo "$array[5]&nbsp" ?></dt>
      <dd>Functional Domain</dd>
      <dt><?php echo "&nbsp" ?></dt>
      <dd>Function</dd>
      <dt><?php echo "&nbsp" ?></dt>
    </dl>
  </div>

  <?php
  $sql1="select orientation,sequenceATCG,sequenceAA,sequenceSECIS from protein where idWeb='$id'";
  $res1=mysqli_query($conn,$sql1);
  if(!$res1)
    {
      echo "<font color='white'>SQL QUERY ERROR</font>";
      die("QUERY ERROR");
    }
  $array1=mysqli_fetch_row($res1);

?>

  <div>
    <h3>Sequence</h3>
    <dl>
      <dd>Orientation</dd>
      <dt><?php echo "$array1[0]&nbsp" ?></dt>
      <dd>Nucleotide Sequence</dd>
      <dt><?php echo "$array1[1]&nbsp" ?></dt>
      <dd>Protein Sequence</dd>
      <dt>
        <?php
          $StringAA = $array1[2];
          for ($i = 0; $i < strlen($StringAA); $i++){
            if($StringAA[$i] == "U"){
              echo "<span style='color:#f00'>$StringAA[$i]</span>";
            }else{
              echo "$StringAA[$i]";
            }
          }
          echo "&nbsp"
       ?>
      </dt>
      <dd>SECIS Sequence</dd>
      <dt><?php echo "$array1[3]&nbsp" ?></dt>
    </dl>
  </div>

  <div>
    <h3>Structure Picture</h3>
  </div>



</div>

<footer>
  Copyright ©2017-2018 College of Life Sciences and Oceanography Shenzhen University<br>
  Address: 1066 xueyuan avenue, nanshan district, shenzhen, China<br>
  Phone: +86-0755-26536629, Fax: +86-0755-26534274, Postal Code: 518055<br>Email: jiangliang@szu.edu.cn<br>
</footer>

</body>
</html>

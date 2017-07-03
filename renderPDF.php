<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  display:table;
  margin:0 auto;
  width:100%;
}

td, th {
  border: 2px solid #000;
  padding: 8px;
}
.header{
  text-align:center;
}
.subHeader
{
  text-align:right;
}
</style>
</head>
<?php
header('Content-Type: text/html; charset=utf-8');
include dirname(dirname(__FILE__)) . '/sewa.ssdndeepu.com/config/config.php';
?>
<body>
  <?php
    $query = "SELECT * FROM testing ORDER BY ID desc LIMIT 1";
    $result = queryRunner::doSelect($query);
    $totalCount=$result[0]['Males_Count']+$result[0]['Females_Count']+$result[0]['Children_Count'];
    for($i=0;$i<$totalCount;++$i)
    {
  ?>
        <table>
          <tr>
            <th class="header" colspan="4">
              Shri Satguru Devay Namah
            </th>
          </tr>
          <tr>
            <th class="header" colspan="4">
              Anumati Pass
            </th>
          </tr>
          <tr>
            <td class="subHeader">
              S.No:
            </td>
            <td>
              <?php echo $result[0]['id'];?>
            </td>
            <td class="subHeader">
              Date:
            </td>
            <td>
              <?php $newDate = date("d/m/Y", strtotime($result[0]['created_at']));
              echo $newDate;
              ?>
            </td>
          </tr>
          <tr>
            <td class="subHeader">
              Sangat Incharge:
            </td>
            <td>
              <?php
               if($i==0){
                 echo $result[0]['Incharge_Name'];
               }
               else{
                 echo $result[0]['Member_Name_' . $i];
               }?>
            </td>
            <td class="subHeader">
              Mobile Number:
            </td>
            <td>
              <?php if($i==0){
                echo $result[0]['Incharge_Mobile'];
              }
              else{
                echo $result[0]['Mobile_' . $i];
              }?>
            </td>
          </tr>
          <tr>
            <td class="subHeader">
              Address:
            </td>
            <td colspan="3">
              <?php echo $result[0]['Address'];?>
            </td>
          </tr>
          <tr>
            <td class="subHeader">
              Details:
            </td>
            <td>
              <?php echo "T-" . $totalCount . " M-" . $result[0]['Males_Count'] . " F-" . $result[0]['Females_Count'] . " C-" . $result[0]['Children_Count'];?>
            </td>
            <td class="subHeader">
              Stay Period:
            </td>
            <td>
              <?php  $startDate = date("d/m/Y", strtotime($result[0]['Arrival_date']));
              $endDate = date("d/m/Y", strtotime($result[0]['Departure_date']));
              echo $startDate . "-" . $endDate ;?>
            </td>
          </tr>
          <tr>
            <td class="header" colspan="4">
              Note: This pass is only for Param Pujniye Ammaji’s Sangat.
            </td>
          </tr>
        </table>
        <br /><br />
      <?php
    }?>
</body>

</html>

<?php
// Turn off all error reporting
 error_reporting(0);

//get values from the form
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$emailaddress=$_POST['emailaddress'];
$phonenumber=$_POST['phonenumber'];
$residence=$_POST['residence'];
$age=$_POST['age'];
$job=$_POST['job'];
$accno=$_POST['accno'];
$basicsalary=$_POST['basicsalary'];
$allowance=$_POST['allowance'];
$otherdeductions=$_POST['otherdeductions'];

//Define some variables and constants for calculations
//NHIF
$nhif = 1500;
//NSSF
$nssf=200;

//use this as a simple guidance table
//  upto 12999=0 tax
// 13000-15999=0.05
// 16000-29999=0.1
// 30000-59999=0.2
// 60000-89999-0.35
// 90000-129999=0.4
// excess of 130000 =0.5
//we can use an array to stire the range and its calculative percentage

//we calculate PAYEE
$pensions= $basicsalary * 0.1;
$allowance = 48307 + 10000 ;
$deductions=$nhif + $nssf +$otherdeductions;
$grosssalary = $basicsalary + $allowance + $pension ;

if($grosssalary <=12999){
      $totalIncomeTax = ($grosssalary * 10) / 100;
}
elseif  ($grosssalary >= 13000 && $grosssalary<=15999){
      $totalIncomeTax = ((($grosssalary-12999)*15)/100) + 129.99;
}
elseif  ($grosssalary >= 16000 && $grosssalary<=29999){
      $totalIncomeTax = ((($grosssalary-15999)*15)/100) + 150.99;
      }
 elseif  ($grosssalary >= 30000 && $grosssalary<=59999){
            $totalIncomeTax = ((($grosssalary-30000)*20)/100) + 150.99;
            }
 else{
       $totalIncomeTax = ((($grosssalary-60000)*30)/100) + 750;
 }
 
 echo "<center><big>";echo "July- 2021 Payslip";echo "</big></center>";echo "<br>";
 echo "<table style='border=1'>";
 echo  "<thead>";             
echo  "  <tr scope='row'>"; echo "Employee Name";  echo"</tr>";
echo "<td scope='row'>".$firstname ; echo "&nbsp;&nbsp; ";echo  $lastname; echo "<td>";
echo "<br>";
echo  "  <tr>"; echo "Age";  echo"</tr>";
echo "<br>";
echo  "  <tr>"; echo "Account Number";  echo"</tr>";
echo "<br>";
echo  "  <tr>"; echo "Allowance";  echo"</tr>";
echo "<br>";
echo  "  <tr>"; echo "Job Position";  echo"</tr>";
echo "<br>";
echo  "  <tr>"; echo "Basic Salary";  echo"</tr>";
echo "<br>";
echo  "  <tr>"; echo "Total Deductions";  echo"</tr>";
echo "<br>";
echo  "  <tr>"; echo "Gross Salary";  echo"</tr>";
echo "<br>";
echo  "  <tr>"; echo "Net Pay";  echo"</tr>";
 
 echo  "</thead>";

 echo  "<tbody>";
 echo "</table>";
$netPay = $grosssalary - $totalIncomeTax;
echo "Employee Name :".$firstname ; echo "&nbsp;&nbsp; ";echo  $lastname; echo "<br>";
echo "age : ".$age ;echo "<br>";
echo "account Number : ".$accno ;echo "<br>";
echo "Allowance  : ".$allowance ;echo "&nbsp;&nbsp; ";echo"Shillings" ;echo "<br>";
echo "Job : ".$job ;echo "<br>";

echo "Basic Salary : ".$basicsalary;echo "&nbsp;&nbsp; ";echo "Shilling";echo "<br>";
echo "Total Deductions  : ".$deductions;echo "&nbsp;&nbsp; ";echo "Shillings";echo "<br>";
echo "Gross Salary : ".$grosssalary ;echo "&nbsp;&nbsp; ";echo "Shillings";echo "<br>";
echo "Net Pay : ".$netPay;


 ?>
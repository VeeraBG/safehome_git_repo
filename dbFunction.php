<?php    
error_reporting(0);
session_start();
include('dbConnect.php');  
class dbFunction
{
 function __construct() {  
              
            // connecting to database  
            $db = new dbConnect();
               
        }   
		// destructor  
        function __destruct() {  
              
        }

 public function get_sms()
  {
  $sql=mysql_query("select * from sms_report ORDER BY sms_id desc");
  $row=mysql_num_rows($sql);
  if($row>0)
  {
  return $sql;
  }
  }
   public function sms_report($to,$status,$group_ids,$homepage,$message1)
   {
  mysql_query("CREATE TABLE `sms_report` (
  `sms_id` int(100) NOT NULL AUTO_INCREMENT,
  `sms_group` varchar(300) NOT NULL,
  `sms_mob` varchar(300) NOT NULL,
  `sms_status` varchar(300) NOT NULL,
  `sms_report` varchar(300) NOT NULL,
  `sms_date` datetime NOT NULL,
  `apartment_id` varchar(100) NOT NULL,
  PRIMARY KEY (`sms_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ");
$qry=mysql_query("INSERT INTO  `safehomeisha`.`sms_report` (
`sms_id` ,`sms_group` ,`sms_mob` ,`sms_status` ,`sms_report` ,`sms_sms`,`sms_date` ,`apartment_id`)
VALUES ('','$group_ids','$to','$status','$homepage','$message1',NOW(),'')") or die(mysql_error());
if($qry)
{
return 1;
}
}
public function checkadminLogin($email,$password)	
{
	//echo "select * from admin where admin_email='".$email."' AND admin_password='".$password."'";
$sql=mysql_query("select * from admin where admin_email='".$email."' AND admin_password='".$password."'");	
$ret=mysql_num_rows($sql);
if($ret>=1)
{
return $sql;
}
else
{
return 0;
}

}
public function  getadmin($adminid)
{
$qry=mysql_query("select * from admin where admin_id='".$adminid."'");	
$super=mysql_num_rows($qry);
if($super>=1)
{
return $qry;
}
}
  
public function change_super_update($sadminid,$admin,$designation,$mob,$newFilePath)
{
$update_qry=mysql_query("update admin set admin_name='$admin',admin_image='$newFilePath',admin_mob='$mob',admin_designation='$designation',
admin_image='$newFilePath'  where admin_id='$sadminid'") or die(mysql_error());

if($update_qry)
{
return 1;
}

}
public function change_super_update1($sadminid,$admin,$designation,$mob)
{

$update_qry=mysql_query("update admin set admin_name='$admin',admin_mob='$mob',admin_designation='$designation'  
where admin_id='$sadminid'") or die(mysql_error());

if($update_qry)
{
return 1;
}

}
public function  change_super_pwd($sadminid,$npassword,$opassword,$cpassword)
{

$qry=mysql_query("select * from admin where admin_password='$opassword'");
$check=mysql_num_rows($qry);
if($check>=1 && ($npassword==$cpassword))
{
//echo "update admin set admin_password='$npassword' where admin_id='$sadminid'";
$update_qry=mysql_query("update admin set admin_password='$npassword' where admin_id='$sadminid'") or die(mysql_error());
if($update_qry)
{
return 1;
}
}
if($check<=0)
{
return 2;
}
if($npassword!=$cpassword)
{
return 3;
}
}

public function forgotPassword($femail)
{
$sql=mysql_query("select * from admin where admin_email='".$femail."' OR admin_name='".$femail."' ") or die(mysql_error());
$rows=mysql_num_rows($sql);
if($rows > 0)
{
return $sql;
}
else
{
return 2;
}
}
public function create_aprtment($apartmentname,$blocks,$floors,$flats,$newFilePath,$owners,$tenants,$president,$secretary,$treasurer,$address,$corporateoffices)
{
$qry1=mysql_query("insert into apartment(apartment_id,apartment_name,apartment_address,apartment_date) values ('','$apartmentname','$address',NOW())") or die(mysql_query());
$lid=mysql_insert_id();
$qry="INSERT INTO apartment_details(apartment_details_id, apartment_id, apartment_image, apartment_blocks, apartment_flats, apartment_floors, apartment_owners, apartment_tenants, apartment_corporateoffices, apartment_president, apartment_secretary, apartment_treasurer, apartment_date)
VALUES ('', '$lid', '$newFilePath', '$blocks', '$flats', '$floors', '$owners', '$tenants', '$corporateoffices', '$president', '$secretary', '$treasurer',NOW())";
$sql=mysql_query($qry);
if($qry)
{
return 1;
}
 }


public function create_owner($flatstatus,$ownertenant,$block,$floor,$flat,$name,$lname,$lphone,$mbno,$email,$occupation,$nop,$no_persons,$add_age_persons,$doc,$pass,$newFilePath,$add_mobile_persons,$slot1,$slot2,$bloodgroup,$sqft,$aprtment_id)
{
if($flatstatus=="Occupied")
{
$status="Active";
}
if($flatstatus=="Vacant")
{
$status="Deactive";
}

$sql="INSERT INTO owner (owner_id,owner_tenant,owner_flatstatus,owner_block, owner_name, owner_mobile, owner_no_persons, owner_date_occupancy,
owner_floor, owner_lname, owner_land_phone, owner_person1_name, owner_age,owner_occupation,
owner_flat, owner_date,owner_email,owner_password,owner_image,owner_addpersonsmbno,owner_status,owner_slot1,owner_slot2,owner_blood_group,owner_sqft,owner_apartment_id) 
VALUES ('','$ownertenant','$flatstatus','$block', '$name', '$mbno', '$nop', '$doc', '$floor', '$lname', '$lphone',
'$no_persons','$add_age_persons','$occupation','$flat',NOW(),'$email','$pass','$newFilePath','$add_mobile_persons','$status','$slot1','$slot2','$bloodgroup','$sqft',' $aprtment_id')";	

$rec=mysql_query($sql) or die(mysql_error());

if($rec)
{
//return $rec;
return 1;
}

}

public function edit_owner($name,$lname,$mbno,$lphone,$occupation,$add_mobile_persons,$add_age_persons,$nop,$person1,$block,$floor,$flat,$doc,$owner_id,$newFilePath2,$bloodgroup,$sqft)
{
// echo $bloodgroup;
// echo $sqft;
if($newFilePath2=="")
{
//echo "UPDATE owner SET owner_name='$name',owner_lname='$lname',owner_mobile='$mbno',owner_occupation='$occupation',owner_flat='$flat',owner_block='$block',owner_floor='$floor',
//owner_land_phone='$lphone',owner_no_persons='$nop',owner_person1_name='$person1',owner_age='$add_age_persons',owner_date_occupancy='$doc',owner_addpersonsmbno='$add_mobile_persons' WHERE owner_id=".$owner_id;
$sql="UPDATE owner SET owner_name='$name',owner_lname='$lname',owner_mobile='$mbno',owner_occupation='$occupation',owner_flat='$flat',owner_block='$block',owner_floor='$floor',
owner_land_phone='$lphone',owner_no_persons='$nop',owner_person1_name='$person1',owner_age='$add_age_persons',owner_date_occupancy='$doc',owner_addpersonsmbno='$add_mobile_persons',owner_blood_group='$bloodgroup',owner_sqft='$sqft' WHERE owner_id=".$owner_id;

$rec=mysql_query($sql) or die(mysql_error()); 
 }
else
{ 
$sql="UPDATE owner SET owner_name='$name',owner_lname='$lname',owner_mobile='$mbno',owner_occupation='$occupation',owner_flat='$flat',owner_block='$block',owner_floor='$floor',
owner_land_phone='$lphone',owner_no_persons='$nop',owner_person1_name='$person1',owner_image='$newFilePath2',owner_age='$add_age_persons',owner_date_occupancy='$doc',owner_addpersonsmbno='$add_mobile_persons',owner_blood_group='$bloodgroup',owner_sqft='$sqft' WHERE owner_id=".$owner_id;

$rec=mysql_query($sql) or die(mysql_error());

}
if($rec)
{
return 1;
}
}
	public function edit_owner_status($owner_id)
	{
	$qry=mysql_query("select * from owner where owner_id=".$owner_id);

  $get_sts=mysql_fetch_array($qry);
 $status=$get_sts['owner_status'];
  if($status=='Deactive')
  {
  	$updateqry=mysql_query("update owner set owner_status='Active',owner_flatstatus='Occupied' where owner_id=".$owner_id) or die(mysql_error());

  }
  else if($status=='Active')
  {
  $updateqry=mysql_query("update owner set owner_status='Deactive',owner_flatstatus='Vacant' where owner_id=".$owner_id) or die(mysql_error());

  }
    if($updateqry)
	{
	return 1;
	}
		else
	{
	return 0;
	}
	

	

	}


public function deleteOwner($id)
{

$sql=mysql_query("delete from owner where owner_id =".$id) or die(mysql_error());
if($sql)
{
return 1; 
}
}

public function getowner_details()
	{
	$get_owner=mysql_query("select * from owner ORDER BY owner_id DESC");
	$rec=mysql_num_rows($get_owner);
	//echo $rec;
	if($rec>=1)
	{
	
		return $get_owner;
		
	}
	}

public function get_owner_details($owner_id)
	{
	$get_owner=mysql_query("select * from owner where owner_id=".$owner_id);
	$rec=mysql_num_rows($get_owner);
	//echo $rec;
	if($rec>=1)
	{
	
		return $get_owner;
		
	}
	}
	


	//03-06-2015
	
	public function getsecurity_personal_details()
{	

$get_security_per=mysql_query("select * from security ORDER BY security_id desc");
	$rec=mysql_num_rows($get_security_per);
	//echo $rec;
	if($rec>=1)
	{
	
		return $get_security_per;
		
	}
}

	
	
public function create_security($cat,$name,$lname,$mbno,$code,$shift,$address,$newFilePath,$password,$email,$newFilePath2,$dno)
{

$qry=mysql_query("select * from security where security_email='$email' ");
$check_email=mysql_num_rows($qry);
if($check_email>0)
{
return 2;
}
else{
$security_hire_type="Permanent";
$status="Deactive";

 $query="INSERT INTO security (security_id, security_cat, security_name, security_lname, security_mobile, security_code, security_shift_type,security_Dno,security_address, security_upload_id,security_date,security_password,security_email,security_image,security_hiretype,security_status) 
VALUES ('', '$cat', '$name', '$lname', '$mbno', '$code','$shift','$dno', '$address', '$newFilePath',NOW(),'$password','$email','$newFilePath2','$security_hire_type','$status')";

$sql=mysql_query($query);
if($sql)
{
return 1;
}
}

}



//03-06-2015





/*
public function create_security($cat,$name,$lname,$mbno,$code,$cname,$shift,$address,$newFilePath,$password,$email,$newFilePath2,$companyname)
{

$qry=mysql_query("select * from security where security_email='$email' ");
$check_email=mysql_num_rows($qry);
if($check_email>0)
{
return 2;
}
else{

 $query="INSERT INTO security (security_id, security_cat, security_name, security_lname, security_mobile, security_code, security_company, security_shift_type, security_address, security_upload_id,security_date,security_password,security_email,security_image,security_apartment_id,Security_status) 
VALUES ('', '$cat', '$name', '$lname', '$mbno', '$code', '$cname', '$shift', '$address', '$newFilePath',NOW(),'$password','$email','$newFilePath2','','Active')";

$sql=mysql_query($query);
if($sql)
{
return 1;
}
}

} */
public function create_consecurity($companyname,$name,$lname,$mbno,$code,$shift,$address,$newFilePath,$password,$email,$newFilePath2,$dno)
{

$qry=mysql_query("select * from security where security_email='$email' ");
$check_email=mysql_num_rows($qry);
if($check_email>0)
{
return 2;
}
else{

 $query="INSERT INTO security (security_id, security_cat, security_name, security_lname, security_mobile, security_code,  security_shift_type,security_Dno, security_address, security_upload_id,security_date,security_password,security_email,security_image,security_hiretype,security_status) 
VALUES ('', '$companyname', '$name', '$lname', '$mbno', '$code',  '$shift','$dno','$address', '$newFilePath',NOW(),'$password','$email','$newFilePath2','Contract','Deactive')";

$sql=mysql_query($query) or die(mysql_error());
if($sql)
{
return 1;
}
}

}



public function update_security($security_id,$cat,$name,$lname,$mbno,$code,$shift,$dno,$address,$email,$newFilePath,$newFilePath2)
{
//echo "testimgggggggggggggggggggggggggggggggggggggggggggggggggggggggg";
//echo "...........singleimage....".$newFilePath2;
//echo "..........multi....".$newFilePath;
//echo "update security set security_cat='$cat', security_name='$name', security_lname='$lname', security_mobile='$mbno', 
//security_code='$code',  security_shift_type='$shift',security_Dno='$dno',security_address='$address',
// security_upload_id='$newFilePath2',security_image='$newFilePath',security_date=NOW(),security_email='$email'
// where security_id=".$security_id;

 //exit;
if($newFilePath!="" && $newFilePath2!="")
{
$qry=mysql_query("update security set security_cat='$cat', security_name='$name', security_lname='$lname', security_mobile='$mbno', security_code='$code',security_shift_type='$shift',security_Dno='$dno',security_address='$address', security_upload_id='$newFilePath2',security_image='$newFilePath',security_date=NOW(),security_email='$email' where security_id=".$security_id);
}
if($newFilePath!="" && $newFilePath2=="")
{
$qry=mysql_query("update security set security_cat='$cat', security_name='$name', security_lname='$lname', security_mobile='$mbno', security_code='$code',security_shift_type='$shift',security_Dno='$dno',security_address='$address',security_image='$newFilePath',security_date=NOW(),security_email='$email' where security_id=".$security_id);

}
if($newFilePath=="" && $newFilePath2!="")
{
			$qry=mysql_query("update security set security_cat='$cat', security_name='$name', security_lname='$lname', security_mobile='$mbno', security_code='$code',security_shift_type='$shift',security_Dno='$dno', security_address='$address',security_date=NOW(),security_upload_id='$newFilePath2',security_email='$email' where security_id=".$security_id);

}
 if($newFilePath=="" && $newFilePath2=="")
 {
		 $qry=mysql_query("update security set security_cat='$cat', security_name='$name', security_lname='$lname', security_mobile='$mbno', security_code='$code',security_shift_type='$shift',security_Dno='$dno',security_address='$address',security_date=NOW(),security_email='$email' where security_id=".$security_id);
	}
if($qry)
{
return 1;
}

}



public function update_consecurity($secid,$cat,$name,$lname,$mbno,$code,$shift,$dno,$address,$newFilePath,$newFilePath2)
{
// echo "update security set security_cat='$cat', security_name='$name', security_lname='$lname', security_mobile='$mbno', security_code='$code', security_shift_type='$shift',security_Dno='$dno',security_address='$address', security_upload_id='$newFilePath',security_image='$newFilePath2',security_date=NOW() where security_id=".$secid;
// exit;
if($newFilePath!="" && $newFilePath2!="")
{
$qry=mysql_query("update security set security_cat='$cat', security_name='$name', security_lname='$lname', security_mobile='$mbno', security_code='$code', security_shift_type='$shift',security_Dno='$dno', security_address='$address', security_upload_id='$newFilePath',security_image='$newFilePath2',security_date=NOW() where security_id=".$secid);
}
if($newFilePath!="" && $newFilePath2=="")
{
$qry=mysql_query("update security set security_cat='$cat', security_name='$name', security_lname='$lname', security_mobile='$mbno', security_code='$code', security_shift_type='$shift',security_Dno='$dno', security_address='$address', security_upload_id='$newFilePath',security_date=NOW() where security_id=".$secid);
}
if($newFilePath=="" && $newFilePath2!="")
{
$qry=mysql_query("update security set security_cat='$cat', security_name='$name', security_lname='$lname', security_mobile='$mbno', security_code='$code', security_shift_type='$shift',security_Dno='$dno', security_address='$address',security_image='$newFilePath2',security_date=NOW() where security_id=".$secid);
}
if($newFilePath=="" && $newFilePath2=="")
{
$qry=mysql_query("update security set security_cat='$cat', security_name='$name', security_lname='$lname', security_mobile='$mbno', security_code='$code', security_shift_type='$shift',security_Dno='$dno', security_address='$address',security_date=NOW() where security_id=".$secid);
}
if($qry)
{
return 1;
}
}


public function update_vendor($secid,$cat,$name,$lname,$mbno,$code,$shift,$dno,$address,$newFilePath,$newFilePath2)
{
// echo "update security set security_cat='$cat', security_name='$name', security_lname='$lname', security_mobile='$mbno', security_code='$code', security_shift_type='$shift',security_Dno='$dno',security_address='$address', security_upload_id='$newFilePath',security_image='$newFilePath2',security_date=NOW() where security_id=".$secid;
// exit;
if($newFilePath!="" && $newFilePath2!="")
{
$qry=mysql_query("update addvendor set vendor_cat='$cat', vendor_name='$name', vendor_lname='$lname', vendor_mobile='$mbno', vendor_code='$code', vendor_shift_type='$shift',vendor_Dno='$dno', vendor_address='$address', vendor_upload_id='$newFilePath',vendor_image='$newFilePath2',vendor_date=NOW() where vendor_id=".$secid);
}
if($newFilePath!="" && $newFilePath2=="")
{
$qry=mysql_query("update addvendor set vendor_cat='$cat', vendor_name='$name', vendor_lname='$lname', vendor_mobile='$mbno',vendor_code='$code', vendor_shift_type='$shift',vendor_Dno='$dno', vendor_address='$address', vendor_upload_id='$newFilePath',vendor_date=NOW() where vendor_id=".$secid);
}
if($newFilePath=="" && $newFilePath2!="")
{
$qry=mysql_query("update addvendor set vendor_cat='$cat', vendor_name='$name', vendor_lname='$lname', vendor_mobile='$mbno', vendor_code='$code', vendor_shift_type='$shift',vendor_Dno='$dno', vendor_address='$address',vendor_image='$newFilePath2',vendor_date=NOW() where vendor_id=".$secid);
}
if($newFilePath=="" && $newFilePath2=="")
{
$qry=mysql_query("update addvendor set vendor_cat='$cat', vendor_name='$name', vendor_lname='$lname', vendor_mobile='$mbno', vendor_code='$code', vendor_shift_type='$shift',vendor_Dno='$dno', vendor_address='$address',vendor_date=NOW() where vendor_id=".$secid);
}
if($qry)
{
return 1;
}
}




///////////////update security heir//////////////////////

public function update_security_hire($cat,$cname,$contactname,$lphone,$mbno,$email,$dno,$address,$tinno,$enrolldate,$applyfor,$duration,$charge,$newFilePath,$newExcelFilePath,$nop,$sechireid)
{
if($newFilePath!="" && $newExcelFilePath!="")
{
$qry=mysql_query("update security_hire set security_hire_cat='$cat',security_hire_companyname='$cname',security_hire_contactname='$contactname',security_hire_lphone='$lphone',security_hire_mobile='$mbno',security_hire_email='$email',security_hire_tinno='$tinno',security_hire_address='$address',security_hire_logo='$newFilePath',security_hire_enrolldate='$enrolldate',security_hire_nop='$nop',security_hire_excelfile='$newExcelFilePath',security_hire_applyfor='$applyfor',security_hire_duration='$duration',security_hire_charges='$charge' where security_hire_id=".$sechireid) or die(mysql_error());
}
if($newFilePath!="" && $newExcelFilePath=="")
{
$qry=mysql_query("update security_hire set security_hire_cat='$cat',security_hire_companyname='$cname',security_hire_contactname='$contactname',security_hire_lphone='$lphone',security_hire_mobile='$mbno',security_hire_email='$email',security_hire_tinno='$tinno',security_hire_address='$address',security_hire_logo='$newFilePath',security_hire_enrolldate='$enrolldate',security_hire_nop='$nop',security_hire_applyfor='$applyfor',security_hire_duration='$duration',security_hire_charges='$charge' where security_hire_id=".$sechireid) or die(mysql_error());

}
if($newFilePath=="" && $newExcelFilePath!="")
{
$qry=mysql_query("update security_hire set security_hire_cat='$cat',security_hire_companyname='$cname',security_hire_contactname='$contactname',security_hire_lphone='$lphone',security_hire_mobile='$mbno',security_hire_email='$email',security_hire_tinno='$tinno',security_hire_address='$address',security_hire_enrolldate='$enrolldate',security_hire_nop='$nop',security_hire_applyfor='$applyfor',security_hire_excelfile='$newExcelFilePath',security_hire_duration='$duration',security_hire_charges='$charge' where security_hire_id=".$sechireid) or die(mysql_error());

}
if($newFilePath=="" && $newExcelFilePath=="")
{
$qry=mysql_query("update security_hire set security_hire_cat='$cat',security_hire_companyname='$cname',security_hire_contactname='$contactname',security_hire_lphone='$lphone',security_hire_mobile='$mbno',security_hire_email='$email',security_hire_tinno='$tinno',security_hire_address='$address',security_hire_enrolldate='$enrolldate',security_hire_nop='$nop',security_hire_applyfor='$applyfor',security_hire_duration='$duration',security_hire_charges='$charge' where security_hire_id=".$sechireid) or die(mysql_error());

}
if($qry)
{
return 1;
}

}
////////////////////////security personal///////////////
// public function getsecurity_personal_details()
// {	

// $get_security_per=mysql_query("select * from security ORDER BY security_id desc");
	// $rec=mysql_num_rows($get_security_per);
	//echo $rec;
	// if($rec>=1)
	// {
	
		// return $get_security_per;
		
	// }
// }

public function create_vendor($companyname,$name,$lname,$mbno,$code,$shift,$address,$newFilePath,$password,$email,$newFilePath2,$dno)
{

$qry=mysql_query("select * from addvendor where vendor_email='$email' ");
$check_email=mysql_num_rows($qry);
if($check_email>0)
{
return 2;
}
else{

 $query="INSERT INTO addvendor (vendor_id, vendor_cat, vendor_name, vendor_lname, vendor_mobile, vendor_code,  vendor_shift_type,vendor_Dno, vendor_address, vendor_upload_id,vendor_date,vendor_password,vendor_email,vendor_image,vendor_hiretype,vendor_status) 
VALUES ('', '$companyname', '$name', '$lname', '$mbno', '$code',  '$shift','$dno','$address', '$newFilePath',NOW(),'$password','$email','$newFilePath2','Contract','Deactive')";

$sql=mysql_query($query) or die(mysql_error());
if($sql)
{
return 1;
}
}

}





public function getsecurity_update($csecurity_id)
	{
	//echo $csecurity_id;
		$get_security=mysql_query("select * from security where security_id='$csecurity_id'") or die(mysql_error());
	$rec=mysql_num_rows($get_security);


	//echo $rec;
	if($rec>=1)
	{
	
		return $get_security;
		
	}
	}
	
	public function getvendor_update($csecurity_id1)
	{
	echo "select * from addvendor where vendor_id='$csecurity_id1'";
echo $csecurity_id;
		$get_security=mysql_query("select * from addvendor where vendor_id=".$csecurity_id1) or die(mysql_error());
	$rec=mysql_num_rows($get_security);


	//echo $rec;
	if($rec>=1)
	{
	
		return $get_security;
		
	}
	}
	

public function get_security_personal_details($sec_id)
{

$get_sec=mysql_query("select * from security where security_id=".$sec_id);
	$rec=mysql_num_rows($get_sec);
	//echo $rec;
	if($rec>=1)
	{
	
		return $get_sec;
		
	}
}

public function delete_security_personal($id)
{
$qry=mysql_query("delete from security where security_id=".$id) or die(mysql_error());
  if($qry)
  {
  return 1;
  }

}



public function create_security_hire($cat,$cname,$contactname,$lphone,$mbno,$email,$address,$tinno,$enrolldate,$applyfor,$duration,$charge,$newFilePath,$newExcelFilePath,$nop,$dno)
{
 $qry="INSERT INTO security_hire (security_hire_id, security_hire_cat, security_hire_companyname, security_hire_contactname, security_hire_lphone, security_hire_mobile, security_hire_email, security_hire_tinno,security_hire_Dno, security_hire_address, security_hire_logo, security_hire_enrolldate, security_hire_nop, security_hire_excelfile, security_hire_applyfor, security_hire_duration, security_hire_charges,security_hire_date,security_apartment_id,security_hire_status)
 VALUES ('', '$cat', '$cname', '$contactname', '$lphone', '$mbno', '$email', '$tinno','$dno', '$address', '$newFilePath', '$enrolldate', '$nop', '$newExcelFilePath', '$applyfor', '$duration', '$charge',NOW(),'','Active')";
//echo $qry;
 $sql=mysql_query($qry);
if($sql)
{
return 1;
}

}
public function getsecurity_details()
{

$get_contract_per=mysql_query("select * from security ORDER BY security_id desc");
	$rec=mysql_num_rows($get_contract_per);
	//echo $rec;
	if($rec>=1)
	{
	
		return $get_contract_per;
		
	}
}
public function getsecurity_contract_details()
{

$get_contract_per=mysql_query("select * from agency");
		$rec=mysql_num_rows($get_contract_per);
	//echo $rec;
	if($rec>=1)
	{
	
		return $get_contract_per;
		
	}
}
public function getvendor_details()
{

$get_contract_per=mysql_query("select * from addvendor");
		$rec=mysql_num_rows($get_contract_per);
	//echo $rec;
	if($rec>=1)
	{
	
		return $get_contract_per;
		
	}
}
public function get_contract_security()
{
$qry=mysql_query("select * from security where security_hiretype='Contract' ");
$rec=mysql_num_rows($qry);
	//echo $rec;
	if($rec>0)
	{
	
		return $qry;
		
	}
}

public function get_contract_comapny_details()
{
$qry=mysql_query("select *from agency where agency_company_type='Contract' ");
$rec=mysql_num_rows($qry);
	//echo $rec;
	if($rec>0)
	{
	
		return $qry;
		
	}
}

public function get_security_hire_details($sechire_id)
{

$get_hire_per=mysql_query("select * from security_hire where security_hire_id=".$sechire_id);
	$rec=mysql_num_rows($get_hire_per);
	//echo $rec;
	if($rec>=1)
	{
	
		return $get_hire_per;
		
	}


}
public function delete_security_contract($id)
{

//echo "delete from security_hire where security_hire_id=".$id;
 $qry567=mysql_query("delete from security_hire where security_hire_id=".$id) or die(mysql_error());
if($qry567)
 {
 return 1;
 }
}



//start MALLESH



public function create_agency($cname,$contactname,$lphone,$mbno,$email,$address,$tinno,$enrolldate,$applyfor,$duration,$charge,$newFilePath,$newExcelFilePath,$nop,$agencytype,$dno)
{

$qry=mysql_query("select * from agency where agency_companyname='$cname' ");
$check_email=mysql_num_rows($qry);
if($check_email>0)
{
return 2;
}
else{
$qry5678="INSERT INTO agency (agency_id, agency_companyname, agency_contactname, agency_lphone, agency_mobile, agency_email, agency_tinno,agency_Dno,agency_address, agency_logo, agency_enrolldate, agency_nop, agency_excelfile, agency_applyfor, agency_duration, agency_charges,agency_date,agency_company_type)
 VALUES ('','$cname', '$contactname', '$lphone', '$mbno', '$email', '$tinno','$dno','$address', '$newFilePath', '$enrolldate', '$nop', '$newExcelFilePath', '$applyfor', '$duration', '$charge',NOW(),'$agencytype')";

 $sql453=mysql_query($qry5678);
if($sql453)
{
return 1;
}
}
}
public function getagency_details()
{
$qry=mysql_query("select * from agency ORDER BY agency_id desc")or die(mysql_error());
$row=mysql_num_rows($qry);
if($row>0)
{
return $qry;
}
}

public function get_company_details($agencyid)
{

$qry=mysql_query("select * from agency where agency_id=".$agencyid)or die(mysql_error());
$row=mysql_num_rows($qry);
if($row>0)
{
return $qry;
}
}

public function delete_agency($aid)
{
 $qry=mysql_query("delete from agency where agency_id=".$aid) or die(mysql_error());
  if($qry)
  {
  return 1;
  }
  }
  
public function update_agency($agencyid1,$cname,$contactname,$lphone,$mbno,$email,$address,$tinno,$enrolldate,$applyfor,$duration,$charge,$newFilePath,$newExcelFilePath,$nop,$agencytype,$dno)
{
//echo "update agency set agency_companyname='$cname', agency_contactname='$contactname', agency_lphone='$lphone', agency_mobile='$mbno', agency_email='$email', agency_tinno='$tinno', agency_address='$address', agency_logo='', agency_enrolldate='$enrolldate', agency_nop='$nop', agency_excelfile='', agency_applyfor='$applyfor', agency_duration='$duration', agency_charges='$charge',agency_date=NOW(),agency_company_type='$agencytype' where agency_id=".$agencyid1;
$chk_cm=mysql_query("select * from agency where agency_companyname='$cname' AND agency_id <> $agencyid1 ") or die(mysql_error());

$rows=mysql_num_rows($chk_cm);
if($rows>0)
{
return 2;
}
else
{

if($newFilePath!="" && $newExcelFilePath!="")
{
$qry234=mysql_query("update agency set agency_companyname='$cname', agency_contactname='$contactname', agency_lphone='$lphone', agency_mobile='$mbno', agency_email='$email', agency_tinno='$tinno',agency_Dno='$dno',agency_address='$address', agency_logo='$newFilePath', agency_enrolldate='$enrolldate', agency_nop='$nop', agency_excelfile='$newExcelFilePath', agency_applyfor='$applyfor', agency_duration='$duration', agency_charges='$charge',agency_date=NOW(),agency_company_type='$agencytype' where agency_id=".$agencyid1) or die(mysql_error());
}
if($newFilePath!="" && $newExcelFilePath=="")
{
$qry234=mysql_query("update agency set agency_companyname='$cname', agency_contactname='$contactname', agency_lphone='$lphone', agency_mobile='$mbno', agency_email='$email', agency_tinno='$tinno',agency_Dno='$dno',agency_address='$address', agency_logo='$newFilePath', agency_enrolldate='$enrolldate', agency_nop='$nop', agency_applyfor='$applyfor', agency_duration='$duration', agency_charges='$charge',agency_date=NOW(),agency_company_type='$agencytype' where agency_id=".$agencyid1) or die(mysql_error());
}
if($newFilePath=="" && $newExcelFilePath!="")
{
$qry234=mysql_query("update agency set agency_companyname='$cname', agency_contactname='$contactname', agency_lphone='$lphone', agency_mobile='$mbno', agency_email='$email', agency_tinno='$tinno',agency_Dno='$dno',agency_address='$address', agency_enrolldate='$enrolldate', agency_nop='$nop', agency_applyfor='$applyfor', agency_duration='$duration', agency_excelfile='$newExcelFilePath', agency_charges='$charge',agency_date=NOW(),agency_company_type='$agencytype' where agency_id=".$agencyid1) or die(mysql_error());
}
if($newFilePath=="" && $newExcelFilePath=="")
{
$qry234=mysql_query("update agency set agency_companyname='$cname', agency_contactname='$contactname', agency_lphone='$lphone', agency_mobile='$mbno', agency_email='$email', agency_tinno='$tinno',agency_Dno='$dno',agency_address='$address', agency_enrolldate='$enrolldate', agency_nop='$nop', agency_applyfor='$applyfor', agency_duration='$duration', agency_charges='$charge',agency_date=NOW(),agency_company_type='$agencytype' where agency_id=".$agencyid1) or die(mysql_error());
}
if($qry234)
{
return 1;
}
}

// UPDATE `safehome`.`agency` SET `agency_companyname` = 'valuelabs1', 
// `agency_company_type` = 'Contract1', `agency_contactname` = 'revanth Reddy1', 
// `agency_lphone` = '12345671', `agency_mobile` = '9898989971', `agency_email` = 'mallesh@gmail.com1',
 // `agency_tinno` = 'TN1001', `agency_address` = 'Hyderabad,gachibowli1 ', `agency_enrolldate` = '12-09-2015',
 // `agency_nop` = '2', `agency_applyfor` = 'test Engineer2', `agency_duration` = '56kmin2', `agency_charges` = '4502'
 // WHERE `agency`.`agency_id` = 1;
}

//MALLESH


 public function create_visitor($name,$lname,$mbno,$address,$newFilePath,$block,$floor,$flat,$reason123,$persontomeet,$idpersontomeet,$dno,$date)
 {
if($date=='')
{
	$date=date("Y-m-d H:i:s");
}
else{
	
	$date=$date;
}
$qry="INSERT INTO visitor (visitor_id, visitor_fname, visitor_lname, visitor_mobile, visitor_image,visitor_Dno,visitor_address, visitor_date,visitor_block,visitor_floor,visitor_flat,visitor_reason,visitor_persontomeet,visitor_ownerid,visitor_status,visitor_apartment_id,visitor_security_id) 
 VALUES ('', '$name', '$lname', '$mbno', '$newFilePath','$dno','$address','$date','$block','$floor','$flat','$reason123','$persontomeet','$idpersontomeet','Deactive','','')";

 $rec=mysql_query($qry) or die(mysql_error());
 if($rec)
 {
 return 1;
 }
 }
 
 public function view_visitor()
 {
 $get_visi123=mysql_query("select * from visitor");
	$rec=mysql_num_rows($get_visi123);
	//echo $rec;
	if($rec>=1)
	{
	
		return $get_visi123;
		
	}
 }
  public function view_visitor_today()
  {
	//echo CURDATE();  
$todaydate=date('Y-m-d');
//echo "select * from visitor where visitor_date like CURDATE()"; 
//exit;
//echo "select * from visitor where `visitor_date` like '%$todaydate%'";
 $get_visi=mysql_query("select * from visitor where `visitor_date` like '%$todaydate%'") or die(mysql_error());
	$rec=mysql_num_rows($get_visi);
	//echo $rec;
	if($rec>0)
	{
			return $get_visi;
		
	}
 }
 
   // public function total_permanent_security()
   // {
   // $qry=mysql_query("select * from security where security_hiretype='Permanent' ") or die(mysql_error());
   // $row=mysql_num_rows($qry);
   // if($row>0)
   // {
   // return $qry;
   // }
   // }
 
 public function  view_popup_visitor($visitor_id)
 {
 $get_vi=mysql_query("select * from visitor where visitor_id=".$visitor_id) or die(mysql_error());
	$rec1=mysql_num_rows($get_vi);
	//echo $rec;
	if($rec1>=1)
	{
	
		return $get_vi;
		
	}
 }
 public function searchVisitor($visitor_date)
 {
 // $getdate=array();
 // $get_visit=mysql_query("select * from visitor");
 // while($rec=mysql_fetch_array($get_visit))
 // {
 // $vdate=$rec['visitor_date'];
 
 // $getdate=explode(' ', $vdate);
 // print_r($getdate) ;
 // echo $date=$getdate[0];


$newDate = date("Y-m-d", strtotime($visitor_date));
// echo "select * from visitor where visitor_date like '$newDate%' ";
 $sql=mysql_query("select * from visitor where visitor_date like '$newDate%' ");
$r=mysql_num_rows($sql);
if($r>=1)
{
return $sql;
}
else
{
return 0;
}
 //}

 
 }
 
 
  public function search_visitor_fromto($fromdate,$todate)
  {
  $sqlfrom="select * from visitor WHERE DATE(visitor_date) BETWEEN '$fromdate' AND '$todate' ";
$qry=mysql_query($sqlfrom);
$r1=mysql_num_rows($qry);
if($r1 >=1)
{
return $qry;
}
else
{
return 0;
}
  }
    //////////////////////////Edit   floor/////////////////////////////////////////////////
  public function edit_floor($fid,$fname)
  {
  $qry=mysql_query("update floor set floor_name='$fname' where floor_id=".$fid) or die(mysql_error());
  if($qry)
  {
  return 1;
  }
  }
  
  
   //////////////////////////delete flat/////////////////////////////////////////////////
  public function delete_flat($flid)
  {
  $qry=mysql_query("delete from flat where flat_id=".$flid) or die(mysql_error());
  if($qry)
  {
  return 1;
  }
  }
    //////////////////////////Edit   flat/////////////////////////////////////////////////
  public function edit_flat($flid,$flname)
  {
  $qry=mysql_query("update flat set flat_name='$flname' where flat_id=".$flid) or die(mysql_error());
  if($qry)
  {
  return 1;
  }
  }
  public function create_cantent($temid)
  {
  $qry=mysql_query("select * from template where template_id='$temid'") or die(mysql_error());
  if($qry)
  {
  return $qry;
  }
  }
  public function create_template($tname,$tcantent)
  {
//echo "INSERT INTO template (template_id,template_name,template_cantent) VALUES ('','$tname','tcantent')";
 $sql=mysql_query("INSERT INTO template (template_id,template_name,template_cantent) VALUES ('','$tname','$tcantent')") or die(mysql_error());
  $row=mysql_num_rows($sql); 
  if($row>0)
  {
  return 1;
  }
  }
 public function create_group($groupname234)
  {
//echo "INSERT INTO smsgroup (group_id,group_name) VALUES ('','$groupname234')";
 $sql=mysql_query("INSERT INTO smsgroup (group_id,group_name) VALUES ('','$groupname234')") or die(mysql_error());
  $row=mysql_num_rows($sql); 
  if($row>0)
  {
  return 1;
  }
  }
  public function show_group($group_id)
  {
     if($group_id == 1)
   {
   $sql1=mysql_query("select * from owner ")or die(mysql_error());
  $row=mysql_num_rows($sql1); 
  if($row>0)
  {
  return array($sql1,'1');
  }
  }
  if($group_id==2)
  {
  $sql2=mysql_query("select * from security ")or die(mysql_error());
  $row=mysql_num_rows($sql2); 
  if($row>0)
  {
  return array($sql2,'2');
  }
  }
  if($group_id==3)
  {
  $sql3=mysql_query("select * from owner where owner_tenant='Tenant' ")or die(mysql_error());
  $row=mysql_num_rows($sql3); 
  if($row>0)
  {
  return array($sql3,'3');
  }
  }
  if($group_id==4)
  {
  $sql4=mysql_query("select * from security where security_hiretype='Contract' ")or die(mysql_error());
  $row=mysql_num_rows($sql4); 
  if($row>0)
  {
  return array($sql4,'4');
  }
  }
  if($group_id==5)
  {
  $sql5=mysql_query("select * from owner where owner_block='1' ")or die(mysql_error());
  $row=mysql_num_rows($sql5); 
  if($row>0)
  {
  return array($sql5,'5');
  }
  }
  }
  public function getblock_details()
  {
  $sql=mysql_query("select * from block ORDER BY block_name asc");
  $row=mysql_num_rows($sql);
  if($row>0)
  {
  return $sql;
  }
  }
  public function  blockid($blockid)
 {
 $sql=mysql_query("select * from block where block_id='$blockid'");
  $row=mysql_num_rows($sql);
  if($row>0)
  {
  return $sql;
  }
   }
   public function  flatid($blockid)
 {
 $sql=mysql_query("select * from flat where flat_id='$flatid'");
  $row=mysql_num_rows($sql);
  if($row>0)
  {
  return $sql;
  }
   }
   public function  floorid($floorid)
 {
 $sql=mysql_query("select * from floor where floor_id='$floorid'");
  $row=mysql_num_rows($sql);
  if($row>0)
  {
  return $sql;
  }
   }
 public function  add_block($blockname)
 {
 $bname=strtoupper($blockname);
$sql=mysql_query("select * from block where block_name='$bname'");
  $row=mysql_num_rows($sql);
  if($row >0)
  {
  return "error";
  }
  else if($row==0)
{
  $name=$fdet['block_name'];

  $qry=mysql_query("insert into block (block_id,block_name,block_date) values ('','$bname',NOW()) ") or die(mysql_error());
 }
 if($qry)
 {
 return 1;
 }

  else
  {
  return 2;
  }
  
  }
 
 
 
 
 public function edit_block($bid,$bname)
   {
   $blname=strtoupper($bname);
 // echo "update block set block_name='$bname' where block_id=".$bid;

  $qry=mysql_query("update block set block_name='$blname' where block_id=".$bid) or die(mysql_error());
  if($qry)
  {
  return 1;
  }
  }
  public function delete_block($bid)
  {
  
  $qry=mysql_query("delete from block where block_id=".$bid) or die(mysql_error());
  if($qry)
  {
  return 1;
  }
  }
  
   public function getfloor_details()
{
//echo "select * from floor";
$sqll=mysql_query("select * from floor ORDER BY floor_name asc");
 $row=mysql_num_rows($sqll);
 if($row>0)
 {
//  echo "ghasgd";
 return $sqll;
 }
 }
  public function getfloorbyblock()
 {
$query="SELECT block.*,floor.* FROM floor INNER JOIN block ON floor.floor_block_id=block.block_id ORDER BY floor_name asc";
 $sql=mysql_query($query);
 $row=mysql_num_rows($sql);
return $sql;
 }
 
   public function getfloor_detailsbyblock($block)
   {
  $query="SELECT * from  floor where floor_block_id=".$block;

 
 $sql=mysql_query($query) or die(mysql_error());
 $row=mysql_num_rows($sql);

return $sql;
   }
 
 public function add_floor($blockname,$floor)
 {
// echo "insert into floor (floor_id,floor_name,floor_block_id,floor_date) values ('','$floor','$blockname',NOW()) ";
 $qry=mysql_query("insert into floor (floor_id,floor_name,floor_block_id,floor_date) values ('','$floor','$blockname',NOW()) ") or die(mysql_error());
 if($qry)
 {
 return 1;
 }
 
 }
 public function delete_floor($fid)
 {
 $qry=mysql_query("delete from floor where floor_id=".$fid) or die(mysql_error());
 if($qry)
 {
 return 1;
 }
 }
 public function getflatbyfloorblock()
  {
  $query="SELECT b.*,f.*,fl.*  
           FROM block b,floor f,flat fl  
            WHERE fl.flat_block_id =b.block_id 
             AND fl.flat_floor_id =f.floor_id  ORDER BY flat_name asc"; 
              //AND b.block_id=fl.flat_block_id";
  
  $sql=mysql_query($query);
  $row=mysql_num_rows($sql); 
return $sql;
  }
 public function add_flat($blockid,$floorid,$flatname)
  {
 // echo "insert into flat (flat_id,flat_name,flat_block_id,flat_floor_id,flat_date) values ('','$flatname','$blockid',$floorid,$NOW()) ";
  $qry=mysql_query("insert into flat (flat_id,flat_name,flat_block_id,flat_floor_id,flat_date) values ('','$flatname','$blockid','$floorid',NOW())") or die(mysql_error());
  if($qry)
  {
  return 1;
  }
  
  }
 
		
// public function create_visitor($fname,$lname,$email,$dob,$mobile,$sex,$purpose,$apno,$address,$newFilePath)
// {
		// $visitor="CREATE TABLE IF NOT EXISTS `visitor` (
  // `visitor_id` int(11) NOT NULL AUTO_INCREMENT,
  // `visitor_fname` varchar(500) NOT NULL,
  // `visitor_lname` varchar(500) NOT NULL,
  // `visitor_email` varchar(500) NOT NULL,
  // `visitor_dob` varchar(500) NOT NULL,
  // `visitor_image` varchar(500) NOT NULL,
  // `visitor_mobile` varchar(500) NOT NULL,
  // `visitor_address` varchar(500) NOT NULL,
  // `visitor_purpose` varchar(500) NOT NULL,
  // `visitor_gender` varchar(100) NOT NULL,
  // `visitor_status` varchar(100) NOT NULL,
  // `visitor_apno` varchar(100) NOT NULL,
  // `visitor_date` datetime NOT NULL,UNIQUE (visitor_email),PRIMARY KEY (visitor_id)
// ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;";
// mysql_query($visitor) or die(mysql_error());
		
public function get_campaign()
{

	$query=mysql_query("select * from compaign") or die(mysql_error());
	return $query;
}


public function create_compaign($compaignname,$pname,$mbno,$lno,$email,$address,$comment,$newFilePath,$corporateoffices,$dno)
{
$status='active';
//echo "insert into compaign(compaign_id,compaign_name,compaign_pname,compaign_mbno,compaign_email,compaign_address,compaign_comment,compaign_image,compaign_corporateoffice) values ('','$compaignname','$pname,$mbno','$email',$address','$comment','$newFilePath','$corporateoffices')" ;
$qry1=mysql_query("INSERT INTO compaign(compaign_id,compaign_name,compaign_pname,compaign_mbno,compaign_lno,compaign_email,compaign_address,compaign_comment,compaign_image,compaign_apartment_id,compaign_corporateoffice,compaign_door_no,compaign_status)
                                VALUES ('','$compaignname','$pname','$mbno','$lno','$email','$address','$comment','$newFilePath','','$corporateoffices','$dno','$status')") or die(mysql_error());

if($qry1)
{
return 1;
}
 }
 
 
 
 
 public function  email_report_create($to,$status)
 {
//echo "insert into email_report (email_report_name,email_report_status,email_report_date) values ('$to','$status',NOW())";
$qry=mysql_query("insert into email_report (email_report_name,email_report_status,email_report_date)
 values ('$to','$status',NOW())") or die(mysql_error());

 if($qry)
{
return 1;
}
 }
  public function get_emails_rep()
  {
  $sql=mysql_query("select * from email_report ORDER BY email_report_id desc");
  $row=mysql_num_rows($sql);
  if($row>0)
  {
  return $sql;
  }
  }
 public function facilty_edit($block,$floor,$flat,$ownername,$priority,$facility,$seldate,$starttime,$endtime,$carea,$facid,$enddate)
{
$qry=mysql_query("update facility_booking set
facility_booking_block ='$block',
facility_booking_floor='$floor',
facility_booking_flat='$flat',
facility_booking_names='$ownername' ,
facility_booking_priority='$priority',
facility_booking_comments='$carea' ,
facility_booking_date='$seldate',
facility_enddate='$enddate',
facility_booking_starttime='$starttime',
facility_booking_endtime='$endtime',
facility_id='$facility' where facility_booking_id=".$facid) or die(mysql_error());
if($qry)
{
return 1;
}
}
public function create_faci_booking($block,$floor,$flat,$ownername,$priority,$facility,$seldate,$starttime,$endtime,$carea,$enddate,$ownerid)
{
	$aptid='';
	 
echo $qry=mysql_query("INSERT INTO  facility_booking(facility_booking_id ,
facility_booking_block ,facility_booking_floor ,
facility_booking_flat,facility_booking_names ,
facility_booking_priority ,facility_booking_comments ,
facility_booking_date ,facility_booking_starttime,
facility_booking_endtime ,facility_id,facility_enddate,facility_apartment_id,facility_booking_owner_id)
 VALUES ('',  '$block',  '$floor', '$flat','$ownername','$priority','$carea','$seldate',
 '$starttime','$endtime','$facility','$enddate','$aptid','$ownerid')") or die(mysql_error());

if($qry)
{
return 1;
}

}

 public function create_new_facility($faciname)
 {
 
 $chfac=mysql_query("select * from facility where facility_name='$faciname' ");
 if(mysql_num_rows($chfac)>0)
 {
 return 2;
 }
 $qry=mysql_query("insert into facility (facility_id,facility_name,facility_date) values ('','$faciname',NOW())") or die(mysql_error());
 
 if($qry)
 {
 return 1;
 }
 }
 
 public function  get_fac_d()
 {
 $qry=mysql_query("select * from facility") or die(mysql_error());
 $row=mysql_num_rows($qry);
 if($row>0)
 {
 return $qry;
 }
 }
 public function  get_fdetails($faid)
 {
 $qry=mysql_query("select * from facility_booking where facility_booking_id='$faid'") or die(mysql_error());
 $row=mysql_num_rows($qry);
 if($row>0)
 {
 return $qry;
 }
 }
 public function  facelity()
 {
 $qry=mysql_query("select * from facility_booking") or die(mysql_error());
 $row=mysql_num_rows($qry);
 if($row>0)
 {
 return $qry;
 }
 }
 
  public function edit_facility($facid,$facname)
  {
  // $cs=mysql_query("select * from facility where facility_name='$facname' AND facility_id <> $facid ") or die(mysql_error());
  // $facil=mysql_num_rows($cs);
 // if($facil>0)
 // {
 // return 3;
 // }
// else
// {
$qry=mysql_query("update facility set facility_name='$facname' where facility_id=".$facid) or die(mysql_error());
  if($qry)
  {
  return 1;
  }
  
  }
  
  
  public function delete_facilityboking($faid)
  {
  $qry=mysql_query("delete from facility_booking where facility_booking_id=".$faid);
  if($qry)
  {
  return 1;
  }
  }
  public function delete_facility($fid)
  {
  $qry=mysql_query("delete from facility where facility_id=".$fid);
  if($qry)
  {
  return 1;
  }
  }
//08-06-2015

public function  create_complaint($block,$floor,$flat,$name,$priority,$carea)
{

$qry=mysql_query("insert into complaint (complaint_id,complaint_block,complaint_floor,complaint_flat,complaint_name,complaint_priority,complaint_complaint,complaint_date,complaint_status)
values ('','$block','$floor','$flat','$name','$priority','$carea',NOW(),'Active')") or die(mysql_error());

if($qry)
{
return 1;
}
} 

public function  get_complaints()
{
if($qry=mysql_query("select * from complaint") or die(mysql_error()))
{
return $qry;
}

}
public function  get_cdetails($comid)
{
 $qry=mysql_query("select * from complaint where complaint_id=".$comid) or die(mysql_error());

$rows=mysql_num_rows($qry);
if($rows>0)
{
return $qry;
}

}
public function show_signature($sig_id)
{

$qry=mysql_query("select * from signature where signature_id=".$sig_id);
//echo $qry;
if($qry)
{
return $qry;
}


}
public function update_complaint($comid,$block,$floor,$flat,$name,$priority,$carea)
{

$qry=mysql_query("update complaint set complaint_block='$block',complaint_floor='$floor',
complaint_flat='$flat',complaint_name='$name',complaint_priority='$priority',
complaint_complaint='$carea' where  complaint_id=".$comid);

if($qry)
{
return 1;
}

}
public function delete_issues($bid)
{
$qry=mysql_query("delete from complaint where complaint_id=".$bid);
if($qry)
{
return 1;
}
}
public function update_society($mumbertype,$mumbername,$mumberid,$soid)
{

 $qry="update society_members set society_member_name='$mumbername',society_member_type='$mumbertype',society_member_id='$mumberid',society_date=NOW()  where society_id='$soid' " ;
 
 $sql=mysql_query($qry);
if($sql)
{
return 1;
}

}
public function create_society($mumbertype,$mumbername,$mumberid)
{
 $qry="INSERT INTO society_members (society_id,society_member_name, society_member_type, society_member_id,society_date,society_status)
 VALUES ('', '$mumbername', '$mumbertype', '$mumberid' ,NOW(),'Active')";
//echo $qry;
 $sql=mysql_query($qry);
if($sql)
{
return 1;
}

}
public function getsociety_details()
  {
  $sql=mysql_query("select * from society_members ");
  $row=mysql_num_rows($sql);
  if($row>0)
  {
  return $sql;
  }
  }
  public function delete_society($sid)
  {
  $qry=mysql_query("delete from society_members where society_id=".$sid);
  if($qry)
  {
  return 1;
  }
  }
  public function  get_sdetails($soid)
 {
 $qry=mysql_query("select * from society_members where society_id='$soid'") or die(mysql_error());
 $row=mysql_num_rows($qry);
 if($row>0)
 {
 return $qry;
 }
 }
 
 //18-06-2015
 public function create_expend($expname,$expprice,$apartment_id,$totalarea,$mainamtsqt)
{

// echo "insert into expenditure (expenditure_name,expenditure_price) values ('$expname','$expprice') ";
// exit;
// $apartment_id=1;

$qry=mysql_query("insert into expenditure (expenditure_name,expenditure_price,expenditure_apartment_id,total_apartment_area,maintenance_amt_sft) 
values ('$expname','$expprice','$apartment_id','$totalarea','$mainamtsqt') ") or die(mysql_error());
if($qry)
{
return 1;
}

}

public function edit_expen($eid,$ename,$eprice)
{
$qry=mysql_query("update expenditure set expenditure_name='$ename',expenditure_price='$eprice' where expenditure_id=".$eid) or die(mysql_error());
if($qry)
{
return 1;
}
}


public function delete_expen($eid)
{
$qry=mysql_query("delete from expenditure where expenditure_id=".$eid);
if($qry)
{
return 1;
}
}

//////////////////////Collection Tables////////////////////
 public function create_collection($apartment_id,$colprice,$collection_name)
{
//echo "Alekhya";
mysql_query("CREATE TABLE IF NOT EXISTS `collections` (
 `collection_id` int(11) NOT NULL,
 `collection_name` varchar(777) NOT NULL,
 `collection_price` varchar(400) NOT NULL,
 `collection_apartment_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1");
// echo "insert into collections (collection_price,collection_name,collection_apartment_id) 
// values ('$colprice','$collection_name','$apartment_id') ";

$qry=mysql_query("insert into collections (collection_id,collection_price,collection_name,collection_apartment_id) 
values ('','$colprice','$collection_name','$apartment_id') ") or die(mysql_error());
if($qry)
{
return 1;
}

}
public function  edit_collectionprice($eid,$ename,$cprice)
{
$qry=mysql_query("update collections set collection_name='$ename',collection_price='$cprice' 
where collection_id=".$eid) or die(mysql_error());
if($qry)
{
return 1;
}
}
 public function delete_collection($cid)
{
$qry=mysql_query("delete from collections where collection_id=".$cid);
if($qry)
{
return 1;
}
}
 
 
}
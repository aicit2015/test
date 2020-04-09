<?php

$mem_br= $_REQUEST["txt_member"];
$password = $_REQUEST["pass"];
$user_id= $_REQUEST["user_id"];



if(ctype_digit ($mem_br)  && strlen ($mem_br)== "10"){
$mem_id = substr($mem_br, 5,5 ); 
$br_no=substr($mem_br, 0 ,3 );
}

	$data_array =  array(
		
		    'mem_id'=>$mem_id,
		    'br_no'=>$br_no,
		    'password'=>$password,
			  'id_line' =>$user_id,
  );

    $options = array(
		'http' => array(
		  'method'  => 'POST',
		  'content' => json_encode( $data_array ),
		  'header'=>  "Content-Type: application/json\r\n" .
					  "Accept: application/json\r\n"
		  )
	  );
  
  $url = "https://aiconline.assiddeek.net/PHP-Slim-Restful/api/loginforline";
  $context  = stream_context_create( $options );
  $result = file_get_contents( $url, false, $context );
  $response = json_decode( $result );

   
   
  if($response->text_respons =="ไม่สามารถสมัครซ้ำได้ กรุณาติดต่อเจ้าหน้าที่")
  {
  echo
     '
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script src="jquery-3.2.1.min.js"></script>
     <script type="text/javascript">
     $(document).ready(function(){
     console.log("gg backend");
   
         swal({
           title: "แจ้งเตือน!",
           text: "ไม่สามารถสมัครซ้ำได้ กรุณาติดต่อเจ้าหน้าที่",
           icon: "warning",
   
       button : {
         visible: true,
         closeModal: true,
       }
     })
   
     .then(() => {
       
       window.location.assign("http://select2web-autobot-test.herokuapp.com/login_linebot/index.php")
     })
   
     });
     </script>
   
	 ';
	}else if($response->text_respons =="สมัครใช้งานส่งข้อความอัตโนมัติผ่านไลน์เรียบร้อยเเล้ว"){
		echo
     '
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script src="jquery-3.2.1.min.js"></script>
     <script type="text/javascript">
     $(document).ready(function(){
     console.log("gg backend");
   
         swal({
           title: "แจ้งเตือน!",
           text: "สมัครใช้งานเรียบร้อยเเล้ว",
           text: "ท่านจะได้รับการเเจ้งเตือนทำราการ ในวันถัดไป",
           icon: "success",
   
       button : {
         visible: true,
         closeModal: true,
       }
     })
   
     .then(() => {
       
       window.location.assign("http://select2web-autobot-test.herokuapp.com/login_linebot/index.php")
     })
   
     });
     </script>
   
	 ';
	}else{

		echo
     '
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script src="jquery-3.2.1.min.js"></script>
     <script type="text/javascript">
     $(document).ready(function(){
     console.log("gg backend");
   
         swal({
           title: "แจ้งเตือน!",
           text: "ไม่พบข้อมูลการใช้งาน Assiddeek touch หรือ ข้อมูลไม่ถูกต้อง",
           icon: "warning",
   
       button : {
         visible: true,
         closeModal: true,
       }
     })
   
     .then(() => {
       
       window.location.assign("http://select2web-autobot-test.herokuapp.com/login_linebot/index.php")
     })
   
     });
     </script>
   
	 ';
	}
	?>
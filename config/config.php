<?php
	class Config {
		private $HOST = "localhost";
		private $USERNAME = "root";
		private $PASSWORD = "";
		private $DB_NAME = "library_management_system";
		public $STUDENT_TABLE = "tbl_students";
		public $BOOK_TABLE = "tbl_books";
		public $BORROWING_TABLE = "tbl_borrowing";
		public $REPORTS_TABLE = "tbl_reports";
		public $TRANSACTION_TABLE = "tbl_transaction";
		public $USERS_TABLE = "tbl_users";
		public $conn;
		
		public function connect(){
			$this->conn = mysqli_connect($this->HOST,$this->USERNAME,$this->PASSWORD,$this->DB_NAME,);
			
			return $this->conn;
		}
		
		public function insert_student($fname, $lname, $gender, $age, $contact_no, $stud_email, $stud_pass){
			$this->connect();
			
			$query = "insert into $this->STUDENT_TABLE(fname,lname,gender,age,contact_no,stud_email,stud_pass) values('$fname','$lname','$gender',$age,$contact_no,'$stud_email','$stud_pass');";
			
			$res = mysqli_query($this->conn,$query);
			
			return $res;
			
		}
		
		public function fetch_all_students(){
			$this->connect();
			
			$query = "select * from $this->STUDENT_TABLE;";
			
			$res = mysqli_query($this->conn,$query);
			
			return $res;
		}
		
		public function fetch_single_student($stud_id){
			$this->connect();
			
			$query = "select * from $this->STUDENT_TABLE where stud_id=$stud_id;";
			
			$res = mysqli_query($this->conn,$query);
			
			return $res;
		}
		
		public function delete_student($stud_id){
			$this->connect();
			
			$fetched_student_res = $this->fetch_single_student($stud_id);
			
			$fetched_record = mysqli_fetch_assoc($fetched_student_res);
			
			if($fetched_record){
				$query = "delete from $this->STUDENT_TABLE where stud_id=$stud_id;";
			
				$res = mysqli_query($this->conn,$query);
				
				return $res;
			}else{
				return false;
			}
		}
		
		public function update_student($fname, $lname, $gender, $age, $contact_no, $stud_email, $stud_pass,$stud_id){
			$this->connect();
			
			$fetched_student_res = $this->fetch_single_student($stud_id);
			
			$fetched_record = mysqli_fetch_assoc($fetched_student_res);
			
			if($fetched_record){
				$query = "update $this->STUDENT_TABLE set fname='$fname',lname='$lname',gender='$gender',age='$age',contact_no='$contact_no',stud_email='$stud_email',stud_pass='$stud_pass' where stud_id=$stud_id;";
			
				$res = mysqli_query($this->conn,$query);
				
				return $res;
			}else{
				return false;
			}
		}
		
		public function insert_user($fname, $lname, $gender, $age, $contact_no, $user_email, $user_pass){
			$this->connect();
			
			$query = "insert into $this->USERS_TABLE(fname,lname,gender,age,contact_no,user_email,user_pass) values('$fname','$lname','$gender',$age,$contact_no,'$user_email','$user_pass');";
			
			$res = mysqli_query($this->conn,$query);
			
			return $res;
			
		}
		
		public function fetch_all_users(){
			$this->connect();
			
			$query = "select * from $this->USERS_TABLE;";
			
			$res = mysqli_query($this->conn,$query);
			
			return $res;
		}
		
		public function fetch_single_user($user_id){
			$this->connect();
			
			$query = "select * from $this->USERS_TABLE where user_id=$user_id;";
			
			$res = mysqli_query($this->conn,$query);
			
			return $res;
		}
		
		public function delete_user($user_id){
			$this->connect();
			
			$fetched_user_res = $this->fetch_single_user($user_id);
			
			$fetched_record = mysqli_fetch_assoc($fetched_user_res);
			
			if($fetched_record){
				$query = "delete from $this->USERS_TABLE where user_id=$user_id;";
			
				$res = mysqli_query($this->conn,$query);
				
				return $res;
			}else{
				return false;
			}
		}
		
		public function update_user($fname, $lname, $gender, $age, $contact_no, $user_email, $user_pass,$user_id){
			$this->connect();
			
			$fetched_student_res = $this->fetch_single_student($user_id);
			
			$fetched_record = mysqli_fetch_assoc($fetched_student_res);
			
			if($fetched_record){
				$query = "update $this->USERS_TABLE set fname='$fname',lname='$lname',gender='$gender',age='$age',contact_no='$contact_no',user_email='$user_email',user_pass='$user_pass' where user_id=$user_id;";
			
				$res = mysqli_query($this->conn,$query);
				
				return $res;
			}else{
				return false;
			}
		}
		
		public function insert_book($bk_title, $bk_name, $publisher, $author, $bk_num, $pub_date){
			$this->connect();
			
			$query = "insert into $this->BOOK_TABLE(bk_title,bk_name,publisher,author,bk_num,pub_date) values('$bk_title','$bk_name','$publisher','$author',$bk_num,'$pub_date');";
			
			$res = mysqli_query($this->conn,$query);
			
			return $res;
			
		}
		
		public function fetch_all_books(){
			$this->connect();
			
			$query = "select * from $this->BOOK_TABLE;";
			
			$res = mysqli_query($this->conn,$query);
			
			return $res;
		}
		
		public function fetch_single_book($book_id){
			$this->connect();
			
			$query = "select * from $this->BOOK_TABLE where book_id=$book_id;";
			
			$res = mysqli_query($this->conn,$query);
			
			return $res;
		}
		
		public function delete_book($book_id){
			$this->connect();
			
			$fetched_book_res = $this->fetch_single_book($book_id);
			
			$fetched_record = mysqli_fetch_assoc($fetched_book_res);
			
			if($fetched_record){
				$query = "delete from $this->BOOK_TABLE where book_id=$book_id;";
			
				$res = mysqli_query($this->conn,$query);
				
				return $res;
			}else{
				return false;
			}
		}
		
		public function update_book($bk_title, $bk_name, $publisher, $author, $bk_num, $pub_date){
			$this->connect();
			
			$fetched_book_res = $this->fetch_single_student($book_id);
			
			$fetched_record = mysqli_fetch_assoc($fetched_book_res);
			
			if($fetched_record){
				$query = "update $this->BOOK_TABLE set bk_title='$bk_title',bk_name='$bk_name',publisher='$publisher',author='$author',bk_num='$bk_num',pub_date='$pub_date' where book_id=$book_id;";
			
				$res = mysqli_query($this->conn,$query);
				
				return $res;
			}else{
				return false;
			}
		}
		
		public function insert_borrowing($borrowed_date, $return_date){
			$this->connect();
			
			$query = "insert into $this->BORROWING_TABLE(borrowed_date,return_date) values('$borrowed_date','$return_date');";
			
			$res = mysqli_query($this->conn,$query);
			
			return $res;
			
		}
		
		public function fetch_all_borrowings(){
			$this->connect();
			
			$query = "select * from $this->BORROWING_TABLE;";
			
			$res = mysqli_query($this->conn,$query);
			
			return $res;
		}
		
		public function fetch_single_borrowing($borrow_id){
			$this->connect();
			
			$query = "select * from $this->BORROWING_TABLE where borrow_id=$borrow_id;";
			
			$res = mysqli_query($this->conn,$query);
			
			return $res;
		}
		
		public function delete_borrowing($borrow_id){
			$this->connect();
			
			$fetched_borrowing_res = $this->fetch_single_borrowing($borrow_id);
			
			$fetched_record = mysqli_fetch_assoc($fetched_borrowing_res);
			
			if($fetched_record){
				$query = "delete from $this->BORROWING_TABLE where borrow_id=$borrow_id;";
			
				$res = mysqli_query($this->conn,$query);
				
				return $res;
			}else{
				return false;
			}
		}
		
		public function update_borrowing($borrowed_date, $return_date){
			$this->connect();
			
			$fetched_borrowing_res = $this->fetch_single_borrowing($borrow_id);
			
			$fetched_record = mysqli_fetch_assoc($fetched_borrowing_res);
			
			if($fetched_record){
				$query = "update $this->BORROWING_TABLE set borrowed_date='$borrowed_date',return_date='$return_date' where borrow_id=$borrow_id;";
			
				$res = mysqli_query($this->conn,$query);
				
				return $res;
			}else{
				return false;
			}
		}
		
		public function insert_transaction($trans_name, $trans_date){
			$this->connect();
			
			$query = "insert into $this->TRANSACTION_TABLE(trans_name,trans_date) values('$trans_name','$trans_date');";
			
			$res = mysqli_query($this->conn,$query);
			
			return $res;
			
		}
		
		public function fetch_all_transactions(){
			$this->connect();
			
			$query = "select * from $this->TRANSACTION_TABLE;";
			
			$res = mysqli_query($this->conn,$query);
			
			return $res;
		}
		
		public function fetch_single_transaction($trans_id){
			$this->connect();
			
			$query = "select * from $this->TRANSACTION_TABLE where trans_id=$trans_id;";
			
			$res = mysqli_query($this->conn,$query);
			
			return $res;
		}
		
		public function delete_transaction($trans_id){
			$this->connect();
			
			$fetched_transaction_res = $this->fetch_single_transaction($trans_id);
			
			$fetched_record = mysqli_fetch_assoc($fetched_transaction_res);
			
			if($fetched_record){
				$query = "delete from $this->TRANSACTION_TABLE where trans_id=$trans_id;";
			
				$res = mysqli_query($this->conn,$query);
				
				return $res;
			}else{
				return false;
			}
		}
		
		public function update_transaction($trans_name, $trans_date){
			$this->connect();
			
			$fetched_transaction_res = $this->fetch_single_transaction($trans_id);
			
			$fetched_record = mysqli_fetch_assoc($fetched_transaction_res);
			
			if($fetched_record){
				$query = "update $this->TRANSACTION_TABLE set trans_name='$trans_name',trans_date='$trans_date' where trans_id=$trans_id;";
			
				$res = mysqli_query($this->conn,$query);
				
				return $res;
			}else{
				return false;
			}
		}
		
		public function insert_Reports($report_date){
			$this->connect();
			
			$query = "insert into $this->REPORT_TABLE(report_date) values('$report_date');";
			
			$res = mysqli_query($this->conn,$query);
			
			return $res;
			
		}
		
		public function fetch_all_reports(){
			$this->connect();
			
			$query = "select * from $this->REPORT_TABLE;";
			
			$res = mysqli_query($this->conn,$query);
			
			return $res;
		}
		
		public function fetch_single_report($report_id){
			$this->connect();
			
			$query = "select * from $this->REPORT_TABLE where report_id=$report_id;";
			
			$res = mysqli_query($this->conn,$query);
			
			return $res;
		}
		
		public function delete_report($report_id){
			$this->connect();
			
			$fetched_report_res = $this->fetch_single_report($report_id);
			
			$fetched_record = mysqli_fetch_assoc($fetched_report_res);
			
			if($fetched_record){
				$query = "delete from $this->REPORT_TABLE where report_id=$report_id;";
			
				$res = mysqli_query($this->conn,$query);
				
				return $res;
			}else{
				return false;
			}
		}
		
		public function update_report($report_date){
			$this->connect();
			
			$fetched_report_res = $this->fetch_single_report($report_id);
			
			$fetched_record = mysqli_fetch_assoc($fetched_report_res);
			
			if($fetched_record){
				$query = "update $this->REPORT_TABLE set report_date='$report_date'where report_id=$report_id;";
			
				$res = mysqli_query($this->conn,$query);
				
				return $res;
			}else{
				return false;
			}
		}
	}
?>
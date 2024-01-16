<?php
    class StudentManager
    {
        public $conn;

        public function __construct()
        {
            //replace these database connection details with your actual credentials
            $severname = "localhost:3306";
            $username = "root";
            $password = "";
            $dbname = "slot2";

            //creation connection
            $this->conn = new mysqli($severname,$username,$password,$dbname);

            //check connection
            if ($this->conn->connect_error){
                die("Connection failed: ". $this->conn->connect_error);
            }
        }
        public function getAllStudents()
        {
            $students = [];
            $sql = "select * from students";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()){
                $students[] = $row;
            }
            $stmt->close();
            return $students;
        }
        public function addStudent($id,$name,$address)
        {
            $sql = "insert into students (id,name,address) values (?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("iss",$id,$name,$address);
            $stmt->execute();
            $stmt->close();
        }
        public function getStudentById($id)
        {
            $sql = "select * from students where id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i",$id);
            $stmt->execute();

            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $stmt->close();

            return $row;
        }
        public function updateStudent($id,$name,$address)
        {
            $sql = "update students set name = ?, address = ? where id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssi",$name,$address,$id);
            $stmt->execute();
            $stmt->close();
        }
        public function deleteStudent($id)
        {
            $sql = "delete from students where id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $stmt->close();
        }
        public function getMarkDetails()
        {
            $markDetails = [];
            $sql ="select students.id AS student_id,students_name AS student_name,subjects.name AS subject_name,marks.mark
            From students
            inner join marks ON student.id = marks.student_id
            inner join subjects ON marks.subject_id = subjects.id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()){
                $markDetails[] = $row;
            }
            $stmt->close();

            return $markDetails;
        }
        public function getAllStudentsWithMarks()
        {
            $students = [];

            //lay danh sach sinh vien va so diem
            $sql = "select students.id,students.name,students.address,COUNT(marks.id) AS mark_count
            FROM students
            left join marks ON students.id = marks.student_id
            GROUP BY students.id, students.name, students.address";
            $result = $this->conn->prepare($sql);

            if ($result -> num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    $students[] = $row;
                }
            }
            return $students;
        }
        public function __destruct()
        {
            $this->conn->close();
        }
    }
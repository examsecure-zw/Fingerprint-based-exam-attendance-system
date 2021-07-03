<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

//Get All Students
$app->get('/api/students', function(Request $request, Response $response){
   $sql = "SELECT * FROM students";
    
    try{
        //Get DB Object
        $db = new db();
        //Connect
        $db = $db->connect();
        
        $stmt = $db->query($sql);
        $students = $stmt->fetchAll(PDO::FETCH_OBJ);;
        $db = null;
        echo json_encode($students);
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

//Get Single Student
$app->get('/api/student/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');
   $sql = "SELECT * FROM students WHERE id = $id";
    
    try{
        //Get DB Object
        $db = new db();
        //Connect
        $db = $db->connect();
        
        $stmt = $db->query($sql);
        $student = $stmt->fetchAll(PDO::FETCH_OBJ);;
        $db = null;
        echo json_encode($student);
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

//Add Student Biometric Data
$app->get('/api/bio_data/{id}', function(Request $request, Response $response){
    $session = $request->getAttribute('id');
    $session = htmlspecialchars($session);
    $machine_code = "cyber1";
    
   // INSERT INTO `bio_data`(`id`, `machine_code`, `session`, `status`, `date`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
        
    $sql = "INSERT INTO bio_data (machine_code,session,date) VALUES ('$machine_code',$session,NOW())";
    
    try{
        //Get DB Object
        $db = new db();
        //Connect
        $db = $db->connect();
        
        $stmt = $db->prepare($sql);
        $stmt->execute();
        
        echo '{"notice": {"text": "Student Bio Data Added"}';
    }catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});
?>
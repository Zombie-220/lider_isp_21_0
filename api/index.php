<?php
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: *");
    http_response_code(200);
    exit(0);
}

header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");

$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", trim($_SERVER['REQUEST_URI'], "/" ) );

$conn = mysqli_connect("localhost", "deniskxw_db", "0ybHQqS5%lCZ", "deniskxw_db");
if (!$conn) { die("Ошибка подключения: " . mysqli_connect_error()); }

if( $request[0] !== "") {
    switch($request[0]) {
        case 'questions':
            $data = json_decode(file_get_contents('php://input', true));
            $result = mysqli_query($conn, "SELECT title FROM questions WHERE id=$data->questionCounter");
            if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
            $row = mysqli_fetch_assoc($result);
            $question = $row['title'];

            echo json_encode([ 'question' => $question ]);
            break;
        case 'answers':
            switch($request[1]) {
                case 'all':
                    function __getAnswer($conn, $number, $n) {
                        $temp = "answer_$n";
                        $result = mysqli_query($conn, "SELECT $temp FROM questions WHERE id=$number");
                        if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
                        $row = mysqli_fetch_assoc($result);
                        return $row["$temp"];
                    }
                    
                    $data = json_decode(file_get_contents('php://input', true));
                    $answers = array(
                        __getAnswer($conn, $data->questionCounter, 1),
                        __getAnswer($conn, $data->questionCounter, 2),
                        __getAnswer($conn, $data->questionCounter, 3),
                        __getAnswer($conn, $data->questionCounter, 4)
                    );

                    echo json_encode([ 'answers' => $answers ]);
                    break;
                case 'right':
                    $data = json_decode(file_get_contents('php://input', true));
                    $result = mysqli_query($conn, "SELECT answer FROM questions WHERE id=$data->questionId");
                    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
                    $row = mysqli_fetch_assoc($result);
                    $answer = $row['answer'];

                    echo json_encode([ 'answer' => $answer ]);
                    break;
            }
            break;
        case 'image':
            $data = json_decode(file_get_contents('php://input', true));
            $result = mysqli_query($conn, "SELECT questionImage FROM questions WHERE id = $data->questionCounter");
            if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
            $row = mysqli_fetch_assoc($result);
            $image = $row['questionImage'];
            
            echo json_encode([ 'image' => $image ]);
            break;
        case 'users':
            switch($request[1]) {
                case 'add':
                    $data = json_decode(file_get_contents('php://input', true));
                    $result = mysqli_query($conn, "INSERT INTO users(userName, score) VALUES('$data->userName', $data->score)");
                    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }

                    echo json_encode([ 'status' => 200 ]);
                    break;
                case 'liders':
                    $data = json_decode(file_get_contents('php://input', true));
                    $usersTable = array();
                    $scoreTable = array();
                    
                    $result = mysqli_query($conn, 'SELECT id FROM users ORDER BY id DESC;');
                    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
                    $row = mysqli_fetch_assoc($result);
                    $length = $row['id'];
                    
                    $result = mysqli_query($conn, "SELECT userName, score FROM users ORDER BY score DESC;");
                    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
                    
                    for ($i=1; $i<=$length; $i++) {
                        $row = mysqli_fetch_array($result);
                        if ($row) {
                            $usersTable[] = $row['userName'];
                            $scoreTable[] = $row['score'];
                        }
                    }
        
                    echo json_encode([ 'usersTable' => $usersTable, 'scoreTable' => $scoreTable ]);
                    break;
            }
            break;
        case 'files':
            switch($request[1]) {
                    case 'add':
                        $data = json_decode(file_get_contents('php://input', true));
                        $filePath = './files/'. $data->name .'.txt';
                        file_put_contents($filePath, $data->content);
                        
                        echo json_encode([ 'status' => 200 ]);
                        break;
                    case 'all':
                        $files = glob('./files/*');
                        $filesArray = array();
                        foreach ($files as $file) {
                            $filesArray[] = $file;
                        }
                        echo json_encode(['filesName' => $filesArray]);
                        break;
            }
            break;
        case 'chat':
            switch($request[1]) {
                case 'messages':
                    switch($request[2]) {
                        case 'all':
                            $users = array();
                            $messages = array();
                            $timeStamp = array();
                            
                            $result = mysqli_query($conn, "SELECT userName, message, create_at FROM chat ORDER BY create_at ASC;");
                            if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
                            
                            for ($i=0; $i<=10000; $i++) {
                                $row = mysqli_fetch_array($result);
                                if ($row) {
                                    $users[] = $row['userName'];
                                    $messages[] = $row['message'];
                                    $timeStamp[] = $row['create_at'];
                                } else { break; }
                            }
                            echo json_encode(['users' => $users, 'message' => $messages, 'timeStamp' => $timeStamp]);
                            break;
                        case 'add':
                            $data = json_decode(file_get_contents('php://input', true));
                            $result = mysqli_query($conn, "INSERT INTO chat(userName, message, ipAddress) VALUES('$data->userName', '$data->message', '$data->ip');");
                            if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
                            echo json_encode(['status' => 200]);
                            break;
                        case 'get':
                            $param = $request[3];
                            $messages = array();
                            $timeStamp = array();
                            
                            $result = mysqli_query($conn, "SELECT message, create_at FROM chat WHERE userName='$param';");
                            if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
                            
                            for ($i=0; $i<=10000; $i++) {
                                $row = mysqli_fetch_array($result);
                                if ($row) {
                                    $messages[] = $row['message'];
                                    $timeStamp[] = $row['create_at'];
                                } else { break; }
                            }
                            echo json_encode(['message' => $messages, 'timeStamp' => $timeStamp]);
                            break;
                    }
                    break;
            }
            break;
        }
} else {
    echo "Index api page";
}
?>
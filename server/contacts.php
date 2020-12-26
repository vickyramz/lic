<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");


$hn      = '';
$username = "u330404416_linch";
$pwd = "gOy+j2T+w0I";
$dbname = "u330404416_linch";
$cs      = 'utf8';




// Set up the PDO parameters
$dsn     = "mysql:host=" . $hn . ";port=3306;dbname=" . $dbname . ";charset=" . $cs;
$opt     = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_EMULATE_PREPARES   => false,
);
// Create a PDO instance (connect to the database)
$pdo     = new PDO($dsn, $username, $pwd, $opt);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Retrieve the posted data
$json    =  file_get_contents('php://input');
$obj     =  json_decode($json);
$key     =  strip_tags($obj->key);


switch ($key) {

        // Update an existing record in the technologies table
    case "login":

        // Sanitise URL supplied values
        $email       = filter_var($obj->email, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $password      = filter_var($obj->password, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);

        $message;

        // Attempt to run PDO prepared statement
        try {
            $sql     = "SELECT * FROM user WHERE email = :email AND password = :password";
            $stmt     =    $pdo->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);


            $stmt->execute();

            $obj = $stmt->fetchObject();
            if ($obj > 0) {
                echo json_encode($obj);
            }
        }
        // Catch any errors in running the prepared statement
        catch (PDOException $e) {
            echo $e->getMessage();
        }

        break;

        // Add a new record to the technologies table
    case "create":

        try {
            $FIRST = filter_var($obj->FIRST, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $LAST = filter_var($obj->LAST, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $COMPANY = filter_var($obj->COMPANY, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $TITLE = filter_var($obj->TITLE, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $OFFICE = filter_var($obj->OFFICE, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $CELLPHONE = filter_var($obj->CELLPHONE, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $EMAIL = filter_var($obj->EMAIL, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $INDUSTRY = filter_var($obj->INDUSTRY, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $COMMENT = filter_var($obj->COMMENT, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $MEMO = filter_var($obj->MEMO, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $MinCapRate = filter_var($obj->MinCapRate, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $MaxPSF = filter_var($obj->MaxPSF, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $unit = filter_var($obj->unit, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $MaxGRM = filter_var($obj->MaxGRM, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $ADDRESS = filter_var($obj->ADDRESS, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $CITY = filter_var($obj->CITY, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $STATE = filter_var($obj->STATE, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $ZIP = filter_var($obj->ZIP, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $RecordNo = filter_var($obj->RecordNo, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $HOME = filter_var($obj->HOME, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $active_buyer = filter_var($obj->active_buyer, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $EXCLSVBUYR = filter_var($obj->EXCLSVBUYR, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $RATECOMMIS = filter_var($obj->RATECOMMIS, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $SIGNDATEXL = filter_var($obj->SIGNDATEXL, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $EXPIRAEXCL = filter_var($obj->EXPIRAEXCL, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $WEBSITE = filter_var($obj->WEBSITE, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);

            $sql = "INSERT INTO wp_ali_contacts (FIRST,LAST,COMPANY,TITLE,OFFICE,CELLPHONE,EMAIL,INDUSTRY,COMMENT,MEMO,MinCapRate,MaxPSF,unit,MaxGRM,ADDRESS,CITY,STATE,ZIP,RecordNo,HOME,active_buyer,EXCLSVBUYR,RATECOMMIS,SIGNDATEXL,EXPIRAEXCL,WEBSITE) VALUES (:FIRST,:LAST,:COMPANY,:TITLE,:OFFICE,:CELLPHONE,:EMAIL,:INDUSTRY,:COMMENT,:MEMO,:MinCapRate,:MaxPSF,:unit,:MaxGRM,:ADDRESS,:CITY,:STATE,:ZIP,:RecordNo,:HOME,:active_buyer,:EXCLSVBUYR,:RATECOMMIS,:SIGNDATEXL,:EXPIRAEXCL,:WEBSITE)";

            $query = $pdo->prepare($sql);
            $query->bindparam(':FIRST', $FIRST);
            $query->bindparam(':LAST', $LAST);
            $query->bindparam(':COMPANY', $COMPANY);
            $query->bindparam(':TITLE', $TITLE);
            $query->bindparam(':OFFICE', $OFFICE);
            $query->bindparam(':CELLPHONE', $CELLPHONE);
            $query->bindparam(':EMAIL', $EMAIL);
            $query->bindparam(':INDUSTRY', $INDUSTRY);
            $query->bindparam(':COMMENT', $COMMENT);
            $query->bindparam(':MEMO', $MEMO);
            $query->bindparam(':MinCapRate', $MinCapRate);
            $query->bindparam(':MaxPSF', $MaxPSF);
            $query->bindparam(':unit', $unit);
            $query->bindparam(':MaxGRM', $MaxGRM);
            $query->bindparam(':ADDRESS', $ADDRESS);
            $query->bindparam(':CITY', $CITY);
            $query->bindparam(':STATE', $STATE);
            $query->bindparam(':ZIP', $ZIP);
            $query->bindparam(':RecordNo', $RecordNo);
            $query->bindparam(':HOME', $HOME);
            $query->bindparam(':active_buyer', $active_buyer);
            $query->bindparam(':EXCLSVBUYR', $EXCLSVBUYR);
            $query->bindparam(':RATECOMMIS', $RATECOMMIS);
            $query->bindparam(':SIGNDATEXL', $SIGNDATEXL);
            $query->bindparam(':EXPIRAEXCL', $EXPIRAEXCL);
            $query->bindparam(':WEBSITE', $WEBSITE);
            $query->execute();


            echo json_encode(array('message' => 'Congratulations the record ' . $name . ' was added to the database'));
        }
        // Catch any errors in running the prepared STATEment
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        break;


    case "update":

        try {

            $id    =    filter_var($obj->id, FILTER_SANITIZE_NUMBER_INT);


            $FIRST = filter_var($obj->FIRST, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $LAST = filter_var($obj->LAST, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $COMPANY = filter_var($obj->COMPANY, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $TITLE = filter_var($obj->TITLE, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $OFFICE = filter_var($obj->OFFICE, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $CELLPHONE = filter_var($obj->CELLPHONE, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $EMAIL = filter_var($obj->EMAIL, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $INDUSTRY = filter_var($obj->INDUSTRY, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $COMMENT = filter_var($obj->COMMENT, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $MEMO = filter_var($obj->MEMO, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $MinCapRate = filter_var($obj->MinCapRate, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $MaxPSF = filter_var($obj->MaxPSF, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $unit = filter_var($obj->unit, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $MaxGRM = filter_var($obj->MaxGRM, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $ADDRESS = filter_var($obj->ADDRESS, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $CITY = filter_var($obj->CITY, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $STATE = filter_var($obj->STATE, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $ZIP = filter_var($obj->ZIP, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $RecordNo = filter_var($obj->RecordNo, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $HOME = filter_var($obj->HOME, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $active_buyer = filter_var($obj->active_buyer, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $EXCLSVBUYR = filter_var($obj->EXCLSVBUYR, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $RATECOMMIS = filter_var($obj->RATECOMMIS, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $SIGNDATEXL = filter_var($obj->SIGNDATEXL, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $EXPIRAEXCL = filter_var($obj->EXPIRAEXCL, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $WEBSITE = filter_var($obj->WEBSITE, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);

            $sql = "UPDATE wp_ali_contacts SET FIRST=:FIRST,LAST=:LAST,COMPANY=:COMPANY,TITLE=:TITLE,OFFICE=:OFFICE,CELLPHONE=:CELLPHONE,EMAIL=:EMAIL,INDUSTRY=:INDUSTRY,COMMENT=:COMMENT,MEMO=:MEMO,MinCapRate=:MinCapRate,MaxPSF=:MaxPSF,unit=:unit,MaxGRM=:MaxGRM,ADDRESS=:ADDRESS,CITY=:CITY,STATE=:STATE,ZIP=:ZIP,RecordNo=:RecordNo,HOME=:HOME,active_buyer=:active_buyer,EXCLSVBUYR=:EXCLSVBUYR,RATECOMMIS=:RATECOMMIS,SIGNDATEXL=:SIGNDATEXL,EXPIRAEXCL=:EXPIRAEXCL,WEBSITE=:WEBSITE WHERE id=:id";

            $query = $pdo->prepare($sql);
            $query->bindparam(':FIRST', $FIRST);
            $query->bindparam(':LAST', $LAST);
            $query->bindparam(':COMPANY', $COMPANY);
            $query->bindparam(':TITLE', $TITLE);
            $query->bindparam(':OFFICE', $OFFICE);
            $query->bindparam(':CELLPHONE', $CELLPHONE);
            $query->bindparam(':EMAIL', $EMAIL);
            $query->bindparam(':INDUSTRY', $INDUSTRY);
            $query->bindparam(':COMMENT', $COMMENT);
            $query->bindparam(':MEMO', $MEMO);
            $query->bindparam(':MinCapRate', $MinCapRate);
            $query->bindparam(':MaxPSF', $MaxPSF);
            $query->bindparam(':unit', $unit);
            $query->bindparam(':MaxGRM', $MaxGRM);
            $query->bindparam(':ADDRESS', $ADDRESS);
            $query->bindparam(':CITY', $CITY);
            $query->bindparam(':STATE', $STATE);
            $query->bindparam(':ZIP', $ZIP);
            $query->bindparam(':RecordNo', $RecordNo);
            $query->bindparam(':HOME', $HOME);
            $query->bindparam(':active_buyer', $active_buyer);
            $query->bindparam(':EXCLSVBUYR', $EXCLSVBUYR);
            $query->bindparam(':RATECOMMIS', $RATECOMMIS);
            $query->bindparam(':SIGNDATEXL', $SIGNDATEXL);
            $query->bindparam(':EXPIRAEXCL', $EXPIRAEXCL);
            $query->bindparam(':WEBSITE', $WEBSITE);
            $query->execute();


            echo json_encode(array('message' => 'Congratulations the record ' . $name . ' was Updates to the database'));
        }
        // Catch any errors in running the prepared STATEment
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        break;

        // Remove an existing record in the technologies table
    case "delete":

        // Sanitise supplied record ID for matching to table record
        $id    =    filter_var($obj->id, FILTER_SANITIZE_NUMBER_INT);

        // Attempt to run PDO prepared statement
        try {
            $pdo     = new PDO($dsn, $un, $pwd);
            $sql     = "DELETE FROM wp_ali_contacts WHERE id = :id";
            $stmt     = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            echo json_encode('Congratulations the record ' . $name . ' was removed');
        }
        // Catch any errors in running the prepared statement
        catch (PDOException $e) {
            echo $e->getMessage();
        }

        break;

    case "select":
        // Sanitise URL supplied values

        $id    =    filter_var($obj->id, FILTER_SANITIZE_NUMBER_INT);
        $message;

        // Attempt to run PDO prepared statement
        try {
            $sql     = "SELECT * FROM wp_ali_contacts WHERE id = :id";
            $stmt     =    $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $obj = $stmt->fetchObject();
            if ($obj > 0) {
                echo json_encode($obj);
            }else {
                echo json_encode('Failed');
            }
        }
        // Catch any errors in running the prepared statement
        catch (PDOException $e) {
            echo $e->getMessage();
        }

        break;
}
?>
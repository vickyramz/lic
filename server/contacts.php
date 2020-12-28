<?php

if(isset($_GET['paccess']) && $_GET['paccess']=='Apiandaccess' ){
    
 
 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");


$hn      = 'localhost';
$username = "lichtens_user";
$pwd = "secreT7272!";
$dbname = "lichtens_LichtensteinRE_laravel";
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
        echo $email;exit;
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
           // $RecordNo = filter_var($obj->RecordNo, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $HOME = filter_var($obj->HOME, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $active_buyer = filter_var($obj->active_buyer, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $EXCLSVBUYR = filter_var($obj->EXCLSVBUYR, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $RATECOMMIS = filter_var($obj->RATECOMMIS, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $SIGNDATEXL = filter_var($obj->SIGNDATEXL, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $EXPIRAEXCL = filter_var($obj->EXPIRAEXCL, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $WEBSITE = filter_var($obj->WEBSITE, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);

            $sql = "INSERT INTO wp_ali_contacts (FIRST,LAST,COMPANY,TITLE,OFFICE,CELLPHONE,EMAIL,INDUSTRY,COMMENT,MEMO,MinCapRate,MaxPSF,unit,MaxGRM,ADDRESS,CITY,STATE,ZIP,HOME,active_buyer,EXCLSVBUYR,RATECOMMIS,SIGNDATEXL,EXPIRAEXCL,WEBSITE) VALUES (:FIRST,:LAST,:COMPANY,:TITLE,:OFFICE,:CELLPHONE,:EMAIL,:INDUSTRY,:COMMENT,:MEMO,:MinCapRate,:MaxPSF,:unit,:MaxGRM,:ADDRESS,:CITY,:STATE,:ZIP,:HOME,:active_buyer,:EXCLSVBUYR,:RATECOMMIS,:SIGNDATEXL,:EXPIRAEXCL,:WEBSITE)";

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
            //$query->bindparam(':RecordNo', $RecordNo);
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

            $sql = "UPDATE wp_ali_contacts SET FIRST=:FIRST,LAST=:LAST,COMPANY=:COMPANY,TITLE=:TITLE,OFFICE=:OFFICE,CELLPHONE=:CELLPHONE,EMAIL=:EMAIL,INDUSTRY=:INDUSTRY,COMMENT=:COMMENT,MEMO=:MEMO,MinCapRate=:MinCapRate,MaxPSF=:MaxPSF,unit=:unit,MaxGRM=:MaxGRM,ADDRESS=:ADDRESS,CITY=:CITY,STATE=:STATE,ZIP=:ZIP,HOME=:HOME,active_buyer=:active_buyer,EXCLSVBUYR=:EXCLSVBUYR,RATECOMMIS=:RATECOMMIS,SIGNDATEXL=:SIGNDATEXL,EXPIRAEXCL=:EXPIRAEXCL,WEBSITE=:WEBSITE WHERE id=:id";

            $query = $pdo->prepare($sql);
            $query->bindparam(':id', $id);
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
            //$query->bindparam(':RecordNo', $RecordNo);
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
        
    case "search":
        // Sanitise URL supplied values

        $sphase    =   filter_var($obj->sphase, FILTER_SANITIZE_STRING);
      
        try {
      
            $sql = 'SELECT * FROM wp_ali_contacts WHERE id LIKE :keyword OR FIRST LIKE :keyword0 OR LAST LIKE :keyword1 OR COMPANY LIKE :keyword2 OR TITLE LIKE :keyword3 OR ADDRESS LIKE :keyword4 OR CITY LIKE :keyword5 OR STATE LIKE :keyword6 OR country LIKE :keyword7 OR ZIP LIKE :keyword8 OR HOME LIKE :keyword9 OR FAX LIKE :keyword10 OR OFFICE LIKE :keyword11 OR CELLPHONE LIKE :keyword12 OR INDUSTRY LIKE :keyword13 OR COMMENT LIKE :keyword14 OR WEBSITE LIKE :keyword15 OR EMAIL LIKE :keyword16 OR MEMO LIKE :keyword17 ORDER BY id DESC ';

            $pdo_statement = $pdo->prepare($sql);
            $pdo_statement->bindValue(':keyword', '%' . $sphase . '%', PDO::PARAM_STR);
            $pdo_statement->bindValue(':keyword0', '%' . $sphase . '%', PDO::PARAM_STR);
            $pdo_statement->bindValue(':keyword1', '%' . $sphase . '%', PDO::PARAM_STR);
            $pdo_statement->bindValue(':keyword2', '%' . $sphase . '%', PDO::PARAM_STR);
            $pdo_statement->bindValue(':keyword3', '%' . $sphase . '%', PDO::PARAM_STR);
            $pdo_statement->bindValue(':keyword4', '%' . $sphase . '%', PDO::PARAM_STR);
            $pdo_statement->bindValue(':keyword5', '%' . $sphase . '%', PDO::PARAM_STR);
            $pdo_statement->bindValue(':keyword6', '%' . $sphase . '%', PDO::PARAM_STR);
            $pdo_statement->bindValue(':keyword7', '%' . $sphase . '%', PDO::PARAM_STR);
            $pdo_statement->bindValue(':keyword8', '%' . $sphase . '%', PDO::PARAM_STR);
            $pdo_statement->bindValue(':keyword9', '%' . $sphase . '%', PDO::PARAM_STR);
            $pdo_statement->bindValue(':keyword10', '%' . $sphase . '%', PDO::PARAM_STR);
            $pdo_statement->bindValue(':keyword11', '%' . $sphase . '%', PDO::PARAM_STR);
            $pdo_statement->bindValue(':keyword12', '%' . $sphase . '%', PDO::PARAM_STR);
            $pdo_statement->bindValue(':keyword13', '%' . $sphase . '%', PDO::PARAM_STR);
            $pdo_statement->bindValue(':keyword14', '%' . $sphase . '%', PDO::PARAM_STR);
            $pdo_statement->bindValue(':keyword15', '%' . $sphase . '%', PDO::PARAM_STR);
            $pdo_statement->bindValue(':keyword16', '%' . $sphase . '%', PDO::PARAM_STR);
            $pdo_statement->bindValue(':keyword17', '%' . $sphase . '%', PDO::PARAM_STR);
            
            $pdo_statement->execute();
            $obj = $pdo_statement->fetchObject();
          
            if ($obj > 0) {
                echo json_encode($obj);
            }else {
                echo json_encode($obj);
            }
        } 
        // Catch any errors in running the prepared statement
        catch (PDOException $e) {
            echo $e->getMessage();
        }

        break;
        
        
        
    case "filter":
        // Sanitise URL supplied values

          $filterBy     =   filter_var($obj->filterBy , FILTER_SANITIZE_STRING);
         //$filterValue      =   filter_var($obj->filterValue  , FILTER_SANITIZE_STRING);
          $sortBy      =   filter_var($obj->sortBy  , FILTER_SANITIZE_STRING);
       
        try {
            
      if($filterBy == 'firstName' && $sortBy == 'DESC'){
        
          $sql = 'SELECT * FROM wp_ali_contacts ORDER BY FIRST DESC ';

      }
      
      if($filterBy == 'firstName' && $sortBy == 'ASC'){
        
          $sql = 'SELECT * FROM wp_ali_contacts ORDER BY FIRST ASC ';

      }
      
       if($filterBy == 'lastName' && $sortBy == 'DESC' ){
        
          $sql = 'SELECT * FROM wp_ali_contacts ORDER BY LAST DESC ';

      }
       if($filterBy == 'lastName' && $sortBy == 'ASC' ){
        
          $sql = 'SELECT * FROM wp_ali_contacts ORDER BY LAST ASC ';

      }
       if($filterBy == 'company' && $sortBy == 'DESC' ){
        
          $sql = 'SELECT * FROM wp_ali_contacts  ORDER BY COMPANY DESC ';

      }
        if($filterBy == 'company' && $sortBy == 'ASC' ){
        
          $sql = 'SELECT * FROM wp_ali_contacts  ORDER BY COMPANY ASC ';

      }
       if($filterBy == 'recent' && $sortBy == 'ASC'){
        
          $sql = 'SELECT * FROM wp_ali_contacts ORDER BY id ASC ';

      }
      
      if($filterBy == 'recent' && $sortBy == 'DESC'){
        
          $sql = 'SELECT * FROM wp_ali_contacts ORDER BY id DESC ';

      }
      
      if($sql==''){
        $sql = 'SELECT * FROM wp_ali_contacts ORDER BY id DESC ';

      }
          
            $pdo_statement = $pdo->prepare($sql);
            //$pdo_statement->bindValue(':keyword', $filterValue, PDO::PARAM_STR);
            //$pdo_statement->bindParam(':sortby', $sortBy, PDO::PARAM_STR);
             
            
            $pdo_statement->execute(); 
            $obj = $pdo_statement->fetchAll(PDO::FETCH_OBJ);
          
            if ($obj > 0) {
                echo json_encode($obj);
            }else {
                echo json_encode($obj);
            }
        } 
        // Catch any errors in running the prepared statement
        catch (PDOException $e) {
            echo $e->getMessage();
        }

        break;
        
        
}


  }else{
     
      echo "Access Restricted ";
      exit;
      
  }
 
?>
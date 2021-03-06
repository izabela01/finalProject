<?php

class contactus {

    // we define 3 attributes
    public $contactID;
    public $firstName;
    public $surname;
    public $email;
    public $dates;
    public $body;


    public function __construct($contactID,$firstName,$surname,$email,$dates,$body) { 
    $this-> contactID=$contactID;
    $this-> firstName=$firstName; //All the below is items for
    $this-> surname=$surname;
    $this-> email=$email;
    $this-> dates=$dates;
    $this-> body=$body;

  
    }

    /*public static function all() {
        $list = [];
        // this part under is just instansiating the connector to make the connection between the database-DB class in connection.php
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM contact_us'); 
        // we create a list of contactus objects from the database results
        foreach ($req->fetchAll() as $contact) { 
            $list[] = new Contact ($contact['contactID'], $contact['blogID'], $contact['subscriptionsID'], $contact['responseID'], $contact['firstName'], $contact['surname'], $contact['email'], $contact['dates'], $contact ['body']);
        } 
        return $list; 
    }

    /*public static function find($contactID) {
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $blogID = intval($blogID);
        $req = $db->prepare('SELECT * FROM contactus WHERE contactID = :contactID');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('contactID' => $contactID));
        $blog = $req->fetch();
        if ($contact) {
            return new Contact($contact['contactID'], $contact['blogID'], $contact['subscriptionsID'], $contact['responseID'], $contact['firstName'], $contact['surname'], $contact['email'], $contact['dates'], $contact ['body']);
        } else {
            //replace with a more meaningful exception
            throw new Exception('Could not find contact');
        
    }} */
        public static function add() { //create
   $db = Db::getInstance();
   $req = $db->prepare("Insert into contact_us(contactID, firstName, surname, email,dates, body) values (:contactID,:firstName,:surname, :email, :dates, :body)");
   $req->bindParam(':contactID', $contactID);
   $req->bindParam(':firstName', $firstName);
   $req->bindParam(':surname', $surname);
   $req->bindParam(':email', $email);
   $req->bindParam(':dates',$dates);
   $req->bindParam(':body', $body);
// set parameters and execute
   
   //model communicates with the database

   if(isset($_POST['firstName'])&& $_POST['firstName']!=""){
       $filteredFirstName = filter_input(INPUT_POST,'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
   }
   if(isset($_POST['surname'])&& $_POST['surname']!=""){
       $filteredSurname = filter_input(INPUT_POST,'surname', FILTER_SANITIZE_SPECIAL_CHARS);
   }
   if(isset($_POST['email'])&& $_POST['email']!=""){
       $filteredEmail = filter_input(INPUT_POST,'email', FILTER_SANITIZE_SPECIAL_CHARS);
          }
   if(isset($_POST['body'])&& $_POST['body']!=""){
       $filteredBody = filter_input(INPUT_POST,'body', FILTER_SANITIZE_SPECIAL_CHARS);
   }
$firstName = $filteredFirstName;
$surname = $filteredSurname;
$email = $filteredEmail;
$body = $filteredBody;
$req->execute();
header("location:index.php");            ;
    }
}


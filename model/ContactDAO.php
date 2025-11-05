<?php
    require_once 'Contact.php';

    class ContactDAO {


        public function getConnection(){
            $mysqli = new mysqli("127.0.0.1", "cs2033user", "cs2033pass", "cs2033");
            if ($mysqli->connect_errno) {
                $mysqli=null;
            }
            return $mysqli;
        }

        public function addContact($contact){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("INSERT INTO contacts (username, email) VALUES (?, ?)");
            $stmt->bind_param("ss", $contact->username, $contact->email);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function deleteContact($contactID){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM contacts WHERE contactID = ?");
            $stmt->bind_param("i", $contactID);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function getContacts(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM contacts;"); 
            $stmt->execute();
            $result = $stmt->get_result();
            $contacts = []; //* Added this after several hours of agonizing frustration without realizing I never initialized this variable
            while($row = $result->fetch_assoc()){
                $contact = new Contact();
                $contact->load($row);
                $contacts[]=$contact;
            }    
            $stmt->close();
            $connection->close();
            return $contacts;
        }

        public function findContact($contactID){
            $connection = $this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM contacts WHERE contactID = ?");
            $stmt->bind_param("i",$contactID);
            $stmt->execute();
            $row = $stmt->get_result()->fetch_assoc();
            $contact = new Contact();
            $contact->load($row);
            $stmt->close();
            $connection->close();
            return $contact;
        }



    }
?>

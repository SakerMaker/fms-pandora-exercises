<?php
  require_once("db/Appointment_DB.php"); 
  class Appointment
  {
    private $name;
    private $dni;
    private $phone;
    private $email;
    private $type;
    private $date;
    private $hour;

    function __construct($name,$dni,$phone,$email,$type,$date,$hour) {
        $this->name=$name;
        $this->dni=$dni;
        $this->phone=$phone;
        $this->email=$email;
        $this->type=$type;
        $this->date=$date;
        $this->hour=$hour;
    }

    public static function checkDNI($dni) {
        try {
            $connection = Appointment_DB::connectDB();
            // Check if DNI already exists in database
            $stmt = $connection->prepare("SELECT * FROM appointment WHERE dni = :dni");
            $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
            $stmt->execute();
            
            // Return count of rows, if greater than 0, it means the DNI already exists
            return $stmt->rowCount() > 0;
        } catch (Exception $e) {
            error_log($e->getMessage());
            throw new Exception("Error al verificar el DNI.");
        }
    }

    public static function checkLastHour($date,$hour) {
        try {
            $connection = Appointment_DB::connectDB();
            // Check if day is available
            $stmt = $connection->prepare("SELECT * FROM appointment WHERE date = :date AND hour = :hour");
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            $stmt->bindParam(':hour', $hour, PDO::PARAM_STR);
            $stmt->execute();
    
            return $stmt->rowCount() == 0;
        } catch (Exception $e) {
            error_log($e->getMessage());
            throw new Exception("Error al verificar la última hora.");
        }
    }

    public static function receiveLastHour() {
        try {
            $connection = Appointment_DB::connectDB();
            $stmt = $connection->prepare("SELECT * FROM appointment ORDER BY id DESC LIMIT 1");
            $stmt->execute();
    
            return $stmt->fetchObject();
        } catch (Exception $e) {
            error_log($e->getMessage());
            throw new Exception("Error al obtener la última cita.");
        }
    }

    public function insert(){
        try {
            $db = Appointment_DB::connectDB();
            // Start the transaction
            $db->beginTransaction();

            $stmt = $db->prepare("INSERT INTO appointment (name, dni, phone, email, type, date, hour) VALUES (:name, :dni, :phone, :email, :type, :date, :hour)");
            $stmt->execute([
                ':name' => $this->name,
                ':dni' => $this->dni,
                ':phone' => $this->phone,
                ':email' => $this->email,
                ':type' => $this->type,
                ':date' => $this->date,
                ':hour' => $this->hour
            ]);

            $db->commit(); // Commit the transaction
        } catch (Exception $e) {
            if ($db->inTransaction()) {
                $db->rollBack(); // Rollback the transaction in case of an error
            }
            error_log($e->getMessage());
            throw new Exception("Error al establecer una cita.");
        }
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of dni
     */ 
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set the value of dni
     *
     * @return  self
     */ 
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    
  }
  
?>
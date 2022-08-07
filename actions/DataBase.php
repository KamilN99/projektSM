<?php
class DataBase {
    private $connection = null;

    public function __construct(string $host, string $dbname, string $user, string $password){
        try {
            $this->connection = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $user, $password);
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    private function executeStatement(string $statement = "", $parameters = []) {
        try{
			
            $stmt = $this->connection->prepare($statement);
            $stmt->execute($parameters);
            return $stmt;
            
        }catch(Exception $e){
            throw new Exception($e->getMessage());   
        }	
    }

    public function Insert(string $statement = "" , $parameters = []){
        try{
            
            $this->executeStatement( $statement , $parameters );
            return $this->connection->lastInsertId();
            
        }catch(Exception $e){
            throw new Exception($e->getMessage());   
        }		
    }

    public function Select(string $statement = "" , $parameters = []){
        try{
            
            $stmt = $this->executeStatement($statement , $parameters);
            return $stmt->fetchAll();
            
        }catch(Exception $e){
            throw new Exception($e->getMessage());   
        }		
    }
    
    public function Update(string $statement = "" , $parameters = []){
        try{
            
            $this->executeStatement($statement , $parameters);
            
        }catch(Exception $e){
            throw new Exception($e->getMessage());   
        }		
    }		
    
    public function Remove(string $statement = "" , $parameters = []){
        try{
            
            $this->executeStatement($statement , $parameters);
            
        }catch(Exception $e){
            throw new Exception($e->getMessage());   
        }		
    }		
    
}
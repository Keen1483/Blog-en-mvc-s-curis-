<?php
abstract class Model
{
    private static $_db;
    
    private static function setDb()
    {
        self::$_db = new PDO(
            'mysql:host=localhost;dbname=miniblog;charset=utf8', 'root', '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]
        );
    }
    
    protected function getDb()
    {
        if(self::$_db == null)
            self::setDb();
        
        return self::$_db;
    }
    
    public function getAll($table, $obj)
    {
        $var = [];
        $req = $this->getDb()->prepare('SELECT * FROM '.$table.' ORDER BY id DESC');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new $obj($data);
        }
        $req->closeCursor();
        
        return $var;
    }
}
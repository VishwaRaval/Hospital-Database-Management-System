<?php
class EventHandler
{
    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function updateEvent($type, $param, $id) {
        if (!in_array($type, array('name', 'start', 'end'), TRUE)) {
            throw new InvalidArgumentException(
                'No such column type exists.'
            );
        }

        $query = $this->db->prepare(
            "UPDATE events SET event_{$type} = :param WHERE id = :ID"
        );
        $query->bindParam(':param', $param, PDO::PARAM_STR);
        $query->bindParam(':ID', $id, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() !== 1) {
            throw new InvalidArgumentException(
                'No such event ID exists.'
            );
        }
    }
}

$dsn = 'mysql:dbname=events';
$dbuser = 'root';
$passwd = 'root';
$settings = array(PDO::MYSQL_ATTR_FOUND_ROWS => TRUE);

$eventHandler = new EventHandler(new PDO($dsn, $dbuser, $passwd, $settings));

// will not cause any inserts or updates to the revenue table
$eventHandler->updateEvent('name', 'Auction', 1);
$eventHandler->updateEvent('start', '2012-11-10 14:30:00', 1);

// causes a new insertion into the revenue table
$eventHandler->updateEvent('end', '2012-12-02 20:30:00', 2);
// causes an update on the revenue table
$eventHandler->updateEvent('end', '2012-12-02 21:30:00', 2);
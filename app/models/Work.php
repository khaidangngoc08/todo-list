<?php

class Work
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $result = $this->db->query("SELECT * FROM works");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function add($name, $startDate, $endDate, $status)
    {
        $stmt = $this->db->prepare("INSERT INTO works (name, start_date, end_date, status) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $startDate, $endDate, $status]);
    }

    public function edit($id, $name, $startDate, $endDate, $status)
    {
        $stmt = $this->db->prepare("UPDATE works SET name = ?, start_date = ?, end_date = ?, status = ? WHERE id = ?");
        $stmt->execute([$name, $startDate, $endDate, $status, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM works WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function getWorkById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM works WHERE id=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}

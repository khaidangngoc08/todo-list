<?php

require_once (__DIR__ . '/../models/Work.php');

class WorkController
{
    private $workModel;

    public function __construct($workModel)
    {
        $this->workModel = $workModel;
    }

    public function index()
    {
        $works = $this->workModel->getAll();
        require (__DIR__. '/../public/views/index.php');
      }

    public function add()
    {
        $this->workModel->add($_POST['name'], $_POST['start_date'], $_POST['end_date'], $_POST['status']);
        header('Location: /');
    }

    public function edit()
    {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $id = $_POST['id'];
          $name = $_POST['name'];
          $start_date = $_POST['start_date'];
          $end_date = $_POST['end_date'];
          $status = $_POST['status'];
          $this->workModel->edit($id, $name, $start_date, $end_date, $status);
          header('Location: /?action=index');
      } else {
          $id = $_GET['id'];
          $work = $this->workModel->getWorkById($id);
          require (__DIR__. '/../public/views/edit.php');

      }
    }

    public function delete()
    {
        $this->workModel->delete($_POST['id']);
        header('Location: /');
    }

    public function calendar()
    {
        $works = $this->workModel->getAll();
        // Convert work data to the format required by FullCalendar
        $events = array_map(function($work) {
            return [
                'id' => $work['id'],
                'title' => $work['name'],
                'start' => $work['start_date'],
                'end' => $work['end_date'],
                'status' => $work['status'],
            ];
        }, $works);
        require (__DIR__. '/../public/views/calendar.php');
    }

}

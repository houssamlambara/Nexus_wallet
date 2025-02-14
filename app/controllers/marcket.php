<?php
class marcket extends Controller
{
    private $model;
    private $marcketmodel;
    public function __construct()
    {
        $this->marcketmodel = $this->model('API');
    }

    public function marcket1()
    {
        $fromAPI = $this->marcketmodel->getdatafromapi();
        $data = ['data' => $fromAPI];

        $this->view('home/marcket', $data);
    }
}

<?php

/**
 * Created by PhpStorm.
 * User: juan2ramos
 * Date: 18/08/15
 * Time: 21:52
 */
class Excel extends CI_Controller {

    public function __construct () {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->library('Classes/PHPExcel.php');

    }
    public function index () {

        $usersTeam = $this->users_model->userTeam();
        //echo '<pre>';print_r($usersTeam);exit;
        $this->phpexcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nombre del equipo')
            ->setCellValue('B1', 'Ciudad!')
            ->setCellValue('C1', 'Nombre')
            ->setCellValue('D1', 'Apellido')
            ->setCellValue('E1', 'Teléfono')
            ->setCellValue('F1', 'Cumpleaños')
            ->setCellValue('G1', 'email')
            ->setCellValue('H1', 'Dirección')
            ->setCellValue('I1', 'Número de estudiante')
            ->setCellValue('J1', 'Estado');

        $id = 2;
        foreach($usersTeam as $userTeam){
            $this->phpexcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $id, $userTeam['name_team'])
                ->setCellValue('B' . $id, $userTeam['city'])
                ->setCellValue('C' . $id, $userTeam['name_user'])
                ->setCellValue('D' . $id, $userTeam['last_name'])
                ->setCellValue('E' . $id, $userTeam['phone'])
                ->setCellValue('F' . $id, $userTeam['birthday'])
                ->setCellValue('G' . $id, $userTeam['email'])
                ->setCellValue('H' . $id, $userTeam['address'])
                ->setCellValue('I' . $id, $userTeam['student_number'])
                ->setCellValue('J' . $id, $userTeam['status']);
           $id++;
        }


        $this->phpexcel->getActiveSheet()->setTitle('lista');



        $this->phpexcel->setActiveSheetIndex(0);


        // redireccionamos la salida al navegador del cliente (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="lista.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
        $objWriter->save('php://output');

    }

}
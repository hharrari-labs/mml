<?php

/** PHPExcel_IOFactory */
require_once 'PHPExcel/IOFactory.php';

class XLSReader {

    private $objReader;
    private $objPHPExcel;
    private $worksheets;
    private $rows;

    function __construct() {
        $this->objReader = new PHPExcel_Reader_Excel2007();
        $this->objReader->setReadDataOnly(true);
    }

    function setObjPHPExcel($filename) {
        $this->objPHPExcel = $this->objReader->load($filename);
        $this->worksheets = $this->objPHPExcel->getAllSheets();
    }

    function getWorksheets() {
        return $this->worksheets = $this->objPHPExcel->getAllSheets();
    }

    function setRows($rows) {
        $this->rows = $rows;
    }
    
    function readWorksheetValue($worksheet) {
        
        $lines = array();
        $i = 0;
            
        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            if (1 >= $row->getRowIndex())
                continue; //skip first 10 row
            
            foreach ($cellIterator as $cell) {
                foreach ($this->rows as $row) {
                    if ($row == $cell->getColumn()) {
                        $InsertData = false;
                        if ($row == 'A') {
                           $EAN = $cell->getValue();
                        }
                        if ($row == 'F') {
                             $InsertData = false;
                            if ($cell->getValue() != '') {
                                if (is_numeric($cell->getValue()) && $cell->getValue()>0 ) {
                                    $InsertData = true;
                                }
                            }
                        }

                        if ($InsertData) {
                            $lines[$i]['ean'] = $EAN;
                            $lines[$i]['value'] = $cell->getValue();
                            $i++;
                        }
                    }
                }
            }
        }
        return $lines;
    }
    
    function readWorksheetValueImportTemplate($worksheet) {

        $return = array();
        $i = 0;
        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            if ($i >= 1) {
                foreach ($cellIterator as $cell) {
                    foreach ($this->rows as $row) {
                        if ($row == $cell->getColumn()) {
                            $InsertData = false;
                            if ($row == 'A') {
                                $return[$i]['ean'] = $cell->getValue();
                            }
                            if ($row == 'B') {
                                $return[$i]['separator'] = $cell->getValue();
                            }
                        }
                    }
                }
            }
            $i++;
        }

        return $return;
    }
    
    function readWorksheetValueImportOrderPoint($worksheet) {

        $return = array();
        $i = 0;
        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            if ($i >= 1) {
                foreach ($cellIterator as $cell) {
                    foreach ($this->rows as $row) {
                        if ($row == $cell->getColumn()) {
                            $InsertData = false;
                            if ($row == 'A') {
                                $return[$i]['OP'] = $cell->getValue();
                            }
                            if ($row == 'B') {
                                $return[$i]['Email'] = $cell->getValue();
                            }
                        }
                    }
                }
            }
            $i++;
        }

        return $return;
    }
    
    function readWorksheetValueImportTemplateCapturingCode($worksheet) {

        $return = array();
        $i = 0;
        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            if ($i >= 1) {
                foreach ($cellIterator as $cell) {
                    foreach ($this->rows as $row) {
                        if ($row == $cell->getColumn()) {
                            $InsertData = false;
                            if ($row == 'A') {
                                $return[$i]['ean'] = trim($cell->getValue());
                            }
                            if ($row == 'B') {
                                $return[$i]['code'] = trim($cell->getValue());
                            }
                        }
                    }
                }
            }
            $i++;
        }

        return $return;
    }

    function readWorksheetValueImportTemplateExclusionList($worksheet) {

        $return = array();
        $i = 0;
        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            if ($i >= 1) {
                foreach ($cellIterator as $cell) {
                    foreach ($this->rows as $row) {
                        if ($row == $cell->getColumn()) {
                            $InsertData = false;
                            if ($row == 'A') {
                                $return[$i]['ean'] = trim($cell->getValue());
                            }
                        }
                    }
                }
            }
            $i++;
        }

        return $return;
    }

}
?>
<?php
	//PHP puro

	if (isset($_POST['botones'])) {
		header('Content-type: application/json; charset=utf-8');
		$resp = array("valor01"=> "1000", "valor02" => "2000", "status" => "success");
		echo json_encode($resp, JSON_INVALID_UTF8_IGNORE);
		http_response_code(200);
	}
?>

<?php
	//laravel
    public function dataTable(Request $fideubf){
        if ($fideubf->ajax()) {
            $observaciones = FISECOBSBF::select('idecli','valorpri','codefe','observ','usuari','fecha','hora')
                            ->where('nitdeu', '=', $fideubf->fideubf)
                            ->with('codefeDesc')
                            ->get();
            return response(json_encode($observaciones, JSON_INVALID_UTF8_IGNORE),200)->header('Content-type', 'application/json');
        }    
    }
?>

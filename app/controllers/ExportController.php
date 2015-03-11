<?php

class ExportController extends BaseController {


	public function exportassets() {
		

		Excel::create('assets', function($excel) {
			$excel->sheet('assets', function($sheet) {
				$assets = Asset::orderBy('created_at', 'desc')->get();

				$sheet->loadView('assets.xlsx', ['assets'=> $assets->toArray()]);
			});

         })->download('xlsx');

	}
}
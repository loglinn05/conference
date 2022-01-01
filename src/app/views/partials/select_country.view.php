<select class = "mdb-select md-form colorful-select dropdown" id = "country" name = "country" searchable = "Enter your country name...">
	<?php
		$url = "http://www.fao.org/countryprofiles/iso3list/en/";
		$html = file_get_contents($url);
		$document = phpQuery::newDocument($html);
		$trs = $document->find("#countryDiv tr");
		foreach ($trs as $tr) {
			$tr = pq($tr);
			echo "<option country_name = \"" . trim($tr->find("td:eq(0)")->text()) . "\" country_code = \"" . $tr->find("td:eq(3)")->text() . "\">" . trim($tr->find("td:eq(0)")->text()) . "</option>";
		}
	?>
</select>
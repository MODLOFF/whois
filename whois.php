<?php

function whois_lookup($domain) {
	global $whois_servers;

	$tld_parts = explode('.', $domain);
	$tld = end($tld_parts);

	if(isset($whois_servers[$tld])) {
		$server = $whois_servers[$tld];
		$response = query_whois_server($domain, $server);
		if(!$response) {
			return "Whois sunucusuna bağlanırken bir hata oluştu.";
		}
		else {
			return $response;
		}
	}
	else {
		return "Geçersiz domain uzantısı.";
	}
}

function query_whois_server($domain, $server) {
	$fp = fsockopen($server, 43, $errno, $errstr, 30);
	if (!$fp) {
		return false;
	}
	else {
		fputs($fp, $domain . "\r\n");
		$out = "";
		while (!feof($fp)) {
			$out .= fgets($fp);
		}
		fclose($fp);
		return $out;
	}
}

$whois_servers = array(
    "ac" => "whois.nic.ac", // Ascension Island
    "ae" => "whois.nic.ae", // United Arab Emirates
    "aero"=>"whois.aero",
    "af" => "whois.nic.af", // Afghanistan
    "ag" => "whois.nic.ag", // Antigua And Barbuda
    "ai" => "whois.ai", // Anguilla
    "al" => "whois.ripe.net", // Albania
    "am" => "whois.amnic.net",  // Armenia
    "arpa" => "whois.iana.org",
    "as" => "whois.nic.as", // American Samoa
    "asia" => "whois.nic.asia",
    "at" => "whois.nic.at", // Austria
    "au" => "whois.aunic.net", // Australia
    "ax" => "whois.ax", // Aland Islands
    "az" => "whois.ripe.net", // Azerbaijan
    "be" => "whois.dns.be", // Belgium
    "bg" => "whois.register.bg", // Bulgaria
    "bi" => "whois.nic.bi", // Burundi
    "biz" => "whois.biz",
    "bj" => "whois.nic.bj", // Benin
    "bn" => "whois.bn", // Brunei Darussalam
    "bo" => "whois.nic.bo", // Bolivia
    "br" => "whois.registro.br", // Brazil
    "bt" => "whois.netnames.net", // Bhutan
    "by" => "whois.cctld.by", // Belarus
    "bz" => "whois.belizenic.bz", // Belize
    "ca" => "whois.cira.ca", // Canada
    "cat" => "whois.cat", // Spain
    "cc" => "whois.nic.cc", // Cocos (Keeling) Islands
    "cd" => "whois.nic.cd", // Congo, The Democratic Republic Of The
    "ch" => "whois.nic.ch", // Switzerland
    "ci" => "whois.nic.ci", // Cote d'Ivoire
    "ck" => "whois.nic.ck", // Cook Islands
    "cl" => "whois.nic.cl", // Chile
    "cn" => "whois.cnnic.net.cn", // China
    "co" => "whois.nic.co", // Colombia
    "com" => "whois.verisign-grs.com",
    "coop" => "whois.nic.coop",
    "cx" => "whois.nic.cx", // Christmas Island
    "cz" => "whois.nic.cz", // Czech Republic
    "de" => "whois.denic.de", // Germany
    "dk" => "whois.dk-hostmaster.dk", // Denmark
    "dm" => "whois.nic.dm", // Dominica
    "dz" => "whois.nic.dz", // Algeria
    "ec" => "whois.nic.ec", // Ecuador
    "edu" => "whois.educause.edu",
    "ee" => "whois.eenet.ee", // Estonia
    "eg" => "whois.ripe.net", // Egypt
    "es" => "whois.nic.es", // Spain
    "eu" => "whois.eu",
    "fi" => "whois.ficora.fi", // Finland
    "fo" => "whois.nic.fo", // Faroe Islands
    "fr" => "whois.nic.fr", // France
    "gd" => "whois.nic.gd", // Grenada
    "gi" => "whois2.afilias-grs.net", // Gibraltar
    "gl" => "whois.nic.gl", // Greenland (Denmark)
    "gov" => "whois.nic.gov",
    "gs" => "whois.nic.gs", // South Georgia And The South Sandwich Islands
    "gy" => "whois.registry.gy", // Guyana
    "hk" => "whois.hkirc.hk", // Hong Kong
    "hn" => "whois.nic.hn", // Honduras
    "hr" => "whois.dns.hr", // Croatia
    "ht" => "whois.nic.ht", // Haiti
    "hu" => "whois.nic.hu", // Hungary
    "ie" => "whois.domainregistry.ie", // Ireland
    "il" => "whois.isoc.org.il", // Israel
    "im" => "whois.nic.im", // Isle of Man
    "in" => "whois.inregistry.net", // India
    "info" => "whois.afilias.net",
    "int" => "whois.iana.org",
    "io" => "whois.nic.io", // British Indian Ocean Territory
    "iq" => "whois.cmc.iq", // Iraq
    "ir" => "whois.nic.ir", // Iran, Islamic Republic Of
    "is" => "whois.isnic.is", // Iceland
    "it" => "whois.nic.it", // Italy
    "je" => "whois.je", // Jersey
    "jobs" => "jobswhois.verisign-grs.com",
    "jp" => "whois.jprs.jp", // Japan
    "ke" => "whois.kenic.or.ke", // Kenya
    "kg" => "www.domain.kg", // Kyrgyzstan
    "ki" => "whois.nic.ki", // Kiribati
    "kr" => "whois.kr", // Korea, Republic Of
    "kz" => "whois.nic.kz", // Kazakhstan
    "la" => "whois.nic.la", // Lao People's Democratic Republic
    "li" => "whois.nic.li", // Liechtenstein
    "lt" => "whois.domreg.lt", // Lithuania
    "lu" => "whois.dns.lu", // Luxembourg
    "lv" => "whois.nic.lv", // Latvia
    "ly" => "whois.nic.ly", // Libya
    "ma" => "whois.iam.net.ma", // Morocco
    "md" => "whois.nic.md", // Moldova
    "me" => "whois.nic.me", // Montenegro
    "mg" => "whois.nic.mg", // Madagascar
    "mil" => "whois.nic.mil",
    "ml" => "whois.dot.ml", // Mali
    "mn" => "whois.nic.mn", // Mongolia
    "mo" => "whois.monic.mo", // Macao
    "mobi" => "whois.dotmobiregistry.net",
    "mp" => "whois.nic.mp", // Northern Mariana Islands
    "ms" => "whois.nic.ms", // Montserrat
    "mu" => "whois.nic.mu", // Mauritius
    "museum" => "whois.museum",
    "mx" => "whois.mx", // Mexico
    "my" => "whois.domainregistry.my", // Malaysia
    "na" => "whois.na-nic.com.na", // Namibia
    "name" => "whois.nic.name",
    "nc" => "whois.nc", // New Caledonia
    "net" => "whois.verisign-grs.net",
    "nf" => "whois.nic.nf", // Norfolk Island
    "ng" => "whois.nic.net.ng", // Nigeria
    "nl" => "whois.domain-registry.nl", // Netherlands
    "no" => "whois.norid.no", // Norway
    "nu" => "whois.nic.nu", // Niue
    "nz" => "whois.srs.net.nz", // New Zealand
    "om" => "whois.registry.om", // Oman
    "org" => "whois.pir.org",
    "pe" => "kero.yachay.pe", // Peru
    "pf" => "whois.registry.pf", // French Polynesia
    "pl" => "whois.dns.pl", // Poland
    "pm" => "whois.nic.pm", // Saint Pierre and Miquelon (France)
    "post" => "whois.dotpostregistry.net",
    "pr" => "whois.nic.pr", // Puerto Rico
    "pro" => "whois.dotproregistry.net",
    "pt" => "whois.dns.pt", // Portugal
    "pw" => "whois.nic.pw", // Palau
    "qa" => "whois.registry.qa", // Qatar
    "re" => "whois.nic.re", // Reunion (France)
    "ro" => "whois.rotld.ro", // Romania
    "rs" => "whois.rnids.rs", // Serbia
    "ru" => "whois.tcinet.ru", // Russian Federation
    "sa" => "whois.nic.net.sa", // Saudi Arabia
    "sb" => "whois.nic.net.sb", // Solomon Islands
    "sc" => "whois2.afilias-grs.net", // Seychelles
    "se" => "whois.iis.se", // Sweden
    "sg" => "whois.sgnic.sg", // Singapore
    "sh" => "whois.nic.sh", // Saint Helena
    "si" => "whois.arnes.si", // Slovenia
    "sk" => "whois.sk-nic.sk", // Slovakia
    "sm" => "whois.nic.sm", // San Marino
    "sn" => "whois.nic.sn", // Senegal
    "so" => "whois.nic.so", // Somalia
    "st" => "whois.nic.st", // Sao Tome And Principe
    "su" => "whois.tcinet.ru", // Russian Federation
    "sx" => "whois.sx", // Sint Maarten (dutch Part)
    "sy" => "whois.tld.sy", // Syrian Arab Republic
    "tc" => "whois.meridiantld.net", // Turks And Caicos Islands
    "tel" => "whois.nic.tel",
    "tf" => "whois.nic.tf", // French Southern Territories
    "th" => "whois.thnic.co.th", // Thailand
    "tj" => "whois.nic.tj", // Tajikistan
    "tk" => "whois.dot.tk", // Tokelau
    "tl" => "whois.nic.tl", // Timor-leste
    "tm" => "whois.nic.tm", // Turkmenistan
    "tn" => "whois.ati.tn", // Tunisia
    "to" => "whois.tonic.to", // Tonga
    "tp" => "whois.nic.tl", // Timor-leste
    "tr" => "whois.nic.tr", // Turkey
    "travel" => "whois.nic.travel",
    "tv" => "tvwhois.verisign-grs.com", // Tuvalu
    "tw" => "whois.twnic.net.tw", // Taiwan
    "tz" => "whois.tznic.or.tz", // Tanzania, United Republic Of
    "ua" => "whois.ua", // Ukraine
    "ug" => "whois.co.ug", // Uganda
    "uk" => "whois.nic.uk", // United Kingdom
    "us" => "whois.nic.us", // United States
    "uy" => "whois.nic.org.uy", // Uruguay
    "uz" => "whois.cctld.uz", // Uzbekistan
    "vc" => "whois2.afilias-grs.net", // Saint Vincent And The Grenadines
    "ve" => "whois.nic.ve", // Venezuela
    "vg" => "whois.adamsnames.tc", // Virgin Islands, British
    "wf" => "whois.nic.wf", // Wallis and Futuna
    "ws" => "whois.website.ws", // Samoa
    "xxx" => "whois.nic.xxx",
    "yt" => "whois.nic.yt", // Mayotte
    "yu" => "whois.ripe.net");

?>

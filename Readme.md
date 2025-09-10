# PHP KvK

Simpele PHP Wrapper voor de API van de Kamer van Koophandel.

SDK is gegenereerd op basis van de OpenAPI specificatie.

*Deze SDK is geen officiële SDK van de Kamer van Koophandel.*

De api is te initialiseren doormiddel van onderstaande code:

    <?php
	
	use KvK\KvKClient;
	use KvK\KvKException;
	
    // Initialiseren Test API
    $client =  new KvKClient('l7xx1f2691f2520d487b902f4e0b57a0b197', 'test');
    // Initialiseren Live API
    $client =  new KvKClient('l7xx1f2691f2520d487b902f4e0b57a0b197', 'live', 'root_ca.pem');
    ?>

Vervolgens zijn deze functies beschikbaar binnen de API:

    <?php
    $client->getBasisprofielByKvkNummer(string $kvkNummer, bool $geoData);
    $client->getEigenaar(string $kvkNummer, bool $geoData);
    $client->getHoofdvestiging(string $kvkNummer, bool $geoData);
    $client->getVestigingen(string $kvkNummer);
    $client->listAbonnementen();
    $client->listSignalsByAbonnementId(string $abonnementId, string $vanaf, string $tot, int $pagina, int $aantal);
    $client->getSignalByAbonnementIdAndSignalId(string $abonnementId, string $signaalId);
    $client->getVestigingByVestigingsnummer(string $vestigingsnummer, bool $geoData);
    $client->getResults(string $kvkNummer, string $rsin, string $vestigingsnummer, string $naam, string $straatnaam, string $plaats, string $postcode, int $huisnummer, string $huisletter, int $postbusnummer, string $type, bool $inclusiefInactieveRegistraties, int $pagina, int $resultatenPerPagina);
    $client->naamgevingBijKvkNummer(string $kvkNummer)
    ?>

Voor exacte documentatie over alle functies zie: https://developers.kvk.nl

Deze SDK is ontwikkeld en getest op PHP 8.1
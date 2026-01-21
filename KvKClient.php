<?php
/**
 * KvkClient
 * PHP version 8.1
 *
 * @category Class
 * @package  KvK
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

namespace KvK;

use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use GuzzleHttp\HandlerStack;
use Psr\Http\Message\RequestInterface;

define('KVK_TESTING_API_KEY', 'l7xx1f2691f2520d487b902f4e0b57a0b197');

/**
 * @method mixed getBasisprofielByKvkNummer(string $kvkNummer, bool $geoData)
 * @method mixed getEigenaar(string $kvkNummer, bool $geoData)
 * @method mixed getHoofdvestiging(string $kvkNummer, bool $geoData)
 * @method mixed getVestigingen(string $kvkNummer)
 * @method mixed listAbonnementen()
 * @method mixed listSignalsByAbonnementId(string $abonnementId, string $vanaf, string $tot, int $pagina, int $aantal)
 * @method mixed getSignalByAbonnementIdAndSignalId(string $abonnementId, string $signaalId)
 * @method mixed getVestigingByVestigingsnummer(string $vestigingsnummer, bool $geoData)
 * @method mixed getResults(string $kvkNummer, string $rsin, string $vestigingsnummer, string $naam, string $straatnaam, string $plaats, string $postcode, int $huisnummer, string $huisletter, int $postbusnummer, string $type, bool $inclusiefInactieveRegistraties, int $pagina, int $resultatenPerPagina)
 * @method mixed naamgevingBijKvkNummer(string $kvkNummer)
 */
class KvKClient
{
    private const PRODUCTION_URL = 'https://api.kvk.nl/api';
    private const TESTING_URL = 'https://api.kvk.nl/test/api';

    private $client;
    private $config;

    public function __construct(string $userKey, ?string $rootCertificate = null)
    {

        if ($rootCertificate === null) {
            trigger_error('Root certificate is required. Please configure your system or supply one here.', E_USER_DEPRECATED);
        }
        
        $stack = HandlerStack::create();
        $stack->unshift(Middleware::mapRequest(function (RequestInterface $request) use ($userKey) {
            return $request
                ->withHeader('apikey', $userKey)
                ->withHeader('Accept', 'application/json');
        }));

        $this->client = new Client([
            'debug' => false,
            'verify' => $rootCertificate ?? false,
            'handler' => $stack,
        ]);

        $this->config = new Configuration();
        $this->config->setHost($userKey === KVK_TESTING_API_KEY ? self::TESTING_URL : self::PRODUCTION_URL);
    }

    public function getBasisprofielByKvkNummer(?string $kvkNummer = null, ?bool $geoData = null) {
        $api = new \KvK\Api\BasisprofielApi($this->client, $this->config);
        return $api->getBasisprofielByKvkNummer($kvkNummer, $geoData);
    }


    public function getEigenaar(?string $kvkNummer = null, ?bool $geoData = null) {
        $api = new \KvK\Api\BasisprofielApi($this->client, $this->config);
        return $api->getEigenaar($kvkNummer, $geoData);
    }


    public function getHoofdvestiging(?string $kvkNummer = null, ?bool $geoData = null) {
        $api = new \KvK\Api\BasisprofielApi($this->client, $this->config);
        return $api->getHoofdvestiging($kvkNummer, $geoData);
    }


    public function getVestigingen(?string $kvkNummer = null) {
        $api = new \KvK\Api\BasisprofielApi($this->client, $this->config);
        return $api->getVestigingen($kvkNummer);
    }


    public function listAbonnementen() {
        $api = new \KvK\Api\AbonnementApi($this->client, $this->config);
        return $api->listAbonnementen();
    }


    public function listSignalsByAbonnementId(?string $abonnementId = null, ?string $vanaf = null, ?string $tot = null, ?int $pagina = null, ?int $aantal = null) {
        $api = new \KvK\Api\AbonnementApi($this->client, $this->config);
        return $api->listSignalsByAbonnementId($abonnementId, $vanaf, $tot, $pagina, $aantal);
    }


    public function getSignalByAbonnementIdAndSignalId(?string $abonnementId = null, ?string $signaalId = null) {
        $api = new \KvK\Api\SignaalApi($this->client, $this->config);
        return $api->getSignalByAbonnementIdAndSignalId($abonnementId, $signaalId);
    }


    public function getVestigingByVestigingsnummer(?string $vestigingsnummer = null, ?bool $geoData = null) {
        $api = new \KvK\Api\VestigingsprofielApi($this->client, $this->config);
        return $api->getVestigingByVestigingsnummer($vestigingsnummer, $geoData);
    }


    public function getResults(?string $kvkNummer = null, ?string $rsin = null, ?string $vestigingsnummer = null, ?string $naam = null, ?string $straatnaam = null, ?string $plaats = null, ?string $postcode = null, ?int $huisnummer = null, ?string $huisletter = null, ?int $postbusnummer = null, ?array $type = null, ?bool $inclusiefInactieveRegistraties = null, ?int $pagina = null, ?int $resultatenPerPagina = null) {
        $api = new \KvK\Api\ZoekenApi($this->client, $this->config);
        return $api->getResults($kvkNummer, $rsin, $vestigingsnummer, $naam, $straatnaam, $plaats, $postcode, $huisnummer, $huisletter, $postbusnummer, $type, $inclusiefInactieveRegistraties, $pagina, $resultatenPerPagina);
    }


    public function naamgevingBijKvkNummer(?string $kvkNummer = null) {
        $api = new \KvK\Api\NaamgevingApi($this->client, $this->config);
        return $api->naamgevingBijKvkNummer($kvkNummer);
    }

}
?>

<?php


namespace App;

use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;
use function Symfony\Component\VarDumper\Dumper\esc;

class Scrapping
{

    public const dailyPaymentPattern = '/-daily-payment/i';
    public const monthlyBudgetPattern = '/-fgn-monthly/i';
    public const quarterlyBudgetPattern = '/-fgn-quarterly';
    public const uri = 'https://opentreasury.gov.ng';
    public const ADMIN = "ADMIN";
    public const ECONOMIC = "ECONOMIC";
    public const FGN = "FUNCTIONS";
    private $url_array = array();
    private $selected_link;
    private $pathPrefix;

    /**
     * @param string $year
     * @param string $searchPattern
     * @return Scrapping
     */

    public function openTreasury(string $year, string $searchPattern = Scrapping::dailyPaymentPattern)
    {
        switch ($searchPattern) {
            case Scrapping::dailyPaymentPattern:
                $this->pathPrefix = '/daily/';
                break;
            case Scrapping::monthlyBudgetPattern:
                $this->pathPrefix = '/monthly/';
                break;
            case Scrapping::quarterlyBudgetPattern:
                $this->pathPrefix = '/quarterly/';
                break;
            default:
                throw new \Exception('Unexpected value');
        }
         $GLOBALS['return'] = array();
        $test =  HttpClient::create(['verify_peer' => false,
            'verify_host' => false,]);
        $client = new Client($test);
        $crawler = $client->request('GET', 'https://opentreasury.gov.ng');
        $crawler->selectLink($year)->each(function ($node) use ($searchPattern, $client) {
            $array = $node->extract(array('href'));
            if ($array[0] != "#") {
                if (preg_match($searchPattern, $array[0])) {
                    $client->click($node->link())->selectLink('download')->each(function ($node) {
                        if (preg_match('/\.xlsx/i', $node->extract(array('href'))[0])) {
                            array_push($GLOBALS['return'], Scrapping::uri.$node->extract(array('href'))[0]);
                        };
                    });
                }
            }
        });
        $this->url_array = $GLOBALS['return'];
        return $this;
    }

    /**
     *
     * classification can be
     * <ul>
     *      <li> ADMIN </li>
     *      <li> FUNCTIONS</li>
     *      <li> ECONOMIC</li>
     * </ul>
     * @param string $classification
     * @return $this
     */

    public function filterClassification(string $classification)
    {
        $array = array();
        if ($this->pathPrefix == '/monthly/') {
            $this->pathPrefix = $this->pathPrefix.$classification.'/';
            foreach ($this->url_array as $link) {
                if (preg_match('/'.$classification.'/i', $link)) {
                    array_push($array, $link);
                }
            }
            $this->url_array = $array;
        }
        return $this;
    }

    /**
     * @param string $month
     * @return $this
     */
    public function selectMonth(string $month)
    {
        foreach ($this->url_array as $link) {
            if (preg_match('/'.$month.'/i', $link)) {
                $this->selected_link = $link;
                return $this;
            }
        }
        return $this;
    }

    /**
     * format dd-mm
     *
     * @param string $date
     * @return $this
     */
    public function selectDate(string $date)
    {
        foreach ($this->url_array as $link) {
            if (preg_match('/'.$date.'/i', $link)) {
                $this->selected_link = $link;
                return $this;
            }
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getLinks()
    {
        return $this->url_array;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->selected_link;
    }

    /**
     *
     * this downloads the excel file to the public/file directory
     * before using this method make sure you have selected a particular date or month to be downloaded
     */
    public function download()
    {
        if (isset($this->selected_link)) {
            try {
                $ch = curl_init($this->selected_link);
                //get the directory path
                $dir = realpath('public/file');

                // Save file into file location
                $file_name = basename($this->selected_link);
                $save_file_loc = $dir.$this->pathPrefix. $file_name;
                if (!is_dir($dir.$this->pathPrefix)) {
                    mkdir($dir.$this->pathPrefix, 0777, true);
                }
                if(is_dir($save_file_loc)){
                    return true;
                }
                $fp = fopen($save_file_loc, 'wb');

                curl_setopt($ch, CURLOPT_FILE, $fp);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_exec($ch);

                curl_close($ch);

                fclose($fp);
                return true;
            } catch (\Exception $exception) {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     *
     * get this latest resource for this
     * @return $this
     */
    public function latest()
    {
        $this->selected_link = end($this->url_array);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPathSuffix()
    {
        return $this->pathPrefix;
    }

    public static function downloadLink($link, $pathSuffix)
    {
        if (isset($link)) {
            try {
                $ch = curl_init($link);
                //get the directory path
                $dir = realpath('public/file');

                // Save file into file location
                $file_name = basename($link);
                $save_file_loc = $dir.$pathSuffix. $file_name;
                if (!is_dir($dir.$pathSuffix)) {
                    mkdir($dir.$pathSuffix, 0777, true);
                }
                $fp = fopen($save_file_loc, 'wb');

                curl_setopt($ch, CURLOPT_FILE, $fp);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_exec($ch);

                curl_close($ch);

                fclose($fp);
                return true;
            } catch (\Exception $exception) {
                return false;
            }
        } else {
            return false;
        }
    }
}

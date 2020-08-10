<?php


namespace App;

class DownloadReport
{
    private $reports;

    public function __construct()
    {
        $this->reports = Report::whereDownloaded(false)->take(10)->get();
    }

    /**
     * @return void
     */
    public function download()
    {
        foreach ($this->reports as $report) {
            $path = $this->getPath($report);
            $link = $report->link;
            $this->get($link, $path);
        }
        return;
    }

    /**
     * @param $link
     * @param $path
     * @return bool
     */
    public function get($link, $path)
    {
        if (isset($link)) {
            try {
                $ch = curl_init($link);
                //get the directory path
                $dir = realpath('public/file');

                // Save file into file location
                $file_name = basename($link);
                $save_file_loc = $dir.$path. $file_name;
                if (!is_dir($dir.$path)) {
                    mkdir($dir.$path, 0777, true);
                }
                if (is_dir($save_file_loc)) {
                    return true;
                }
                $fp = fopen($save_file_loc, 'wb');

                curl_setopt($ch, CURLOPT_FILE, $fp);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_exec($ch);
                $returnedStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                fclose($fp);
                if ($returnedStatusCode == 404) {
                    Reports::whereLink($link)->delete();
                    return false;
                }
                Reports::whereLink($link)->update(['downloaded'=> true]);
                return true;
            } catch (\Exception $exception) {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * @param $report
     * @return string
     */
    private function getPath($report)
    {
        if (preg_match('/daily/i', $report->type)) {
            return "/daily/".$report->year."/";
        } elseif (preg_match('/monthly/i', $report->type)) {
            if (preg_match('/admin/i', $report->link)) {
                return "/monthly/admin/".$report->year."/";
            } elseif (preg_match('/functions/i', $report->link)) {
                return "/monthly/function/".$report->year."/";
            } elseif (preg_match('/economic/i', $report->link)) {
                return "/monthly/economic/".$report->year."/";
            } else {
                return "/monthly/".$report->year."/";
            }
        } elseif (preg_match("/quarterly/i", $report->type)) {
            if (preg_match('/admin/i', $report->link)) {
                return "/quarterly/admin/".$report->year."/";
            } elseif (preg_match('/functions/i', $report->link)) {
                return "/quarterly/function/".$report->year."/";
            } elseif (preg_match('/economic/i', $report->link)) {
                return "/quarterly/economic/".$report->year."/";
            } else {
                return "/quarterly/".$report->year."/";
            }
        } else {
            return '';
        }
    }
}

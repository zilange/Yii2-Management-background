<?php

namespace app\components;

use yii\base\Component;

class Helper extends Component
{
    /**
     * 获取客户端IP地址
     */
    static public function getIP()
    {
        static $ip = NULL;
        if ($ip !== NULL)
            return $ip;
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $pos = array_search('unknown', $arr);
            if (false !== $pos){
                unset($arr[$pos]);
            }
            $ip = trim($arr[0]);
        } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        // IP地址合法验证
        $ip = ( false !== ip2long($ip) ) ? $ip : '0.0.0.0';
        return $ip;
    }

    /**
     * 获取远程URL内容
     * @param string $url
     * @return string
     */
    public static function curl($url, $param = array(), $referer = NULL, $ua = NULL)
    {
        if ($param) {
            $url .= '?' . http_build_query($param);
        }

        $ip = self::getIP();
        $headers['CLIENT-IP'] = $ip;
        $headers['X-FORWARDED-FOR'] = $ip;
        $headers['REMOTE_ADDR'] = $ip;

        $header = array();
        foreach ($headers as $n => $v) {
            $header[] = $n . ':' . $v;
        }
        $ua = ($ua == NULL ? self::rand_ua() : $ua);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_REFERER, $referer);
        curl_setopt($ch, CURLOPT_USERAGENT, $ua);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $body = curl_exec($ch);
        curl_close($ch);

        return $body;
    }
}
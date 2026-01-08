<?php

if (!function_exists('g_enum')) {
    /**
     * Enumeration
     * ID値から表示テキストを取得する。IDを指定しないと全体データを取得する。
     * @param string $enumID
     * @param integer | string | null $enumValue
     * @return mixed | array
     */
    function g_enum($enumID, $value = null)
    {
        $enumerations = config('constants');

        $enumArray = array();
        if (isset($enumerations[$enumID]))
            $enumArray = $enumerations[$enumID];

        if (!is_array($enumArray))
            $enumArray = array();

        // 表示テキスト
        $result = array();
        if (null !== $value) {
            if (strpos($value, ',') !== false) {
                $values = explode(',', $value);
            } else {
                $values = array($value);
            }
            foreach ($values as $value) {
                if (isset($enumArray[$value])) {
                    if (is_array($enumArray[$value]) && count($enumArray[$value]) > 0) {
                        return $enumArray[$value];
                    }
                    $result[] = $enumArray[$value];
                }
            }
            $result = implode('<br>', $result);
            return $result;
        }

        return $enumArray;
    }
}

if (!function_exists('g_age')) {

    function g_age($date) {
        return (new \Carbon\Carbon($date))->age;
    }
}

if (!function_exists('g_formatBirthday')) {
    /**
     *
     *
     * @param string $string
     * @return string
     */
    function g_formatBirthday($dateString)
    {
        $date = strtotime($dateString);
        return date('Y年n月j日', $date) . ' (' . g_age($date) . '歳)';
    }
}



<?php
if (!function_exists('is_serialized')) {
    /**
     * Function to check if serialize was applied to the given string
     *
     * @param string $param - String to be checked if was serialized
     *
     * @return boolean
     */
    function is_serialized(string $param)
    {
        $data = @unserialize($param);
        return $param === 'b:0;' || $data !== false;
    }
}
<?php
class Constants{
    const CODE = "11";

    public function getRegistrationCode(){
        return md5("register02983434").self::CODE;
    }
}

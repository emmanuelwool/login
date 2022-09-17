<?php
namespace Phppot;

class Config
{

    const WEB_ROOT = "http://localhost/challenge/twitter-oauth";
    
    // Database Configuration
    const DB_HOST = "localhost";

    const DB_USERNAME = "root";

    const DB_PASSWORD = "";

    const DB_NAME = "twitter-oauth";

    // Twitter API configuration
    const TW_CONSUMER_KEY = 'FCRYE2dyP7V88TCiCd6BDNtQJ';

    const TW_CONSUMER_SECRET = 'OdNsb2Hd7yWAuyPSE39mJXWLweUh26HyJXQdF9ptKJefPxUUMl';

    const TW_CALLBACK_URL = Config::WEB_ROOT . '/signin_with_twitter.php';
}

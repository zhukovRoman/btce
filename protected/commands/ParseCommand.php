<?php

class ParseCommand extends CConsoleCommand {
    public function run($args) {
       
       $pairs = [
          'btc_usd',
          'btc_rur',
          'ltc_rur',
          'nmc_usd',
          'nvc_usd',
          'ppc_usd'
           
       ] ;
        
        foreach ($pairs as $pair) {
            $path = "https://btc-e.com/api/3/ticker/";
                                $model->pair = $pair;
                                $response = file_get_contents ($path.$pair);
                                if ($response)
                                {
                                    $model=new Info;
                                    $arr = json_decode($response, true);
                                    //print_r($arr);
                                    $model->pair = $pair;
                                    $model->high = $arr[$pair]['high'];
                                    $model->low = $arr[$pair]['low'];
                                    $model->avg = $arr[$pair]['avg'];
                                    $model->vol = $arr[$pair]['vol'];
                                    $model->vol_cur = $arr[$pair]['vol_cur'];
                                    $model->last = $arr[$pair]['last'];
                                    $model->last = $arr[$pair]['last'];
                                    $model->buy = $arr[$pair]['buy'];
                                    $model->sell = $arr[$pair]['sell'];
                                    $model->updated = $arr[$pair]['updated'];

                                    //{"btc_usd":{"high":874.89899,"low":835,"avg":854.949495,"vol":7153230.0684,"vol_cur":8383.97642,
                                    //"last":850.6,"buy":850.6,"sell":850.597,"updated":1387048111}}
                                    if(!$model->save())
                                       echo "Error save";
                                }
        }
		
        echo "OK";
    }
}



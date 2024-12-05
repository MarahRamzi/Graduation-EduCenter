<?php

namespace App\Http\traits;


trait MyTrait {

    public function returnError($errorNo ,$msg) {

       return response()->json(
        [
            'status' => false,
            'errorNo' =>$errorNo,
            'msg' =>$msg,
        ]);
    }

    public function returnSuccesMessage($msg="",$errorNo="000"){

        return
        [
            'status' => true,
            'errorNo' =>$errorNo,
            'msg' =>$msg,
         ];
    }

    public function returnData( $key,$value,$msg=""){

        return response()->json(
        [
            'status' => true,
            'errorNo' =>"000",
            'msg' =>$msg,
            $key =>$value
         ]);
    }





}

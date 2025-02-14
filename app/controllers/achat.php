<?php

    class achat extends Controller{

        public function index($data){
            $achat = $this->wallet->buycrypto($conn, $userId, $cryptoId, $amountInUsdt);
            $data=['achat'=>$achat];

            $this->view('pages/achat',$data);
        }
    }
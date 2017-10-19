<?php

class FullinfoorderModel extends Model{

public function createFullinfoorder($params)
{
    //return ['status'=>200, 'data'=>$params];
    try{
        $sth = $this->pdo->prepare('INSERT INTO fullinfoorder (order_id, book_id, discount_book, count, book_price) '
                . 'VALUES (:order_id, :book_id, :discount_book, :count, :book_pricee)');
        $sth->execute($params);

        if($this->pdo->lastInsertId()>0)
             return ['status'=>200, 'data'=> 1];
         else 
             return ['status'=>500, 'clientCode'=>'0009'];
    }catch(PDOException $err){
        file_put_contents('errors.txt', $err->getMessage(), FILE_APPEND); 
        return ['status'=>500, 'clientCode'=>'0009'];
    }
}



}

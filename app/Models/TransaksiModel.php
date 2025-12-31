<?php
namespace App\Models;
use CodeIgniter\Model;


class TransaksiModel extends Model
{
protected $table = 'transaksi';
protected $primaryKey = 'id';
protected $allowedFields = ['user_id','produk_id','user_game','server','catatan','status'];


public function getByUser($userId)
{
return $this->select('transaksi.*, produk.nama_produk, produk.harga')
->join('produk', 'produk.id_produk = transaksi.produk_id')
->where('user_id', $userId)
->orderBy('id','DESC')
->findAll();
}
}
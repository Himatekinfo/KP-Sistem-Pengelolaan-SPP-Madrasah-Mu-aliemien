<?php

/**
 * Description of StaticHelper
 *
 * @author Blue Spy
 */
class StaticHelper {
	public static function GetYears($startRange="", $endRange="") {
		if ($startRange == "")
			$startRange = date("Y");

		if ($endRange == "")
			$endRange = date("Y") + 4;

		if (!is_numeric($startRange) || !is_numeric($endRange))
			throw new CException("startRange and endRange should be numeric values");

		$out = null;
		for ($i = $startRange; $i <= $endRange; $i++)
			$out[$i] = $i;

		return $out;
	}

	public static function getReportTransaction($as = "0", $day=0, $month=0, $year=0, $asTotal=false, $typeOf="a") {
		if (!($as == "d" || $as == "m" || $as == "y" || $as == "0"))
			throw new CException("As could only be (d)ay or (m)onth or (y)ear.");

		if (!($typeOf == "a" || $typeOf == "d" || $typeOf == "c"))
			throw new CException("Typeof could only be (a)ll or (c)redit or (d)ebet.");

		$day = $day == 0 ? date("j") : $day;
		$month = $month == 0 ? date("n") : $month;
		$year = $year == 0 ? date("Y") : $year;

		$sqlStatement = "";

		if ($asTotal) {
			$sqlStatement .= " SELECT SUM(Debet) TotalDebet, SUM(Credit) TotalCredit FROM ( ";
		}

		$sqlStatement .= "
				SELECT
					TransactionDate,
					TransactionDescription,
					ItemCount,
					ItemPrice,
					CASE TransactionType WHEN 'in'
					THEN TransactionTotal ELSE 0 END Debet,
					CASE TransactionType WHEN 'out'
					THEN TransactionTotal ELSE 0 END Credit
				FROM
				(

				SELECT 'in' TransactionType, t2.NamaJnsTransaksi TransactionDescription, t1.ItemCount, t1.ItemPrice, t2.JumlahPembayaran TransactionTotal, t1.TransactionDate  FROM
				(
				SELECT JnstransaksiId, COUNT(JnstransaksiId) ItemCount, SUM(Jumlah) ItemPrice, DATE(TanggalTransaksi) TransactionDate FROM tbl_transaksi_siswa
				GROUP BY JnstransaksiId, DATE(TanggalTransaksi)
				) t1 INNER JOIN tbl_jns_transaksi t2 ON t1.JnsTransaksiId=t2.JnsTransaksiId
				UNION
				SELECT 'out', CONCAT(Deskripsi,\", \",Ket), JumlahBenda, HargaSatuan, JumlahBenda*HargaSatuan,DATE(Tanggal) FROM tbl_transaksi_pengeluaran
				GROUP BY Deskripsi, DATE(Tanggal)

				) t4 ";
		if ($as != "0") {
			$sqlStatement .= " WHERE ";
			if ($as == "d") {
				$sqlStatement .= " DAY(TransactionDate)=$day AND MONTH(TransactionDate)=$month AND YEAR(TransactionDate)=$year ";
			}
			if ($as == "m") {
				$sqlStatement .= " MONTH(TransactionDate)=$month AND YEAR(TransactionDate)=$year ";
			}
			if ($as == "y") {
				$sqlStatement .= " YEAR(TransactionDate)=$year ";
			}
		}

		if ($typeOf != "a") {
			if (strpos($sqlStatement, " WHERE ") === false) {
				$sqlStatement .= " WHERE ";
			} else {
				$sqlStatement .= " AND ";
			}

			if ($typeOf == "c") {
				$sqlStatement .= " TransactionType='out' ";
			}

			if ($typeOf == "d") {
				$sqlStatement .= " TransactionType='in' ";
			}
		}

		$sqlStatement .= "
				ORDER BY TransactionDate, TransactionDescription
			";
		if ($asTotal) {
			$sqlStatement .= "
					) t5
				";
		}
		Yii::trace($sqlStatement);
		$rawData = Yii::app()->db->createCommand($sqlStatement)->queryAll();
		$dataProvider = new CArrayDataProvider($rawData, array(
					'sort' => array(
						'attributes' => array(
							'TransactionDate', 'TransactionDescription',
						),
					),
					'pagination' => array(
						'pageSize' => 100,
					),
				));

//		print_r($dataProvider->getData()); die();
		if ($asTotal) {
			return current($dataProvider->getData());
		}
		return $dataProvider;
	}

}

?>

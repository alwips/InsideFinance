<?php

namespace App\Helpers;

class Helper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }
    /**	 
	 *
	 * @param integer $angka number
	 * @return string
	 *
	 * Usage example:
	 * echo convert_to_rupiah(10000000); -> Rp. 10.000.000	 
	 */ 
	public static function numToRupiah($angka,$curr=null)
	{
		return $curr.number_format($angka,2,',','.');
	}
	
	/**
	 *
	 * @param string $rupiah
	 * @return integer
	 *
	 * Usage example:
	 * echo convert_to_number("Rp. 10.000.000"); -> 10000000
	 */	
	 
	public static function rupiahToNum($rupiah)
	{
		$rupiah = str_replace(".", "", $rupiah);
		$rupiah = str_replace(",", ".", $rupiah);
		return $rupiah;
	}

	public static function pembulatan($uang)
	{
	 $ratusan = substr($uang, -3);
	 if($ratusan<500)
	 $akhir = $uang - $ratusan;
	 else
	 $akhir = $uang + (1000-$ratusan);
	 return number_format($akhir, 2, ',', '.');
	}

    public static function terbilang($angka) {
        $angka = (float)$angka;
        $bilangan = array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan','Sepuluh','Sebelas');
        if ($angka < 12) {
            return $bilangan[$angka];
        } else if ($angka < 20) {
            return $bilangan[$angka - 10] . ' Belas';
        } else if ($angka < 100) {
            $hasil_bagi = (int)($angka / 10);
            $hasil_mod = $angka % 10;
            return trim(sprintf('%s Puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod]));
        } else if ($angka < 200) { return sprintf('Seratus %s', $this->terbilang($angka - 100));
        } else if ($angka < 1000) { $hasil_bagi = (int)($angka / 100); $hasil_mod = $angka % 100; return trim(sprintf('%s Ratus %s', $bilangan[$hasil_bagi], $this->terbilang($hasil_mod)));
        } else if ($angka < 2000) { return trim(sprintf('Seribu %s', $this->terbilang($angka - 1000)));
        } else if ($angka < 1000000) { $hasil_bagi = (int)($angka / 1000); $hasil_mod = $angka % 1000; return sprintf('%s Ribu %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod));
        } else if ($angka < 1000000000) { $hasil_bagi = (int)($angka / 1000000); $hasil_mod = $angka % 1000000; return trim(sprintf('%s Juta %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod)));
        } else if ($angka < 1000000000000) { $hasil_bagi = (int)($angka / 1000000000); $hasil_mod = fmod($angka, 1000000000); return trim(sprintf('%s Milyar %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod)));
        } else if ($angka < 1000000000000000) { $hasil_bagi = $angka / 1000000000000; $hasil_mod = fmod($angka, 1000000000000); return trim(sprintf('%s Triliun %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod)));
        } else {
            return 'Data Salah';
        }
    }
}
function numToRupiah(num, curr=null)
{
	num = parseFloat(num).toFixed(2);
	num = num.toString().replace('.',',').replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
	return curr+num;
}
/**
 * Usage example:
 * alert(convertToRupiah(10000000)); -> "Rp. 10.000.000"
 */
 
function rupiahToNum(rupiah)
{
	return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
}
/**
 * Usage example:
 * alert(convertToAngka("Rp 10.000.123")); -> 10000123
 */
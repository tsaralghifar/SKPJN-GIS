<!DOCTYPE html>
<html><head>
<link rel="STYLESHEET" href="{{ asset('css/print_static.css') }}" type="text/css" />
<title>Laporan</title>
</head>

<div id="body">

<div id="section_header">
</div>

<div id="content">
  
<div class="page" style="font-size: 7pt">

<table style="width: 100%; font-size: 8pt;">

<tr>
<td>Dicetak pada: <strong><?= date('d M Y H:i:s', time()); ?></strong></td>
</tr>

<tr>
<td><strong>Kopi M'Baroh</strong></td>
<td>Alamat: <strong>JL. Sukamara, Landasan Ulin</strong></td>
</tr>
</table>

@yield('content')

</div>

</div>
</div>

</body></html>
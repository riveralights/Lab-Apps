<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta name=Generator content="Microsoft Word 15 (filtered)">
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:8.0pt;
	margin-left:0in;
	line-height:107%;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;}
.MsoChpDefault
	{font-family:"Calibri",sans-serif;}
.MsoPapDefault
	{margin-bottom:8.0pt;
	line-height:107%;}
@page WordSection1
	{size:595.3pt 841.9pt;
	margin:1.0in 1.0in 1.0in 1.0in;}
div.WordSection1
	{page:WordSection1;}
-->
</style>

</head>

<body lang=EN-US style='word-wrap:break-word'>

<img src="https://iili.io/BwCBhG.jpg" alt="" style="margin-top: -30px" width="100%">

<div class=WordSection1>

<p class=MsoNormal align=center style='text-align:center'><b><span lang=EN-ID
style='font-size:16.0pt; padding-top:600px;line-height:107%;font-family:"Times New Roman",serif'>BERITA
ACARA PRAKTIKUM</span></b></p>

<p class=MsoNormal align=center style='text-align:center'><b><span lang=EN-ID
style='font-size:16.0pt;line-height:107%;font-family:"Times New Roman",serif'>&nbsp;</span></b></p>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr style='height:22.7pt'>
  <td width=132 style='width:99.0pt;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>Nama</span></p>
  </td>
  <td width=19 style='width:14.15pt;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>:</span></p>
  </td>
  <td width=450 style='width:337.65pt;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>{{ $report->name }}</span></p>
  </td>
 </tr>
 <tr style='height:22.7pt'>
  <td width=132 style='width:99.0pt;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>Pelajaran</span></p>
  </td>
  <td width=19 style='width:14.15pt;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>:</span></p>
  </td>
  <td width=450 style='width:337.65pt;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>{{ $report->lesson }}</span></p>
  </td>
 </tr>
 <tr style='height:22.7pt'>
  <td width=132 style='width:99.0pt;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>Ruangan</span></p>
  </td>
  <td width=19 style='width:14.15pt;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>:</span></p>
  </td>
  <td width=450 style='width:337.65pt;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>{{ $report->laboratory->name }}</span></p>
  </td>
 </tr>
 <tr style='height:22.7pt'>
  <td width=132 style='width:99.0pt;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>Tanggal</span></p>
  </td>
  <td width=19 style='width:14.15pt;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>:</span></p>
  </td>
  <td width=450 style='width:337.65pt;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>{{ \Carbon\Carbon::parse($report->end_date)->isoformat('dddd, D MMMM Y') }}</span></p>
  </td>
 </tr>
 <tr style='height:22.7pt'>
  <td width=132 style='width:99.0pt;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>Waktu</span></p>
  </td>
  <td width=19 style='width:14.15pt;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>:</span></p>
  </td>
  <td width=450 style='width:337.65pt;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>{{ \Carbon\Carbon::parse($report->starting_date)->format('H.i') }} - {{ \Carbon\Carbon::parse($report->end_date)->format('H.i') }} WIB</span></p>
  </td>
 </tr>
 <tr style='height:22.7pt'>
  <td width=132 style='width:99.0pt;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>Keterangan</span></p>
  </td>
  <td width=19 style='width:14.15pt;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>:</span></p>
  </td>
  <td width=450 style='width:337.65pt;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>{{ $report->description }}</span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal><span lang=EN-ID style='font-size:12.0pt;line-height:107%;
font-family:"Times New Roman",serif'>&nbsp;</span></p>

<p class=MsoNormal><b><span lang=EN-ID style='font-size:14.0pt;line-height:
107%;font-family:"Times New Roman",serif'>Aset Yang Dipinjam</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr style='height:22.7pt'>
  <td width=37 rowspan=2 style='width:28.1pt;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-ID style='font-size:12.0pt;font-family:
  "Times New Roman",serif'>No</span></b></p>
  </td>
  <td width=163 rowspan=2 style='width:122.1pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-ID style='font-size:12.0pt;font-family:
  "Times New Roman",serif'>Nama Alat</span></b></p>
  </td>
  <td width=64 rowspan=2 style='width:48.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-ID style='font-size:12.0pt;font-family:
  "Times New Roman",serif'>Jumlah</span></b></p>
  </td>
  <td width=237 colspan=2 style='width:177.45pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-ID style='font-size:12.0pt;font-family:
  "Times New Roman",serif'>Kondisi</span></b></p>
  </td>
  <td width=100 rowspan=2 style='width:75.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-ID style='font-size:12.0pt;font-family:
  "Times New Roman",serif'>Keterangan</span></b></p>
  </td>
 </tr>
 <tr style='height:22.7pt'>
  <td width=136 style='width:102.3pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-ID style='font-size:12.0pt;font-family:
  "Times New Roman",serif'>Sebelum</span></b></p>
  </td>
  <td width=100 style='width:75.15pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-ID style='font-size:12.0pt;font-family:
  "Times New Roman",serif'>Sesudah</span></b></p>
  </td>
 </tr>
@forelse($report->report_details as $detail)
 <tr style='height:22.7pt'>
  <td width=37 valign=top style='width:28.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>{{ $loop->iteration }}</span></p>
  </td>
  <td width=163 valign=top style='width:122.1pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>{{ $detail->name }}</span></p>
  </td>
  <td width=64 valign=top style='width:48.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>{{ $detail->quantity }}</span></p>
  </td>
  <td width=136 valign=top style='width:102.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>{{ $detail->condition_before }}</span></p>
  </td>
  <td width=100 valign=top style='width:75.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>{{ $detail->condition_after }}</span></p>
  </td>
  <td width=100 valign=top style='width:75.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:22.7pt'>
  <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
  lang=EN-ID style='font-size:12.0pt;font-family:"Times New Roman",serif'>{{ $detail->description }}</span></p>
  </td>
 </tr>
@empty
<tr>
<td colspan="6" align="center">Tidak ada barang yang dipinjam</td>
</tr>
@endforelse
</table>

<p class=MsoNormal><span lang=EN-ID style='font-size:12.0pt;line-height:107%;
font-family:"Times New Roman",serif'>&nbsp;</span></p>

<p class=MsoNormal><span lang=EN-ID style='font-size:12.0pt;line-height:107%;
font-family:"Times New Roman",serif'>&nbsp;</span></p>

<p class=MsoNormal><span lang=EN-ID style='font-size:12.0pt;line-height:107%;
font-family:"Times New Roman",serif'>&nbsp;</span></p>

<p class=MsoNormal><span lang=EN-ID style='font-size:12.0pt;line-height:107%;
font-family:"Times New Roman",serif'>&nbsp;</span></p>

<p class=MsoNormal><span lang=EN-ID style='font-size:12.0pt;line-height:107%;
font-family:"Times New Roman",serif'>                                                                                                                    
Mengetahui,</span></p>

<p class=MsoNormal><span lang=EN-ID style='font-size:12.0pt;line-height:107%;
font-family:"Times New Roman",serif'>     Guru Peminjam                                                                              Teknisi
Laboratorium</span></p>

<p class=MsoNormal><span lang=EN-ID style='font-size:12.0pt;line-height:107%;
font-family:"Times New Roman",serif'>&nbsp;</span></p>

<p class=MsoNormal><span lang=EN-ID style='font-size:12.0pt;line-height:107%;
font-family:"Times New Roman",serif'>&nbsp;</span></p>

<p class=MsoNormal><span lang=EN-ID style='font-size:12.0pt;line-height:107%;
font-family:"Times New Roman",serif'>( ________________ )                                                                        (
________________ )</span></p>

<p class=MsoNormal><span lang=EN-ID style='font-size:12.0pt;line-height:107%;
font-family:"Times New Roman",serif'>&nbsp;</span></p>

</div>

</body>

</html>

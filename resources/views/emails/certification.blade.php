
<p>Hello {{ $mempership->first_name }} {{ $mempership->second_name }} {{ $mempership->third_name }} {{ $mempership->last_name }} ,</p>

<p>Click this link to download your Certificate From DAAM</p>

<a href="{{asset('storage/memperships/mempership_'.$mempership->id.'.pdf')}}">Download Certificate</a>
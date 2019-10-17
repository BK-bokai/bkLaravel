<p>FB回傳</p>

@php
if(isset($tokenMetadata2))
{echo "<h3>Metadata</h3>";
print_r($tokenMetadata2);}
@endphp

@php
if(isset($accessToken_val))
{
    echo "<h3>Long-lived</h3>";
print_r($accessToken_val);
}

@endphp

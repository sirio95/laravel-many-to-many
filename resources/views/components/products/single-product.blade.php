<li>
    <h3>{{$product-> name}}</h3>
    <ul>
        <li>Codice prodotto: {{$product-> code}}</li>
        <li>Tipologia prodotto: {{ $product-> typology-> name }} - {{ $product-> typology-> code }}</li>
        <li>{{$product-> description}}</li>
        <li>Weight: {{ floatval($product-> weight / 100) }}kg</li>
        <li>Price: {{ floatval($product-> price / 100) }}&euro;</li>
        <li>Disponibilit&agrave; in copia fisica: {{ $product-> typology-> digital ? "YES" : "NO" }}</li>
    </ul>
</li>
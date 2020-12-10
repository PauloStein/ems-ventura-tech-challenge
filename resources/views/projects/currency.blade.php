<div>
    <input type="number" value="1">    
    <select>
        @foreach ($responseBody as $response)
            <option>
                <h6> {{ $response->name }} </h6>        
            </option>
        @endforeach
    </select>
</div>
<div>
    <input type="number" value="{{ $response->high }}"> 
    <input type="text" value="Real Brasileiro">
</div>
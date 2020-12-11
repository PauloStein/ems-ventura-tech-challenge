<div>
<form action="{{ route('currency.show') }}" method="POST">
    @csrf
    <label for="currency">Selecione a moeda</label>   
    <select name="currency">
        @foreach ($responseBody as $response)
            <option value={{ $response->code }}>
                <h6> {{ $response->name }} </h6>        
            </option>
        @endforeach
    </select>
    <input type="submit" value="Submit">
    </form>
</div>
<div>
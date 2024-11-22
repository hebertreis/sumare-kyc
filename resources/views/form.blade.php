
@php
    use App\Models\Ocupacao;
    $ocupacoes = Ocupacao::all();
@endphp

<!-- ...existing code... -->
<select name="ocupacao_id">
    @foreach($ocupacoes as $ocupacao)
        <option value="{{ $ocupacao->id }}">{{ $ocupacao->title }}</option>
    @endforeach
</select>
<!-- ...existing code... -->
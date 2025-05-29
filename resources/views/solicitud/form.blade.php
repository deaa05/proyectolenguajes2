<div class="mb-3">
    <label for="tema" class="form-label">Tema</label>
    <input type="text" name="tema" class="form-control" value="{{ old('tema', $solicitud->tema ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea name="descripcion" class="form-control" required>{{ old('descripcion', $solicitud->descripcion ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="aera" class="form-label">Aera</label>
    <select name="aera" class="form-select" required>
        @foreach(['ti', 'contabilidad', 'administracion', 'operador'] as $a)
            <option value="{{ $a }}" @selected(old('aera', $solicitud->aera ?? '') === $a)>{{ ucfirst($a) }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="estado" class="form-label">Estado</label>
    <select name="estado" class="form-select" required>
        @foreach(['solicitado', 'aprovado', 'rechazado'] as $e)
            <option value="{{ $e }}" @selected(old('estado', $solicitud->estado ?? '') === $e)>{{ ucfirst($e) }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3 form-check">
    <input type="checkbox" name="usuario" class="form-check-input" value="1"
        {{ old('usuario', $solicitud->usuario ?? false) ? 'checked' : '' }}>
    <label class="form-check-label">¿Es usuario externo? </label>
</div>
